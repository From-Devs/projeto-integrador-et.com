<?php 

require_once __DIR__ . '/../../config/database.php';

class Categoria {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }
    
    public function getCategoriaAll(){
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByidCategoria($id){
        $stmt = $this->conn->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function delCategoria($id){
        $stmt = $this->conn->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
