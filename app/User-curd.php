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

    // Se senha vazia, mantém a senha antiga
    if (empty($postData['senha'])) {
        $userOld = $userController->getUserById($_POST['update_id']);
        $postData['senha'] = $userOld['senha'];
    } else {
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

// Editar usuário
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
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f5f5;
        color: #333;
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #444;
    }

    form {
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        max-width: 500px;
        margin: 0 auto 30px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="password"],
    select,
    input[type="file"] {
        width: 100%;
        padding: 8px 12px;
        margin-top: 5px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
        box-sizing: border-box;
    }

    input[type="file"] {
        padding: 3px;
    }

    button {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #555;
        margin-left: 10px;
    }

    small {
        color: #666;
    }

    img.preview {
        margin-top: 5px;
        max-width: 120px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    form.inline {
        display: inline-block;
        margin: 0;
    }

    .message pre {
        background: #f0f0f0;
        padding: 10px;
        border-radius: 6px;
        overflow-x: auto;
    }
</style>
</head>
<body>

<h2><?= $editUserData ? 'Editar Usuário' : 'Formulário de Cadastro' ?></h2>

<form method="POST" action="" enctype="multipart/form-data">
    <?php if ($editUserData): ?>
        <input type="hidden" name="update_id" value="<?= htmlspecialchars($editUserData['id_usuario']) ?>">
    <?php endif; ?>

    <label>Nome:
        <input type="text" name="nome" required
            value="<?= $editUserData ? htmlspecialchars($editUserData['nome']) : '' ?>">
    </label>

    <label>Nome Social:
        <input type="text" name="nome_social"
            value="<?= $editUserData ? htmlspecialchars($editUserData['nome_social']) : '' ?>">
    </label>

    <label>Email:
        <input type="email" name="email" required
            value="<?= $editUserData ? htmlspecialchars($editUserData['email']) : '' ?>">
    </label>

    <label>Telefone:
        <input type="text" name="telefone"
            value="<?= $editUserData ? htmlspecialchars($editUserData['telefone']) : '' ?>">
    </label>

    <label>CPF:
        <input type="text" name="cpf" required
            value="<?= $editUserData ? htmlspecialchars($editUserData['cpf']) : '' ?>">
    </label>

    <label>Data de Nascimento:
        <input type="date" name="data_nascimento"
            value="<?= $editUserData ? htmlspecialchars($editUserData['data_nascimento']) : '' ?>">
    </label>

    <label>Senha:
        <input type="password" name="senha" <?= $editUserData ? '' : 'required' ?>>
        <?php if ($editUserData): ?>
            <small>(Deixe vazio para manter a senha atual)</small>
        <?php endif; ?>
    </label>

    <label>Tipo:
        <select name="tipo">
            <option value="cliente" <?= $editUserData && $editUserData['tipo'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
            <option value="associado" <?= $editUserData && $editUserData['tipo'] === 'associado' ? 'selected' : '' ?>>Associado</option>
        </select>
    </label>

    <!-- Upload de imagem só na edição -->
    <?php if ($editUserData): ?>
    <label>Foto:
        <input type="file" name="foto" accept="image/*">
        <?php if (!empty($editUserData['foto'])): ?>
            <br>
            <img class="preview" src="<?= htmlspecialchars($editUserData['foto']) ?>" alt="Foto atual">
        <?php endif; ?>
    </label>
    <?php endif; ?>

    <button type="submit"><?= $editUserData ? 'Atualizar' : 'Cadastrar' ?></button>
    <?php if ($editUserData): ?>
        <a href="<?= $_SERVER['PHP_SELF'] ?>">Cancelar edição</a>
    <?php endif; ?>
</form>

<!-- Mensagens de retorno -->
<?php if ($responseCreate): ?>
<div class="message">
    <h3>Resultado do Cadastro:</h3>
    <pre><?php print_r($responseCreate); ?></pre>
</div>
<?php endif; ?>

<?php if ($responseUpdate): ?>
<div class="message">
    <h3>Resultado da Atualização:</h3>
    <pre><?php print_r($responseUpdate); ?></pre>
</div>
<?php endif; ?>

<?php if ($responseDelete): ?>
<div class="message">
    <h3>Resultado da Exclusão:</h3>
    <pre><?php print_r($responseDelete); ?></pre>
</div>
<?php endif; ?>

<!-- Lista de usuários -->
<h3>Lista de Usuários:</h3>
<table>
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
                    <form method="POST" class="inline">
                        <input type="hidden" name="delete_id" value="<?= $user['id_usuario'] ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                    </form>
                    <form method="POST" class="inline">
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
