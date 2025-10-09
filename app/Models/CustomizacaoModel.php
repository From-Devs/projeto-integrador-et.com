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
    /**
     * teessrsrsrs.
     * @param array $tipo Dtsfsdfsdfsfd
     * @param array $tipa2 adsdadadadsd
     * @return array Retorna ['success' => bool, 'message' => string, 'id' => ?int]
     * @throws Exception Em caso de erro na transação ou validação.
     */
    public function create(){

    }
    public function read(){
        $stmt = $this->conn->prepare("SELECT * FROM `usuario`");
        return $stmt->fetchAll()
    }
    public function update(){

    }
    public function delete(){

    }
    
}
?>

