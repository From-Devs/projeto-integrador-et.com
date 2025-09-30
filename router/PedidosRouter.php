<?php

require_once __DIR__ . "/../app/Controllers/PedidosController.php";
$pedidosController = new PedidosController();


if($_SERVER["REQUEST_METHOD"] == "GET"){
    switch ($_GET["acao"]) {
        case 'BuscarTodosPedidosAssociado':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $pedidosController->BuscarTodosPedidosAssociado($ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}

?>