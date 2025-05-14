<?php 

include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Customização</title>
    
    
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/cardLancamento/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/CustomizacaoADM.css">

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

                <ul class="descricaoContainer">
                    <li class="descricao">Clique em um produto para editar</li>
                    <li class="descricao">Arraste os produtos para organizar a ordem de apresentação</li>
                </ul>
            </div>

            <div class="sessaoLancamento">
                <ul>
                    <li class="tituloSessao">Lançamentos</li>
                </ul>
                <div class="teste">
                    <div class="frameSlider">
                        <i class="setaSlider setaEsquerda" id="esquerda"></i>
                        <div class="degradeEsquerda"></div>
                        <div class="frameProdutos">
                            <div class="containerProdutos" id="containerLancamentos">
                                <?php
                                echo createCardProdutoLancamento("Phállebeauty", "Base Matte Alta Cobertura","R$ 1000,00","#E1B48C","matte.jpg");
                                echo createCardProdutoLancamento("Avon", "Red Batom","R$ 2000,00","#D1061D","batom.png");
                                echo createCardProdutoLancamento("Benefit", "BADgal Bang! Máscara de Cílios","R$ 3000,00","#D02369","bang.png");
                                echo createCardProdutoLancamento("Avon", "Color Trend Delineador Líquido","R$ 1000,00","#F0CBDA","trend.webp");
                                echo createCardProdutoLancamento("Mari Maria","Diamond Blender Esponja de Maquiagem","R$ 2000,00","#D79185","tri.jpeg");
                                echo createCardProdutoLancamento("Simple Organic", "SOLUÇÃO RETINOL-LIKE","R$ 3000,00","#C9A176","simple.webp");
                                echo createCardProdutoLancamento("Princess","Mini Chapinha Bivolt","R$ 2000,00","#745CA3","chapa.webp");
                                echo createCardProdutoLancamento("O Boticário","L'eau De Lily Soleil Perfume Feminino","R$ 3000,00","#F4C83C","lily.jpg");
                                ?>
                            </div>
                        </div>
                        <div class="degradeDireita"></div>
                        <i class="setaSlider setaDireita" id="direita"></i>
                    </div>

                </div>
            </div>
            
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
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/slider.js"></script>
</body>
</html> 