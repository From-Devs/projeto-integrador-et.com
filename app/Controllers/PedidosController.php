<?php
require_once __DIR__ . '/../models/PedidosModel.php';

class PedidoController {
    private $model;

    public function __construct() {
        $this->model = new PedidosModel();
    }

    /**
     * Lista todos os pedidos de um usuário
     */
    public function listarPedidosPorUsuario($idUsuario) {
        // Retorna array com pedidos + produtos
        return $this->model->listarPorUsuario($idUsuario);
    }

    /**
     * Retorna produtos de um pedido específico
     */
    public function buscarProdutosDoPedido($idPedido) {
        return $this->model->buscarProdutosDoPedido($idPedido);
    }

    /**
     * Retorna informações de pagamento (método placeholder)
     */
    public function buscarInfoPagamentos($idPedido) {
        return $this->model->buscarInfoPagamentos($idPedido);
    }
}
?>
