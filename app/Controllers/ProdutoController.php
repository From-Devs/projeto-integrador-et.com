<?php
require_once __DIR__ . '/../Models/products.php';

class UserController {
    private $produtomodel;
    
    public function __construct() {
        $this->produtomodel = new Products();
    }

    public function buscarTodosProdutos(){
        return $this->produtoModel->buscarTodosProdutos();
    }
    
    public function buscarPorId($id) {
        return $this->produtoModel->buscarProdutoPorId($id);
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
