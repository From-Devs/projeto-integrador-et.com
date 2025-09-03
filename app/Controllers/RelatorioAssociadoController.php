<?php
require_once __DIR__ . '/../Models/RelatorioAssociado.php';

class RelatorioAssociadoController {
    private $model;

    public function __construct() {
        $this->model = new RelatorioAssociado();
    }

    public function receitas($idAssociado) {
        return $this->model->getRelatorioReceitas($idAssociado);
    }

    public function receitaProduto($idAssociado) {
        return $this->model->getReceitaPorProduto($idAssociado);
    }

    public function vendasAbandonadas($idAssociado) {
        return $this->model->getVendasAbandonadas($idAssociado);
    }

    public function saldoReceber($idAssociado) {
        return $this->model->getSaldoReceber($idAssociado);
    }
}

?>