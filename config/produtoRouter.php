<?php
session_start();
require_once __DIR__ . '/produtoController.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new ProdutoController();
$action = $_GET['action'] ?? null;

// id do usuário logado (ajuste conforme seu sistema)
$idUsuario = $_SESSION['id_usuario'] ?? 1;

switch ($action) {

    // ===============================
    // === EXCLUIR SELECIONADOS =====
    // ===============================
    case 'excluirSelecionados':
        $data = json_decode(file_get_contents("php://input"), true);
        $ids = $data['ids'] ?? [];

        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
            exit;
        }

        $resultado = $controller->removerSelecionadosDoCarrinho($idUsuario, $ids);
        echo json_encode($resultado);
        break;


    // ===============================
    // === LISTAR CARRINHO ==========
    // ===============================
    case 'listarCarrinho':
        $resultado = $controller->listarCarrinho($idUsuario);
        echo json_encode($resultado);
        break;


    // ===============================
    // === REMOVER ITEM ÚNICO =======
    // ===============================
    case 'removerItem':
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode(['ok' => false, 'msg' => 'ID do produto não informado']);
            exit;
        }
        $resultado = $controller->removerDoCarrinho($idUsuario, $id);
        echo json_encode($resultado);
        break;


    // ===============================
    // === ADICIONAR AO CARRINHO ====
    // ===============================
    case 'adicionar':
        $data = json_decode(file_get_contents("php://input"), true);
        $idProduto = $data['id_produto'] ?? null;
        $qtd = $data['quantidade'] ?? 1;
        if (!$idProduto) {
            echo json_encode(['ok' => false, 'msg' => 'Produto inválido']);
            exit;
        }
        $resultado = $controller->adicionarAoCarrinho($idUsuario, $idProduto, $qtd);
        echo json_encode($resultado);
        break;


    // ===============================
    // === ATUALIZAR QUANTIDADE =====
    // ===============================
    case 'atualizarQuantidade':
        $data = json_decode(file_get_contents("php://input"), true);
        $idProduto = $data['id_produto'] ?? null;
        $qtd = $data['quantidade'] ?? null;
        if (!$idProduto || $qtd === null) {
            echo json_encode(['ok' => false, 'msg' => 'Dados inválidos']);
            exit;
        }
        $resultado = $controller->atualizarQuantidade($idUsuario, $idProduto, $qtd);
        echo json_encode($resultado);
        break;


    // ===============================
    // === DEFAULT ==================
    // ===============================
    default:
        echo json_encode(['ok' => false, 'msg' => 'Ação inválida']);
        break;
}
?>
