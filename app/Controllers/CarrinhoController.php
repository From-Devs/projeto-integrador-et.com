<?php
require_once __DIR__ . '/../Models/CarrinhoModel.php';

class CarrinhoController {
    private $carrinho;

    public function __construct() {
        $this->carrinho = new Carrinho();
    }

    public function listar($idUsuario) {
        return $this->carrinho->listar($idUsuario);
    }

    public function adicionar($idUsuario, $idProduto, $qtd = 1) {
        return $this->carrinho->adicionar($idUsuario, $idProduto, $qtd);
    }

    public function atualizarQuantidade($idUsuario, $idProduto, $qtd) {
        return $this->carrinho->atualizarQuantidade($idUsuario, $idProduto, $qtd);
    }

    public function remover($idUsuario, $idProduto) {
        return $this->carrinho->remover($idUsuario, $idProduto);
    }

    public function removerSelecionados($idUsuario, $idsProduto) {
        return $this->carrinho->removerSelecionados($idUsuario, $idsProduto);
    }
}
