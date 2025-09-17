<?php
require_once __DIR__ . '/../Models/ProdutoModel.php';
require_once __DIR__ . '/../Models/CategoriaModel.php';

class ProdutoController {
    private ProdutoModel $model;
    private CategoriaModel $modelCategoria;
    private SubCategoriaModel $modelSubCategoria;

    public function __construct() {
        $this->model = new ProdutoModel();
        $this->modelCategoria = new CategoriaModel();
        $this->modelSubCategoria = new SubCategoriaModel();
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

    //conexao com a categoria
    public function listarCategorias() {
        return $this->modelCategoria->getAll();
    }
    public function listarSubCategorias() {
        return $this->modelSubCategoria->getAll();
    }
}





// Exemplo de uso
$controller = new ProdutoController();
$produtos = $controller->listarCategorias();
print_r($produtos);


// $existe = $controller->existe(2); // agora correto
// var_dump($existe); // true ou false
