<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

function ValidaCampos(){
    return isset($_POST["nome"], $_POST["marca"], $_POST["breveDescricao"], $_POST["qtdEstoque"], $_POST["preco"], $_POST["precoPromocional"], $_POST["caracteristicasCompleta"], $_POST["corPrincipal"], $_POST["deg1"], $_POST["deg2"])
        && !empty(trim($_POST["nome"]))
        && !empty(trim($_POST["marca"]))
        && !empty(trim($_POST["breveDescricao"]))
        && is_numeric($_POST["qtdEstoque"])
        && is_numeric($_POST["preco"])
        && is_numeric($_POST["precoPromocional"])
        && !empty(trim($_POST["caracteristicasCompleta"]))
        && !empty(trim($_POST["corPrincipal"]))
        && !empty(trim($_POST["deg1"]))
        && !empty(trim($_POST["deg2"]));
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'CadastrarProduto':
            if(ValidaCampos()){
                $resultado = $produtoController->cadastrarProduto(
                    $_POST["nome"],
                    $_POST["marca"],
                    $_POST["breveDescricao"],
                    $_POST["preco"],
                    $_POST["precoPromocional"],
                    $_POST["caracteristicasCompleta"],
                    $_POST["qtdEstoque"],
                    $_POST["corPrincipal"],
                    $_POST["deg1"],
                    $_POST["deg2"]
                );

                if($resultado){
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=CadastrarProduto");
                }else{
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
                }
            } else {
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
            }
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}
