<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";

    session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/listaDeDesejos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/cardProduto/styles.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <div class="title-container">
        <div class="title">
            <h1>MINHA LISTA DE DESEJOS</h1>
        </div>
        <center><div class="line"></div></center>
    </div>

    <div class="container">
        <div class="card-container">
            <div class="card01">
                <div class="cardImg01">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/listaDeDesejos/prod01.png" alt="">
                </div>

                <div class="cardPreco01">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo01">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate01">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardCheck01">
                    <input type="checkbox">
                </div>
            </div>

            <div class="card02">
                <div class="cardImg02">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/listaDeDesejos/prod02.png" alt="">
                </div>

                <div class="cardPreco02">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo02">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate02">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardCheck02">
                    <input type="checkbox">
                </div>
            </div>

            <div class="card03">
                <div class="cardImg03">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/listaDeDesejos/prod03.png" alt="">
                </div>

                <div class="cardPreco03">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo03">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate03">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardCheck03">
                    <input type="checkbox">
                </div>
            </div>

            <div class="card04">
                <div class="cardImg04">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/listaDeDesejos/prod04.png" alt="">
                </div>

                <div class="cardPreco04">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo04">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate04">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardCheck04">
                    <input type="checkbox">
                </div>
            </div>
        </div>
    </div>

    <div class="button-container">
        <div class="button01">
            <button type="submit"><img src="/projeto-integrador-et.com/et_pontocom/public/imagens/listaDeDesejos/imgButton.png" alt=""><p>Adicionar ao carrinho</p></button>
        </div>

        <div class="button02">
            <button type="submit"><p>Excluir</p></button>
        </div>
    </div>

    <center><div class="line2"></div></center>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/slider.js"></script>
    
    
</body>
</html>