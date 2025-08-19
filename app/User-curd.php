<?php
require_once "./Controllers/UserController.php";

$userController = new UserController();
$responseCreate = null;
$responseDelete = null;
$responseUpdate = null;
$editUserData = null;

// Atualizar usuário
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

    // Se senha vazia, mantém a senha antiga para não sobrescrever com vazio
    if (empty($postData['senha'])) {
        $userOld = $userController->getUserById($_POST['update_id']);
        $postData['senha'] = $userOld['senha'];
    } else {
        // Se senha preenchida, faz hash
        $postData['senha'] = password_hash($postData['senha'], PASSWORD_DEFAULT);
    }

    $responseUpdate = $userController->editUser($_POST['update_id'], $postData);
}

// Criar usuário novo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !isset($_POST['update_id']) && !isset($_POST['delete_id']) && !isset($_POST['edit_id'])) {
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

// Excluir usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $responseDelete = $userController->deleteUser($_POST['delete_id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editUserData = $userController->getUserById($_POST['edit_id']);
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
    <h2><?= $editUserData ? 'Editar Usuário' : 'Formulário de Cadastro' ?></h2>

    <form method="POST" action="">
        <?php if ($editUserData): ?>
            <input type="hidden" name="update_id" value="<?= htmlspecialchars($editUserData['id_usuario']) ?>">
        <?php endif; ?>

        <label>Nome:
            <input type="text" name="nome" required
                value="<?= $editUserData ? htmlspecialchars($editUserData['nome']) : '' ?>">
        </label><br><br>

        <label>Nome Social:
            <input type="text" name="nome_social"
                value="<?= $editUserData ? htmlspecialchars($editUserData['nome_social']) : '' ?>">
        </label><br><br>

        <label>Email:
            <input type="email" name="email" required
                value="<?= $editUserData ? htmlspecialchars($editUserData['email']) : '' ?>">
        </label><br><br>

        <label>Telefone:
            <input type="text" name="telefone"
                value="<?= $editUserData ? htmlspecialchars($editUserData['telefone']) : '' ?>">
        </label><br><br>

        <label>CPF:
            <input type="text" name="cpf" required
                value="<?= $editUserData ? htmlspecialchars($editUserData['cpf']) : '' ?>">
        </label><br><br>

        <label>Data de Nascimento:
            <input type="date" name="data_nascimento"
                value="<?= $editUserData ? htmlspecialchars($editUserData['data_nascimento']) : '' ?>">
        </label><br><br>

        <label>Senha:
            <input type="password" name="senha" <?= $editUserData ? '' : 'required' ?>>
            <?php if ($editUserData): ?>
                <small>(Deixe vazio para manter a senha atual)</small>
            <?php endif; ?>
        </label><br><br>

        <label>Tipo:
            <select name="tipo">
                <option value="cliente" <?= $editUserData && $editUserData['tipo'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="associado" <?= $editUserData && $editUserData['tipo'] === 'associado' ? 'selected' : '' ?>>Associado</option>
            </select>
        </label><br><br>

        <button type="submit"><?= $editUserData ? 'Atualizar' : 'Cadastrar' ?></button>
        <?php if ($editUserData): ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>">Cancelar edição</a>
        <?php endif; ?>
    </form>

    <?php if ($responseCreate): ?>
        <h3>Resultado do Cadastro:</h3>
        <pre><?php print_r($responseCreate); ?></pre>
    <?php endif; ?>

    <?php if ($responseUpdate): ?>
        <h3>Resultado da Atualização:</h3>
        <pre><?php print_r($responseUpdate); ?></pre>
    <?php endif; ?>

    <?php if ($responseDelete): ?>
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
                <th>Ações</th>
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
                                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                            </form>
                            <!-- Form de edição -->
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
