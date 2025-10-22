<?php
require_once __DIR__ . '/../Models/CarrinhoModel.php';

class CarrinhoController {
    private $model;

    public function __construct() {
        $this->model = new Carrinho();
    }

    public function exibirCarrinho($id_usuario) {
        return $this->model->getCarrinhoByUsuario($id_usuario);
    }

    public function removerSelecionados($ids) {
        foreach ($ids as $id_prodCarrinho) {
            $this->model->removerItem($id_prodCarrinho);
        }
    }

    public function realizarPedido($id_usuario, $idsSelecionados) {
        $carrinho = $this->model->getCarrinhoByUsuario($id_usuario);
        $produtos = array_filter($carrinho, function($item) use ($idsSelecionados) {
            return in_array($item['id_prodCarrinho'], $idsSelecionados);
        });

        if (empty($produtos)) return false;
        return $this->model->criarPedido($id_usuario, $produtos);
    }
}
