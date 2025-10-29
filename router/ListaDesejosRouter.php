<?php
session_start();

require_once __DIR__ . '/../app/Controllers/ListaDesejosController.php';
require_once __DIR__ . '/../app/Controllers/ProdutoController.php';
require_once __DIR__ . '/../app/Controllers/CarrinhoController.php'; 

header('Content-Type: application/json; charset=utf-8');

$inputJSON = file_get_contents('php://input');
if (!empty($inputJSON)) {
    $input = json_decode($inputJSON, true);
    if (is_array($input)) {
        $_POST = array_merge($_POST, $input);
    }
}

$listaDesejos = new ListaDesejosController();
$produtoController = new ProdutoController();
$carrinhoController = new CarrinhoController();

$action = $_GET['action'] ?? $_POST['action'] ?? null;
$idUsuario = $_SESSION['id_usuario'] ?? 1;

// Função auxiliar para pegar IDs
function getIdsProdutos() {
    $ids = $_POST['id_produto'] ?? $_GET['id_produto'] ?? [];
    if (!is_array($ids)) $ids = [$ids];
    return array_map('intval', $ids);
}

switch ($action) {
    // ============================
    // === LISTAR DESEJOS =========
    // ============================
    case 'listarDesejos':
        $resultado = $listaDesejos->listarDesejos($idUsuario);
        echo json_encode(['ok' => true, 'data' => $resultado]);
        break;

    // ============================
    // === ADICIONAR FAVORITO =====
    // ============================
    case 'adicionarFavorito':
        $ids = getIdsProdutos();
        $msgs = [];
        $ok = true;

        foreach ($ids as $idProduto) {
            $res = $listaDesejos->adicionarDesejo($idUsuario, $idProduto);
            if (!$res['ok']) {
                $ok = false;
                $msgs[] = $res['msg'] ?? 'Erro ao adicionar à lista de desejos.';
            }
        }

        echo json_encode([
            'ok' => $ok,
            'msg' => $ok ? 'Produto adicionado à Lista de Desejos' : implode(', ', $msgs)
        ]);
        break;

    // ============================
    // === REMOVER FAVORITO =======
    // ============================
    case 'removerFavorito':
        $ids = getIdsProdutos();
        $msgs = [];
        $ok = true;

        foreach ($ids as $idProduto) {
            $res = $listaDesejos->removerDesejo($idUsuario, $idProduto);
            if (!$res['ok']) {
                $ok = false;
                $msgs[] = $res['msg'] ?? 'Erro ao remover da lista de desejos.';
            }
        }

        echo json_encode([
            'ok' => $ok,
            'msg' => $ok ? 'Produto removido da Lista de Desejos' : implode(', ', $msgs)
        ]);
        break;

    // ============================
    // === ADICIONAR AO CARRINHO ==
    // ============================
    case 'adicionarCarrinho':
        $ids = getIdsProdutos();
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
            exit;
        }

        $msgs = [];
        $ok = true;

        foreach ($ids as $idProduto) {
            $res = $carrinhoController->adicionarProduto($idUsuario, $idProduto, 1);
            if (!$res['ok']) {
                $ok = false;
                $msgs[] = $res['msg'];
            }
        }

        echo json_encode([
            'ok' => $ok,
            'msg' => $ok ? 'Produto(s) adicionados ao carrinho!' : implode(', ', $msgs)
        ]);
        break;

    default:
        echo json_encode(['ok' => false, 'msg' => 'Ação inválida']);
        break;
}
