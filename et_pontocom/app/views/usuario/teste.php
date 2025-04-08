<?php
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
    $telaAtual = $_GET["tela"] ?? "Maquiagem";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro de Produtos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/style.css">

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            margin: 20px
        }
    </style>

</head>
<body>
    <div class="filtro">
        <button class="filtro-botao" type="button" onclick="toggleFiltro()">
            <img src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/filtroimg.png" alt="Ícone de filtro">Filtros
        </button>
    </div>
    
    <div id="form-filtro" class="filtro-box">
        <div class="form">
            <?php 
            renderSomenteSubcategorias($categoriasPorTela, $telaAtual);
            ?>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/script.js"></script>
</body>
</html>