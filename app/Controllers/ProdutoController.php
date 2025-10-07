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
            $fgPromocao,
            $caracteristicasCompleta, 
            $qtdEstoque, 
            $corPrincipal, 
            $deg1, 
            $deg2
        );
    }
    

    // public function EditarProduto(
    //     $id_produto,
    //     $nome,
    //     $marca,
    //     $descricaoBreve,
    //     $descricaoTotal,
    //     $preco,
    //     $precoPromo,
    //     $qtdEstoque,
    //     $img1 = null,
    //     $img2 = null,
    //     $img3 = null,
    //     $id_subCategoria = null,
    //     $id_cores = null,
    //     $id_associado = null
    // ) {
    //     return $this->produtoModel->updateProduto(
    //         $id_produto,
    //         $nome,
    //         $marca,
    //         $descricaoBreve,
    //         $descricaoTotal,
    //         $preco,
    //         $precoPromo,
    //         $qtdEstoque,
    //         $img1,
    //         $img2,
    //         $img3,
    //         $id_subCategoria,
    //         $id_cores,
    //         $id_associado
    //     );
    // }
}
