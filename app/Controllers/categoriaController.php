<?php
require_once __DIR__ . '/../Models/CategoriaModel.php';

class CategoriaController {
    private $categoriaModel;
    private $subCategoriaModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
        $this->subCategoriaModel = new SubCategoriaModel();
    }

    // Categorias
    public function listarCategorias() {
        return $this->categoriaModel->getAll();
    }
    public function listarByIdCategorias($id) {
        return $this->categoriaModel->getById($id);
    }
    public function CriarNovaCategoria($nome) {
        return $this->categoriaModel->create($nome);
    }
    public function AtualizarCategoria($id, $nome) {
        return $this->categoriaModel->update($id, $nome);
    }
    // nao ta funcionado k ta querendo deletar tudo / Sub que essa categario / não necessario mas possivel implementar
    public function DeletarCategoria($id) {
        return $this->categoriaModel->delete($id);
    }

    // Subcategorias
    public function listarSubCategorias() {
        return $this->subCategoriaModel->getAll();
    }
    public function listarByIdSubCategorias($id) {
        return $this->subCategoriaModel->getById($id);
    }
    public function CriarNovaSubCategoria($nome, $idCategoria) {
        return $this->subCategoriaModel->create($nome, $idCategoria);
    }
    public function AtualizarSubCategoria($id, $nome, $idCategoria) {
        return $this->subCategoriaModel->update($id, $nome, $idCategoria);
    }
    public function DeletarSubCategoria($id) {
        return $this->subCategoriaModel->delete($id);
    }
    
}
// // Uso:
// $controller = new CategoriaController();
// // Criar uma nova categoria
// $novaCategoriaId = $controller->CriarNovaCategoria("Eletrônicos"); // Retorna o ID da categoria criada

// // Criar uma nova subcategoria dentro de uma categoria existente
// $novaSubId = $controller->CriarNovaSubCategoria("Notebooks", $novaCategoriaId); // Retorna o ID da subcategoria criada

// // Atualizar subcategoria existente
// $atualizou = $controller->AtualizarSubCategoria($novaSubId, "Laptops", $novaCategoriaId); // Retorna true se atualizado

// // Listar todas as categorias
// $categorias = $controller->listarCategorias(); // Retorna array de categorias

// // Listar todas as subcategorias
// $subCategorias = $controller->listarSubCategorias(); // Retorna array de subcategorias

// // Buscar categoria pelo ID
// $categoria = $controller->listarByIdCategorias($novaCategoriaId); // Retorna categoria específica

// // Buscar subcategoria pelo ID
// $subcategoria = $controller->listarByIdSubCategorias($novaSubId); // Retorna subcategoria específica