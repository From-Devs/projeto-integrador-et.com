<?php
require_once __DIR__ . '/../../config/database.php';

class ProdutoDestaque {
  private PDO $conn;
  
  public function __construct() {
    $db = new Database();
    $this->conn = $db->Connect();
  }
  public function getAll(): array {
    try {
      $sql = "
        SELECT pd.id_prodDestaque, pd.cor1, pd.cor2, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.fgPromocao
        FROM proddestaque pd 
        JOIN produto p ON p.id_produto = pd.id_produto
      ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
            error_log("[ProdutoDestaque] Erro SQL: " . $e->getMessage());
            return [];
    }
  }

  public function Update(int $id, array $data): bool {
    try {
            $stmt = $this->conn->prepare("
                UPDATE proddestaque
                SET id_produto = :id_produto, id_coressubs = :id_coresSubs
                WHERE id_proddestaque = :id
            ");
            return $stmt->execute([
                ":id" => $id,
                ":id_produto" => $data['id_produto'],
                ":id_coresSubs" => $data['id_coresSubs']
            ]);
        } catch (PDOException $e) {
            error_log("[proddestaque] Erro ao atualizar: " . $e->getMessage());
            return false;
    }
  }
  public function getElementByid(): array {
    $stmt = $this->conn->prepare("
        SELECT pd.id_proddestaque, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao, 
        cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
        FROM proddestaque l 
        JOIN produto p ON  p.id_produto = pd.id_produto
        JOIN coressubs cs ON cs.id_coressubs = pd.id_coressubs
        WHERE pd.id_proddestaque = :id
    ");
  }
  public function Remore(int $id): bool {
     try {
            $stmt = $this->conn->prepare("DELETE FROM proddestaque WHERE id_proddestaque = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[proddestaque] Erro ao remover: " . $e->getMessage());
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
            error_log("[proddestaque] Erro ao buscar cores: " . $e->getMessage());
            return [];
        }
    }
}