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

    public function CadastrarProduto($nome, $marca, $subCategoria, $breveDescricao, $preco, $precoPromocional, $img1, $img2, $img3, $corPrincipal, $deg1, $deg2, $deg3, $caracteristicasCompleta){
        echo $nome;
        try {
            $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, img1, img2, img3)
            VALUES
            (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :img1, :img2, :img3)";
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
            $db->execute();
            $resposta = $db->fetchAll(PDO::FETCH_ASSOC);

            if($resposta){
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}