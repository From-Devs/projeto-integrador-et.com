<?php

require __DIR__."../../Models/produto.php";
require __DIR__."../../../public/componentes/pesquisaHeader/listaProdutos.php";

$host = "localhost";
$user = "root";
$pass = '';
$db = "et_pontocom"; 
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

$termo = isset($_GET['q']) ? trim($_GET['q']) : '';
$produtos = [];

if ($termo !== '') {
    $produtoModel = new Produto($conn);
    $produtos = $produtoModel->pesquisar($termo);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="../../public/componentes/pesquisaHeader/style.css">
</head>
<body>
    <header>
        <?php require __DIR__."../../../public/componentes/pesquisaHeader/pesquisaHeader.php";
              echo createPesquisaHeader(); ?>
    </header>

    <main>
        <h1>Resultados para: <?= htmlspecialchars($termo) ?></h1>
        <?= listaProdutos($produtos) ?>
    </main>
</body>
</html>
