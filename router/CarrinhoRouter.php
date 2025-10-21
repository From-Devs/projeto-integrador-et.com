<?php
require_once __DIR__ . '/../Controllers/CarrinhoController.php';
$carrinhoController = new CarrinhoController();

$acao = $_GET['acao'] ?? null;
$idUsuario = $_SESSION['id_usuario'] ?? 1;

switch($acao) {
    case 'listar':
        $carrinhoController->listarCarrinho($idUsuario);
        break;

    case 'adicionar':
        $idProduto = $_POST['id_produto'] ?? null;
        $qtd = $_POST['qtd'] ?? 1;
        $carrinhoController->adicionarAoCarrinho($idUsuario, $idProduto, $qtd);
        break;

    case 'atualizar':
        $idProduto = $_POST['id_produto'] ?? null;
        $qtd = $_POST['qtd'] ?? 1;
        $carrinhoController->atualizarQuantidade($idUsuario, $idProduto, $qtd);
        break;

    case 'remover':
        $idProduto = $_POST['id_produto'] ?? null;
        $carrinhoController->removerDoCarrinho($idUsuario, $idProduto);
        break;

    case 'removerSelecionados':
        $idsProduto = $_POST['ids'] ?? [];
        $carrinhoController->removerSelecionadosDoCarrinho($idUsuario, $idsProduto);
        break;

    default:
        echo json_encode(['ok' => false, 'msg' => 'Ação inválida']);
        break;
}
