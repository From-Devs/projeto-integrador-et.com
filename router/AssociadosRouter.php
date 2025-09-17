<?php

require_once __DIR__ . "/../app/Controllers/AssociadosController.php";
$associadosController = new AssociadosController();


if($_SERVER["REQUEST_METHOD"] == "GET"){
    switch ($_GET["acao"]) {
        case 'BuscarTodosAssociados':
            $ordem = $_GET['ordem'] ?? '';
            $pesquisa = $_GET['pesquisa'] ?? '';
            $res = $associadosController->BuscarTodosAssociados($tipo_tabela, $ordem, $pesquisa);
            header('Content-Type: application/json');
            echo json_encode($res);
            break;

        default:
            echo "Nao encontrei nada";
            break;
    }
}

?>