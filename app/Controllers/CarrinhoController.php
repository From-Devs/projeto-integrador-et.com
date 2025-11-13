<?php
require_once __DIR__ . '/../Models/CarrinhoModel.php';

class CarrinhoController {
    private Carrinho $model;

    public function __construct() {
        $this->model = new Carrinho();
    }

    /**
     * Retorna o carrinho de um usuário
     */
    public function exibirCarrinho(int $id_usuario): array {
        return $this->model->getCarrinhoByUsuario($id_usuario);
    }

    /**
     * Remove produtos selecionados do carrinho
     */
    public function removerSelecionados(array $ids_prodCarrinho): void {
        foreach ($ids_prodCarrinho as $id) {
            $this->model->removerItem($id);
        }
    }

    /**
     * Cria um pedido com base nos itens selecionados
     */
    public function realizarPedido(int $id_usuario, array $idsSelecionados): bool|int {
        $quantidades = $_POST['quantidade'] ?? [];
        $carrinho = $this->model->getCarrinhoByUsuario($id_usuario);

        // Filtra os produtos selecionados
        $produtos = array_filter($carrinho, function($item) use ($idsSelecionados) {
            return in_array($item['id_prodCarrinho'], $idsSelecionados);
        });

        // Atualiza as quantidades conforme o formulário
        foreach ($produtos as &$produto) {
            $idCarrinho = $produto['id_prodCarrinho'];
            if (isset($quantidades[$idCarrinho])) {
                $produto['quantidade'] = (int)$quantidades[$idCarrinho];
                $produto['subtotal'] = $produto['precoCalculado'] * $produto['quantidade'];
            }
        }

        if (empty($produtos)) return false;

        return $this->model->criarPedido($id_usuario, $produtos);
    }


    /**
     * Adiciona produto(s) ao carrinho
     */
    public function adicionarProduto(int $id_usuario, array $ids_produtos, int $quantidade = 1): array {
        try {
            $resultados = $this->model->adicionarAoCarrinho($id_usuario, $ids_produtos, $quantidade);
            return ['ok' => true, 'msg' => 'Produto(s) adicionados ao carrinho', 'resultados' => $resultados];
        } catch (Exception $e) {
            return ['ok' => false, 'msg' => 'Erro ao adicionar produto(s): ' . $e->getMessage()];
        }
    }
}
