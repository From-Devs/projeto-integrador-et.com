<?php
require_once __DIR__ . '/../Models/SubCategoria.php';

class SubCategoryController {
    private $subCategoryModel;

    public function __construct() {
        $this->subCategoryModel = new SubCategory();
    }

    public function create($nome, $id_categoria) {
        return $this->subCategoryModel->createSubCategoria($nome, $id_categoria);
    }

    public function listAll() {
        return $this->subCategoryModel->getAllSubCategorias();
    }

    public function getById($id_subcategoria) {
        return $this->subCategoryModel->getSubCategoriaById($id_subcategoria);
    }

    public function update($id_subcategoria, $nome, $id_categoria) {
        return $this->subCategoryModel->updateSubCategoria($id_subcategoria, $nome, $id_categoria);
    }

    public function delete($id_subcategoria) {
        return $this->subCategoryModel->deleteSubCategoria($id_subcategoria);
    }
}
?>
