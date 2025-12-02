<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/popup/popUp.php";

    session_start();
    
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/ondas/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/Tornar_Associado.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/661f108459.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
    <title>Torne-se Associado</title>

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
                    <p>Seja bem-vindo ao programa de associados da nossa empresa ET.COM No Programa de Associados ET.COM, você publica nossos produtos e recebe comissões!</p>
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
                <img class="promo-image" src="/projeto-integrador-et.com/public/imagens/TornarAssociado/moça.png" alt="Promo Image">
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
        <div class="associadoTitle">
            <h2>Marcas parceiras:</h2>
        </div>
        <div class="carousel-track">
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/oboticario.png" alt="Oboticário"> 
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/hinode.jpg" alt="Hinode"> 
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/bocarosa.webp" alt="Boca Rosa"> 
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/taiff.jpg" alt="Taiff"> 
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/lancome.svg" alt="Lancome">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/loreal.jpg" alt="Loreal">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/vult.webp" alt="Vult">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/vichy.svg" alt="Vichy">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/wepink.png" alt="WePink">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/jequiti.png" alt="Jequiti">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/eudora.png" alt="Eudora">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/avon.png" alt="Avon">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/salonline.png" alt="Salonline">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/wella.jpg" alt="Wella">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/tresemme.png" alt="TRESemmé">
                </div>
                

                <!-- DUPLICAÇÃO PARA DAR O LOOP -->
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/oboticario.png" alt="Oboticário">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/hinode.jpg" alt="Hinode">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/bocarosa.webp" alt="Boca Rosa">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/taiff.jpg" alt="Taiff">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/lancome.svg" alt="Lancome">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/loreal.jpg" alt="Loreal">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/vult.webp" alt="Vult">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/vichy.svg" alt="Vichy">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/wepink.png" alt="WePink">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/jequiti.png" alt="Jequiti">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/eudora.png" alt="Eudora">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/avon.png" alt="Avon">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/salonline.png" alt="Salonline">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/wella.jpg" alt="Wella">
                </div>

                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/TornarAssociado/tresemme.png" alt="TRESemmé">
                </div>

            </div>
        </div>
    </div>
    <div class="commission-table">
        <h2>Comissões</h2>
        <p>A Partir de 7%</p>
    </div>
    <section class="cards-section">
        <div class="cards-container">
            <div class="comissionCard" id="maquiagemCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/batom.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">Maquiagem</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">7% De Comissão</p>
                </div>
            </div>
            <div class="comissionCard" id="perfumeCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/perfume.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">Perfumes</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">8% De Comissão</p>
                </div>
            </div>
            <div class="comissionCard" id="skinCareCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/skin.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">Skin Care</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">9% De Comissão</p>
                </div>
            </div>
            <div class="comissionCard" id="cabeloCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/cabelo.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">Cabelo</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">8% De Comissão</p>
                </div>
            </div>
            <div class="comissionCard" id="utensíliosCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/eletronico.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">utensílios</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">10% De Comissão</p>
                </div>
            </div>
            <div class="comissionCard" id="corporalCard">
                <div class="comissionCardIdentifier">
                    <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/corporal.png" alt="" class="comissionCardIcon">
                    <h1 class="categoryComissionName">Corporais</h1>
                </div>
                <div class="comissionPercentageContainer">
                    <p class="comissionPercentage">8% De Comissão</p>
                </div>
            </div>

        </div>
        <p class="comissionText">Bem-vindo ao Programa de Associados ET.COM! Aqui você tem a oportunidade de vender nossos produtos e ganhar comissões exclusivas a cada venda realizada. É simples e rápido, você se associa, divulga e começa a lucrar junto com a gente.</p>
    </section>

    <!-- <div class="cardRedirectWrapper"> -->
        <div class="cardRedirect">
            <img src="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png" alt="" class="logoCardRedirect">
            <span></span>
            <div>
                <h1>Recomende Produtos e Ganhe Comissões.</h1>
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
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html> 