<?php
require_once __DIR__ . '/../app/Controllers/ProdutoController.php';

$controller = new ProdutoController();
$produtos = $controller->listarTodos();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Listar Produtos</title>
<style>
table { border-collapse: collapse; width: 100%; }
th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
th { background: #f2f2f2; }
a { text-decoration: none; color: #007bff; }
</style>
</head>
<body>

<h2>Produtos</h2>
<a href="criarProduto.php">➕ Cadastrar Produto</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Marca</th>
        <th>Preço</th>
        <th>Qtd Estoque</th>
        <th>Ações</th>
    </tr>
    <?php foreach($produtos as $p): ?>
    <tr>
        <td><?= $p['id_produto'] ?></td>
        <td><?= htmlspecialchars($p['nome']) ?></td>
        <td><?= htmlspecialchars($p['marca']) ?></td>
        <td><?= number_format($p['preco'], 2, ',', '.') ?></td>
        <td><?= $p['qtdEstoque'] ?></td>
        <td>
            <a href="editarProduto.php?id=<?= $p['id_produto'] ?>">✏️ Editar</a> |
            <a href="removerProduto.php?id=<?= $p['id_produto'] ?>" onclick="return confirm('Tem certeza?')">🗑️ Remover</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
