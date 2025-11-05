<?php
require_once __DIR__ . "/../Models/ListaDesejosModel.php";

class ListaDesejosController {

    private $listaDesejosModel;

    public function __construct() {
        $this->listaDesejosModel = new ListaDeDesejos();
    }

    public function listarDesejos($idUsuario){
        return $this->listaDesejosModel->listarDesejos($idUsuario);
    }

    public function adicionarDesejo($idUsuario, $idProduto){
        return $this->listaDesejosModel->adicionarDesejo($idUsuario, $idProduto);
    }

    public function removerDesejo($idUsuario, $idProduto){
        return $this->listaDesejosModel->removerDesejo($idUsuario, $idProduto);
    }

}
