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
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    switch ($_GET["acao"]) {
        case 'ValidarAssociado':
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            $idUsuario = $data['idUsuario'] ?? null;
        
            if ($idUsuario) {
                $res = $associadosController->ValidarAssociado($idUsuario);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else {
                echo json_encode(['erro' => 'idUsuario não informado']);
            }
            break;

        case 'recusarAssociado':
            $json = file_get_contents('php://input');
            $data = json_decode($json, true);
            $idUsuario = $data['idUsuario'] ?? null;
            $motivo = $data['motivo'] ?? null;
        
            if ($idUsuario) {
                $res = $associadosController->recusarAssociado($idUsuario, $motivo);
                header('Content-Type: application/json');
                echo json_encode($res);
            } else {
                echo json_encode(['erro' => 'idUsuario não informado']);
            }
            break;
        

        default:
            echo "Nao encontrei nada";
            break;
    }
}

?>