<?php
require_once __DIR__ . "/../Models/CarrinhoModel.php";

class CarrinhoController {

    private $carrinhoModel;

    public function __construct() {
        $this->carrinhoModel = new Carrinho();
    }

}
