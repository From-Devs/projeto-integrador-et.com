<?php
require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . '/../Models/DestaqueModel.php';
require_once __DIR__ . '/../Models/CoresSubModel.php';

class DestaqueController extends BaseController {
    private $DestaqueModel;
    private $coresModel;

    public function __construct() {
        $this->DestaqueModel = new DestaqueModel();
        $this->coresModel = new CoresSubModel();
    }

    public function getAll() {
        try {
            $dados = $this->DestaqueModel->getAll();
            return $dados;
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }


    public function getById(int $id) {
        try {
            $carou = $this->DestaqueModel->getElementById($id);
            $cor = $Destaque ? $this->coresModel->getElementById($Destaque['id_coresSubs']) : null;
            $dados = [
                'ProdDestaque' => $Destaque,
                'cor' => $cor
            ];
            return $dados["ProdDestaque"];

            // $this->renderCustom('index', 'teste/index.php', $dados);
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function createCarosel(array $data) {
        try {
            return $this->DestaqueModel->create($data);
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    
    public function mudarProdutoECores(int $id_prodDestaque, int $novo_id_produto): array {
        try {
            return $this->DestaqueModel->mudarProdutoECores($id_prodDestaque, $novo_id_produto);

        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
    public function deleteCarosel(int $id) {
        try {
            return $this->DestaqueModel->remove($id);
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
    public function update(int $id_prodDestaque, array $data) {
        try {
            return $this->DestaqueModel->update($id_prodDestaque, $data);
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
    public function getAllUniqueCores() {
        try {
            return $this->DestaqueModel->getAllUniqueCores(); 
        }
        catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
}