<?php
require_once __DIR__ . '/../../config/database.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // 🔹 READ - Buscar todos os carrosseis
    public function getAll(): array {
        try {
            $sql = "
                SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
                       p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM carousel c
                JOIN produto p ON p.id_produto = c.id_produto
                JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
                ORDER BY c.posicao ASC
            ";

            $stmt = $this->conn->query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Log
            if (empty($rows)) {
                error_log("[CarouselModel] Nenhum registro retornado da query: " . $sql);
            } else {
                error_log("[CarouselModel] Retornou " . count($rows) . " registros do carousel");
            }

            return $rows ?: [];

        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro SQL: " . $e->getMessage());
            return [];
        }
    }

    // 🔹 READ - Buscar carrossel por ID
    public function getElementById(int $id): array|false {
        try {
            $stmt = $this->conn->prepare("
                SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo,
                       p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM carousel c
                JOIN produto p ON p.id_produto = c.id_produto
                JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs
                WHERE c.id_carousel = :id
            ");
            $stmt->execute([":id" => $id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                error_log("[CarouselModel] Nenhum carousel encontrado com ID = {$id}");
            }
            return $result;

        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao buscar por ID: " . $e->getMessage());
            return false;
        }
    }

    // 🔹 CREATE - Criar novo carrossel
    public function create(array $data): array {
        try {
            // Limite de 3 carrosseis
            $stmt = $this->conn->query("SELECT COUNT(*) as total FROM carousel");
            $total = (int) $stmt->fetch()['total'];

            if ($total >= 3) {
                return ['error' => 'Limite atingido, não é possível criar mais de 3 carrosseis.'];
            }

            $posicao = $total + 1;
            $id_produto = $data['id_produto'];

            // Pegar cores do produto
            $stmt = $this->conn->prepare("
                SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM produto
                WHERE id_produto = :id_produto
            ");
            $stmt->execute([':id_produto' => $id_produto]);
            $cores = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$cores) {
                return ['error' => 'Produto não encontrado para copiar cores.'];
            }

            // Criar cor no coressubs
            $insertCor = $this->conn->prepare("
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3)
                VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)
            ");
            $insertCor->execute([
                ':corEspecial' => $cores['corEspecial'],
                ':hexDegrade1' => $cores['hexDegrade1'],
                ':hexDegrade2' => $cores['hexDegrade2'],
                ':hexDegrade3' => $cores['hexDegrade3']
            ]);
            $id_coressubs = $this->conn->lastInsertId();

            // Criar novo carousel
            $insert = $this->conn->prepare("
                INSERT INTO carousel (id_produto, id_coressubs, posicao)
                VALUES (:id_produto, :id_coressubs, :posicao)
            ");
            $insert->execute([
                ':id_produto' => $id_produto,
                ':id_coressubs' => $id_coressubs,
                ':posicao' => $posicao
            ]);

            return ['success' => true, 'id_carousel' => $this->conn->lastInsertId()];

        } catch (Exception $e) {
            error_log("[CarouselModel] Erro ao criar carrossel: " . $e->getMessage());
            return ['error' => 'Erro ao criar carrossel: ' . $e->getMessage()];
        }
    }

    // 🔹 UPDATE - Atualizar carrossel
    public function update(int $id, array $data): bool {
        try {
            $stmt = $this->conn->prepare("
                UPDATE carousel
                SET id_produto = :id_produto, id_coressubs = :id_coresSubs
                WHERE id_carousel = :id
            ");
            return $stmt->execute([
                ":id" => $id,
                ":id_produto" => $data['id_produto'],
                ":id_coresSubs" => $data['id_coresSubs']
            ]);
        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao atualizar: " . $e->getMessage());
            return false;
        }
    }

    // 🔹 DELETE - Remover carrossel
    public function remove(int $id): bool {
        try {
            $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao remover: " . $e->getMessage());
            return false;
        }
    }

    // 🔹 UPDATE/CREATE - Atualizar cores personalizadas
    public function updateCoresPersonalizadas(int $id_carousel, array $novaCor): bool {
        try {
            // Verifica se a cor já existe
            $check = $this->conn->prepare("
                SELECT id_coressubs FROM coressubs
                WHERE corEspecial = :corEspecial
                  AND hexDegrade1 = :hexDegrade1
                  AND hexDegrade2 = :hexDegrade2
                  AND (hexDegrade3 = :hexDegrade3 OR (hexDegrade3 IS NULL AND :hexDegrade3 IS NULL))
                LIMIT 1
            ");
            $check->execute([
                ':corEspecial' => $novaCor['corEspecial'],
                ':hexDegrade1' => $novaCor['hexDegrade1'],
                ':hexDegrade2' => $novaCor['hexDegrade2'],
                ':hexDegrade3' => $novaCor['hexDegrade3'] ?? null
            ]);
            $existe = $check->fetch(PDO::FETCH_ASSOC);

            if ($existe) {
                $id_coresSubs = $existe['id_coressubs'];
            } else {
                $insert = $this->conn->prepare("
                    INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3)
                    VALUES (:corEspecial, :hexDegrade1, :hexDegrade2, :hexDegrade3)
                ");
                $insert->execute([
                    ':corEspecial' => $novaCor['corEspecial'],
                    ':hexDegrade1' => $novaCor['hexDegrade1'],
                    ':hexDegrade2' => $novaCor['hexDegrade2'],
                    ':hexDegrade3' => $novaCor['hexDegrade3'] ?? null
                ]);
                $id_coresSubs = $this->conn->lastInsertId();
            }

            // Atualiza o carrossel com a nova cor
            $update = $this->conn->prepare("
                UPDATE carousel
                SET id_coressubs = :id_coresSubs
                WHERE id_carousel = :id_carousel
            ");
            return $update->execute([
                ':id_coresSubs' => $id_coresSubs,
                ':id_carousel' => $id_carousel
            ]);

        } catch (Exception $e) {
            error_log("[CarouselModel] Erro ao atualizar cores: " . $e->getMessage());
            return false;
        }
    }

    // 🔹 READ - Retornar todas as cores únicas
    public function getAllUniqueCores(): array {
        try {
            $stmt = $this->conn->query("
                SELECT DISTINCT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM coressubs
                ORDER BY corEspecial ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("[CarouselModel] Erro ao buscar cores: " . $e->getMessage());
            return [];
        }
    }
}
?>
