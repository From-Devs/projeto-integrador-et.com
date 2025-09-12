<?php
require_once __DIR__ . '/../Models/ProdutoModel.php';

class ProdutoController {
    private ProdutoModel $model;

    public function __construct() {
        $this->model = new ProdutoModel();
    }

    public function listarTodos(): array {
        return $this->model->getAll();
    }

    public function existe(int $id): bool {
        return $this->model->exists($id);
    }

    public function getProduto(int $id): ?array {
        return $this->model->getById($id);
    }

    // Este é o método que faltava
    public function criarProduto(array $dados, array $files): bool {
        return $this->model->criarProduto($dados, $files);
    }
}





// Exemplo de uso
$controller = new ProdutoController();
// $produtos = $controller->listarTodos();
// print_r($produtos);

// $existe = $controller->existe(2); // agora correto
// var_dump($existe); // true ou false
