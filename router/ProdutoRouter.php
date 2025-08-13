<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        // case 'create':
        //     break;
        case 'EditarProduto':
            $resultado = $produtoController->EditarProduto()
            header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso");
            break;
        case 'CadastrarProduto':
            $resultado = $produtoController->CadastrarProduto()
            header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso");
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