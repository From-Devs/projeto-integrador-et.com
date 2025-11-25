<?php

require_once __DIR__ . "/../Models/Dashboard_Assoc_Model.php";

class Dashboard_Assoc_Controller {

    private $Dashboard_Assoc_Model;

    public function __construct() {
        $this->Dashboard_Assoc_Model = new Dashboard_Assoc_Model();
    }

    public function getDashboardAssociado($idAssociado)
    {

        $lucroBruto = $this->Dashboard_Assoc_Model->getLucroTotalPorAssociado($idAssociado);
        $totalVendas = $this->Dashboard_Assoc_Model->getTotalVendasPorAssociado($idAssociado);
        $vendasDetalhadas = $this->Dashboard_Assoc_Model->getItensVendidosPorAssociado($idAssociado);

        $comissoes = [
            'Maquiagem' => 0.07,
            'Perfumes' => 0.08,
            'SkinCare' => 0.09,
            'Cabelo' => 0.08,
            'Utensilios' => 0.10,
            'Corporais' => 0.08
        ];

        $lucroLiquido = 0;

        foreach ($vendasDetalhadas as $venda) {

            $categoria = $venda['categoria'];
            $quantidade = $venda['quantidade'];
            $preco = $venda['precoUnitario'];

            $receitaItem = $preco * $quantidade;

            $percentualComissao = $comissoes[$categoria] ?? 0;

            $valorComissao = $receitaItem * $percentualComissao;

            $lucroLiquido += ($receitaItem - $valorComissao);
        }

        return [
            "bruto" => $lucroBruto['lucro_total'] ?? 0,
            "liquido" => $lucroLiquido,
            "vendas" => $totalVendas['total_vendas'] ?? 0
        ];
    }


    public function getDashboardData() {
        return [
            'lucro_total' => $this->Dashboard_Assoc_Model->getLucroTotal(),
            'total_associados' => $this->Dashboard_Assoc_Model->getTotalAssociados(),
            'unidades_vendidas' => $this->Dashboard_Assoc_Model->getVendasRealizadas(),
            'top_vendedores' => $this->Dashboard_Assoc_Model->getTopVendedores(),
            'top_categorias' => $this->Dashboard_Assoc_Model->getTopCategorias()
        ];
    }

    public function getChartData()
    {
        header('Content-Type: application/json');

        $topVendedores = $this->Dashboard_Assoc_Model->getTopVendedores();
        $topCategorias = $this->Dashboard_Assoc_Model->getTopCategorias();

        echo json_encode([
            "vendedores" => $topVendedores,
            "categorias" => $topCategorias
        ]);
    }

}
