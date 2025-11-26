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
        $topProdutos = $this->Dashboard_Assoc_Model->getTopProdutosVendidos($idAssociado);

        $comissoes = [
            'Maquiagem'  => 0.07,
            'Perfume'    => 0.08, 
            'SkinCare'   => 0.09,
            'Cabelo'     => 0.08,
            'Utensílios' => 0.10, 
            'Corporal'   => 0.08 
        ];

        $lucroLiquido = 0;
        $totalBruto = 0;

        foreach ($vendasDetalhadas as $venda) {

            $categoria  = $venda['categoria']      ?? '';
            $quantidade = $venda['quantidade']     ?? 0;
            $preco      = $venda['precoUnitario']  ?? 0;

            $receitaItem = $preco * $quantidade;

            $percentualComissao = $comissoes[$categoria] ?? 0;
            $valorComissao = $receitaItem * $percentualComissao;

            $lucroLiquido += ($receitaItem - $valorComissao);
            $totalBruto += $venda['precoUnitario'] * $venda['quantidade'];
        }

        return [
            "bruto" => $totalBruto,
            "liquido" => $lucroLiquido,
            "vendas" => $totalVendas['total_vendas'] ?? 0,
            "topProdutos" => $topProdutos
        ];
    }


}
