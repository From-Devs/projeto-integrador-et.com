<?php
require_once __DIR__ . '/../Models/Products.php';
require_once __DIR__ . '/../Models/SubCategory.php';
require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../../config/database.php';

class ProductsController {
    private $produtoModel;
    private $subCategoriaModel;
    private $db;

    public function __construct() {
        $this->db = new Database();
        $this->produtoModel = new Produto();
        $this->subCategoriaModel = new SubCategory();
    }

    // Criar Produto
    public function createProduto($data) {
        return $this->produtoModel->create($data)
            ? ['success' => true, 'message' => 'Produto criado com sucesso!']
            : ['success' => false, 'message' => 'Erro ao criar produto'];
    }

    // Editar Produto
    public function editProduto($id, $data) {
        return $this->produtoModel->update($id, $data)
            ? ['success' => true, 'message' => 'Produto atualizado com sucesso!']
            : ['success' => false, 'message' => 'Erro ao atualizar produto'];
    }

    // Deletar Produto
    public function deleteProduto($id) {
        return $this->produtoModel->delete($id)
            ? ['success' => true, 'message' => 'Produto deletado com sucesso!']
            : ['success' => false, 'message' => 'Erro ao deletar produto'];
    }

    // Listar todos os Produtos
    public function listAllProdutos() {
        $data = $this->produtoModel->getAllProdutos();
        return ['success' => true, 'data' => $data];
    }

    // Buscar Produto por ID
    public function getProdutoById($id) {
        $produtos = $this->produtoModel->getAllProdutos();
        foreach($produtos as $p) {
            if($p['id_produto'] == $id) return $p;
        }
        return null;
    }

    // Listar Subcategorias
    public function listSubcategorias() {
        $res = $this->subCategoriaModel->getAllSubCategorias();
        return $res['success'] ? $res['data'] : [];
    }

    // Listar Cores
    public function listCores() {
        try {
            $stmt = $this->db->Connect()->query("SELECT * FROM cores");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }

    // Listar Usuários/Associados
    public function listAssociados() {
        try {
            $stmt = $this->db->Connect()->query("SELECT * FROM usuario");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }
}
?>
