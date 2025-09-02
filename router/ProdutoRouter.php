<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

// function CapturaImagens() {
//     $imgs = ['img1' => null, 'img2' => null, 'img3' => null];

//     foreach ($imgs as $key => &$img) {
//         if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
//             $img = file_get_contents($_FILES[$key]['tmp_name']);
//         }
//     }

//     return $imgs;
// }

function ValidaCampos(){
    if(isset($_POST["nome"]) && !empty(trim($_POST["nome"])) &&
    isset($_POST["marca"]) && !empty(trim($_POST["marca"])) &&
    isset($_POST["breveDescricao"]) && !empty(trim($_POST["breveDescricao"])) &&
    isset($_POST["qtdEstoque"]) && !empty($_POST["qtdEstoque"]) && is_numeric($_POST["qtdEstoque"]) &&
    isset($_POST["preco"]) && !empty($_POST["preco"]) && is_numeric($_POST["preco"]) &&
    isset($_POST["precoPromocional"]) && !empty($_POST["precoPromocional"]) && is_numeric($_POST["precoPromocional"]) &&
    isset($_POST["caracteristicasCompleta"]) && !empty(trim($_POST["caracteristicasCompleta"]))){
        return true;
    }else{
        return false;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'EditarProduto':
            $resultado = $produtoController->EditarProduto();
            header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=EditarProduto");
            break;
        case 'CadastrarProduto':
            if(ValidaCampos()){
                // $imagens = CapturaImagens();
                // if ($imagens['img1'] || $imagens['img2'] || $imagens['img3']){
                //     $resultado = $produtoController->CadastrarProduto($_POST["nome"], $_POST["marca"], $_POST["breveDescricao"], $_POST["preco"], $_POST["precoPromocional"], $_POST["caracteristicasCompleta"], $_POST["qtdEstoque"], $imagens['img1'], $imagens['img2'], $imagens['img3']);
                // }

                $resultado = $produtoController->CadastrarProduto($_POST["nome"], $_POST["marca"], $_POST["breveDescricao"], $_POST["preco"], $_POST["precoPromocional"], $_POST["caracteristicasCompleta"], $_POST["qtdEstoque"]);
                if($resultado){
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=CadastrarProduto");
                }else{
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto");
                }
            }else{
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