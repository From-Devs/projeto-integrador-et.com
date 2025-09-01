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

        case 'EditarProduto':
            $resultado = $produtoController->EditarProduto(
                $_POST["id_produto"],
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
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=EditarProduto");
            }else{
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=EditarProduto");
            }
            
            break;

        case 'RemoverProduto':
            $resultado = $produtoController->RemoverProduto($_POST["id"]);

            if($resultado){
                echo "Sim";
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=RemoverProduto");
            }else{
                echo "Não";
                // header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=RemoverProduto");
            }

            break;
        default:
            echo "Nao encontrei nada";
            break;
    }
}else{
    switch ($_GET["acao"]) {
        case 'BuscarProduto':
            if (isset($_GET['id'])) {
                $res = $produtoController->buscarProdutoPeloId($_GET['id']);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else {
                echo json_encode(['erro' => 'ID do produto não informado']);
            }
            break;
        default:
            echo "Nao encontrei nada";
            break;
    }
}
