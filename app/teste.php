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

if(empty($subcategorias) || empty($cores) || empty($associados)){
    die("⚠️ Cadastre pelo menos uma subcategoria, uma cor e um associado antes de criar produtos.");
}

// Função de upload para múltiplas imagens
function handleUploadMultiple($fieldName){
    $uploads = [];
    for ($i=0; $i<3; $i++){
        $fileKey = $fieldName.'['.$i.']';
        if(isset($_FILES[$fieldName]['name'][$i]) && $_FILES[$fieldName]['error'][$i] === UPLOAD_ERR_OK){
            $nomeArquivo = time().'_'.$i.'_'.basename($_FILES[$fieldName]['name'][$i]);
            $caminhoDestino = __DIR__.'/public/uploads/'.$nomeArquivo;
            if(!is_dir(__DIR__.'/public/uploads')){
                mkdir(__DIR__.'/public/uploads', 0777, true);
            }
            if(move_uploaded_file($_FILES[$fieldName]['tmp_name'][$i], $caminhoDestino)){
                $uploads[$i] = 'public/uploads/'.$nomeArquivo;
            }
        }
    }
    return $uploads;
}

// Atualizar Produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_id'])) {
    $uploads = handleUploadMultiple('img');
    $postData = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'img_1' => $uploads[0] ?? $_POST['img_1'] ?? '',
        'img_2' => $uploads[1] ?? $_POST['img_2'] ?? '',
        'img_3' => $uploads[2] ?? $_POST['img_3'] ?? '',
        'id_subCategoria' => $_POST['id_subCategoria'] ?? $subcategorias[0]['id_subCategoria'],
        'id_cores' => $_POST['id_cores'] ?? $cores[0]['id_cores'],
        'id_associado' => $_POST['id_associado'] ?? $associados[0]['id_associado']
    ];
    $responseUpdate = $productsController->editProduto($_POST['update_id'], $postData);
}

// Criar Produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && !isset($_POST['update_id']) && !isset($_POST['delete_id']) && !isset($_POST['edit_id'])) {
    $uploads = handleUploadMultiple('img');
    $postData = [
        'nome' => $_POST['nome'] ?? '',
        'marca' => $_POST['marca'] ?? '',
        'descricaoBreve' => $_POST['descricaoBreve'] ?? '',
        'descricaoTotal' => $_POST['descricaoTotal'] ?? '',
        'preco' => $_POST['preco'] ?? 0,
        'precoPromo' => $_POST['precoPromo'] ?? 0,
        'img_1' => $uploads[0] ?? 'public/uploads/default.jpg',
        'img_2' => $uploads[1] ?? 'public/uploads/default.jpg',
        'img_3' => $uploads[2] ?? 'public/uploads/default.jpg',
        'id_subCategoria' => $_POST['id_subCategoria'] ?? $subcategorias[0]['id_subCategoria'],
        'id_cores' => $_POST['id_cores'] ?? $cores[0]['id_cores'],
        'id_associado' => $_POST['id_associado'] ?? $associados[0]['id_associado']
    ];
    $responseCreate = $productsController->createProduto($postData);
}

// Excluir Produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $responseDelete = $productsController->deleteProduto($_POST['delete_id']);
}

// Editar Produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $editProdutoData = $productsController->getProdutoById($_POST['edit_id']);
}

$responseList = $productsController->listAllProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

<h2 class="mb-4"><?= $editProdutoData ? '✏️ Editar Produto' : '➕ Cadastrar Produto' ?></h2>

