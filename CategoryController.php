<?php
require_once __DIR__ . '/../Models/Categoria.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Categoria();
    }

    // Criar Categoria
    public function createCategoria($nome) {
        if (empty($nome)) {
            return ["success" => false, "message" => "Nome da categoria é obrigatório"];
        }

        return $this->categoryModel->createCategoria($nome);
    }

    // Criar SubCategoria
    public function createSubCategoria($nome, $id_categoria) {
        if (empty($nome)) {
            return ["success" => false, "message" => "Nome da subcategoria é obrigatório"];
        }
        if (empty($id_categoria)) {
            return ["success" => false, "message" => "ID da categoria é obrigatório"];
        }

        return $this->categoryModel->createSubCategoria($nome, $id_categoria);
    }

    // Listar todas as categorias
    public function listAllCategorias() {
        return $this->categoryModel->getAllCategorias();
    }

    // Listar subcategorias de uma categoria
    public function listSubCategorias($id_categoria) {
        return $this->categoryModel->getSubCategorias($id_categoria);
    }
}
?>
