<?php

require_once __DIR__ . '/../../config/database.php';

class ProdutoDestaque{
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
        SELECT pd.id_prodDestaque, pd.cor1, pd.cor2, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.fgPromocao
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
  public function create(int $id, array $data): bool {
    try{
      if(empty($data["id_produto"])||  !is_numeric($data["id_produto"])) {
        return ['error' => "ID do produto inválido ou ausente."];
      } 
      $id_produto = (int) $data["id_protudo"];
      if($this->productExists($id_produto)){
        return ['error' => 'Produto não encontrado.'];
      }
      $this->conn->beginTransaction();
      $stmt = $this->conn->query('SELECT COUNT(*) as total from proddestaque');
      $total = (int) $stmt->fetch()['total'];
      if($total > 1){
        $this->conn->rollBack();
        return ['error' => 'Limite atingido, não é possível criar mais de 1 protudo destaque.'];
      }
      $stmt = $this->conn->prepare("SELECT corEspecial, hexDegrade1, hexDegrade2, hexDegrade3, id_cores FROM produto WHERE id_produto = :id_produto");
      $stmt->execute([':id_produto' => $id_produto]);
      $produto = $stmt->fetch(PDO::FETCH_ASSOC);
      if (!$produto) {
        $this->conn->rollBack();
        return ['error' => 'Produto não encontrado para copiar cores.'];
      }
      $cores = [
       'corEspecial' => $produto['corEspecial'] ?? null,
        'hexDegrade1' => $produto['hexDegrade1'] ?? null,
        'hexDegrade2' => $produto['hexDegrade2'] ?? null,
        'hexDegrade3' => $produto['hexDegrade3'] ?? null,
      ];
      if (empty($cores['corEspecial']) && !empty($produto["id_cores"])){
        $stmt = $this->conn->prepare('SELECT corPrincipal AS corEspecial, hexDegrade1, hexDegrade2 FROM cores WHERE id_cores = :id LIMIT 1');
      }

    }catch(throw){

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