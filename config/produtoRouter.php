<?php
session_start();
require_once __DIR__ . '/produtoController.php';

header('Content-Type: application/json; charset=utf-8');

$controller = new ProdutoController();

// Pegando a action via GET ou POST
$action = $_GET['action'] ?? $_POST['action'] ?? null;

// id do usuário logado
$idUsuario = $_SESSION['id_usuario'] ?? 1;

// Função auxiliar para pegar os IDs enviados
function getIdsProdutos() {
    $ids = $_POST['id_produto'] ?? $_GET['id_produto'] ?? [];
    if (!is_array($ids)) {
        $ids = [$ids];
    }
    return array_map('intval', $ids);
}

// Captura JSON enviado no corpo da requisição
$input = file_get_contents('php://input');
if (!empty($input)) {
    $data = json_decode($input, true);
    if (isset($data['id_produto'])) {
        $_POST['id_produto'] = $data['id_produto'];
    }
    if (isset($data['ids'])) {
        $_POST['id_produto'] = $data['ids'];
    }
    if (isset($data['quantidade'])) {
        $_POST['quantidade'] = $data['quantidade'];
    }
    if (isset($data['nota'])) {
        $_POST['nota'] = $data['nota'];
    }
    if (isset($data['comentario'])) {
        $_POST['comentario'] = $data['comentario'];
    }
}

switch ($action) {

    // ===============================
    // === EXCLUIR SELECIONADOS DO CARRINHO =====
    // ===============================
    case 'excluirSelecionados':
        $ids = getIdsProdutos();
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
            exit;
        }
        if (method_exists($controller, 'excluirSelecionados')) {
            $resultado = $controller->excluirSelecionados($ids, $idUsuario);
        } else {
            $resultado = $controller->removerSelecionadosDoCarrinho($idUsuario, $ids);
        }
        echo json_encode(is_array($resultado) ? $resultado : ['ok' => (bool)$resultado]);
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
        $id = $_GET['id'] ?? $_POST['id'] ?? null;
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
        $ids = getIdsProdutos();
        $qtd = $_POST['quantidade'] ?? 1;
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Produto inválido']);
            exit;
        }
        foreach ($ids as $idProduto) {
            $controller->adicionarAoCarrinho($idUsuario, $idProduto, $qtd);
        }
        echo json_encode(['ok' => true, 'msg' => 'Produto(s) adicionado(s) ao carrinho']);
        break;

    // ===============================
    // === ATUALIZAR QUANTIDADE =====
    // ===============================
    case 'atualizarQuantidade':
        $ids = getIdsProdutos();
        $qtd = $_POST['quantidade'] ?? null;
        if (empty($ids) || $qtd === null) {
            echo json_encode(['ok' => false, 'msg' => 'Dados inválidos']);
            exit;
        }
        foreach ($ids as $idProduto) {
            $controller->atualizarQuantidade($idUsuario, $idProduto, $qtd);
        }
        echo json_encode(['ok' => true]);
        break;

    // ===============================
    // === ADICIONAR FAVORITO =======
    // ===============================
    case 'adicionarFavorito':
        $ids = getIdsProdutos();
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Produto inválido']);
            exit;
        }
        $msgs = [];
        $ok = true;
        foreach ($ids as $idProduto) {
            $res = $controller->adicionarFavorito($idUsuario, $idProduto);
            if (!$res['ok']) {
                $ok = false;
                $msgs[] = $res['msg'] ?? 'Produto já na lista de desejos';
            }
        }
        echo json_encode([
            'ok' => $ok,
            'msg' => $ok ? 'Produto adicionado à Lista de Desejos' : implode(', ', $msgs)
        ]);
        break;

    // ===============================
    // === REMOVER FAVORITO ==========
    // ===============================
    case 'removerFavorito':
        $ids = getIdsProdutos();
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
            exit;
        }
        $resultado = $controller->removerFavorito($idUsuario, $ids);
        echo json_encode($resultado);
        break;

    // ===============================
    // === ADICIONAR AO CARRINHO (Lista de Desejos)
    // ===============================
    case 'adicionarCarrinho':
        $ids = getIdsProdutos();
        if (empty($ids)) {
            echo json_encode(['ok' => false, 'msg' => 'Nenhum produto selecionado']);
            exit;
        }
        foreach ($ids as $idProduto) {
            $controller->adicionarAoCarrinho($idUsuario, $idProduto, 1);
        }
        echo json_encode(['ok' => true, 'msg' => 'Produto(s) adicionado(s) ao carrinho']);
        break;

    // ===============================
    // === AVALIAR PRODUTO ==========
    // ===============================
    case 'avaliarProduto':
        $idProduto = $_POST['id_produto'] ?? null;
        $nota = $_POST['nota'] ?? null;
        $comentario = $_POST['comentario'] ?? '';
        if (!$idProduto || !$nota) {
            echo json_encode(['ok' => false, 'msg' => 'Dados inválidos para avaliação']);
            exit;
        }
        $resultado = $controller->avaliarProduto($idUsuario, intval($idProduto), intval($nota), $comentario);
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
