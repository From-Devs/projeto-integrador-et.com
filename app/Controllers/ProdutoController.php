<?php
require_once __DIR__ . "/../../config/database.php";

class ProdutoController{

    private $conn;

    public function __construct(){
        $banco = new Database();

        $this->conn = $banco->Connect();
    }
    public function buscarTodosProdutos(){
        return $this->produtoModel->buscarTodosProdutos();
    }
    
    public function buscarPorId($id) {
        return $this->produtoModel->buscarProdutoPorId($id);
    }
   
    // public function EditarProduto(){
        
    // }

    // public function CadastrarProduto($nome, $marca, $breveDescricao, $preco, $precoPromocional, $caracteristicasCompleta, $qtdEstoque, $img1, $img2, $img3) Com imagem cadastrando (Blob) - Verificar qual tipo salvar no banco
    public function CadastrarProduto($nome, $marca, $breveDescricao, $preco, $precoPromocional, $caracteristicasCompleta, $qtdEstoque){
        try {
            // $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, qtdEstoque, img1, img2, img3)
            //(:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :qtdEstoque, :img1, :img2, :img3)";
            $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, qtdEstoque)
            VALUES
            (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :qtdEstoque)";   
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome",$nome);
            $db->bindParam(":marca",$marca);
            $db->bindParam(":descricaoBreve",$breveDescricao);
            $db->bindParam(":preco",$preco);
            $db->bindParam(":precoPromo",$precoPromocional);
            $db->bindParam(":qtdEstoque",$qtdEstoque);
            // $db->bindParam(":img1",$img1);
            // $db->bindParam(":img2",$img2);
            // $db->bindParam(":img3",$img3);
            $db->bindParam(":descricaoTotal",$caracteristicasCompleta);
            $resposta = $db->execute();

            return $resposta;
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
        }
    }
    
    public function removerProduto($id_delete){
        return $this->produtoModel->deletarProduto($id_delete);
    }

    public function cadastrarProduto(
        $nome, 
        $marca, 
        $breveDescricao, 
        $preco, 
        $precoPromocional, 
        $caracteristicasCompleta, 
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2
    ) {
        return $this->produtoModel->cadastrarProduto(
            $nome, 
            $marca, 
            $breveDescricao, 
            $preco, 
            $precoPromocional, 
            $caracteristicasCompleta, 
            $qtdEstoque, 
            $corPrincipal, 
            $deg1, 
            $deg2,
            $_FILES // imagens vêm daqui
        );
    }
   public function EditarProduto(
        $id_produto,
        $nome,
        $marca,
        $descricaoBreve,
        $descricaoTotal,
        $preco,
        $precoPromo,
        $qtdEstoque,
        $img1 = null,
        $img2 = null,
        $img3 = null,
        $id_subCategoria = null,
        $id_cores = null,
        $id_associado = null
    ) {
        return $this->produtoModel->updateProduto(
            $id_produto,
            $nome,
            $marca,
            $descricaoBreve,
            $descricaoTotal,
            $preco,
            $precoPromo,
            $qtdEstoque,
            $img1,
            $img2,
            $img3,
            $id_subCategoria,
            $id_cores,
            $id_associado
        );
    }

}
