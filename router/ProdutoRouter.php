<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
require_once __DIR__ . "/../app/Models/TelaPedidosModel.php";

$produtoController = new ProdutoController();
$pedidoController = new PedidoController();

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

    return $acao !== 'CadastrarProduto' || $temImagem;
}

// Detecta ação
$acao = $_GET["acao"] ?? $_POST["acao"] ?? null;
if (!$acao) {
    echo json_encode(["ok" => false, "msg" => "Ação não informada"]);
    exit;
}

// ====================
// === POST ACTIONS ===
// ====================
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($acao) {

        case 'CadastrarProduto':
            $fgPromocao = isset($_POST["fgPromocao"]) ? 1 : 0;
            if (ValidaCampos($acao)) {
                $resultado = $produtoController->cadastrarProduto(
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
                    $idUsuario
                );
                echo json_encode($resultado
                    ? ["ok" => true, "msg" => "Produto cadastrado com sucesso"]
                    : ["ok" => false, "msg" => "Erro ao cadastrar produto"]
                );
            } else {
                echo json_encode(["ok" => false, "msg" => "Campos inválidos ou imagens não enviadas"]);
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
            echo json_encode($resultado
                ? ["ok" => true, "msg" => "Produto editado com sucesso"]
                : ["ok" => false, "msg" => "Erro ao editar produto"]
            );
            break;

        case 'RemoverProduto':
            $resultado = $produtoController->RemoverProduto($_POST["id"]);
            echo json_encode($resultado
                ? ["ok" => true, "msg" => "Produto removido com sucesso"]
                : ["ok" => false, "msg" => "Erro ao remover produto"]
            );
            break;

        case 'avaliarProduto':
            $idProduto = $_POST['id_produto'] ?? null;
            $nota = $_POST['nota'] ?? null;
            $comentario = $_POST['comentario'] ?? '';

            if (!$idProduto || !$nota) {
                echo json_encode(['ok' => false, 'msg' => 'Dados inválidos para avaliação']);
                exit;
            }

            $resultado = $produtoController->avaliarProduto(
                $idUsuario,
                intval($idProduto),
                intval($nota),
                $comentario
            );
            echo json_encode($resultado);
            break;

        default:
            echo json_encode(['ok' => false, 'msg' => 'Ação POST inválida']);
            break;
    }
}

// ===================
// === GET ACTIONS ===
// ===================
else {
    switch ($acao) {

        case 'BuscarProduto':
            if (isset($_GET['id'])) {
                echo json_encode($produtoController->buscarProdutoPeloId($_GET['id']));
            } else {
                echo json_encode(['ok' => false, 'msg' => 'ID do produto não informado']);
            }
            break;

        case 'buscarTodosProdutos':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            echo json_encode($produtoController->buscarTodosProdutos($ordem, $pesquisa));
            break;

        case 'ListarSubCategorias':
            echo json_encode($produtoController->capturarSubCategorias());
            break;

        case 'ListarSubCategoriasPorCategoria':
            $idCategoria = isset($_GET['idCategoria']) ? (int)$_GET['idCategoria'] : null;
            echo json_encode($idCategoria !== null ? $produtoController->getSubcategoriasPorCategoria($idCategoria) : []);
            break;

        case 'BuscarSubcategoriaPorId':
            $idSub = isset($_GET['idSub']) ? (int)$_GET['idSub'] : null;
            echo json_encode($idSub !== null ? $produtoController->getSubcategoriaPorId($idSub) : []);
            break;

        default:
            echo json_encode(['ok' => false, 'msg' => 'Ação GET inválida']);
            break;
    }
}
