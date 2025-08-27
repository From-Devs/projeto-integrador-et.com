<?php
require_once __DIR__ . '/../app/Controllers/UserController.php';
session_start();
$_SESSION['id_usuario'] = 9;

$userController = new UserController();
$responseCreate = null;
$responseUpdate = null;
$responseDelete = null;
$editUserData = null;

// Teste de conexão opcional
$testeConexao = $userController->teste();

$acao = $_GET["acao"] ?? '';

if (!in_array($acao, ['', 'create', 'update', 'delete', 'getUser', 'login', 'update_password'])) {
    header("Location: ../app/views/usuario/TelaErro.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    switch ($acao) {
        case "create":
            if (isset($_POST['nome'])) {
                $senha = $_POST['senha'] ?? '';
                $confirmarSenha = $_POST['confirmar_senha'] ?? '';
                if ($senha !== $confirmarSenha) {
                    $responseCreate = [
                        "success" => false,
                        "message" => "As senhas não coincidem!"
                    ];
                    header("Location: ../app/views/usuario/CadastroUsuario.php?erro=senha");
                    exit;
                    break;
                }
        
                $postData = [
                    'nome'            => $_POST['nome'] ?? '',
                    'email'           => $_POST['email'] ?? '',
                    'telefone'        => $_POST['telefone'] ?? '',
                    'cpf'             => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'senha'           => password_hash($senha, PASSWORD_DEFAULT),
                    'tipo'            => $_POST['tipo'] ?? 'cliente',
                    'foto'            => null,
                    'id_endereco'     => null
                ];
        
                $responseCreate = $userController->createUser($postData);

                header("Location: ../app/views/usuario/Login.php");
                exit;
            }
            break;
        

        case "update":
            if (isset($_POST['update_id'])) {
                $id = $_POST['update_id'];

                $postData = [
                    'nome' => $_POST['nome'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'telefone' => $_POST['telefone'] ?? '',
                    'cpf' => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? ''
                ];
        
                $userOld = $userController->getUserById($id);
        
                $postData['senha'] = $userOld['senha'];
                $postData['tipo'] = $userOld['tipo'];
                $postData['foto'] = null;
                $postData['id_endereco'] = null;
        
                $responseUpdate = $userController->editUser($id, $postData);

                header("Location: ../app/views/usuario/minhaConta.php");
                exit;
            }
            break;

            case "update_password":
                if (isset($_POST['update_senha'])) {
                    $id = $_SESSION['id_usuario'];
                    $usuario = $userController->getUserById($id);
                
                if (!$usuario) {
                        header("Location: ../app/views/usuario/minhaConta.php?erro=usuario_nao_encontrado");
                        exit;
                    }
                
                    $senhaHashBanco = $usuario['senha'];
                    $senhaAtualDigitada = trim($_POST['senhaAtual'] ?? '');
                    $novaSenha = trim($_POST['novaSenha'] ?? '');
                    $confirmarSenha = trim($_POST['confirmarSenha'] ?? '');
                    
                if (!password_verify($senhaAtualDigitada, $senhaHashBanco)) {
                        header("Location: ../app/views/usuario/minhaConta.php?erro=senha_atual_incorreta");
                        exit;
                    }
                
                if ($novaSenha !== $confirmarSenha) {
                        header("Location: ../app/views/usuario/minhaConta.php?erro=confirmacao");
                        exit;
                    }
                
                $postData = [
                    'senha' => password_hash($novaSenha, PASSWORD_DEFAULT),
                ];
                
                $responseUpdate = $userController->editUser($id, $postData);
                
                header("Location: ../app/views/usuario/minhaConta.php?sucesso=senha");
                exit;
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

        case "login":
            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
            $result = $userController->login($email, $senha);
            echo json_encode($result);
            exit;
            break;
    }
}

if ($acao === 'getUser') {
    try {
        if (isset($_POST['edit_id'])) {
            $editUserData = $userController->getUserById($_POST['edit_id']);
        } elseif (isset($_SESSION['id_usuario'])) {
            $editUserData = $userController->getUserById($_SESSION['id_usuario']);
        } else {
            $editUserData = ["success" => false, "message" => "Usuário não está logado"];
        }
    } catch (Exception $e) {
        $editUserData = ["success" => false, "message" => "Erro: " . $e->getMessage()];
    }

    echo json_encode($editUserData);
    exit;
}

$usuarios = $userController->listAllUsers()['data'] ?? [];
