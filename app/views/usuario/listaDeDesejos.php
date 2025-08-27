<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/cardListaDese/cardLista.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";

    // session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/listaDeDesejos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>listaDeDesejos</title>
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

    <div class="cont-legend">
        <div class="cards-legend">
            <div class="produto">
                <p><strong>Produto</strong></p>
            </div>

            <div class="preco">
                <p><strong>Preço</strong></p>
            </div>
        </div>
    </div>
   

    <div class="container">
        <div class="degradeTopo"></div>
        <div class="degradeBaixo"></div>
        <div class="card-container">
            <!--<div class="cardDesejos card01">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>

            <div class="cardDesejos card02">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod02.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>

            <div class="cardDesejos card03">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod03.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>

            <div class="cardDesejos card04">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod04.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>

            <div class="cardDesejos card01">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>

            <div class="cardDesejos card02">
                <div class="cardImg">
                    <img src="/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod02.png" alt="">
                </div>

                <div class="cardPreco">
                    <p><strong>R$50,00</strong></p>
                </div>

                <div class="cardInfo">
                    <p>Nivea  HIDRATANTE CORPORAL MILK</p>
                </div>

                <div class="cardDate">
                    <p><strong>Adicionado 11/03/25</strong></p>
                </div>

                <div class="cardButtons">
                    <button class="buttonDesejos" id="buttonDetalhes" onclick="redirecionarDetalhesDoProduto()">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <button class="buttonDesejos" id="buttonLixeira">
                        <img src="/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png" alt="">
                    </button>
                </div>
            </div>-->

            <?php 
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
                echo creatCardProdutoListaDese("/projeto-integrador-et.com/public/imagens/listaDeDesejos/prod01.png", "R$20,00", "informação", "Adicionado 00/00/00", "", "");
            ?>
        </div>
    </div>

    <center><div class="line2"></div></center>
    
    <div class="sliderContainer">
        <div class="sessaoProdutos">
            <div class="tituloSessao">
                <p class="titulo">Sugestões</p>
                <a href="#">Ver Mais</a>
            </div>
            <div class="frameSlider">
                <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
                <div class="degradeEsquerda"></div>
                <div class="frameProdutos">
                    <div class="containerProdutos">
                        <?php
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                        ?>
                    </div>
                </div>
                <div class="degradeDireita"></div>
                <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
            </div>
        </div>
    </div>

    <?php
    echo createRodape();
    ?>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>

    <script> 
    function redirecionarDetalhesDoProduto() {
        window.location.href = "detalhesDoProduto.php";
    }
    </script>
    
    
</body>
</html>