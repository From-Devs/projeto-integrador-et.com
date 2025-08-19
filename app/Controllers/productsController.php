<?php
require_once __DIR__ . '/../Models/Products.php';

class ProductsController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Products();
    }

    // Criar produto usando o CadastrarProduto
    public function createProduto($data) {
        $success = $this->productModel->CadastrarProduto(
            $data['nome'],
            $data['marca'],
            $data['descricaoBreve'],
            $data['preco'],
            $data['precoPromo'],
            $data['descricaoTotal'],
            $data['qtdEstoque'] ?? 0,
            $data['img_1'] ?? null,
            $data['img_2'] ?? null,
            $data['img_3'] ?? null,
            $data['id_subCategoria'] ?? 1,
            $data['id_cores'] ?? 1,
            $data['id_associado'] ?? 1
        );

        return [
            "success" => $success,
            "message" => $success ? "Produto criado com sucesso" : "Erro ao criar produto"
        ];
    }

    public function editProduto($id, $data) {
        $success = $this->productModel->updateProduto($id, $data);
        return [
            "success" => $success,
            "message" => $success ? "Produto atualizado com sucesso" : "Erro ao atualizar produto"
        ];
    }

    public function deleteProduto($id) {
        $success = $this->productModel->deleteProduto($id);
        return [
            "success" => $success,
            "message" => $success ? "Produto excluído com sucesso" : "Erro ao excluir produto"
        ];
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
