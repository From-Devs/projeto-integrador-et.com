<?php
require_once __DIR__ . "/../Controllers/ProdutoController.php";
require_once __DIR__ . "/../Controllers/CoresController.php";

$produtoController = new ProdutoController();
$coresController = new CoresController();

// Pega categorias e subcategorias
$categorias = $produtoController->listarCategorias();
$subcategorias = $produtoController->listarSubCategorias();

$msg = "";

// Quando enviar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        "nome"            => $_POST['nome'] ?? '',
        "marca"           => $_POST['marca'] ?? '',
        "descricaoBreve"  => $_POST['descricaoBreve'] ?? '',
        "descricaoTotal"  => $_POST['descricaoTotal'] ?? '',
        "preco"           => $_POST['preco'] ?? 0,
        "precoPromo"      => $_POST['precoPromo'] ?? 0,
        "fgPromocao"      => isset($_POST['fgPromocao']) ? 1 : 0,
        "qtdEstoque"      => $_POST['qtdEstoque'] ?? 0,
        "id_subCategoria" => $_POST['id_subCategoria'] ?? null,
        "id_associado"    => $_POST['id_associado'] ?? null,
        "corPrincipal"    => $_POST['corPrincipal'] ?? '',
        "hex1"            => $_POST['hex1'] ?? '',
        "hex2"            => $_POST['hex2'] ?? ''
    ];

    $files = $_FILES;

    if ($produtoController->criarProduto($dados, $files)) {
        $msg = "✅ Produto criado com sucesso!";
    } else {
        $msg = "❌ Erro ao criar produto!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 700px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
        label { font-weight: bold; }
        input, textarea, select { padding: 8px; width: 100%; }
        button { padding: 10px; background: #28a745; border: none; color: #fff; cursor: pointer; }
        button:hover { background: #218838; }
        .msg { margin: 10px 0; font-weight: bold; }
    </style>
</head>
<body>

<h2>Criar Produto</h2>
<?php if ($msg): ?>
  <p class="msg"><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Marca</label>
    <input type="text" name="marca">

    <label>Descrição Breve</label>
    <input type="text" name="descricaoBreve">

    <label>Descrição Completa</label>
    <textarea name="descricaoTotal"></textarea>

    <label>Preço</label>
    <input type="number" step="0.01" name="preco" required>

    <label>Preço Promocional</label>
    <input type="number" step="0.01" name="precoPromo">

    <label>Promoção?</label>
    <input type="checkbox" name="fgPromocao" value="1">

    <label>Quantidade em Estoque</label>
    <input type="number" name="qtdEstoque" required>

    <label>Subcategoria</label>
    <select name="id_subCategoria" required>
        <option value="">-- Selecione --</option>
        <?php foreach ($subcategorias as $sub): ?>
            <option value="<?= $sub['id_subCategoria'] ?>"><?= $sub['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label>ID Associado (opcional)</label>
    <input type="number" name="id_associado">

    <h3>Cores</h3>
    <label>Nome da Cor</label>
    <input type="text" name="corPrincipal">

    <label>Hex 1</label>
    <input type="color" name="hex1">

    <label>Hex 2</label>
    <input type="color" name="hex2">

    <h3>Imagens</h3>
    <label>Imagem 1</label>
    <input type="file" name="img1" accept="image/*">
    <label>Imagem 2</label>
    <input type="file" name="img2" accept="image/*">
    <label>Imagem 3</label>
    <input type="file" name="img3" accept="image/*">

    <button type="submit">Salvar Produto</button>
</form>

</body>
</html>
