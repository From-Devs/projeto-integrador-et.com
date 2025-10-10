<?php
// model/carousel.php    
require_once __DIR__ . '/../../config/database.php';

class CarroselModel {
  private PDO $conn;    
  // costrutor
  public function __construct(){
    $this->conn = Database::getConnection(); // new Database()
  };

  public function createCarousel($id_carrosel,$id_produto,$id_coresSubs):array{
    $stmt = $this->conn->prepare("INSERT INTO carousel ( id_carousel, id_produto, id_coresSubs) VALUES (:id_carousel, :id_produto, :id_coresSubs)");
    return $stmt->execuite([
      ":id_carousel" => $id_carousel,
      ":id_produto" => $id_produto, 
      ":id_coresSubs " => $id_coresSubs 
    ]);
    
  };
  
  public function EditCarousel($id,$id_carousel,$id_produto,$id_coresSubs):array{
    $stmt = $this->conn->prepare("UPDATE carousel SET id_carousel=:id_carousel, id_produto=:id_produto, id_coresSubs=:id_coresSubs WHERE id=:id ");
    return $stmt->execute([
        "id" => $id,
        ":id_carousel" => $id_carousel,
        ":id_produto" => $id_produto, 
        ":id_coresSubs " => $id_coresSubs 
    ])
  } 
  
  public function RemoveCarousel($id):bool {
    try{
        $stmt = $this->conn->prepare("DELETE * FROM carousel WHERE id_carousel = :id");
        return $stmt->execute([
        ":id" => $id
        ]);
      } catch (\Throwable $th) {
        echo "Erro ao buscar: " . $th->getMessage();
        return false;
    };
  };

  public function getElementById($id):array{
    try{
        $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
        return $stmt->execute([
            ":id" => $id
        ]);
        return $stmt->fecth(PDO::FETCH_ASSOC);
      } catch (\Throwable $th) {
        echo "Erro ao buscar: " . $th->getMessage();
        return false;
      };
  };
  
  public function getAll(){
    $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel");
    return $stmt->fecthAll(PDO::FETCH_ASSOC);
  }
}
?>