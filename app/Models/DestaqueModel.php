<?php

require_once __DIR__ . '/../../config/database.php';

class ProdutoDestaque {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // ------------------------------
    // AUXILIAR — Verifica se produto existe
    // ------------------------------
    private function productExists(int $id_produto): bool {
        $stmt = $this->conn->prepare('SELECT 1 FROM produto WHERE id_produto = :id LIMIT 1');
        $stmt->execute([':id' => $id_produto]);
        return (bool) $stmt->fetchColumn();
    }

    // ------------------------------
    // GET ALL — retorna todos os destaques
    // ------------------------------
    public function getAll(): array {
        try {
            $sql = "
                SELECT 
                    pd.id_prodDestaque, pd.cor1, pd.cor2, pd.corSombra,
                    p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.fgPromocao
                FROM proddestaque pd 
                JOIN produto p ON p.id_produto = pd.id_produto
            ";

            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("[ProdutoDestaque][getAll] " . $e->getMessage());
            return [];
        }
    }

    // ------------------------------
    // CREATE — cria novo destaque (máx. 1)
    // ------------------------------
    public function create($id, array $data) {
        try {

            // valida produto
            if (empty($data['id_produto']) || !is_numeric($data['id_produto'])) {
                return ['error' => "ID de produto inválido."];
            }

            $id_produto = (int) $data['id_produto'];

            if (!$this->productExists($id_produto)) {
                return ['error' => 'Produto não encontrado.'];
            }

            // impede ter mais que 1 produto destaque
            $stmt = $this->conn->query('SELECT COUNT(*) AS total FROM proddestaque');
            $total = (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];

            if ($total >= 1) {
                return ['error' => 'Já existe um produto destaque.'];
            }

            // coleta cores do produto
            $stmt = $this->conn->prepare("
                SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, id_cores 
                FROM produto 
                WHERE id_produto = :id_produto LIMIT 1
            ");
            $stmt->execute([':id_produto' => $id_produto]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$produto) {
                return ['error' => 'Produto não encontrado.'];
            }

            $corEspecial = $produto['corEspecial'] ?? null;
            $hex1 = $produto['hexDegrade1'] ?? null;
            $hex2 = $produto['hexDegrade2'] ?? null;
            $hex3 = $produto['hexDegrade3'] ?? null;

            // busca na tabela cores se o produto usa id_cores
            if (empty($corEspecial) && !empty($produto['id_cores'])) {

                $stmt = $this->conn->prepare("
                    SELECT corPrincipal AS corEspecial, hexDegrade1, hexDegrade2 
                    FROM cores 
                    WHERE id_cores = :id LIMIT 1
                ");

                $stmt->execute([':id' => $produto['id_cores']]);
                $cores = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($cores) {
                    $corEspecial = $cores['corEspecial'] ?? $corEspecial;
                    $hex1 = $cores['hexDegrade1'] ?? $hex1;
                    $hex2 = $cores['hexDegrade2'] ?? $hex2;
                }
            }

            // cria registro das cores extras
            $stmt = $this->conn->prepare("
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, created_at)
                VALUES (:corEspecial, :h1, :h2, :h3, NOW())
            ");

            $stmt->execute([
                ':corEspecial' => $corEspecial,
                ':h1' => $hex1,
                ':h2' => $hex2,
                ':h3' => $hex3
            ]);

            $id_coressubs = (int) $this->conn->lastInsertId();

            // cria destaque
            $stmt = $this->conn->prepare("
                INSERT INTO proddestaque (id_produto, id_coressubs, cor1, cor2, created_at)
                VALUES (:id_produto, :id_coressubs, :cor1, :cor2, NOW())
            ");

            $stmt->execute([
                ':id_produto' => $id_produto,
                ':id_coressubs' => $id_coressubs,
                ':cor1' => $data['cor1'] ?? $corEspecial,
                ':cor2' => $data['cor2'] ?? $hex1,
            ]);

            return ['success' => true, 'id' => $this->conn->lastInsertId()];

        } catch (PDOException $e) {
            error_log("[ProdutoDestaque][create] " . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }

    // ------------------------------
    // GET BY ID — retorna 1 destaque
    // ------------------------------
    public function getElementById(int $id): array {
        try {
            $stmt = $this->conn->prepare("
                SELECT 
                    pd.id_proddestaque, 
                    p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao,
                    cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM proddestaque pd
                JOIN produto p ON p.id_produto = pd.id_produto
                LEFT JOIN coressubs cs ON cs.id_coressubs = pd.id_coressubs
                WHERE pd.id_proddestaque = :id
                LIMIT 1
            ");

            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];

        } catch (PDOException $e) {
            error_log("[ProdutoDestaque][getElementById] " . $e->getMessage());
            return [];
        }
    }

    // ------------------------------
    // REMOVE — apaga destaque
    // ------------------------------
    public function remove(int $id): bool {
        try {
            $stmt = $this->conn->prepare("DELETE FROM proddestaque WHERE id_proddestaque = :id");
            return $stmt->execute([':id' => $id]);

        } catch (PDOException $e) {
            error_log("[ProdutoDestaque][remove] " . $e->getMessage());
            return false;
        }
    }

    // ------------------------------
    // GET CORES — lista cores únicas
    // ------------------------------
    public function getAllCoresUnicas(): array {
        try {
            $stmt = $this->conn->query("
                SELECT DISTINCT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM coressubs
                ORDER BY corEspecial ASC
            ");

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("[ProdutoDestaque][getAllCoresUnicas] " . $e->getMessage());
            return [];
        }
    }
}
