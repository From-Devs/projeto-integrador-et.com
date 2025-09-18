<?php
require_once __DIR__ . '/../app/Controllers/associadoController.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';

session_start();

$assocController = new AssociadoController();
$userController = new UserController();

$responseUpdate = null;
$acao = $_GET["acao"] ?? '';

if (!in_array($acao, ['', 'assoc_request'])) {
    header("Location: ../app/views/usuario/TelaErro.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($acao) {
        case "assoc_request":
            if (isset($_SESSION['id_usuario'])) {
                $id = $_SESSION['id_usuario'];
                $userOld = $userController->getUserById($id);

                $postData = [
                    'nome'            => $_POST['nome'] ?? '',
                    'email'           => $_POST['email'] ?? '',
                    'telefone'        => $_POST['telefone'] ?? '',
                    'cpf'             => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'foto'            => $userOld['foto'] ?? null,
                    'sobreProdutos'   => $_POST['sobreProdutos'] ?? ''
                ];

                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $postData['foto'] = $userController->saveAvatar($_FILES['avatar']);
                }

                $responseUpdate = $assocController->assocRequest($id, $postData);

                header("Location: ../app/views/usuario/Tornar_Associado.php?sucesso=send_request");
                exit;
            }
            break;
    }
}