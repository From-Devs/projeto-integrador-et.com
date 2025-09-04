<?php
require_once __DIR__ . '/../../config/database.php';

class CategoriaModel {
    protected $conn;
    protected $table = "categoria";
    
    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM categoria ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class SubCategoriaModel {
    protected $conn;
    protected $table = "subcategoria";
    
    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected $primaryKey = "id_subcategoria"; // ou o que for no seu DB

    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    
}
