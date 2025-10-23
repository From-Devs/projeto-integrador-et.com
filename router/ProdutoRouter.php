<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

$idUsuario = $_SESSION['id_usuario'] ?? ($_GET['id_usuario'] ?? $_POST['id_usuario'] ?? null);

function ValidaCampos($acao) {
    $camposObrigatorios = [
        "nome", "marca", "breveDescricao", "qtdEstoque",
        "preco", "caracteristicasCompleta",
        "corPrincipal", "deg1", "deg2", "subCategoria"
    ];

    foreach ($camposObrigatorios as $campo) {
        if (!isset($_POST[$campo]) || trim($_POST[$campo]) === "") {
            return false;
        }
    }

    if (!is_numeric($_POST["qtdEstoque"]) || !is_numeric($_POST["preco"])) {
        return false;
    }

    $temImagem = 
    (isset($_FILES["img1"]) && $_FILES["img1"]["size"] > 0) ||
    (isset($_FILES["img2"]) && $_FILES["img2"]["size"] > 0) ||
    (isset($_FILES["img3"]) && $_FILES["img3"]["size"] > 0);

    if(!$temImagem && $acao === 'CadastrarProduto') {
        return false;
    }

    return true;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'CadastrarProduto':
            $fgPromocao = isset($_POST["fgPromocao"]) ? 1 : 0;

            if(ValidaCampos($_GET["acao"])){
                $resultado = $produtoController->cadastrarProduto(
                    $_POST["nome"],
                    $_POST["marca"],
                    $_POST["breveDescricao"],
                    $_POST["preco"],
                        $_POST["precoPromocional"] ?? null,
                    $fgPromocao,
                    $_POST["caracteristicasCompleta"],
                    $_POST["tamanho"],
                    $_POST["qtdEstoque"],
                    $_POST["corPrincipal"],
                    $_POST["deg1"],
                    $_POST["deg2"],
                    $idUsuario
                );

            if ($resultado) {
                echo json_encode([
                    "sucesso" => true,
                    "mensagem" => "Produto cadastrado com sucesso"
                ]);
            } else {
                echo json_encode([
                    "sucesso" => false,
                    "mensagem" => "Erro ao cadastrar produto"
                ]);
            }
        
            } else {
                echo json_encode([
                    "sucesso" => false,
                    "mensagem" => "Campos inválidos ou imagens não enviadas"
                ]);
            }
            break;

        case 'EditarProduto':
            $fgPromocao = isset($_POST["fgPromocao"]) ? 1 : 0;

            $resultado = $produtoController->EditarProduto(
                $_POST["id_produto"],
                $_POST["nome"],
                $_POST["marca"],
                $_POST["breveDescricao"],
                $_POST["preco"],
                $_POST["precoPromocional"] ?? null,
                $fgPromocao,
                $_POST["caracteristicasCompleta"],
                $_POST["tamanho"] ?? null,
                $_POST["qtdEstoque"],
                $_POST["corPrincipal"],
                $_POST["deg1"],
                $_POST["deg2"],
                $_POST["subCategoria"] ?? null,
                $_FILES
            );

            header('Content-Type: application/json; charset=utf-8');
            if ($resultado) {
                echo json_encode(["sucesso" => true, "mensagem" => "Produto editado com sucesso"]);
            } else {
                // Retornar debug leve para ajudar a depurar o que foi enviado
                $debug = [
                    'post' => [
                        'id_produto' => $_POST['id_produto'] ?? null,
                        'subCategoria' => $_POST['subCategoria'] ?? null,
                        'nome' => $_POST['nome'] ?? null,
                    ],
                    'files' => [
                        'img1' => isset($_FILES['img1']) ? true : false,
                        'img2' => isset($_FILES['img2']) ? true : false,
                        'img3' => isset($_FILES['img3']) ? true : false,
                    ]
                ];
                echo json_encode(["sucesso" => false, "mensagem" => "Erro ao editar produto", "debug" => $debug]);
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

        case 'buscarTodosProdutos':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $produtoController->buscarTodosProdutos($ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        case 'ListarSubCategorias':
            header('Content-Type: application/json; charset=utf-8');
            $res = $produtoController->capturarSubCategorias();
            echo json_encode($res);
            exit;
            break;
        case 'ListarSubCategoriasPorCategoria':
            header('Content-Type: application/json; charset=utf-8');
            $idCategoria = isset($_GET['idCategoria']) ? (int)$_GET['idCategoria'] : null;
            if ($idCategoria === null) {
                echo json_encode([]);
                exit;
            }
            $res = $produtoController->getSubcategoriasPorCategoria($idCategoria);
            echo json_encode($res);
            exit;
            break;
            case 'BuscarSubcategoriaPorId':
                header('Content-Type: application/json; charset=utf-8');
                $idSub = isset($_GET['idSub']) ? (int)$_GET['idSub'] : null;
                if ($idSub === null) {
                    echo json_encode([]);
                    exit;
                }
                $res = $produtoController->getSubcategoriaPorId($idSub);
                echo json_encode($res);
                exit;
                break;
        default:
            echo "Nao encontrei nada";
            break;
    }
}
