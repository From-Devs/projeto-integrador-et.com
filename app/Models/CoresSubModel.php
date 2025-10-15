<?php 
// CoresSubModel.php
require_once __DIR__ . '/../../config/Database-1.php';
class CoresSubModel{
  private PDO $conn

  public function __construct(){
    $this->conn = Database::getinstance()->getConnection();
  }
  // 🔹 cor 1 - buscar todos
  public function getAll(){
    $stmt = $this->conn->prepare("SELECT * FROM coresSubs")
    return $stmt->fetchAll(PDO::FETCH_ASSOC):
  }
  // 🔹 cor 1 - buscar por ID
  public function getElementById(int $id): array|false {
    $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
    $stmt->execute([":id" => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  // 🔹 CREATE - criar cores sub
  public function create(array $data): bool{
    $stmt = $this->conn->prepare("
      INSERT INTO coresSubs ( id_corespecial, id_hexdegrade1, id_hexdegrade2, id_hexdegrade3, id_hexdegrade4)
      VALUES (:id_corespecial, :id_hexdegrade1, :id_hexdegrade2, :id_hexdegrade3,:id_hexdegrade4 )
    ");
    return $stmt->execute(["
      ":id_hexdegrade1" => $data["id_hexdegrade1"],
      ":id_hexdegrade1" => $data["id_hexdegrade1"],
      ":id_hexdegrade2" => $data["id_hexdegrade2"],
      ":id_hexdegrade2" => $data["id_hexdegrade3"],
      ":id_hexdegrade2" => $data["id_hexdegrade4"],
    "])
  }
  public function update(int $id, array $data): bool{
    $stmt = $this->conn->prepare("
    UPDATE coresSubs 
    SET id_corespecial = :id_corespecial, id_hexdegrade1 = :id_hexdegrade1, id_hexdegrade2 = :id_hexdegrade2, id_hexdegrade3 = :id_hexdegrade3, id_hexdegrade4 = :id_hexdegrade4 
    WHERE id = :id
    ");
    return $stmt->execute(["
      ":id" => $id
      ":id_hexdegrade1" => $data["id_hexdegrade1"],
      ":id_hexdegrade1" => $data["id_hexdegrade1"],
      ":id_hexdegrade2" => $data["id_hexdegrade2"],
      ":id_hexdegrade2" => $data["id_hexdegrade3"],
      ":id_hexdegrade2" => $data["id_hexdegrade4"],
    "])
  }
}
?> 