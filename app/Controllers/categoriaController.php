<?php
require_once __DIR__ . '/../Models/categoria.php';

class CategoriaController {
    private $categoriamodel;
    
    public function __construct() {
        $this->categoriamodel = new Categoria();
    }
    
    public function create() {
        return $this->categoriamodel->getCategoriaAll();
    }
    
}