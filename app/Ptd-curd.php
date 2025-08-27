<?php
require_once "./Controllers/ProductsController.php";

$productsController = new ProductsController();
$responseCreate = null;
$responseDelete = null;
$responseUpdate = null;
$editProdutoData = null;

// Buscar dados auxiliares
$subcategorias = $productsController->listSubcategorias();
$cores = $productsController->listCores();
$associados = $productsController->listAssociados();

// Se não houver subcategorias, cores ou associados, mostrar erro
if(empty($subcategorias) || empty($cores) || empty($associados)){
    die("Erro: Cadastre pelo menos uma subcategoria, uma cor e um associado antes de criar produtos.");
}

// Função para upload de imagem
function handleUpload(){
    if(isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK){
        $nomeArquivo = time() . '_' . basename($_FILES['imagem']['name']);
        $caminhoDestino = __DIR__ . '/public/uploads/' . $nomeArquivo;

        // Cria pasta se não existir
        if(!is_dir(__DIR__ . '/public/uploads')){
            mkdir(__DIR__ . '/public/uploads', 0777, true);
        }

        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino)){
            return 'public/uploads/' . $nomeArquivo;
        }
    }
    return null;
}

// Atualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $postData = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'imagem' => handleUpload() ?? $_POST['imagem'] ?? 'public/uploads/default.png',
        'id_subCategoria' => $_POST['id_subCategoria'] ?? $subcategorias[0]['id_subCategoria'],
        'id_cores' => $_POST['id_cores'] ?? $cores[0]['id_cores'],
        'id_associado' => $_POST['id_associado'] ?? $associados[0]['id_associado']
    ];
    $responseUpdate = $productsController->editProduto($_POST['update_id'], $postData);
}

// Criar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !isset($_POST['update_id']) && !isset($_POST['delete_id']) && !isset($_POST['edit_id'])) {
    $postData = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'imagem' => handleUpload() ?? 'public/uploads/default.png',
        'id_subCategoria' => $_POST['id_subCategoria'] ?? $subcategorias[0]['id_subCategoria'],
        'id_cores' => $_POST['id_cores'] ?? $cores[0]['id_cores'],
        'id_associado' => $_POST['id_associado'] ?? $associados[0]['id_associado']
    ];
    $responseCreate = $productsController->createProduto($postData);
}

// Excluir
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $responseDelete = $productsController->deleteProduto($_POST['delete_id']);
}

// Editar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editProdutoData = $productsController->getProdutoById($_POST['edit_id']);
}

// Listar produtos
$responseList = $productsController->listAllProdutos();
?>

<h2><?= $editProdutoData ? 'Editar Produto' : 'Cadastrar Produto' ?></h2>
<form method="POST" action="" enctype="multipart/form-data">
    <?php if ($editProdutoData): ?>
        <input type="hidden" name="update_id" value="<?= $editProdutoData['id_produto'] ?>">
    <?php endif; ?>

    Nome: <input type="text" name="nome" value="<?= $editProdutoData['nome'] ?? '' ?>" required><br>
    Marca: <input type="text" name="marca" value="<?= $editProdutoData['marca'] ?? '' ?>" required><br>
    Descrição Breve: <input type="text" name="descricaoBreve" value="<?= $editProdutoData['descricaoBreve'] ?? '' ?>"><br>
    Descrição Total: <input type="text" name="descricaoTotal" value="<?= $editProdutoData['descricaoTotal'] ?? '' ?>"><br>
    Preço: <input type="number" step="0.01" name="preco" value="<?= $editProdutoData['preco'] ?? '' ?>" required><br>
    Preço Promo: <input type="number" step="0.01" name="precoPromo" value="<?= $editProdutoData['precoPromo'] ?? '' ?>"><br>
    
    Imagem: <input type="file" name="imagem"><br>
    <?php if(!empty($editProdutoData['imagem'])): ?>
        <img src="<?= $editProdutoData['imagem'] ?>" width="100"><br>
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

<?php if ($responseCreate): ?>
    <p><?= $responseCreate['message'] ?></p>
<?php endif; ?>
<?php if ($responseUpdate): ?>
    <p><?= $responseUpdate['message'] ?></p>
<?php endif; ?>
<?php if ($responseDelete): ?>
    <p><?= $responseDelete['message'] ?></p>
<?php endif; ?>

<h3>Lista de Produtos</h3>
<table border="1">
    <tr>
        <th>ID</th><th>Nome</th><th>Marca</th><th>Preço</th><th>Imagem</th><th>Ações</th>
    </tr>
    <?php foreach ($responseList['data'] as $produto): ?>
        <tr>
            <td><?= $produto['id_produto'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td><?= $produto['marca'] ?></td>
            <td><?= $produto['preco'] ?></td>
            <td>
                <?php if(!empty($produto['imagem'])): ?>
                    <img src="<?= $produto['imagem'] ?>" width="50">
                <?php endif; ?>
            </td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $produto['id_produto'] ?>">
                    <button type="submit">Excluir</button>
                </form>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="edit_id" value="<?= $produto['id_produto'] ?>">
                    <button type="submit">Editar</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
