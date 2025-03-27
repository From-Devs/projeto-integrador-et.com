<?php
    require __DIR__."/../../../public/componentes/header/header.php";
    require __DIR__."/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__."/../../../public/componentes/botao/botao.php";
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "associado";
    $login = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../../public/componentes/header/styles.css">
    <link rel="stylesheet" href="./../../../public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="./../../../public/componentes/botao/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../../public/css/PaginaCategorias.css">
    <title>Perfumes</title>
</head>
<body>
<?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>
    <div class="Topo">
        <h1 class="Titulo">Perfume</h1>
        <!-- <section>
            <div class="wave wave1"></div>
        </section>
         -->
    </div>
    <div class="Produtos">
        <div class="PartedeCima">
            <button class="filtro">
            <img src="../../../public/imagens/PaginaCategoria/Filtro.png" alt="filtro">    
            <b><h3 class="nomeFiltro">Filtros</h3></b></button>
            <h3>Produtos</h3>
        <!-- Fazer os itens do popup e depois tentar fazer se tornar realmente um popup -->
        </div>
        <div class="PartedeBaixo">
            <?php createCardProduto("Vult","Base Líquido Efeito","R$ 30,00","/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/produtos/imagem3.png") ?>
        </div>
    </div>
    <script src="./../../../public/componentes/header/script.js"></script>
    <script src="./../../../public/componentes/sidebar/script.js"></script>
</body>
</html>