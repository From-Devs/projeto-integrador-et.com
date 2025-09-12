<?php
require_once __DIR__ . '/../Models/CoresModel.php';

class CoresController {
    private CoresModel $model;

    public function __construct() {
        $this->model = new CoresModel();
    }

    // Lista todas as cores
    public function listarTodas(): array {
        return $this->model->getCores();
    }

    // Buscar cor por ID
    public function buscarPorId(int $id): ?array {
        return $this->model->getCorById($id);
    }

    // Criar nova cor
    public function criar(array $dados): bool {
        if (!isset($dados['corPrincipal'], $dados['hex1'], $dados['hex2'])) {
            return false; // validação básica
        }

        return $this->model->criarCor($dados['corPrincipal'], $dados['hex1'], $dados['hex2']);
    }

    // Atualizar cor
    public function atualizar(int $id, array $dados): bool {
        if (!isset($dados['corPrincipal'], $dados['hex1'], $dados['hex2'])) {
            return false; // validação básica
        }

        return $this->model->atualizarCor($id, $dados['corPrincipal'], $dados['hex1'], $dados['hex2']);
    }

    // Deletar cor
    public function deletar(int $id): bool {
        return $this->model->deletarCor($id);
    }

    // Verifica se cor existe
    public function existe(int $id): bool {
        return $this->model->existe($id);
    }
}
