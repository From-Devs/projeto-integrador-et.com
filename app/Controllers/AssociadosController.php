<?php

require_once __DIR__ . "/../Models/AssociadosModel.php";

class AssociadosController{
    private $AssociadosModel;

    public function __construct() {
        $this->AssociadosModel = new AssociadosModel();
    }

    public function BuscarTodosAssociados($tipo_tabela, $ordem="", $pesquisa=""){
        return $this->AssociadosModel->BuscarTodosAssociados($tipo_tabela, $ordem, $pesquisa);
    }
}

?>