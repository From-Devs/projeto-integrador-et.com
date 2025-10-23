<?php
require_once __DIR__ . '/../app/Controllers/UserController.php';

session_start();

$userController = new UserController();
$responseCreate = null;
$responseUpdate = null;
$responseDelete = null;
$editUserData = null;

// Teste de conexão opcional
$testeConexao = $userController->teste();

$acao = $_GET["acao"] ?? '';

if (!in_array($acao, ['', 'create', 'update', 'delete', 'getUser', 'login', 'update_password', 'save_adress', 'logout', 'assoc_request'])) {
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
                    header("Location: ../app/views/usuario/CadastroUsuario.php?erro=senha");
                    exit;
                }
        
                $postData = [
                    'nome'            => $_POST['nome'] ?? '',
                    'email'           => $_POST['email'] ?? '',
                    'telefone'        => $_POST['telefone'] ?? '',
                    'cpf'             => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'senha'           => $senha,
                    'tipo'            => $_POST['tipo'] ?? 'Cliente',
                    'foto'            => null,
                    'id_endereco'     => null
                ];

                // Adiciona avatar se enviado
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $postData['foto'] = $userController->saveAvatar($_FILES['avatar']);
                }

                $responseCreate = $userController->createUser($postData);
        
                if ($responseCreate['success']) {
                    header("Location: ../app/views/usuario/Login.php?sucesso=1");
                } else {
                    header("Location: ../app/views/usuario/CadastroUsuario.php?erro=" . urlencode($responseCreate['message']));
                }
                exit;
            }
            break;
        
        

        case "update":
            if (isset($_POST['update_id'])) {
                $id = $_POST['update_id'];
        
                // Busca dados antigos
                $userOld = $userController->getUserById($id);
        
                $postData = [
                    'nome' => $_POST['nome'] ?? '',
                    'email' => $_POST['email'] ?? '',
                    'telefone' => $_POST['telefone'] ?? '',
                    'cpf' => $_POST['cpf'] ?? '',
                    'data_nascimento' => $_POST['data_nascimento'] ?? '',
                    'tipo' => $userOld['tipo'],
                    'foto' => $userOld['foto'], 
                    'id_endereco' => $userOld['id_endereco']
                ];
        
                // Salva avatar se houver arquivo enviado
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $postData['foto'] = $userController->saveAvatar($_FILES['avatar']);
                }
        
                // Atualiza usuário
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
                
            $responseUpdate = $userController->updatePassword($id, $postData);
                
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

                session_start();
                session_unset();
                session_destroy();

                header("Location: ../app/views/usuario/Login.php?sucesso=eliel_deletado");
                exit;
            }
            break;

        case "login":
            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
            $result = $userController->login($email, $senha);
            
            if ($result["success"]) {
                $_SESSION['id_usuario'] = $result['user']['id_usuario'];
                header("Location: ../app/views/usuario/paginaPrincipal.php");
                exit;
            } else {
                header("Location: ../app/views/usuario/Login.php?erro=credenciais_invalidas");
                exit;
            }
            break;

        case "logout":
            session_start();
            session_unset();
            session_destroy();
            
            header("Location: ../app/views/usuario/paginaPrincipal.php");
            exit;
            break;

        case "save_adress":
            if (isset($_SESSION['id_usuario'])) {
                $id_usuario = $_SESSION['id_usuario'];
                $dadosEndereco = [
                    "tipoLogradouro" => $_POST['tipoLogradouro'],
                    "estado" => $_POST['estado'],
                    "cidade" => $_POST['cidade'],
                    "bairro" => $_POST['bairro'],
                    "rua" => $_POST['rua'],
                    "numero" => $_POST['numero'],
                    "cep" => $_POST['cep'],
                    "complemento" => $_POST['complemento'] ?? null,
                ];
        
                $response = $userController->saveOrUpdateEndereco($id_usuario, $dadosEndereco);
                
                if ($response['success']) {
                    header("Location: ../app/views/usuario/minhaConta.php?sucesso=endereco");
                } else {
                    header("Location: ../app/views/usuario/editarEndereco.php?erro=" . urlencode($response['message']));
                }
                exit;
            }
            break;

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
                    'tipo'            => $userOld['tipo'],
                    'sobreProdutos'   => $_POST['sobreProdutos'] ?? ''
                ];

                $postData['foto'] = $userOld['foto'];

                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                    $postData['foto'] = $userController->saveAvatar($_FILES['avatar']);
                }

                $responseUpdate = $userController->assocRequest($id, $postData);

                header("Location: ../app/views/usuario/CadastroAssociado.php?sucesso=send_request");
                exit;
            }
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
?>
