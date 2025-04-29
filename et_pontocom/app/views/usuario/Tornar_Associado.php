<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/Tornar_Associado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
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
  <div class="promo-content">
    <h2>Torne-se um(a) associado(a) ET!</h2>
    <p>Seja bem-vindo ao programa de marketing de associados da nossa empresa ETCOM. O Programa de Associados ETCOM ajuda vendedores, editores e blogueiros a monetizarem seus sites.</p>
    <a href="#" class="azul">Saiba-mais...</a>
    <a href="#" class="join-now">Associar-se</a>
  </div>
  <div>
    <img  class="promo-image" src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/moça.png" alt="Promo Image">
  </div>
<?php
    function createOnda($tipo){
        if ($tipo == 1){
            return "<div class='wave solida'></div>";
        }
    }
?>
    <div>
        <?php
        echo createOnda(1); // Adiciona a onda sólida
        ?>
    </div>

</section>
    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/karla.nome.png" alt="Texto substituído" class="substituir-imagem">
    <div class="carousel-container">
    <section class="associ">
        <h2>Associados:</h2>
    </section>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
                </div>
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/images (2) 2.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
                </div>
                <div class="carousel-item active">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/images (2) 2.png" class="d-block w-100" alt="Marcos">
                    <div class="name">Marcos</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Jose">
                    <div class="name">Jose</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/manoel-gomes (1) 4.png" class="d-block w-100" alt="Manoel">
                    <div class="name">Manoel</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/DeWatermark.ai_1721330090347 (1) 2.png" class="d-block w-100" alt="Karla">
                    <div class="name">Karla</div>
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/png-transparent-man-standing-while-wearing-blue-dress-shirt-man-man-people-candle-canon-thumbnail (2) 2.png" class="d-block w-100" alt="Lucas">
                    <div class="name">Lucas</div>
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
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/card1.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card2">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/card2.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card3">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/card3.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card4">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/card4.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
            <div class="card card5">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/card5.png" alt="Descrição da Imagem do Card">
                <div class="card-content">
                </div>
            </div>
        </div>
    </section>
    <section>
            <img class="sej" src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/sej.png" alt="img">
            <img class="caixa_salmão" src="/projeto-integrador-et.com/et_pontocom/public/imagens/TornarAssociado/Group 1000003753.png" usemap="#image-map">
            <map name="image-map">
                <area target="" alt="" title="" href="" coords="1206,339,936,234" shape="rect">
            </map>
    </section>
        <?php
        echo createRodape();
        ?>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>
</body>
</html>