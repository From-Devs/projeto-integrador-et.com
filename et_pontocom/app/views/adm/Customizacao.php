<?php 

include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php";
require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";

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
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/CustomizacaoADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/produtoDestaque/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">

    <style>
        .produtoDestaque{
            scale: 0.65;
            width: 1920px;
            margin-top: 0;
            left: -336px;
            top: -150px;
            overflow: hidden;
            pointer-events: none;
            user-select: none;
        }

    </style>

</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>

    <dialog class='popUpDialog popUpUpdate'>
        <div class='popUp' style='padding: 33px; background-color: rgba(255, 255, 255,10%); box-shadow: inset 0px 0px 25px 11px rgba(255, 255, 255,75%); color: white; '>
            <div class="loading">
                <div class="loader"></div>
                <i class="fa-solid fa-check"></i>
            </div>
            <h1 class="loadingText">Carregando...</h1>
        </div>
    </dialog>

<dialog class='popUpDialog popUpSelectProduto'>
        <div class='popUp' style='width: 956px; padding: 33px; background-color: #F8F8F8;'>
            <div class='topoPopUp'>
                <h1 class="tituloPopUp">Lista de Produtos</h1>
                <img class='icone-fechar' id="iconeFechar" src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
            </div>

            <div class='inputProdutoContainer'>
                <input type='text' class='inputProduto' placeholder="Digite o nome do produto"></input>
                <button><i class='bx bx-search lupaButton'></i></button>
            </div>

            <div class="listaProdutos">
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
                <div class="itemLista">BATOM LÍQUIDO MATTIFY DAZZLE</div>
            </div>
        </div>
    </dialog>

    <dialog class='popUpDialog popUpEditProduto'>
        <div class='popUp' style=' padding: 33px; background-color: #F8F8F8;'>
            <div class='topoPopUp'>
                <h1 class="tituloPopUp">Editar Produto</h1>
                <img class='icone-fechar' id="iconeFechar" src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
            </div>

            <div class="wrapperPopUp">
                <div class="esquerdaEditProduto">
                    <div class="produtoContainer cor-0" onclick="abrirPopUp('popUpEditProduto')">
                        <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                    </div>
    
                    <?php echo botaoPersonalizadoOnClick("Salvar alterações","btn-black", "abrirPopUp(\"\")", "161px", "33px", "15px")?>
                </div>

                <div class="editProdutoContainer">

                    <div class="switchProduto">
                        <h2>Produto:</h2>
                        <div class="selectProduto">
                            <div class="nomeProduto">
                                <p>BATOM LÍQUIDO MATTIFY DAZZLE</p>
                            </div>
                            <?php echo botaoPersonalizadoOnClick("Trocar","btn-black", "abrirPopUp(\"popUpSelectProduto\")", "115px", "33px", "15px")?>
                        </div>
                    </div>

                    <span></span>

                    <div class="mainColorEdit">
                        <h2>Cores:</h2>
                        <div class="corWrapper">
                            <h3>Cor de destaque</h3>
                            <div class="corContainer">
                                <p class="textHex">HEX</p>
                                <div class="editCor">
                                    <input type="color" class="corShow" value=""></input>
                                    <input class="corHex" value="B4938A"></input>
                                </div>
                            </div>
                            <p class="restaurarPadrao">Restaurar Padrão</p>
                        </div>
                    </div>
                    <div class="degradeEdit">
                        <div class="degradeTop">
                            <h3>Degrade</h3>
                            <button class="swapDegrade"><i class="fa-solid fa-right-left"></i></button>
                        </div>
                        <div class="degradeBar">
                            <div class="colorMarker markerOne">
                                <div><p>1</p></div>
                            </div>
                            <div class="colorMarker markerTwo">
                                <div><p>2</p></div>
                            </div>
                            <div class="colorMarker markerThree">
                                <div><p>3</p></div>
                            </div>
                        </div>
                        <div class="degardeColorEdit">
                            <div class="corLi">
                                <label id="labelCorDegrade1" for="corDegarde1">1 - </label>
                                <div class="corContainer" id="corDegrade1">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor">
                                        <input type="color" class="corShow" value=""></input>
                                        <input class="corHex" value="B4938A"></input>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="corLi">
                                <label id="labelCorDegrade2" for="corDegarde2">2 - </label>
                                <div class="corContainer" id="corDegrade2">
                                    <div class="editCor">
                                        <input type="color" class="corShow" value=""></input>
                                        <input class="corHex" value="B4938A"></input>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="corLi">
                                <label id="labelCorDegrade3" for="corDegarde3">3 - </label>
                                <div class="corContainer" id="corDegrade3">
                                    <div class="editCor">
                                        <input type="color" class="corShow" value=""></input>
                                        <input class="corHex" value="B4938A"></input>
                                    </div>
                                </div>
                            </div>
                            
                            <p class="restaurarPadrao">Restaurar Padrão</p>

                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </dialog>

    <div class="main">

        <div class="customizacaoMain">
            <h1 id="tituloCustomizacao">Página Inicial</h1>
            <div class="containerCustomizacao">
                <div class="sessao" id="sessaoCarousel">
                    <ul>
                        <li class="tituloSessao">Carousel</li>
                    </ul>
                    <div class="editarCarousel">
                        <div class="produtoInicial">
                            <p>Inicial</p>
                            <div class="bordaProdutoInicial"></div>
                        </div>
                        <div class="editarCarouselContainer">
                            <div class="produtoContainer cor-0" id="produto1" onclick="abrirPopUp('popUpEditProduto')">
                                <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                            </div>
                            <div class="produtoContainer cor-1" id="produto2" onclick="abrirPopUp('popUpEditProduto')">
                                <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/bocarosa.png" alt="">
                            </div>
                            <div class="produtoContainer cor-2" id="produto3" onclick="abrirPopUp('popUpEditProduto')">
                                <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/leite.png" alt="">
                            </div>
                        </div>
                    </div>
        
                    <?php echo botaoPersonalizadoOnClick("Atualizar","btn-white", "abrirPopUp(\"popUpUpdate\")", "220px", "45px", "20px")?>
    
                    <ul class="descricaoContainer">
                        <li class="descricao">Clique em um produto para editar</li>
                        <li class="descricao">Arraste os produtos para organizar a ordem de apresentação</li>
                    </ul>
                </div>
    
                <div class="sessao">
                    <ul>
                        <li class="tituloSessao">Lançamentos</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="frameSlider">
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
        </div>

        <div class="customizacaoMain">
            <div class="containerCustomizacao">
                <div class="sessao" id="sessaoLancamento">
                    <?php echo botaoPersonalizadoOnClick("Atualizar","btn-white", "abrirPopUp(\"popUpUpdate\")", "220px", "45px", "20px")?>
                    <ul class="descricaoContainer">
                        <li class="descricao">Arraste sobre um produto e clique no botão “Editar” para editar</li>
                    </ul>
                </div>

                <div class="sessao" id="sessaoDestaque">
                    <ul>
                        <li class="tituloSessao">Produto em destaque</li>
                    </ul>

                    <?php echo createProdutoDestaque(); ?>

                    <div class="wrapper">
                        <div class="editProdutoDestaque">
                            <div class="esquerda">
                                <div class="switchProduto">
                                    <h2>Produto:</h2>
                                    <div class="selectProduto">
                                        <div class="nomeProduto">
                                            <p>BATOM LÍQUIDO MATTIFY DAZZLE</p>
                                        </div>
                                        <?php echo botaoPersonalizadoOnClick("Trocar","btn-black", "abrirPopUp(\"popUpSelectProduto\")", "115px", "33px", "15px")?>
                                    </div>
                                </div>
                            </div>
                            <span></span>
                            <div class="direita">
                                <h2>Cores:</h2>
                                <div class="coresGrid">
                                    <div class="corWrapper">
                                        <h3>Cor 1</h3>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor">
                                                <input type="color" class="corShow" value=""></input>
                                                <input class="corHex" value="B4938A"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="corWrapper">
                                        <h3>Cor 2</h3>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor">
                                                <input type="color" class="corShow" value=""></input>
                                                <input class="corHex" value="B4938A"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="corWrapper">
                                        <h3>Cor sombra</h3>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor">
                                                <input type="color" class="corShow" value=""></input>
                                                <input class="corHex" value="B4938A"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo botaoPersonalizadoOnClick("Atualizar","btn-white", "abrirPopUp(\"popUpUpdate\")", "220px", "45px", "20px")?>
                        
                        <div class="sessao" id="sessaoPI">
                            <ul>
                                <li class="tituloSessao">Visualização da Página Inicial</li>
                            </ul>
                            <?php echo botaoPersonalizadoRedirect("Visualizar","btn-black", "", "220px", "45px", "20px")?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/slider.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/customizacaoADM.js"></script>
</body>
</html> 