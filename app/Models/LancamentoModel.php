<?php
require_once __DIR__ . '/../../config/database.php';

class Lancamentos {
  private PDO $conn;
  
  public function __construct() {
    $db = new Database();
    $this->conn = $db->Connect();
  }
  
  public function getAll(): array {
    try {
      $sql = "
        SELECT l.id_lancamentos, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao, 
        cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
        FROM lancamentos l 
        JOIN produto p ON  p.id_produto = l.id_produto
        JOIN coressubs cs ON cs.id_coressubs = l.id_coressubs
      ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
            error_log("[Lancamentos] Erro SQL: " . $e->getMessage());
            return [];
    }
  }

  public function Create(array $data): int|false {
    try {
        $stmt = $this->conn->prepare("
            INSERT INTO lancamentos (id_produto, id_coressubs)
            VALUES (:id_produto, :id_coressubs)
        ");
        $stmt->execute([
            ":id_produto" => $data['id_produto'],
            ":id_coressubs" => $data['id_coressubs']
        ]);

        return $this->conn->lastInsertId();

    } catch (PDOException $e) {
        error_log("[Lancamentos] Erro ao criar: " . $e->getMessage());
        return false;
    }
  }

  public function Update(int $id, array $data): bool {
    try {
            $stmt = $this->conn->prepare("
                UPDATE lancamentos
                SET id_produto = :id_produto, id_coressubs = :id_coresSubs
                WHERE id_lancamentos = :id
            ");
            return $stmt->execute([
                ":id" => $id,
                ":id_produto" => $data['id_produto'],
                ":id_coresSubs" => $data['id_coresSubs']
            ]);
        } catch (PDOException $e) {
            error_log("[Lancamentos] Erro ao atualizar: " . $e->getMessage());
            return false;
    }
  }

  public function getElementByid(): array {
    $stmt = $this->conn->prepare("
        SELECT l.id_lancamentos, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao, 
        cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3
        FROM lancamentos l 
        JOIN produto p ON  p.id_produto = l.id_produto
        JOIN coressubs cs ON cs.id_coressubs = l.id_coressubs
        WHERE l.id_lancamentos = :id
    ")
  }

  public function Remore(int $id): bool {
     try {
            $stmt = $this->conn->prepare("DELETE FROM lancamentos WHERE id_lancamentos = :id");
            return $stmt->execute([":id" => $id]);
        } catch (PDOException $e) {
            error_log("[Lancamentos] Erro ao remover: " . $e->getMessage());
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
            error_log("[Lancamentos] Erro ao buscar cores: " . $e->getMessage());
            return [];
        }
    }
}