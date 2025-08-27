<?php
require_once __DIR__ . "/../Models/Products.php";

class ProdutoController {

    private $produtoModel;

    public function __construct() {
        $this->produtoModel = new Products();
    }

    public function buscarProdutoPeloId($id){
        return $this->produtoModel->buscarProdutoPeloId($id);
    }

    public function buscarTodosProdutos(){
        return $this->produtoModel->buscarTodosProdutos();
    }

    public function capturarSubCategorias() {
        return $this->produtoModel->capturarSubCategorias();
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
}
