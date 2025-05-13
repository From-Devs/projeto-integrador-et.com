<?php 

include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Customização</title>
    
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/CustomizacaoADM.css">

    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>

    <div class="customizacaoMain">
        <h1 id="tituloCustomizacao">Página Inicial</h1>
        <div class="containerCustomizacao">
            <div class="sessaoCarousel">
                <ul>
                    <li class="tituloSessao">Carousel</li>
                </ul>
                <div class="editarCarousel">
                    <div class="produtoInicial">
                        <p>Inicial</p>
                        <div class="bordaProdutoInicial"></div>
                    </div>
                    <div class="editarCarouselContainer">
                        <div class="produtoContainer">
                            <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                        </div>
                        <div class="produtoContainer">
                            <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                        </div>
                        <div class="produtoContainer">
                            <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                        </div>
                    </div>
                </div>
    
                <?php echo botaoPersonalizadoOnClick("Atualizar","btn-white", "", "220px", "45px", "20px")?>

                <ul>
                    <li class="descricao">Clique em um produto para editar</li>
                    <li class="descricao">Arraste os produtos para organizar a ordem de apresentação</li>
                </ul>
            </div>
            
            <ul>
                <li class="tituloSessao">Lançamentos</li>
            </ul>
            <ul>
                <li class="tituloSessao">Produto em destaque</li>
            </ul>
            <ul>
                <li class="tituloSessao">Visualização da Página Inicial</li>
            </ul>
        </div>
    </div>
    
    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html> 