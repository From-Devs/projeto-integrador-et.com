<?php
require_once "../app/Controllers/UserController.php";

$userController = new UserController();
$responseCreate = null;
$responseUpdate = null;
$responseDelete = null;

// Teste de conexão opcional
$testeConexao = $userController->teste();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_GET["acao"] ?? '';

    switch ($acao) {
        case "create":
            if (isset($_POST['nome'])) {
                $postData = [
                    'nome' => $_POST['nome'] ?? '',
                    'nome_social' => $_POST['nome_social'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'telefone' => $_POST['telefone'] ?? '',
                    'cpf' => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
                    'tipo' => $_POST['tipo'] ?? 'cliente',
                    'foto' => null,
                    'id_endereco' => null
                ];

                $responseCreate = $userController->createUser($postData);
            }
            break;

        case "update":
            if (isset($_POST['update_id'])) {
                $postData = [
                    'nome' => $_POST['nome'] ?? '',
                    'nome_social' => $_POST['nome_social'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'telefone' => $_POST['telefone'] ?? '',
                    'cpf' => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'senha' => $_POST['senha'] ?? '',
                    'tipo' => $_POST['tipo'] ?? 'cliente',
                    'foto' => null,
                    'id_endereco' => null
                ];

                // Mantém senha antiga se não for alterada
                if (empty($postData['senha'])) {
                    $userOld = $userController->getUserById($_POST['update_id']);
                    $postData['senha'] = $userOld['senha'];
                } else {
                    $postData['senha'] = password_hash($postData['senha'], PASSWORD_DEFAULT);
                }

                $responseUpdate = $userController->editUser($_POST['update_id'], $postData);
            }
            break;
        case "delete":
            if (isset($_POST['delete_id'])) {
                try {
                    $responseDelete = $userController->deleteUser($_POST['delete_id']);
                } catch (Exception $e) {
                    $responseDelete = ["success" => false, "message" => "Erro ao deletar: " . $e->getMessage()];
                }
            }            
            break;
            
    }
}

$usuarios = $userController->listAllUsers()['data'] ?? [];
?>
