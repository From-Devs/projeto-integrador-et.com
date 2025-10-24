<?php
require_once __DIR__ . '/../Models/RelatorioADM.php';

class RelatorioADMController {
    private $model;

    public function __construct() {
        $this->model = new RelatorioADM();
    }

    public function receitas($idADM) {
        return $this->model->getRelatorioReceitas($idADM);
    }

    public function receitaProduto($idADM) {
        return $this->model->getReceitaPorProduto($idADM);
    }

    public function vendasAbandonadas($idADM) {
        return $this->model->getVendasAbandonadas($idADM);
    }

    public function saldoReceber($idADM) {
        return $this->model->getSaldoReceber($idADM);
    }
}
?>