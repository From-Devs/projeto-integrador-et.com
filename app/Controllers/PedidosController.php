<?php

require_once __DIR__ . "/../Models/PedidosModel.php";

class PedidosController{
    private $pedidosModel;

    public function __construct() {
        $this->pedidosModel = new PedidosModel();
    }

    public function BuscarTodosPedidos($ordem="", $pesquisa=""){
        return $this->pedidosModel->BuscarTodosPedidos($ordem, $pesquisa);
    }

    public function BuscarTodosPedidosAssociado($ordem="", $pesquisa="", $idAssociado){
        return $this->pedidosModel->BuscarTodosPedidosAssociado($ordem, $pesquisa, $idAssociado);
    }

    public function BuscarTodosPedidosADM($ordem="", $pesquisa=""){
        return $this->pedidosModel->BuscarTodosPedidosADM($ordem, $pesquisa);
    }

    public function BuscarProdutosDoPedido($idPedido){
        return $this->pedidosModel->BuscarProdutosDoPedido($idPedido);
    }

    public function atualizarStatusEntrega($tipoStatusEntrega, $idPedido){
        return $this->pedidosModel->atualizarStatusEntrega($tipoStatusEntrega, $idPedido);
    }
}

?>