<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

// Ajuste do caminho correto para o model e controller
require_once __DIR__ . '/../app/Models/CarrinhoModel.php';
require_once __DIR__ . '/../app/Controllers/CarrinhoController.php';

$controller = new CarrinhoController();

// id do usuário logado
$idUsuario = $_SESSION['id_usuario'] ?? 1;

// Pega a action via GET ou POST
$action = $_GET['action'] ?? $_POST['action'] ?? null;

// Função auxiliar para pegar os IDs enviados
function getIdsProdutos() {
    $ids = $_POST['id_produto'] ?? $_GET['id_produto'] ?? [];
    if (!is_array($ids)) {
        $ids = [$ids];
    }
    return array_map('intval', $ids);
}

try {
    switch ($action) {

        // ===============================
        // === ADICIONAR AO CARRINHO ====
        // ===============================
        case 'adicionarCarrinho':
            $ids = getIdsProdutos();
            $quantidade = $_POST['quantidade'] ?? 1;

            if (empty($ids)) {
                echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
                exit;
            }

            // Usa método público do controller
            $res = $controller->adicionarProduto($idUsuario, $ids, $quantidade);

            echo json_encode($res);
            break;

        // ===============================
        // === REMOVER SELECIONADOS ======
        // ===============================
        case 'removerSelecionados':
            $ids = getIdsProdutos();
            if (empty($ids)) {
                echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
                exit;
            }

            $controller->removerSelecionados($ids);
            echo json_encode(['ok' => true, 'msg' => 'Produto(s) removido(s) do carrinho']);
            break;

        // ===============================
        // === LISTAR CARRINHO ==========
        // ===============================
        case 'listarCarrinho':
            $carrinho = $controller->exibirCarrinho($idUsuario);
            echo json_encode(['ok' => true, 'carrinho' => $carrinho]);
            break;

        default:
            echo json_encode(['ok' => false, 'msg' => 'Ação inválida']);
            break;
    }
} catch (Exception $e) {
    echo json_encode(['ok' => false, 'msg' => 'Erro no servidor: ' . $e->getMessage()]);
}
