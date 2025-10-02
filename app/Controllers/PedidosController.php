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


    public function BuscarTodosPedidosADM($ordem="", $pesquisa=""){
        return $this->pedidosModel->BuscarTodosPedidosADM($ordem, $pesquisa);
    }
}

?>