<form method="POST" action="" enctype="multipart/form-data" class="row g-3 mb-5">
    <?php if($editProdutoData): ?>
        <input type="hidden" name="update_id" value="<?= $editProdutoData['id_produto'] ?>">
    <?php endif; ?>

    <div class="col-md-6">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= $editProdutoData['nome'] ?? '' ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Marca</label>
        <input type="text" class="form-control" name="marca" value="<?= $editProdutoData['marca'] ?? '' ?>" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Descrição Breve</label>
        <input type="text" class="form-control" name="descricaoBreve" value="<?= $editProdutoData['descricaoBreve'] ?? '' ?>">
    </div>
    <div class="col-md-6">
        <label class="form-label">Descrição Completa</label>
        <textarea class="form-control" name="descricaoTotal"><?= $editProdutoData['descricaoTotal'] ?? '' ?></textarea>
    </div>
    <div class="col-md-3">
        <label class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" name="preco" value="<?= $editProdutoData['preco'] ?? '' ?>" required>
    </div>
    <div class="col-md-3">
        <label class="form-label">Preço Promo</label>
        <input type="number" step="0.01" class="form-control" name="precoPromo" value="<?= $editProdutoData['precoPromo'] ?? '' ?>">
    </div>

    <div class="col-md-4">
        <label class="form-label">Imagens (até 3)</label>
        <input type="file" class="form-control" name="img[]" multiple>
        <?php for($i=1; $i<=3; $i++):
            $imgField = 'img_'.$i;
            if(!empty($editProdutoData[$imgField])): ?>
                <img src="<?= $editProdutoData[$imgField] ?>" class="img-thumbnail mt-2 me-2" width="80">
        <?php endif; endfor; ?>
    </div>

    <div class="col-md-4">
        <label class="form-label">SubCategoria</label>
        <select class="form-select" name="id_subCategoria">
            <?php foreach($subcategorias as $sub): ?>
                <option value="<?= $sub['id_subCategoria'] ?>" <?= isset($editProdutoData['id_subCategoria']) && $editProdutoData['id_subCategoria']==$sub['id_subCategoria']?'selected':'' ?>>
                    <?= $sub['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Cor</label>
        <select class="form-select" name="id_cores">
            <?php foreach($cores as $cor): ?>
                <option value="<?= $cor['id_cores'] ?>" <?= isset($editProdutoData['id_cores']) && $editProdutoData['id_cores']==$cor['id_cores']?'selected':'' ?>>
                    <?= $cor['corPrincipal'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Associado</label>
        <select class="form-select" name="id_associado">
            <?php foreach($associados as $assoc): ?>
                <option value="<?= $assoc['id_usuario'] ?>" <?= isset($editProdutoData['id_associado']) && $editProdutoData['id_associado']==$assoc['id_usuario']?'selected':'' ?>>
                    <?= $assoc['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-<?= $editProdutoData?'warning':'success' ?>">
            <?= $editProdutoData?'Atualizar Produto':'Cadastrar Produto' ?>
        </button>
    </div>
</form>

<?php if($responseCreate): ?><div class="alert alert-success"><?= $responseCreate['message'] ?></div><?php endif; ?>
<?php if($responseUpdate): ?><div class="alert alert-info"><?= $responseUpdate['message'] ?></div><?php endif; ?>
<?php if($responseDelete): ?><div class="alert alert-danger"><?= $responseDelete['message'] ?></div><?php endif; ?>

<h3>📦 Lista de Produtos</h3>
<table class="table table-striped table-bordered mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th><th>Nome</th><th>Marca</th><th>Preço</th><th>Imagens</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($responseList['data'] as $produto): ?>
            <tr>
                <td><?= $produto['id_produto'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['marca'] ?></td>
                <td>R$ <?= number_format($produto['preco'],2,',','.') ?></td>
                <td>
                    <?php for($i=1;$i<=3;$i++):
                        $imgField = 'img_'.$i;
                        if(!empty($produto[$imgField])): ?>
                            <img src="<?= $produto[$imgField] ?>" class="img-thumbnail me-1" width="50">
                    <?php endif; endfor; ?>
                </td>
                <td>
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="delete_id" value="<?= $produto['id_produto'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="edit_id" value="<?= $produto['id_produto'] ?>">
                        <button type="submit" class="btn btn-sm btn-warning">Editar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
