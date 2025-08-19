<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    
    
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/Tornar_Associado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/ondas/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/661f108459.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
    <title>Document</title>

</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <section class="promo-section">
        <div class="filtroDegrade"></div>
        
        <div class="promo-content">
            <div class="promo-contentEsquerda">
                <div class="promoContentText">
                    <h2>Torne-se um(a) associado(a) ET!</h2>
                    <p>Seja bem-vindo ao programa de marketing de associados da nossa empresa ETCOM. O Programa de Associados ETCOM ajuda vendedores, editores e blogueiros a monetizarem seus sites.</p>
                </div>
                <div class="botoesContainer">
                    <?php
                    echo botaoPersonalizadoRedirect("Saiba Mais", "btn-white", "app/views/usuario/sobreAssociado.php", "240px", "60px", "25px");
                    ?>
                    <?php
                    echo botaoPersonalizadoRedirect("Associar-se", "btn-white", "app/views/usuario/CadastroAssociado.php", "240px", "60px", "25px");
                    ?>
                </div>
            </div>
            <div class="karla">
                <img  class="promo-image" src="/projeto-integrador-et.com/public/imagens/TornarAssociado/moça.png" alt="Promo Image">
                <div class="blurNomeKarla">
                    <h1 class="nomeKarla">Karla</h1>
                    <h2 class="cargoKarla">Associada ET</h2>
                    <div class="blur"></div>
                </div>
            </div>
        </div>


        <?php
        echo createOnda(1); // Adiciona a onda sólida
        ?>

    </section>
    
    <div class="carousel-container">
    <section class="associ">
        <h2>Associados:</h2>
    </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
                </div>
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/images (2) 2.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
                </div>
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/images (2) 2.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
                </div>
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/images (2) 2.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
            </div>
        </div>
    </div>
    <section class="commission-table">
        <h2>Comissões</h2>
        <p>A Partir de 7%</p>
    </section>
    <section class="cards-section">
        <div class="cards-container">
            <div class="card card1">
                <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/card1.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card2">
                <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/card2.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card3">
                <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/card3.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card4">
                <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/card4.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card5">
                <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/card5.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
        </div>
        <img class="sej" src="/projeto-integrador-et.com/public/imagens/TornarAssociado/sej.png" alt="img">
    </section>

    <!-- <div class="cardRedirectWrapper"> -->
        <div class="cardRedirect">
            <img src="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png" alt="" class="logoCardRedirect">
            <span></span>
            <div>
                <h1>Recomende Produtos. Ganhe Rendas.</h1>
                <?php
                echo botaoPersonalizadoRedirect("Associar-se","btn-black","app/views/usuario/CadastroAssociado.php","270px","95px","30px")
                ?>
            </div>
        </div>
    <!-- </div> -->

    <?php
    echo createRodape();
    ?>
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
</body>
</html>