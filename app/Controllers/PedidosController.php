<?php

require_once __DIR__ . "/../Models/PedidosModel.php";

class PedidosController{
    private $pedidosModel;

    public function __construct() {
        $this->pedidosModel = new PedidosModel();
    }

    public function BuscarTodosPedidosAssociado($ordem="", $pesquisa=""){
        return $this->pedidosModel->BuscarTodosPedidosAssociado($ordem, $pesquisa);
    }
}

?>