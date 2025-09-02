<?php
require_once __DIR__ . "/../Models/Products.php";

class ProdutoController {

    private $produtoModel;

    public function __construct() {
        $this->produtoModel = new Products();
    }

    public function RemoverProduto($id){
        return $this->produtoModel->RemoverProduto($id);
    }

    public function buscarProdutoPeloId($id){
        return $this->produtoModel->buscarProdutoPeloId($id);
    }

    public function buscarTodosProdutos(){
        return $this->produtoModel->buscarTodosProdutos();
    }

    public function capturarSubCategorias() {
        return $this->produtoModel->getAllSubcategorias();
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
            $_FILES
        );
    }

    public function EditarProduto(
        $id, 
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
    ){
        return $this->produtoModel->EditarProduto(
            $id, 
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
        );
    }
}
