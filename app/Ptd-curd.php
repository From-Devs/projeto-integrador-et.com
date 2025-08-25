<?php
require "../router/ProdutoRouter.php"; // Usa a Router para chamar as ações

// Captura dados auxiliares
$subcategorias = $produtoController->ListarSubcategorias();
$cores = $produtoController->ListarCores();
$associados = $produtoController->ListarAssociados();

// Para edição
$editProdutoData = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])) {
    $editProdutoData = $produtoController->BuscarProdutoPorId($_GET['edit_id']);
}

// Listar todos os produtos
$responseList = $produtoController->ListarProdutos();
?>

<h2><?= $editProdutoData ? 'Editar Produto' : 'Cadastrar Produto' ?></h2>
<form method="POST" action="/projeto-integrador-et.com/router/ProdutoRouter.php?acao=<?= $editProdutoData ? 'EditarProduto' : 'CadastrarProduto' ?>" enctype="multipart/form-data">
    <?php if($editProdutoData): ?>
        <input type="hidden" name="id_produto" value="<?= $editProdutoData['id_produto'] ?>">
    <?php endif; ?>

    Nome: <input type="text" name="nome" value="<?= $editProdutoData['nome'] ?? '' ?>" required><br>
    Marca: <input type="text" name="marca" value="<?= $editProdutoData['marca'] ?? '' ?>" required><br>
    Descrição Breve: <input type="text" name="breveDescricao" value="<?= $editProdutoData['descricaoBreve'] ?? '' ?>"><br>
    Descrição Total: <input type="text" name="caracteristicasCompleta" value="<?= $editProdutoData['descricaoTotal'] ?? '' ?>"><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?= $editProdutoData['preco'] ?? '' ?>" required><br>
    Preço Promo: <input type="number" step="0.01" name="precoPromocional" value="<?= $editProdutoData['precoPromo'] ?? '' ?>"><br>

    <h4>Imagens</h4>
    Imagem 1: <input type="file" name="img1"><br>
    <?php if(!empty($editProdutoData['img_1'])): ?>
        <img src="/projeto-integrador-et.com/public/uploads/<?= basename($editProdutoData['img_1']) ?>" width="50"><br>
    <?php endif; ?>
    Imagem 2: <input type="file" name="img2"><br>
    <?php if(!empty($editProdutoData['img_2'])): ?>
        <img src="/projeto-integrador-et.com/public/uploads/<?= basename($editProdutoData['img_2']) ?>" width="50"><br>
    <?php endif; ?>
    Imagem 3: <input type="file" name="img3"><br>
    <?php if(!empty($editProdutoData['img_3'])): ?>
        <img src="/projeto-integrador-et.com/public/uploads/<?= basename($editProdutoData['img_3']) ?>" width="50"><br>
    <?php endif; ?>

    SubCategoria:
    <select name="id_subCategoria">
        <?php foreach($subcategorias as $sub): ?>
            <option value="<?= $sub['id_subCategoria'] ?>" <?= isset($editProdutoData['id_subCategoria']) && $editProdutoData['id_subCategoria'] == $sub['id_subCategoria'] ? 'selected' : '' ?>>
                <?= $sub['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    Cor:
    <select name="id_cores">
        <?php foreach($cores as $cor): ?>
            <option value="<?= $cor['id_cores'] ?>" <?= isset($editProdutoData['id_cores']) && $editProdutoData['id_cores'] == $cor['id_cores'] ? 'selected' : '' ?>>
                <?= $cor['corPrincipal'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    Associado:
    <select name="id_associado">
        <?php foreach($associados as $assoc): ?>
            <option value="<?= $assoc['id_usuario'] ?>" <?= isset($editProdutoData['id_associado']) && $editProdutoData['id_associado'] == $assoc['id_usuario'] ? 'selected' : '' ?>>
                <?= $assoc['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit"><?= $editProdutoData ? 'Atualizar' : 'Cadastrar' ?></button>
</form>

<h3>Lista de Produtos</h3>
<table border="1">
    <tr>
        <th>ID</th><th>Nome</th><th>Marca</th><th>Preço</th><th>Imagens</th><th>Ações</th>
    </tr>
    <?php foreach($responseList['data'] as $produto): ?>
        <tr>
            <td><?= $produto['id_produto'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['marca'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td>
                <?php if(!empty($produto['img_1'])): ?><img src="/projeto-integrador-et.com/public/uploads/<?= basename($produto['img_1']) ?>" width="50"><?php endif; ?>
                <?php if(!empty($produto['img_2'])): ?><img src="/projeto-integrador-et.com/public/uploads/<?= basename($produto['img_2']) ?>" width="50"><?php endif; ?>
                <?php if(!empty($produto['img_3'])): ?><img src="/projeto-integrador-et.com/public/uploads/<?= basename($produto['img_3']) ?>" width="50"><?php endif; ?>
            </td>
            <td>
                <form method="GET" style="display:inline;">
                    <input type="hidden" name="edit_id" value="<?= $produto['id_produto'] ?>">
                    <button type="submit">Editar</button>
                </form>
                <form method="POST" action="/projeto-integrador-et.com/router/ProdutoRouter.php?acao=DeletarProduto" style="display:inline;">
                    <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
