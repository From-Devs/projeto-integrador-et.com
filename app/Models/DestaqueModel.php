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

    public function getDestaque(): ?array {
        $stmt = $this->conn->query("
            SELECT * FROM proddestaque LIMIT 1
        ");
        $destaque = $stmt->fetch(PDO::FETCH_ASSOC);

        return $destaque ?: null;
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
    public function create(array $data): array {
        try {

            // 1) Validar produto enviado
            if (empty($data['id_produto']) || !is_numeric($data['id_produto'])) {
                return ['error' => "ID de produto inválido."];
            }

            $id_produto = (int)$data['id_produto'];

            // 2) Verificar se já existe destaque
            $stmt = $this->conn->query("SELECT COUNT(*) AS total FROM proddestaque");
            $total = (int)$stmt->fetch(PDO::FETCH_ASSOC)['total'];

            if ($total >= 1) {
                return ['error' => 'Já existe um produto destaque.'];
            }

            // 3) Buscar dados do produto
            $stmt = $this->conn->prepare("
                SELECT c.corPrincipal, c.hexDegrade1, c.hexDegrade2, c.hexDegrade3
                FROM produto as p
                JOIN id_cores as c
                ON 
                LIMIT 1
            ");
            $stmt->execute([':id' => $id_produto]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$produto) {
                return ['error' => 'Produto não encontrado.'];
            }

            // Cores padrão
            $cor1 = $produto['hexDegrade1'];
            $cor2 = $produto['hexDegrade2'];
            $sombra = $produto['hexDegrade3'];

            // 4) Caso produto use tabela cores
            if (empty($produto['corEspecial']) && !empty($produto['id_cores'])) {

                $stmt = $this->conn->prepare("
                    SELECT hexDegrade1, hexDegrade2
                    FROM cores
                    WHERE id_cores = :id
                    LIMIT 1
                ");
                $stmt->execute([':id' => $produto['id_cores']]);
                $cores = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($cores) {
                    $cor1 = $cores['hexDegrade1'] ?? $cor1;
                    $cor2 = $cores['hexDegrade2'] ?? $cor2;
                }
            }

            // 5) Inserir
            $stmt = $this->conn->prepare("
                INSERT INTO proddestaque (id_produto, cor1, cor2, corSombra, created_at)
                VALUES (:produto, :cor1, :cor2, :sombra, NOW())
            ");

            $stmt->execute([
                ':produto' => $id_produto,
                ':cor1' => $cor1,
                ':cor2' => $cor2,
                ':sombra' => $sombra
            ]);

            return ['success' => true, 'message' => 'Destaque criado com sucesso!'];

        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // ------------------------------
    // UPDATE — atuliza novo destaque 
    // ------------------------------
    public function update(int $id_destaque, array $data): array {
        try {

            // 1) Verifica se existe destaque
            $stmt = $this->conn->prepare("
                SELECT id_prodDestaque, id_produto
                FROM proddestaque
                WHERE id_prodDestaque = :id
                LIMIT 1
            ");
            $stmt->execute([':id' => $id_destaque]);
            $destaque = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$destaque) {
                return ['error' => 'Destaque não encontrado.'];
            }

            $produto_atual = (int)$destaque['id_produto'];
            $novo_produto = !empty($data['id_produto']) ? (int)$data['id_produto'] : null;

            /*
            ==========================================
            SE MUDOU O PRODUTO
            ==========================================
            */
            if ($novo_produto && $novo_produto !== $produto_atual) {

                // Buscar dados do novo produto
                $stmt = $this->conn->prepare("
                    SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, id_cores
                    FROM produto
                    WHERE id_produto = :id
                    LIMIT 1
                ");
                $stmt->execute([':id' => $novo_produto]);
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$produto) {
                    return ['error' => 'Novo produto não encontrado.'];
                }

                // Cores padrão
                $cor1 = $produto['hexDegrade1'];
                $cor2 = $produto['hexDegrade2'];
                $sombra = $produto['hexDegrade3'];

                // Caso use tabela cores
                if (empty($produto['corEspecial']) && !empty($produto['id_cores'])) {
                    $stmt = $this->conn->prepare("
                        SELECT hexDegrade1, hexDegrade2
                        FROM cores
                        WHERE id_cores = :id
                        LIMIT 1
                    ");
                    $stmt->execute([':id' => $produto['id_cores']]);
                    $cores = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($cores) {
                        $cor1 = $cores['hexDegrade1'] ?? $cor1;
                        $cor2 = $cores['hexDegrade2'] ?? $cor2;
                    }
                }

                // Atualiza tudo
                $update = $this->conn->prepare("
                    UPDATE proddestaque SET
                        id_produto = :produto,
                        cor1 = :cor1,
                        cor2 = :cor2,
                        corSombra = :sombra
                    WHERE id_prodDestaque = :id
                ");

                $update->execute([
                    ':produto' => $novo_produto,
                    ':cor1' => $cor1,
                    ':cor2' => $cor2,
                    ':sombra' => $sombra,
                    ':id' => $id_destaque
                ]);

            } else {
            /*
            ==========================================
            NÃO MUDOU O PRODUTO → só altera as cores
            ==========================================
            */

                $update = $this->conn->prepare("
                    UPDATE proddestaque SET
                        cor1 = COALESCE(:cor1, cor1),
                        cor2 = COALESCE(:cor2, cor2),
                        corSombra = COALESCE(:sombra, corSombra)
                    WHERE id_prodDestaque = :id
                ");

                $update->execute([
                    ':cor1' => $data['cor1'] ?? null,
                    ':cor2' => $data['cor2'] ?? null,
                    ':sombra' => $data['corSombra'] ?? null,
                    ':id' => $id_destaque
                ]);
            }

            return ['success' => true, 'message' => 'Destaque atualizado com sucesso!'];

        } catch (Exception $e) {
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
