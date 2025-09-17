<?php
require_once __DIR__ . '/../app/Controllers/ProdutoController.php';

$controller = new ProdutoController();
$msg = "";

if(!isset($_GET['id'])){
    die("ID do produto não informado");
}

$id = intval($_GET['id']);
$produto = $controller->getProduto($id);
$subcategorias = $controller->listarSubCategorias();

if(!$produto) die("Produto não encontrado");

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
    if($controller->editarProduto($id, $dados, $_FILES)){
        $msg = "✅ Produto atualizado com sucesso!";
        $produto = $controller->getProduto($id); // atualiza dados
    }else{
        $msg = "❌ Erro ao atualizar produto!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Editar Produto</title>
</head>
<body>
<h2>Editar Produto</h2>
<?php if($msg) echo "<p>$msg</p>"; ?>
<form method="POST" enctype="multipart/form-data">
    <label>Nome</label><input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    <label>Marca</label><input type="text" name="marca" value="<?= htmlspecialchars($produto['marca']) ?>">
    <label>Descrição Breve</label><input type="text" name="descricaoBreve" value="<?= htmlspecialchars($produto['descricaoBreve']) ?>">
    <label>Descrição Total</label><textarea name="descricaoTotal"><?= htmlspecialchars($produto['descricaoTotal']) ?></textarea>
    <label>Preço</label><input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>">
    <label>Preço Promo</label><input type="number" step="0.01" name="precoPromo" value="<?= $produto['precoPromo'] ?>">
    <label>Promoção?</label><input type="checkbox" name="fgPromocao" <?= $produto['fgPromocao'] ? "checked" : "" ?>>
    <label>Qtd Estoque</label><input type="number" name="qtdEstoque" value="<?= $produto['qtdEstoque'] ?>">
    <label>Subcategoria</label>
    <select name="subCategoria">
        <option value="">-- Selecione --</option>
        <?php foreach($subcategorias as $sub): ?>
        <option value="<?= $sub['id_subCategoria'] ?>" <?= $produto['id_subCategoria']==$sub['id_subCategoria']?"selected":"" ?>><?= htmlspecialchars($sub['nome']) ?></option>
        <?php endforeach; ?>
    </select>
    <h3>Cores</h3>
    <label>Cor Principal</label><input type="text" name="corPrincipal" value="<?= htmlspecialchars($produto['corPrincipal'] ?? '') ?>">
    <label>Hex1</label><input type="color" name="hex1" value="<?= $produto['hex1'] ?? '#ffffff' ?>">
    <label>Hex2</label><input type="color" name="hex2" value="<?= $produto['hex2'] ?? '#ffffff' ?>">
    <h3>Imagens</h3>
    <input type
