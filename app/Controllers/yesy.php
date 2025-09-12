<?php

require_once __DIR__ . '/../Models/ProdutoModel.php';
require_once __DIR__ . '/../Models/CategoriaModel.php';
require_once __DIR__ . '/../Models/CoresModel.php';
require_once __DIR__ . '/../Controllers/ProdutoController.php';

// Instanciar controllers/modelos
$produtoController = new ProdutoController();
$categoriaModel = new CategoriaModel();

// Pegar todas as categorias
$categorias = $categoriaModel->getAll();

// Processar formulário
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'fgPromocao' => isset($_POST['fgPromocao']) ? 1 : 0,
        'qtdEstoque' => $_POST['qtdEstoque'] ?? 0,
        'id_subCategoria' => $_POST['id_subCategoria'] ?? null,
        'id_associado' => $_POST['id_associado'] ?? null,
        'corPrincipal' => $_POST['corPrincipal'] ?? '#ffffff',
        'hex1' => $_POST['hex1'] ?? '#ffffff',
        'hex2' => $_POST['hex2'] ?? '#ffffff'
    ];

    if ($produtoController->criarProduto($dados, $_FILES)) {
        $mensagem = "Produto criado com sucesso!";
    } else {
        $mensagem = "Erro ao criar produto!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar Produto</h1>

    <?php if ($mensagem): ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Marca:</label>
        <input type="text" name="marca" required><br>

        <label>Descrição Breve:</label>
        <input type="text" name="descricaoBreve"><br>

        <label>Descrição Completa:</label>
        <textarea name="descricaoTotal"></textarea><br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required><br>

        <label>Preço Promocional:</label>
        <input type="number" step="0.01" name="precoPromo"><br>

        <label>Em promoção?</label>
        <input type="checkbox" name="fgPromocao" value="1"><br>

        <label>Quantidade em Estoque:</label>
        <input type="number" name="qtdEstoque" value="0"><br>

        <label>Categoria/Subcategoria:</label>
        <select name="id_subCategoria">
            <option value="">--Selecione--</option>
            <?php foreach ($categorias as $cat): ?>
                <?php
                $subcategorias = $categoriaModel->getSubCategoriasPorCategoria($cat['id_categoria']);
                foreach ($subcategorias as $sub):
                ?>
                    <option value="<?= $sub['id_subcategoria'] ?>">
                        <?= htmlspecialchars($cat['nome'] . ' > ' . $sub['nome']) ?>
                    </option>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </select><br>

        <h3>Cores</h3>
        <label>Cor Principal:</label>
        <input type="color" name="corPrincipal" value="#ffffff"><br>
        <label>Degrade 1:</label>
        <input type="color" name="hex1" value="#ffffff"><br>
        <label>Degrade 2:</label>
        <input type="color" name="hex2" value="#ffffff"><br>

        <h3>Imagens</h3>
        <label>Imagem 1:</label>
        <input type="file" name="img1" accept="image/*" required><br>
        <label>Imagem 2:</label>
        <input type="file" name="img2" accept="image/*"><br>
        <label>Imagem 3:</label>
        <input type="file" name="img3" accept="image/*"><br>

        <button type="submit">Criar Produto</button>
    </form>
</body>
</html>
