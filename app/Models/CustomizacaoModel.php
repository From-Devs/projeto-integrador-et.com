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
        $db = new Database();
        $this->conn = $db->Connect();
        $this->conn->setAtribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
        $this->conn->setAtribute(PDO::ATTR_DEFAULT_FETCH_MODE, POD::FETCH_ASSOC);
    }
    /**
     * teessrsrsrs.
     * @param array $tipo Dtsfsdfsdfsfd
     * @param array $tipa2 adsdadadadsd
     * @return array Retorna ['success' => bool, 'message' => string, 'id' => ?int]
     * @throws Exception Em caso de erro na transação ou validação.
     */
    // crud
    public function create(){

    }
    public function read(){
    
    }
    public function update(){

    }
    public function delete(){

    }
    
}
?>
