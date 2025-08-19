<?php
require_once __DIR__ . '/../Models/Products.php';

class ProductsController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Products();
    }

    public function createProduto($data) {
        $success = $this->productModel->create($data);
        return ["success" => $success, "message" => $success ? "Produto criado" : "Erro ao criar"];
    }

    public function editProduto($id, $data) {
        $success = $this->productModel->updateProduto($id, $data);
        return ["success" => $success, "message" => $success ? "Produto atualizado" : "Erro ao atualizar"];
    }

    public function deleteProduto($id) {
        $success = $this->productModel->deleteProduto($id);
        return ["success" => $success, "message" => $success ? "Produto excluído" : "Erro ao excluir"];
    }

    public function getProdutoById($id) {
        return $this->productModel->produtoById($id);
    }

    public function listAllProdutos() {
        $produtos = $this->productModel->getAllProdutos();
        return ["success" => true, "data" => $produtos];
    }

    public function listSubcategorias() {
        return $this->productModel->getAllSubcategorias();
    }

    public function listCores() {
        return $this->productModel->getAllCores();
    }

    public function listAssociados() {
        return $this->productModel->getAllAssociados();
    }
}
?>
