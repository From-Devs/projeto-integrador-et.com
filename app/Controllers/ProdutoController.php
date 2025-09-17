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

    public function criarProduto(array $dados, array $files): bool {
        return $this->model->criarProduto($dados, $files);
    }

    public function editarProduto(int $id, array $dados, array $files = []): bool {
        return $this->model->editarProduto($id, $dados, $files);
    }

    public function removerProduto(int $id): bool {
        return $this->model->removerProduto($id);
    }

    public function getProduto(int $id): ?array {
        return $this->model->getById($id);
    }

    public function listarTodos(): array {
        return $this->model->getAll();
    }

    public function listarCategorias(): array {
        return $this->modelCategoria->getAll();
    }

    public function listarSubCategorias(): array {
        return $this->modelSubCategoria->getAll();
    }
}
