<?php
require_once __DIR__ . '/../app/Controllers/ProdutoController.php';

$controller = new ProdutoController();
$msg = "";
$subcategorias = $controller->listarSubCategorias();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $dados = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'fgPromocao' => isset($_POST['fgPromocao']) ? 1 : 0,
        'qtdEstoque' => $_POST['qtdEstoque'] ?? 0,
        'id_subCategoria' => $_POST['subCategoria'] ?? null,
        'corPrincipal' => $_POST['corPrincipal'] ?? '',
        'hex1' => $_POST['hex1'] ?? '',
        'hex2' => $_POST['hex2'] ?? '',
        'id_associado' => null
    ];
    if($controller->criarProduto($dados, $_FILES)){
        $msg = "✅ Produto criado com sucesso!";
    }else{
        $msg = "❌ Erro ao criar produto!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Cadastrar Produto</title>
</head>
<body>
<h2>Cadastrar Produto</h2>
<?php if($msg) echo "<p>$msg</p>"; ?>
<form method="POST" enctype="multipart/form-data">
    <label>Nome</label><input type="text" name="nome" required>
    <label>Marca</label><input type="text" name="marca">
    <label>Descrição Breve</label><input type="text" name="descricaoBreve">
    <label>Descrição Total</label><textarea name="descricaoTotal"></textarea>
    <label>Preço</label><input type="number" step="0.01" name="preco">
    <label>Preço Promo</label><input type="number" step="0.01" name="precoPromo">
    <label>Promoção?</label><input type="checkbox" name="fgPromocao">
    <label>Qtd Estoque</label><input type="number" name="qtdEstoque">
    <label>Subcategoria</label>
    <select name="subCategoria">
        <option value="">-- Selecione --</option>
        <?php foreach($subcategorias as $sub): ?>
        <option value="<?= $sub['id_subCategoria'] ?>"><?= htmlspecialchars($sub['nome']) ?></option>
        <?php endforeach; ?>
    </select>
    <h3>Cores</h3>
    <label>Cor Principal</label><input type="text" name="corPrincipal">
    <label>Hex1</label><input type="color" name="hex1">
    <label>Hex2</label><input type="color" name="hex2">
    <h3>Imagens</h3>
    <input type="file" name="img1">
    <input type="file" name="img2">
    <input type="file" name="img3">
    <button type="submit">Cadastrar</button>
</form>
<a href="listarProdutos.php">⬅ Voltar</a>
</body>
</html>
