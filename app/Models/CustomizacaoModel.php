<?php
// CustomizaçãoModel.php

require_once __DIR__ . '/../../config/database.php';

class CustomizacaoModel {
    private PDO $conn;
    
     /**
     * Construtor da classe CustumizaçãoModel
     * Inicializa a conexão com o banco de dados usando PDO.
     */
    public function __construct() {
        $this->conn = Database::getConnection();
    }
    public function read(){
        $stmt = $this->conn->prepare("SELECT * FROM `usuario`");
        return $stmt->fetchAll()
    }
}
?>

