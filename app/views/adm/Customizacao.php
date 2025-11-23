<?php 
// caminho boss
 
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php";
require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require_once __DIR__ . "/../../Controllers/CustomizacaoController.php";

$conn = new CustomizacaoController();
$res = $conn->index();
echo "<pre style='display: none;'>";
var_dump($res);
echo "</pre>";

$produtoDestaque = $res["destaque"][0];

// session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Customização</title>
    
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardLancamento/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/CustomizacaoADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/produtoDestaque/styleCustom.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">

</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
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
                <img class='icone-fechar' id="iconeFechar" src='/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
            </div>

            <div class='inputProdutoContainer'>
                <input type='text' class='inputProduto' placeholder="Digite o nome do produto"></input>
                <i class='bx bx-search lupaButton'></i>
            </div>

            <div class="listaProdutos">
                <?php
                foreach($res['produtos'] as $produto){
                ?>
                <div class="itemLista" data-id="<?= $produto['id_produto'] ?>">
                    <?= $produto['nome'] ?>
                </div>
                <?php
                };
                ?>
            </div>
        </div>
    </dialog>

    <dialog class='popUpDialog popUpEditProduto'>
        <div class='popUp' style=' padding: 33px; background-color: #F8F8F8;'>
            <div class='topoPopUp'>
                <h1 class="tituloPopUp">Editar Produto</h1>
                <img class='icone-fechar' id="iconeFechar" src='/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
            </div>

            <div class="wrapperPopUp">
                <div class="esquerdaEditProduto">
                    <div class="produtoContainer cor-0" id="wrapperEditProdutoImg">
                        <img class="imagemProduto" src="/projeto-integrador-et.com/public/imagens/produto/hinode.png" alt="">
                    </div>

                    <button type="button" id="botaoPadrao" class="btn btn-black" style="width: 161px; height:33px; font-size: 15px;" onclick="salvarAlteracoesCarousel()">Salvar alterações</button>
                </div>

                <div class="editProdutoContainer">

                    <div class="switchProduto">
                        <h2>Produto:</h2>
                        <div class="selectProduto">
                            <div class="nomeProduto">
                                <p></p>
                            </div>
                            <button type="button" id="botaoPadrao" class="btn btn-black" style="width: 115px; height:33px; font-size: 15px; " onclick="abrirPopUp('popUpSelectProduto', 'editCarousel')">Trocar</button>
                        </div>
                    </div>

                    <span></span>

                    <div class="mainColorEdit">
                        <h2>Cores:</h2>
                        <div class="corWrapper">
                            <h3>Cor de destaque</h3>
                            <div class="corContainer">
                                <p class="textHex">HEX</p>
                                <div class="editCor" id="corDestaqueCarousel">
                                    <input type="color" class="corShow" value="#651629"></input>
                                    <input class="corHex" maxlength="7" value="#651629"></input>
                                </div>
                            </div>
                            <p class="restaurarPadrao">Restaurar Padrão</p>
                        </div>
                    </div>
                    <div class="degradeEdit">
                        <div class="degradeTop">
                            <h3>Degrade</h3>
                            <button type="button" class="swapDegrade" id="swapDegrade"><i class="fa-solid fa-right-left"></i></button>
                        </div>
                        <div class="degradeBar" id="degradeBar">
                            <div class="colorMarker markerOne" id="markerOne">
                                <div><p>1</p></div>
                            </div>
                            <div class="colorMarker markerTwo" id="markerTwo">
                                <div><p>2</p></div>
                            </div>
                            <div class="colorMarker markerThree" id="markerThree">
                                <div><p>3</p></div>
                            </div>
                        </div>
                        <div class="degardeColorEdit">
                            <div class="corLi">
                                <label id="labelCorDegrade1" for="corDegarde1">1 - </label>
                                <div class="corContainer">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor" id="corDegrade1">
                                        <input type="color" class="corShow" value="#7a3241"></input>
                                        <input class="corHex" maxlength="7" value="#7a3241"></input>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="corLi">
                                <label id="labelCorDegrade2" for="corDegarde2">2 - </label>
                                <div class="corContainer">
                                    <div class="editCor" id="corDegrade2">
                                        <input type="color" class="corShow" value="#39121d"></input>
                                        <input class="corHex" maxlength="7" value="#39121d"></input>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="corLi">
                                <label id="labelCorDegrade3" for="corDegarde3">3 - </label>
                                <div class="corContainer">
                                    <div class="editCor" id="corDegrade3">
                                        <input type="color" class="corShow" value="#150106"></input>
                                        <input class="corHex" maxlength="7" value="#150106"></input>
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

    <dialog class='popUpDialog popUpEditProdutoLancamento'>
        <div class='popUp' style='padding: 33px; background-color: #F8F8F8; position: relative;'>
            <div class='topoPopUp'>
                <h1 class="tituloPopUp">Editar Lançamento</h1>
                <img class='icone-fechar' id="iconeFechar" src='/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
            </div>

            <div class="popUpEditLancamentoWrapper">

                <div class="esquerda">
                    <h2>Exemplo:</h2>
                    <div class="bugBizarro">
                        <?php
                        echo createCardProdutoLancamento("", "","","","", 0, 0,"lancamentoFuncional");
                        echo createCardProdutoLancamento("", "","","","", 0, 0,"lancamentoFuncional");
                        ?>
                    </div>
                </div> 
                
                <div class="direita">
                    <div class="editProdutoLancamentoContainer">
        
                        <div class="switchProduto">
                            <h2>Produto:</h2>
                            <div class="selectProduto">
                                <div class="nomeProduto">
                                    <p></p>
                                </div>
                                <button type="button" id="botaoPadrao" class="btn btn-black" style="width: 115px; height:33px; font-size: 15px; " onclick="abrirPopUp('popUpSelectProduto', 'editLancamento')">Trocar</button>
                            </div>
                        </div>
        
                        <div class="linha"></div>
        
                        <div class="brilhoColorEdit">
                            <h2>Cores:</h2>
                            <div class="corWrapper">
                                <h3>Cor do brilho</h3>
                                <div class="corContainer">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor" id="corBrilhoLancamento">
                                        <input type="color" class="corShow" value="#e1b48c"></input>
                                        <input class="corHex" maxlength="7" value="#e1b48c"></input>
                                    </div>
                                </div>
                                <p class="restaurarPadrao">Restaurar Padrão</p>
                            </div>
                        </div>
    
                        <ul class="popUpDescricaoContainer">
                            <li class="descricao">Arraste o cursor sobre o produto para verificar o efeito de brilho</li>
                            <li class="descricao">Por padrão a cor de brilho selecionada será a cor de destaque registrada no produto</li>
                        </ul>
    
                        <div class="lancamentoImagemEdit">
                            <h2>Imagem:</h2>
                            <div class="imagemWrapper">
                                <h3>Imagens registradas</h3>
    
                                <div class="imagemContainer">
                                    <div class="imagemItem imagemSelecionada">
                                        <img class="imgProdutoLancamento" id="img1ProdutoLancamento" src="" alt="">
                                        <div class="imagemItemWarning">
                                            <i class="fa-solid fa-circle-minus"></i>
                                            <p>Vazio</p>
                                        </div>
                                        <div class="overlayBotaoSelecionarImg">
                                            <button type="button" id="botaoSelecionarImagemLancamento1" class="btn btn-white botaoSelecionarImagemLancamento" style="width: 120px; height:35px; font-size: 16px; ">Selecionar</button>
                                        </div>
                                    </div>
                                    <div class="imagemItem">
                                        <img class="imgProdutoLancamento" id="img2ProdutoLancamento" src="" alt="">
                                        <div class="imagemItemWarning">
                                            <i class="fa-solid fa-circle-minus"></i>
                                            <p>Vazio</p>
                                        </div>
                                        <div class="overlayBotaoSelecionarImg">
                                            <button type="button" id="botaoSelecionarImagemLancamento2" class="btn btn-white botaoSelecionarImagemLancamento" style="width: 120px; height:35px; font-size: 16px; ">Selecionar</button>
                                        </div>
                                    </div>
                                    <div class="imagemItem imagemVazia">
                                        <img class="imgProdutoLancamento" id="img3ProdutoLancamento" src="" alt="">
                                        <div class="imagemItemWarning">
                                            <i class="fa-solid fa-circle-minus"></i>
                                            <p>Vazio</p>
                                        </div>
                                        <div class="overlayBotaoSelecionarImg">
                                            <button type="button" id="botaoSelecionarImagemLancamento3" class="btn btn-white botaoSelecionarImagemLancamento" style="width: 120px; height:35px; font-size: 16px; ">Selecionar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="popUpDescricaoContainer">
                                <li class="descricao">Clique em Selecionar para trocar a imagem de apresentação do produto</li>
                            </ul>
                        </div>
                                    
                    </div>
                    <button type="button" class="btn btn-black salvarAlteracoesLancamento" onclick="salvarAlteracoesLancamento()">Salvar alterações</button>

                </div>     
            </div>
        </div>
    </dialog>

    <div class="main">

        <div class="customizacaoMain">
            <h1 id="tituloCustomizacao">Página Inicial</h1>
            <div class="containerCustomizacao">
                <form class="sessao" id="sessaoCarousel">
                    <ul>
                        <li class="tituloSessao">Carousel</li>
                    </ul>
                    <div class="editarCarousel">
                        <div class="produtoInicial">
                            <p>Inicial</p>
                            <div class="bordaProdutoInicial"></div>
                        </div>
                        <div class="editarCarouselContainer">
                            <?php
                            foreach ($res["carousel"] as $index => $carouselItem) {
                                $carouselProdutoID = $carouselItem['id_carousel'];
                                $carouselImg = $carouselItem['img1'];
                                $cor1 = $carouselItem['hexDegrade1'];
                                $cor2 = $carouselItem['hexDegrade2'];
                                $cor3 = $carouselItem['hexDegrade3'];

                                echo '
                                <div class="produtoContainer">
                                    <div class="imagemProdutoWrapper" onclick="abrirPopUp(\'popUpEditProduto\', \'editCarousel\',  ' . $carouselProdutoID . ', event)" data-id=' . $carouselProdutoID . ' style="background-image: linear-gradient(to bottom, '. $cor1 .' 0%, '. $cor2 .' 50%, '. $cor3 .' 100%);">
                                        <img class="imagemProduto" src="/projeto-integrador-et.com/' . $carouselImg . '" alt="">
                                    </div>
                                </div>
                                ';
                            }
                            ?>
                        </div>
                    </div>
            
                    <button id="botaoPadrao" class="btn btn-white" style="width: 220px; height:45px; font-size: 20px; " onclick="atualizarSessao('carousel')">Atualizar</button>
    
                    <ul class="descricaoContainer">
                        <li class="descricao">Clique em um produto para editar</li>
                        <li class="descricao">Arraste os produtos para organizar a ordem de apresentação</li>
                    </ul>
                </form>
        
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
                    foreach ($res["lancamento"] as $index => $lancamentoItem) {
                        $imagem = 'img' . $lancamentoItem['imgSelecionada'];
                        echo createCardProdutoLancamento(
                            $lancamentoItem['marca'],
                            $lancamentoItem['nome'],
                            $lancamentoItem['precoPromo'] == 0 ? $lancamentoItem['preco'] : $lancamentoItem['precoPromo'],
                            $lancamentoItem['corEspecial'] ?? "#000",
                            $lancamentoItem[$imagem],
                            $lancamentoItem['id_produto'],
                            $lancamentoItem['id_lancamento'],
                            "lancamentoCustom"
                        );
                    }
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
        </div>

        <div class="customizacaoMain">
            <div class="containerCustomizacao">
                <form class="sessao" id="sessaoLancamento">
                    <button id="botaoPadrao" class="btn btn-white" style="width: 220px; height:45px; font-size: 20px; " onclick="atualizarSessao('lancamento')">Atualizar</button>
                    <ul class="descricaoContainer">
                        <li class="descricao">Arraste o cursor sobre um produto e clique no botão “Editar” para editá-lo</li>
                    </ul>
                </form>

                <div class="sessao" id="sessaoDestaque">
                    <ul>
                        <li class="tituloSessao">Produto em destaque</li>
                    </ul>

                    <?php
                    echo createProdutoDestaque(
                        $produtoDestaque["id_produto"],
                        $produtoDestaque["nome"],
                        $produtoDestaque["marca"],
                        $produtoDestaque['precoPromo'] == 0 ? $produtoDestaque['preco'] : $produtoDestaque['precoPromo'],
                        $produtoDestaque["img1"],
                        $produtoDestaque["cor1"],
                        $produtoDestaque["cor2"],
                        $produtoDestaque["corSombra"]
                    );
                    ?>

                    <form class="wrapper">
                        <div class="editProdutoDestaque">
                            <div class="esquerda">
                                <div class="switchProduto">
                                    <h2>Produto:</h2>
                                    <div class="selectProduto">
                                        <div class="nomeProduto">
                                            <p><?= $produtoDestaque["nome"] ?></p>
                                        </div>
                                        <button type="button" id="botaoPadrao" class="btn btn-black" style="width: 115px; height:33px; font-size: 15px; " onclick="abrirPopUp('popUpSelectProduto', 'produtoDestaque')">Trocar</button>
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
                                            <div class="editCor" id="produtoLancamentoEditCor1">
                                                <input type="color" class="corShow" value="<?= $produtoDestaque["cor1"] ?>"></input>
                                                <input class="corHex" maxlength="7"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="corWrapper">
                                        <h3>Cor 2</h3>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor" id="produtoLancamentoEditCor2">
                                                <input type="color" class="corShow" value="<?= $produtoDestaque["cor2"] ?>"></input>
                                                <input class="corHex" maxlength="7"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="corWrapper">
                                        <h3>Cor sombra</h3>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor" id="produtoLancamentoEditCorSombra">
                                                <input type="color" class="corShow" value="<?= $produtoDestaque["corSombra"] ?>"></input>
                                                <input class="corHex" maxlength="7"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="restaurarPadrao">Restaurar Padrão</p>
                            </div>
                        </div>
                        <button id="botaoPadrao" class="btn btn-white" style="width: 220px; height:45px; font-size: 20px; " onclick="atualizarSessao('destaque')">Atualizar</button>
                        
                        <div class="sessao" id="sessaoPI">
                            <ul>
                                <li class="tituloSessao">Visualização da Página Inicial</li>
                            </ul>
                            <?php echo botaoPersonalizadoRedirect("Visualizar","btn-black", "/app/views/adm/paginaPrincipalVisualizacao.php", "220px", "45px", "20px")?>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/botaoEditarLancamentos.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardLancamento/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/editorCor.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/trocarCorProdutoDestaque.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/trocarCorDegradeCarousel.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/trocarCorLancamento.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/dragEDrop.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/trocarImagemLancamento.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/customizacao/customizacaoGeral.js"></script>
</body>
</html> 