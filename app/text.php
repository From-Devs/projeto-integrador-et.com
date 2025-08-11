<?php
require_once "./Controllers/UserController.php";

$userController = new UserController();
$responseCreate = null;

// Se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Nenhum usuário encontrado.</td></tr>
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