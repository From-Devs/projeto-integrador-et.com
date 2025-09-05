<?php
require_once __DIR__ . '/../../config/database.php';
class CategoriaModel {
    protected $conn;
    protected $table = "categoria";
    protected $primaryKey = "id_categoria"; 

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
 
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome) {
        $sql = "INSERT INTO {$this->table} (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function update($id, $nome) {
        $sql = "UPDATE {$this->table} 
                SET nome = :nome
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    // falta teminal !!!!
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} 
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); // true/false
    }
    
}

class SubCategoriaModel {
    protected $conn;
    protected $table = "subcategoria";
    protected $primaryKey = "id_subcategoria"; 
    
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
    
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($nome, $idCategoria) {
        $sql = "INSERT INTO {$this->table} (nome, id_categoria) VALUES (:nome, :id_categoria)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();

        return $this->conn->lastInsertId(); // ID da subcategoria criada
    }

    public function update($id, $nome, $idCategoria) {
        $sql = "UPDATE {$this->table} 
                SET nome = :nome, id_categoria = :id_categoria 
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':id_categoria', $idCategoria, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute(); // true/false
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} 
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); // true/false
    }
}