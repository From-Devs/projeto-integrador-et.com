<?php
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
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
    <div class="filtro">
        <button class="filtro-botao" type="button" onclick="toggleFiltro()">
            <img src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/filtroimg.png" alt="Ícone de filtro">Filtros
        </button>
    </div>
    
    <div id="form-filtro" class="filtro-box">
        <div class="form">
            <?php $telaAtual = $_GET["tela"] ?? "Maquiagem";
                renderSomenteSubcategorias($categoriasPorTela, $telaAtual);?>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/script.js"></script>
</body>
</html>