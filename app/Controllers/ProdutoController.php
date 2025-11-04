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

    public function buscarTodosProdutos($ordem="", $pesquisa=""){
        return $this->produtoModel->buscarTodosProdutos($ordem, $pesquisa);
    }

    public function capturarSubCategorias() {
        return $this->produtoModel->getAllSubcategorias();
    }

    public function getSubcategoriasPorCategoria($idCategoria) {
        return $this->produtoModel->getSubcategoriaByCategoriaId($idCategoria);
    }

    public function getSubcategoriaPorId($idSubCategoria) {
        return $this->produtoModel->getSubcategoriaById($idSubCategoria);
    }

    public function pegarTodosProdutos(){
        return $this->produtoModel->getAllProdutos();
    }

    public function cadastrarProduto(
        $nome, 
        $marca, 
        $breveDescricao, 
        $preco, 
        $precoPromocional, 
        $fgPromocao,
        $caracteristicasCompleta, 
        $tamanho,
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
            $fgPromocao,
            $caracteristicasCompleta, 
            $tamanho,
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
        $fgPromocao, 
        $caracteristicasCompleta, 
        $tamanho,
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2,
        $idSubCategoria = null,
        $files = []
    ){
        return $this->produtoModel->EditarProduto(
            $id, 
            $nome,
            $marca, 
            $breveDescricao, 
            $preco, 
            $precoPromocional, 
            $fgPromocao,
            $caracteristicasCompleta, 
            $tamanho,
            $qtdEstoque, 
            $corPrincipal, 
            $deg1, 
            $deg2,
            $idSubCategoria,
            $files
        );
    }

    public function capturarAssociadosPorProduto($idProduto)
    {
        return $this->produtoModel->capturarAssociadosPorProduto($idProduto);
    }

    public function pesquisarHeader($termo)
    {
        return $this->produtoModel->pesquisarProdutos($termo);
    }
    
}
