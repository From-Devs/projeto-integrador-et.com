<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

function ValidaCampos() {
    $camposObrigatorios = [
        "nome", "marca", "breveDescricao", "qtdEstoque",
        "preco", "precoPromocional", "caracteristicasCompleta",
        "corPrincipal", "deg1", "deg2", "subCategoria"
    ];

    foreach ($camposObrigatorios as $campo) {
        if (!isset($_POST[$campo]) || trim($_POST[$campo]) === "") {
            return false;
        }
    }

    if (!is_numeric($_POST["qtdEstoque"]) || !is_numeric($_POST["preco"]) || !is_numeric($_POST["precoPromocional"])) {
        return false;
    }

    $temImagem = 
    (isset($_FILES["img1"]) && $_FILES["img1"]["size"] > 0) ||
    (isset($_FILES["img2"]) && $_FILES["img2"]["size"] > 0) ||
    (isset($_FILES["img3"]) && $_FILES["img3"]["size"] > 0);

    if (!$temImagem) {
        return false;
    }

    return true;
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
                    exit;
                }else{
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
                    exit;
                }
            } else {
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
                exit;
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
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=RemoverProduto");
            }else{
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=RemoverProduto");
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

        case 'ListarSubCategorias':
            header('Content-Type: application/json; charset=utf-8');
            $res = $produtoController->capturarSubCategorias();
            echo json_encode($res);
            exit;
            break;
        default:
            echo "Nao encontrei nada";
            break;
    }
}
