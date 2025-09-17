<?php
require_once __DIR__ . "/produtoController.php";

$controller = new ProdutoController();

$action = $_GET['action'] ?? $_POST['action'] ?? $_GET['acao'] ?? $_POST['acao'] ?? null;
$idUsuario = $_GET['id_usuario'] ?? $_POST['id_usuario'] ?? null;
$idProduto = $_GET['id_produto'] ?? $_POST['id_produto'] ?? null;

try {
    switch ($action) {

        // ========================
        // === LISTA DE DESEJOS ===
        // ========================
        case "listarFavoritos":
            if (!$idUsuario) throw new Exception("Usuário não informado");
            $favoritos = $controller->ListarFavoritos($idUsuario);
            echo json_encode(["ok" => true, "items" => $favoritos]);
            break;

        case "adicionarFavorito":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $res = $controller->adicionarFavorito($idUsuario, $idProduto);
            echo json_encode($res);
            break;

        case "removerFavorito":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $res = $controller->removerFavorito($idUsuario, $idProduto);
            echo json_encode($res);
            break;

        // ========================
        // === PRODUTOS ===========
        // ========================
        case "listar":
            $page = $_GET['page'] ?? 1;
            $limit = $_GET['limit'] ?? 12;
            $q = $_GET['q'] ?? null;
            $sub = $_GET['sub'] ?? null;
            $res = $controller->listar($page, $limit, $q, $sub);
            echo json_encode(["ok" => true, "data" => $res]);
            break;

        case "detalhes":
            if (!$idProduto) throw new Exception("Produto não informado");
            $res = $controller->detalhes($idProduto);
            echo json_encode(["ok" => true, "data" => $res]);
            break;

        // ========================
        // === CARRINHO ===========
        // ========================
        case "listarCarrinho":
            if (!$idUsuario) throw new Exception("Usuário não informado");
            $res = $controller->listarCarrinho($idUsuario);
            echo json_encode(["ok" => true, "data" => $res]);
            break;

        case "adicionarCarrinho":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $qtd = $_POST['qtd'] ?? 1;
            $res = $controller->adicionarAoCarrinho($idUsuario, $idProduto, $qtd);
            echo json_encode($res);
            break;

        case "removerCarrinho":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $res = $controller->removerDoCarrinho($idUsuario, $idProduto);
            echo json_encode($res);
            break;

        default:
            echo json_encode(["ok" => false, "msg" => "Ação não encontrada"]);
    }
} catch (Exception $e) {
    echo json_encode(["ok" => false, "msg" => $e->getMessage()]);
}
?>
