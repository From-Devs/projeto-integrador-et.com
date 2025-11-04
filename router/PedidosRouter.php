<?php

require_once __DIR__ . "/../app/Controllers/PedidosController.php";
$pedidosController = new PedidosController();


if($_SERVER["REQUEST_METHOD"] == "GET"){
    switch ($_GET["acao"]) {
        case 'BuscarTodosPedidos':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $pedidosController->BuscarTodosPedidos($ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        case 'BuscarTodosPedidosADM':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $pedidosController->BuscarTodosPedidosADM($ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        case 'BuscarProdutosDoPedido':
            $idPedido = $_GET['idPedido'] ?? '';
            $res = $pedidosController->BuscarProdutosDoPedido($idPedido);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'atualizarStatusEntrega':
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            $tipoStatus = $data['tipoStatus'] ?? null;
            $idPedido = $data['idPedido'] ?? null;

            if ($idPedido && $tipoStatus !== null) {
                $res = $pedidosController->atualizarStatusEntrega($tipoStatus, $idPedido);
                header('Content-Type: application/json');
                echo json_encode(['success' => (bool)$res]);
            } else {
                echo json_encode(['erro' => 'Parâmetros insuficientes']);
            }
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}

?>