<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'EditarProduto':
            $resultado = $produtoController->EditarProduto();
            header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=EditarProduto");
            break;
        case 'CadastrarProduto':
            $resultado = $produtoController->CadastrarProduto($_POST["nome"], $_POST["marca"], $_POST["breveDescricao"], $_POST["preco"], $_POST["precoPromocional"], $_POST["caracteristicasCompleta"]);
            if($resultado){
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=CadastrarProduto");
            }else{
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
            }
            break;
        default:
            echo "Nao encontrei nada";
            break;
    }

}else if($_SERVER["REQUEST_METHOD"] == "GET"){
    switch ($_GET["acao"]) {
        // Não tem GET por enquanto
        
        default:
            echo "Nao encontrei nada";
            break;
    }
}else{
    echo "Erro";
}