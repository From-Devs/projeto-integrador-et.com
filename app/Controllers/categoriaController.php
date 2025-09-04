<?php
require_once __DIR__ . '/../Models/CategoriaModel.php';

class CategoriaController {
    private $categoriaModel;
    private $subCategoriaModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
        $this->subCategoriaModel = new SubCategoriaModel();
    }

    public function listarCategorias() {
        return $this->categoriaModel->getAll();
    }

    public function listarSubCategorias() {
        return $this->subCategoriaModel->getAll();
    }

    public function listarByIdSubCategorias($id) {
        return $this->subCategoriaModel->getById($id);
    }
}
// Uso:
$controller = new CategoriaController();

$categorias = $controller->listarCategorias();
$subCategorias = $controller->listarSubCategorias();
$subidCategorias = $controller->listarByIdSubCategorias(2);
print_r($subidCategorias);
echo "<h1>lista sub e categoria</h1>";
// echo "<pre>";
// print_r($categorias);
// echo "</pre>";
// echo "<pre>";
// print_r($subCategorias);
// echo "</pre>";