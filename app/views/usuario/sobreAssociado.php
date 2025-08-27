<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";

    // session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sobreAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Sobre Associados</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>

    <div class="container">
        <div class="initImg">
            <img src="/projeto-integrador-et.com/public/imagens/sobreAssociado/imgInicial.png" alt="">
        </div>

        <div class="initTitle">
            <div class="cont-title">
                <div class="titleIni">
                    <h1>ASSOCIADOS</h1>
                </div>
            </div>

            <center><div class="linha01"></div></center>
        </div>

        <div class="cont-text">
            <div class="text01">
                <h3>ASSOCIADOS ET.COM</h3>
                <p>O Programa de Associados ET.COM é a oportunidade ideal para quem deseja lucrar indicando nossos produtos. Ao se tornar associado, você pode divulgar nossa variedade de itens e, a cada venda realizada através da sua indicação, recebe comissões especiais.</p>
            </div>

            <div class="text02">
                <h3>COMO FUNCIONA O PROGRAMA DE ASSOCIADOS?</h3>
                <p>O Programa de Associados ET.COM permite que você divulgue nossos produtos em suas redes sociais, blog, site, canal no YouTube ou até mesmo por e-mail. A cada venda realizada por meio da sua divulgação, você recebe uma comissão previamente definida por nossos colaboradores.</br></br><strong>É simples. você compartilha, o cliente compra e você ganha!</strong></p>
            </div>
        </div>


        <div class="card">
            <div class="card-box">
                <div class="fundo">

                </div>

                <div class="logo">
                    <img src="/projeto-integrador-et.com/public/imagens/sobreAssociado/Logo01.png" alt="">
                </div>

                <div class="info">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>

                <div class="line">
                    <div></div>
                </div>

                <div class="button">
                    <button>Associar-se</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    echo createRodape();
    ?>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    
</body>
</html>