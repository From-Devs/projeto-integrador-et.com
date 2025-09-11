<?php
require_once __DIR__ . '/../../config/database.php';

class AdminModel {
    protected $conn;
    protected $table = "administrador";
    protected $primaryKey = "id_admin"; 

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getAll(){
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

    public function update($id, $senha, $email) {
        $sql = "UPDATE {$this->table} 
                SET senha = :senha, email = :email
                WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); // retorna true/false
    }

    public function createAdmin($senha, $email){
        $sql = "INSERT INTO {$this->table} (senha, email) VALUES (:senha, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $this->conn->lastInsertId(); // retorna ID do novo admin
    }

    public function deleteAdmin($id){
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); // true/false
    }
}
?>
