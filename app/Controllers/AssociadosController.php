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

    public function ValidarAssociado($idUsuario){
        return $this->AssociadosModel->ValidarAssociado($idUsuario);
    }

    public function recusarAssociado($idUsuario, $motivo){
        return $this->AssociadosModel->recusarAssociado($idUsuario, $motivo);
    }

    public function mudarStatus($novoStatus, $idPedido){
        return $this->AssociadosModel->mudarStatus($novoStatus, $idPedido);
    }
}

?>