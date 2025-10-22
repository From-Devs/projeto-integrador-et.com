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
        $deg2,
        $idAssociado
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
            $idAssociado,
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
            $files
        );
    }

    public function pesquisarHeader($termo)
    {
        return $this->produtoModel->pesquisarProdutos($termo);
    }

    public function getOfertasImperdiveis() {
        return $this->produtoModel->getOfertasImperdiveis();
    }

    public function getMaisVendidos() {
        return $this->produtoModel->getMaisVendidos();
    }

    public function getRelacionados($categoria, $subcategoria, $marca, $idAtual) {
        return $this->produtoModel->getRelacionados($categoria, $subcategoria, $marca, $idAtual);
    }

    public function getSugestoes($idUsuario, $limit = 8) {
        return $this->produtoModel->getSugestoes($idUsuario, $limit);
    }

    public function buscarAvaliacoesPorProduto($idProduto) {
        return $this->produtoModel->BuscarAvaliacoesPorProduto($idProduto);
    }

    public function mediaAvaliacoes($idProduto) {
        return $this->produtoModel->mediaAvaliacoes($idProduto);
    }
    
}
