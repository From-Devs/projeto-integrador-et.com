<?php
require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . '/../Models/DestaqueModel.php';
require_once __DIR__ . '/../Models/CoresSubModel.php';

class DestaqueController extends BaseController {
    private $DestaqueModel;
    private $coresModel;

    public function __construct() {
        $this->DestaqueModel = new ProdutoDestaque();
        $this->coresModel = new CoresSubModel();
    }

    public function getAll() {
        $dados = [ 
            'ProdDestaque' => $this->DestaqueModel->getAll(),
        ];
        return $dados['ProdDestaque'];
    }


    public function getById(int $id) {
        $carou = $this->DestaqueModel->getElementById($id);
        $cor = $Destaque ? $this->coresModel->getElementById($Destaque['id_coresSubs']) : null;

        $dados = [
            'ProdDestaque' => $Destaque,
            'cor' => $cor
        ];
        $this->renderCustom('index', 'teste/index.php', $dados);
    }

    public function createCarosel(array $data) {
        return $this->DestaqueModel->create($data);
    }

    
    public function mudarProdutoECores(int $id_prodDestaque, int $novo_id_produto): array {
        return $this->DestaqueModel->mudarProdutoECores($id_prodDestaque, $novo_id_produto);
    }
    public function deleteCarosel(int $id) {
        return $this->DestaqueModel->remove($id);
    }
    public function update(int $id_prodDestaque, array $data) { 
         return $this->DestaqueModel->update($id_prodDestaque, $data);
    }
    public function getAllUniqueCores() {
        return $this->DestaqueModel->getAllUniqueCores(); 
    }
}