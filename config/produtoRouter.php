<?php
header("Content-Type: application/json; charset=UTF-8");
require_once __DIR__ . "/produtoController.php";
session_start();

$controller = new ProdutoController();

$action = $_GET['action'] ?? $_POST['action'] ?? $_GET['acao'] ?? $_POST['acao'] ?? null;

// Primeiro tenta pegar id_usuario da sessão
$idUsuario = $_SESSION['id_usuario'] ?? ($_GET['id_usuario'] ?? $_POST['id_usuario'] ?? null);
$idProduto = $_GET['id_produto'] ?? $_POST['id_produto'] ?? null;

// Se veio JSON com array de produtos, decodifica
if (is_string($idProduto) && str_starts_with($idProduto, '[')) {
    $idProduto = json_decode($idProduto, true);
}

try {
    switch ($action) {
        // ========================
        // === LISTA DE DESEJOS ===
        // ========================
        case "listarFavoritos":
            if (!$idUsuario) throw new Exception("Usuário não informado");
            $favoritos = $controller->ListarFavoritos((int)$idUsuario);
            echo json_encode(["ok" => true, "items" => $favoritos]);
            break;

        case "adicionarFavorito":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            if (is_array($idProduto)) {
                $idProduto = array_map('intval', $idProduto);
            } else {
                $idProduto = (int)$idProduto;
            }
            $res = $controller->adicionarFavorito((int)$idUsuario, $idProduto);
            echo json_encode($res);
            break;

        case "removerFavorito":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            if (is_array($idProduto)) $idProduto = array_map('intval', $idProduto);
            else $idProduto = (int)$idProduto;
            $res = $controller->removerFavorito((int)$idUsuario, $idProduto);
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
            $res = $controller->detalhes((int)$idProduto);
            echo json_encode(["ok" => true, "data" => $res]);
            break;

        // ========================
        // === CARRINHO ===========
        // ========================
        case "listarCarrinho":
            if (!$idUsuario) throw new Exception("Usuário não informado");
            $res = $controller->listarCarrinho((int)$idUsuario);
            echo json_encode(["ok" => true, "data" => $res]);
            break;

        case "adicionarCarrinho":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $qtd = isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 1;
            if (is_array($idProduto)) $idProduto = array_map('intval', $idProduto);
            else $idProduto = (int)$idProduto;
            $res = $controller->adicionarAoCarrinho((int)$idUsuario, $idProduto, $qtd);
            echo json_encode($res);
            break;

        case "removerCarrinho":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            if (is_array($idProduto)) $idProduto = array_map('intval', $idProduto);
            else $idProduto = (int)$idProduto;
            $res = $controller->removerDoCarrinho((int)$idUsuario, $idProduto);
            echo json_encode($res);
            break;

        // ========================
        // === AVALIAÇÃO ==========
        // ========================
        case "avaliarProduto":
            if (!$idUsuario || !$idProduto) throw new Exception("Parâmetros inválidos");
            $nota       = $_POST["nota"] ?? null;
            $comentario = $_POST["comentario"] ?? "";
            $res = $controller->avaliarProduto((int)$idUsuario, (int)$idProduto, (int)$nota, $comentario);
            echo json_encode($res);
            break;

        default:
            echo json_encode(["ok" => false, "msg" => "Ação não encontrada"]);
    }
} catch (Exception $e) {
    echo json_encode(["ok" => false, "msg" => $e->getMessage()]);
}
