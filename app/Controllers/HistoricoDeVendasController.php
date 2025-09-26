<?php

require_once __DIR__ . "/../Models/HistoricoDeVendasModel.php";

class HistoricoDeVendasController{
    private $HvPModel;

    public function __construct() {
        $this->HvPModel = new HistoricoDeVendasModel();
    }

    public function BuscarHistoricoDeVendasProdutos($ordem="", $pesquisa=""){
        return $this->HvPModel->BuscarHistoricoDeVendasProdutos($ordem, $pesquisa);
    }
}

?>