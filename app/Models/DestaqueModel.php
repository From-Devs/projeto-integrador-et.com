<?php

require_once __DIR__ . '/../../config/database.php';

class ProdutoDestaque {
    private $conn;

  public function __construct(){
    $db = new Database();
    $this->conn = $db->Connect();
  } 
  //funcao axiliar
  private function productExists(int $id_produto): bool {
      $stmt = $this->conn->prepare('SELECT 1 FROM produto WHERE id_produto = :id LIMIT 1');
      $stmt->execute([':id' => $id_produto]);
      return (bool) $stmt->fetchColumn();
  }

  public function getAll(): array {
    try {
      $sql = "
        SELECT pd.id_prodDestaque, pd.cor1, pd.cor2, pd.corSombra, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.fgPromocao
        FROM proddestaque pd 
        JOIN produto p ON p.id_produto = pd.id_produto
      ";
      $stmt = $this->conn->query($sql);
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }catch (PDOException $e) {
      error_log("[ProdutoDestaque] Erro SQL: " . $e->getMessage());
    }

  }  

    public function create($id, array $data) {
        try {
            if (empty($data['id_produto']) || !is_numeric($data['id_produto'])) {
                return ['error' => "ID do produto inválido ou ausente."];
            }

            $id_produto = (int) $data['id_produto'];

            if (! $this->productExists($id_produto)) {
                return ['error' => 'Produto não encontrado.'];
            }

            $this->conn->beginTransaction();
            $stmt = $this->conn->query('SELECT COUNT(*) as total FROM proddestaque');
            $total = (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            if ($total >= 1) {
                $this->conn->rollBack();
                return ['error' => 'Limite atingido, não é possível criar mais de 1 produto destaque.'];
            }

            $stmt = $this->conn->prepare("SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, id_cores FROM produto WHERE id_produto = :id_produto LIMIT 1");
            $stmt->execute([':id_produto' => $id_produto]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$produto) {
                $this->conn->rollBack();
                return ['error' => 'Produto não encontrado para copiar cores.'];
            }

            $corEspecial = $produto['corEspecial'] ?? null;
            $hex1 = $produto['hexDegrade1'] ?? null;
            $hex2 = $produto['hexDegrade2'] ?? null;
            $hex3 = $produto['hexDegrade3'] ?? null;

            if (empty($corEspecial) && !empty($produto['id_cores'])) {
                $stmt = $this->conn->prepare('SELECT corPrincipal AS corEspecial, hexDegrade1, hexDegrade2 FROM cores WHERE id_cores = :id LIMIT 1');
                $stmt->execute([':id' => $produto['id_cores']]);
                $coresFromTable = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($coresFromTable) {
                    $corEspecial = $coresFromTable['corEspecial'] ?? $corEspecial;
                    $hex1 = $coresFromTable['hexDegrade1'] ?? $hex1;
                    $hex2 = $coresFromTable['hexDegrade2'] ?? $hex2;
                }
            }

            $stmt = $this->conn->prepare('
                INSERT INTO coressubs (corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, created_at)
                VALUES (:corEspecial, :hex1, :hex2, :hex3, NOW())
            ');
            $stmt->execute([
                ':corEspecial' => $corEspecial,
                ':hex1' => $hex1,
                ':hex2' => $hex2,
                ':hex3' => $hex3,
            ]);
            $id_coressubs = (int) $this->conn->lastInsertId();

            $stmt = $this->conn->prepare('
                INSERT INTO proddestaque (id_produto, id_coressubs, cor1, cor2, created_at)
                VALUES (:id_produto, :id_coressubs, :cor1, :cor2, NOW())
            ');
            $cor1 = $data['cor1'] ?? $corEspecial;
            $cor2 = $data['cor2'] ?? $hex1;

            $stmt->execute([
                ':id_produto' => $id_produto,
                ':id_coressubs' => $id_coressubs,
                ':cor1' => $cor1,
                ':cor2' => $cor2,
            ]);

            $newId = (int) $this->conn->lastInsertId();
            $this->conn->commit();

            return ['success' => true, 'id' => $newId];
        } catch (PDOException $e) {
            if ($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log("[ProdutoDestaque] Erro ao criar destaque: " . $e->getMessage());
            return ['error' => 'Erro ao criar destaque: ' . $e->getMessage()];
        }
    }

    public function getElementById(int $id): array {
        try {
            $stmt = $this->conn->prepare("
                SELECT pd.id_proddestaque, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao,
                       cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
                FROM proddestaque pd
                JOIN produto p ON p.id_produto = pd.id_produto
                LEFT JOIN coressubs cs ON cs.id_coressubs = pd.id_coressubs
                WHERE pd.id_proddestaque = :id
                LIMIT 1
            ");
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? $row : [];
        } catch (PDOException $e) {
            error_log("[ProdutoDestaque] Erro getElementById: " . $e->getMessage());
            return [];
        }
    }

    public function remove(int $id): bool {
        try {
            $stmt = $this->conn->prepare("DELETE FROM proddestaque WHERE id_proddestaque = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[ProdutoDestaque] Erro ao remover: " . $e->getMessage());
            return false;
        }
    }

    public function getAllCoresUnicas(): array {
        try {
            $stmt = $this->conn->query("
                SELECT DISTINCT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3
                FROM coressubs
                ORDER BY corEspecial ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("[ProdutoDestaque] Erro ao buscar cores: " . $e->getMessage());
            return [];
        }
    }
}
