<?php
require_once __DIR__ . "/../../config/database.php";

class ProdutoController{

    private $conn;

    public function __construct(){
        $banco = new Database();

        $this->conn = $banco->Connect();
    }
   
    public function EditarProduto(){
        
    }

    public function CadastrarProduto(){

    }
}