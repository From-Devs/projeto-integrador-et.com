<?php
require_once "./Controllers/UserController.php";

$userController = new UserController();
$responseCreate = null;
$responseDelete = null;
$editUserData = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
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
    $responseUpdate = $userController->updateUser($_POST['update_id'], $postData);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) {
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

    $responseCreate = $userController->createUser($postData);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $responseDelete = $userController->deleteUser($_POST['delete_id']); // <-- chama método de exclusão
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editUserData  = $userController->getUserById($_POST['edit_id']);
}

$responseList = $userController->listAllUsers();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Formulário de Cadastro</h2>
    <form method="POST" action="">
        <label>Nome: <input type="text" name="nome" required></label><br><br>
        <label>Nome Social: <input type="text" name="nome_social"></label><br><br>
        <label>Email: <input type="email" name="email" required></label><br><br>
        <label>Telefone: <input type="text" name="telefone"></label><br><br>
        <label>CPF: <input type="text" name="cpf" required></label><br><br>
        <label>Data de Nascimento: <input type="date" name="data_nascimento"></label><br><br>
        <label>Senha: <input type="password" name="senha" required></label><br><br>
        <label>Tipo:
            <select name="tipo">
                <option value="cliente">Cliente</option>
                <option value="associado">Associado</option>
            </select>
        </label><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($responseCreate): ?>
        <h3>Resultado do Cadastro:</h3>
        <pre><?php print_r($responseCreate); ?></pre>
    <?php endif; ?>

    <?php if ($responseDelete): ?> <!-- Mostra resultado da exclusão -->
        <h3>Resultado da Exclusão:</h3>
        <pre><?php print_r($responseDelete); ?></pre>
    <?php endif; ?>

    <h3>Lista de Usuários:</h3>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Nome Social</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Tipo</th>
                <th>Ações</th> <!-- nova coluna para exclusão -->
            </tr>
        </thead>
        <tbody>
            <?php if ($responseList['success']): ?>
                <?php foreach ($responseList['data'] as $user): ?>
                    <tr>
                        <td><?= $user['id_usuario'] ?></td>
                        <td><?= htmlspecialchars($user['nome']) ?></td>
                        <td><?= htmlspecialchars($user['nome_social']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['cpf']) ?></td>
                        <td><?= htmlspecialchars($user['tipo']) ?></td>
                        <td>
                            <!-- Form de exclusão -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?= $user['id_usuario'] ?>">
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    Excluir
                                </button>
                            </form>
                            <!-- Botão de edição -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="edit_id" value="<?= $user['id_usuario'] ?>">
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">Nenhum usuário encontrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

<?php
// require_once "./Controllers/UserController.php";

// $userController = new UserController();

// $postData = [
//     'nome' => '1',
//     'nome_social' => '1',
//     'email' => '1',
//     'telefone' => '11999999999',
//     'cpf' => '123.456.789-00',
//     'data_nascimento' => '1911-01-01',
//     'senha' => '1',
//     'tipo' => 'cliente',
//     'foto' => null,
//     'id_endereco' => null
// ];

// $response = $userController->createUser($postData);

// echo "<h3>Resultado do cadastro:</h3>";
// echo "<pre>";
// print_r($responseCreate);
// echo "</pre>";

// $responseList = $userController->listAllUsers();

// echo "<h3>Lista de usuários:</h3>";
// echo "<pre>";
// print_r($responseList);
// echo "</pre>";
?>
