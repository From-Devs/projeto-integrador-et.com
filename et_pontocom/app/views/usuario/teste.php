<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
        

    session_start();
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
    $telaAtual = $_GET["tela"] ?? "Maquiagem";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Et.com</title>
    
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/produtoDestaque/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/cardLancamento/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/ondas/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/paginaPrincipal.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/style.css">

    <style>
        .filtro{
            margin-top: 100px;
        }
    </style>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>

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


    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/script.js"></script>
    <!-- <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/paginaPrincipalCategorias.js"></script> -->
</body>
</html>
