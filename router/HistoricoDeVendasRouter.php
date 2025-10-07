<?php

require_once __DIR__ . "/../app/Controllers/HistoricoDeVendasController.php";
$historicoDeVendasController = new HistoricoDeVendasController();


if($_SERVER["REQUEST_METHOD"] == "GET"){
    switch ($_GET["acao"]) {
        case 'BuscarTodosPedidos':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $historicoDeVendasController->BuscarHistoricoDeVendasProdutos($ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}

?>