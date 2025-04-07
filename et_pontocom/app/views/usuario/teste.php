<?php
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
    $telaAtual = "Maquiagem";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro de Produtos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/style.css">

</head>
<body>
    <?php
    createFiltroCategoria($categoriasPorTela, $telaAtual);
    ?>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/script.js"></script>
</body>
</html>