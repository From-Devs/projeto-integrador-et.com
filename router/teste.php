<?php require "UserRoutes.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste Usuários</title>
    <style>
        body { background: #111; color: #fff; font-family: Arial; padding: 20px; }
        form { background: #222; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        input, select, button { width: 100%; padding: 8px; margin: 6px 0; border-radius: 4px; border: none; }
        button { background: #28a745; color: #fff; cursor: pointer; }
        button:hover { background: #218838; }
        .response { margin-top: 15px; padding: 10px; border-radius: 6px; background: #333; }
    </style>
</head>
<body>
    <h2>Teste Criar Usuário (MVC)</h2>

    <p>💡 Teste de Conexão: <?= $testeConexao ?></p>

    <?php if($responseCreate): ?>
        <div class="response" style="color: <?= $responseCreate['success'] ? 'lightgreen' : 'red' ?>">
            <?= htmlspecialchars($responseCreate['message']) ?>
        </div>
    <?php endif; ?>
    <?php if($responseUpdate): ?>
        <div class="response" style="color: <?= $responseUpdate['success'] ? 'lightgreen' : 'red' ?>">
            <?= htmlspecialchars($responseUpdate['message']) ?>
        </div>
    <?php endif; ?>
    <?php if($responseDelete): ?>
        <div class="response" style="color: <?= $responseDelete['success'] ? 'lightgreen' : 'red' ?>">
            <?= htmlspecialchars($responseDelete['message']) ?>
        </div>
    <?php endif; ?>
    <h3>Buscar Usuário por ID</h3>
    <form method="POST" action="teste.php?acao=getUser">
        <input type="number" name="edit_id" placeholder="Digite o ID do usuário" required>
        <button type="submit">Buscar</button>
    </form>

    <?php if($editUserData): ?>
        <div class="response" style="color: lightblue">
            <pre><?= print_r($editUserData, true) ?></pre>
        </div>
    <?php endif; ?>


    <h3>Criar Usuário</h3>
    <form method="POST" action="teste.php?acao=create">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="nome_social" placeholder="Nome Social">
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="text" name="cpf" placeholder="CPF" required>
        <input type="date" name="data_nascimento">
        <input type="password" name="senha" placeholder="Senha" required>
        <select name="tipo">
            <option value="cliente">Cliente</option>
            <option value="associado">Associado</option>
            <option value="admin">Administrador</option>
        </select>
        <button type="submit">Criar Usuário</button>
    </form>

    <h3>Usuários Cadastrados</h3>
    <?php foreach($usuarios as $u): ?>
        <form method="POST" action="teste.php?acao=update">
            <input type="hidden" name="update_id" value="<?= $u['id_usuario'] ?>">
            <input type="text" name="nome" value="<?= htmlspecialchars($u['nome']) ?>" required>
            <input type="text" name="nome_social" value="<?= htmlspecialchars($u['nome_social']) ?>">
            <input type="email" name="email" value="<?= htmlspecialchars($u['email']) ?>" required>
            <input type="text" name="telefone" value="<?= htmlspecialchars($u['telefone']) ?>">
            <input type="text" name="cpf" value="<?= htmlspecialchars($u['cpf']) ?>" required>
            <input type="date" name="data_nascimento" value="<?= htmlspecialchars($u['data_nascimento']) ?>">
            <input type="password" name="senha" placeholder="Deixe vazio para manter a senha">
            <select name="tipo">
                <option value="cliente" <?= $u['tipo'] === 'cliente' ? 'selected' : '' ?>>Cliente</option>
                <option value="associado" <?= $u['tipo'] === 'associado' ? 'selected' : '' ?>>Associado</option>
                <option value="admin" <?= $u['tipo'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
            </select>
            <button type="submit">Atualizar</button>
        </form>
        <form method="POST" action="teste.php?acao=delete" onsubmit="return confirm('Deseja realmente excluir?');">
            <input type="hidden" name="delete_id" value="<?= $u['id_usuario'] ?>">
            <button type="submit" style="background: #dc3545;">Excluir</button>
        </form>
    <?php endforeach; ?>


</body>
</html>
