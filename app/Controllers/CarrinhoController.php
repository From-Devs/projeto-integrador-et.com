<?php
require_once __DIR__ . "/../Models/CarrinhoModel.php";

class CarrinhoController {

    private $carrinhoModel;

    public function __construct() {
        $this->carrinhoModel = new Carrinho();
    }

     public function exibirCarrinho($idUsuario) {

        $carrinho = $this->carrinhoModel->getCarrinhoByUsuario($idUsuario);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {

            // --- EXCLUIR PRODUTOS SELECIONADOS ---
            if ($_POST['acao'] === 'remover' && !empty($_POST['selecionados'])) {
                foreach ($_POST['selecionados'] as $id_prodCarrinho) {
                    $this->carrinhoModel->removerItem($id_prodCarrinho, $idUsuario);
                }
            }

            // --- REALIZAR PEDIDO COM PRODUTOS SELECIONADOS ---
            if ($_POST['acao'] === 'pedido' && !empty($_POST['selecionados'])) {
                $produtosSelecionados = [];

                foreach ($carrinho as $produto) {
                    if (in_array($produto['id_prodCarrinho'], $_POST['selecionados'])) {
                        $produtosSelecionados[] = $produto;
                    }
                }

                if (!empty($produtosSelecionados)) {
                    $this->carrinhoModel->criarPedido($idUsuario, $produtosSelecionados);

                    // Remove do carrinho os produtos que foram para o pedido
                    foreach ($produtosSelecionados as $p) {
                        $this->carrinhoModel->removerItem($p['id_prodCarrinho'], $idUsuario);
                    }

                    echo "<script>alert('Pedido realizado com sucesso!');</script>";
                }
            }

        // Recarrega o carrinho após modificações
        $carrinho = $this->carrinhoModel->getCarrinhoByUsuario($idUsuario);
    }

    // --- CALCULA TOTAL E SUBTOTAIS ---
    $total = 0;
    $precosProdutos = [];

    foreach ($carrinho as $index => $produto) {
        $quantidade = (int)($produto['quantidade'] ?? 1);
        $preco = ($produto['precoPromo'] !== null && $produto['precoPromo'] > 0)
                    ? (float)$produto['precoPromo']
                    : (float)$produto['preco'];
        $subtotal = $preco * $quantidade;
        $total += $subtotal;

        $precosProdutos[$index] = $preco;
        $carrinho[$index]['precoCalculado'] = $preco;
        $carrinho[$index]['subtotal'] = $subtotal;
    }

    return [
        'carrinho' => $carrinho,
        'total' => $total,
        'precosProdutos' => $precosProdutos
    ];
    }

}
