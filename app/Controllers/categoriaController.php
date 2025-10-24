<?php
require_once __DIR__ . '/../Models/categoria.php'; // categoria
require_once __DIR__ . '/../Models/products.php'; // categoria

class CategoriaController {
    private $categoriamodel;
    private $productsmodel;
    
    public function __construct() {
        $this->categoriamodel = new Categoria();
        $this->productsmodel = new Products();
    }
    
    public function create() {
        return $this->categoriamodel->getCategoriaAll();
        require 
    }
    
}