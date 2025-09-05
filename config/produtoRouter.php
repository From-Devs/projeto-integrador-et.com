<?php
// public/produtoRouter.php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../app/controllers/produtoController.php';

$controller = new ProdutoController();

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? $_POST['action'] ?? null;

// Em produção você obteria $idUsuario da sessão/autenticação.
// Para testes locais, permite informar via GET/POST (?user=1)
$idUsuario = isset($_GET['user']) ? (int)$_GET['user'] : (isset($_POST['user']) ? (int)$_POST['user'] : 1);

try {
    if ($method === 'GET' && $action === 'listar') {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 12;
        $q = $_GET['q'] ?? null;
        $sub = isset($_GET['sub']) ? (int)$_GET['sub'] : null;
        echo json_encode($controller->listar($page, $limit, $q, $sub));
        exit;
    }

    if ($method === 'GET' && $action === 'detalhes') {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        echo json_encode($controller->detalhes($id));
        exit;
    }

    if ($method === 'POST' && $action === 'addCarrinho') {
        $idProduto = (int)($_POST['id_produto'] ?? 0);
        $qtd = (int)($_POST['qtd'] ?? 1);
        echo json_encode($controller->adicionarAoCarrinho($idUsuario, $idProduto, $qtd));
        exit;
    }

    if ($method === 'POST' && $action === 'updQtd') {
        $idProduto = (int)($_POST['id_produto'] ?? 0);
        $qtd = (int)($_POST['qtd'] ?? 1);
        echo json_encode($controller->atualizarQuantidade($idUsuario, $idProduto, $qtd));
        exit;
    }

    if ($method === 'POST' && $action === 'rmCarrinho') {
        $idProduto = (int)($_POST['id_produto'] ?? 0);
        echo json_encode($controller->removerDoCarrinho($idUsuario, $idProduto));
        exit;
    }

    if ($method === 'GET' && $action === 'verCarrinho') {
        echo json_encode($controller->listarCarrinho($idUsuario));
        exit;
    }

    if ($method === 'POST' && $action === 'criarPedido') {
        echo json_encode($controller->criarPedido($idUsuario));
        exit;
    }

    if ($method === 'GET' && $action === 'meusPedidos') {
        echo json_encode($controller->listarPedidos($idUsuario));
        exit;
    }

    echo json_encode(['error' => 'Ação não encontrada']);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>