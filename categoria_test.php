<?php
require_once "./Controllers/CategoryController.php";

$controller = new CategoryController();
$message = "";

// Criar Categoria
if (isset($_POST['create_categoria'])) {
    $nome = $_POST['nome_categoria'] ?? '';
    $res = $controller->createCategoria($nome);
    $message = $res['message'] ?? '';
}

// Criar SubCategoria
if (isset($_POST['create_subcategoria'])) {
    $nome = $_POST['nome_subcategoria'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';
    $res = $controller->createSubCategoria($nome, $id_categoria);
    $message = $res['message'] ?? '';
}

// Pegar todas categorias para listar
$allCategoriasResponse = $controller->listAllCategorias();
$allCategorias = $allCategoriasResponse['data'] ?? [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste Categoria</title>
</head>
<body>
    <h2>CRUD de Categoria e SubCategoria - Teste</h2>

    <?php if($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <!-- Formulário Categoria -->
    <h3>Criar Categoria</h3>
    <form method="POST">
        <input type="text" name="nome_categoria" placeholder="Nome da categoria" required>
        <button type="submit" name="create_categoria">Criar Categoria</button>
    </form>

    <!-- Formulário SubCategoria -->
    <h3>Criar SubCategoria</h3>
    <form method="POST">
        <select name="id_categoria" required>
            <option value="">Selecione uma categoria</option>
            <?php foreach($allCategorias as $cat): ?>
                <option value="<?= $cat['id_categoria'] ?>"><?= htmlspecialchars($cat['nome']) ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="nome_subcategoria" placeholder="Nome da subcategoria" required>
        <button type="submit" name="create_subcategoria">Criar SubCategoria</button>
    </form>

    <!-- Lista de Categorias e SubCategorias -->
    <h3>Lista de Categorias e SubCategorias</h3>
    <ul>
        <?php foreach($allCategorias as $cat): ?>
            <li>
                <?= htmlspecialchars($cat['nome']) ?>
                <ul>
                    <?php
                    $subsResponse = $controller->listSubCategorias($cat['id_categoria']);
                    $subs = $subsResponse['data'] ?? [];
                    foreach($subs as $sub):
                    ?>
                        <li><?= htmlspecialchars($sub['nome']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
