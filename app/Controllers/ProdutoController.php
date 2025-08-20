<?php
require_once __DIR__ . '/../Models/Products.php';


class ProdutoController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Products();
    }

    // Criar produto
    public function CadastrarProduto($data) {
        try {
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
                "message" => $success ? "Produto cadastrado com sucesso" : "Erro ao cadastrar produto"
            ];
        } catch (\Throwable $th) {
            return ["success" => false, "message" => $th->getMessage()];
        }
    }

    // Editar produto
    public function EditarProduto($id, $data) {
        try {
            $success = $this->productModel->updateProduto($id, $data);

            return [
                "success" => $success,
                "message" => $success ? "Produto atualizado com sucesso" : "Erro ao atualizar produto"
            ];
        } catch (\Throwable $th) {
            return ["success" => false, "message" => $th->getMessage()];
        }
    }

    // Excluir produto
    public function DeletarProduto($id) {
        try {
            $success = $this->productModel->deleteProduto($id);

            return [
                "success" => $success,
                "message" => $success ? "Produto excluído com sucesso" : "Erro ao excluir produto"
            ];
        } catch (\Throwable $th) {
            return ["success" => false, "message" => $th->getMessage()];
        }
    }

    // Buscar produto pelo ID
    public function BuscarProdutoPorId($id) {
        return $this->productModel->produtoById($id);
    }

    // Listar todos os produtos
    public function ListarProdutos() {
        $produtos = $this->productModel->getAllProdutos();
        return ["success" => true, "data" => $produtos];
    }

    // Listar subcategorias
    public function ListarSubcategorias() {
        return $this->productModel->getAllSubcategorias();
    }

    // Listar cores
    public function ListarCores() {
        return $this->productModel->getAllCores();
    }

    // Listar associados
    public function ListarAssociados() {
        return $this->productModel->getAllAssociados();
    }
}
?>
