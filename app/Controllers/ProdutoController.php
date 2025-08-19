<?php
require_once __DIR__ . "/../../config/database.php";

class ProdutoController{

    private $conn;

    public function __construct(){
        $banco = new Database();

        $this->conn = $banco->Connect();
    }
   
    // public function EditarProduto(){
        
    // }

    public function CadastrarProduto($nome, $marca, $breveDescricao, $preco, $precoPromocional, $caracteristicasCompleta, $img1, $img2, $img3){
        try {
            $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, precoPromo, preco, img1, img2, img3)
            VALUES
            (:nome, :marca, :descricaoBreve, :descricaoTotal, :precoPromo, :preco, :img1, :img2, :img3)";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":marca",$marca);
            $db->bindParam(":descricaoBreve",$breveDescricao);
            $db->bindParam(":preco",$preco);
            $db->bindParam(":precoPromo",$precoPromocional);
            $db->bindParam(":img1",$img1);
            $db->bindParam(":img2",$img2);
            $db->bindParam(":img3",$img3);
            $db->bindParam(":descricaoTotal",$caracteristicasCompleta);
            $resposta = $db->execute();

            return $resposta;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
}