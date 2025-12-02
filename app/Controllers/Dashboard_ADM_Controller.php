<?php

require_once __DIR__ . "/../Models/Dashboard_ADM_Model.php";

class Dashboard_ADM_Controller {

     private $Dashboard_ADM_Model;

    public function __construct() {
        $this->Dashboard_ADM_Model = new Dashboard_ADM_Model();
    }

    public function getDashboardData() {
    return [
        'lucro_total' => $this->Dashboard_ADM_Model->getLucroTotal(),
        'total_associados' => $this->Dashboard_ADM_Model->getTotalAssociados(),
        'unidades_vendidas' => $this->Dashboard_ADM_Model->getVendasRealizadas(),
        'top_vendedores' => $this->Dashboard_ADM_Model->getTopVendedores(),
        'top_categorias' => $this->Dashboard_ADM_Model->getTopCategorias()

    ];
    }

    public function getChartData()
    {
        header('Content-Type: application/json');

        $topVendedores = $Dashboard_ADM_Model->getTopVendedores();
        $topCategorias = $Dashboard_ADM_Model->getTopCategorias();

        echo json_encode([
            "vendedores" => $topVendedores,
            "categorias" => $topCategorias
        ]);
    }


}