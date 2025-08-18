<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/carousel/carousel.php";
    require __DIR__ . "/../../../public/componentes/popup/popUp.php";

    // == ADIÇÃO: carregar produtos do banco ==
    require_once __DIR__ . "/../../../config/ProdutoController.php";
    $produtoController = new ProdutoController();
    $resultadoProdutos = $produtoController->ListarProdutos();
    $produtos = $resultadoProdutos['produtos'] ?? [];

    session_start();
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Et.com</title>
    
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/produtoDestaque/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardLancamento/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/ondas/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/carousel/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/carouselPopUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/paginaPrincipal.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>

    <?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px")?>

    <div class="carouselContainer" id="carousel">
        
        <div class="carouselBackground" id="carouselBackground"></div>
        
        <?php
        echo createHeader($login,$tipoUsuario,1);
        ?>
        <div class="carouselContent">
            <div class="carouselWrapper">
                <img src="/projeto-integrador-et.com/public/imagens/ET/LogoBranca2.png" alt="" class="carouselLogo">
                <div class="componenteCarousel">
                    <?php
                    echo createCarousel(); // função que cria o header
                    ?>
                </div>
            </div>
        </div>
        <div class="frameOndas">
            <?php
            echo createOnda(1);
            echo createOnda(0);
            ?>
        </div>
    </div>
    <div class="degradeParaHeader"></div>

    <div class="linkCategorias">
        <a class="botaoCategoria botao1" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/batom.png" alt="" class="iconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/batomHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Maquiagem</p>            
        </a>
        <a class="botaoCategoria botao2" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/perfume.png" alt="" class="iconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/perfumeHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Perfumes</p>            
        </a>
        <a class="botaoCategoria botao3" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/skin.png" alt="" class="iconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/skinHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Skin Care</p>            
        </a>
        <a class="botaoCategoria botao4" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/cabelo.png" alt="" class="iconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/cabeloHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Cabelo</p>            
        </a>
        <a class="botaoCategoria botao5" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/eletronico.png" alt="" class="iconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/eletronicoHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Eletrônicos</p>            
        </a>
        <a class="botaoCategoria botao6" href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">            
            <div class="containerIconeCategoria">
                <img src="/projeto-integrador-et.com/public/imagens/botoesCategorias/corporal.png" alt="" class="iconeCategoria">
                <img src="/projeto-integridor-et.com/public/imagens/botoesCategorias/corporalHover.png" alt="" class="iconeCategoriaHover">
            </div>
            <p class="tituloCategoria">Corporal</p>            
        </a>
    </div>

    <div class="sessaoProdutos">
        <div class="tituloSessao">
            <p class="titulo">Lançamentos</p>
        </div>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerProdutos" id="containerLancamentos">
                    <?php
                    echo createCardProdutoLancamento("Phállebeauty", "Base Matte Alta Cobertura","R$ 1000,00","#E1B48C","matte.jpg","lancamentoFuncional");
                    echo createCardProdutoLancamento("Avon", "Red Batom","R$ 2000,00","#D1061D","batom.png","lancamentoFuncional");
                    echo createCardProdutoLancamento("Benefit", "BADgal Bang! Máscara de Cílios","R$ 3000,00","#D02369","bang.png","lancamentoFuncional");
                    echo createCardProdutoLancamento("Avon", "Color Trend Delineador Líquido","R$ 1000,00","#F0CBDA","trend.webp","lancamentoFuncional");
                    echo createCardProdutoLancamento("Mari Maria","Diamond Blender Esponja de Maquiagem","R$ 2000,00","#D79185","tri.jpeg","lancamentoFuncional");
                    echo createCardProdutoLancamento("Simple Organic", "SOLUÇÃO RETINOL-LIKE","R$ 3000,00","#C9A176","simple.webp","lancamentoFuncional");
                    echo createCardProdutoLancamento("Princess","Mini Chapinha Bivolt","R$ 2000,00","#745CA3","chapa.webp","lancamentoFuncional");
                    echo createCardProdutoLancamento("O Boticário","L'eau De Lily Soleil Perfume Feminino","R$ 3000,00","#F4C83C","lily.jpg","lancamentoFuncional");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>

    <?php
    // echo createProdutoDestaque("Hidratante Corporal Milk","Nivea","R$20,00","milk.png","rgb(0, 0, 145)","rgb(75, 75, 226)","rgb(0, 0, 57)");
    echo createProdutoDestaque();
    ?>

    <div class="sessaoProdutos">
        <div class="tituloSessao">
            <p class="titulo">Ofertas Imperdíveis</p>
            <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">Ver Mais</a>
        </div>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerProdutos">
                    <?php
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>

    <div class="sessaoProdutos">
        <div class="tituloSessao">
            <p class="titulo">Mais Vendidos</p>
            <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">Ver Mais</a>
        </div>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerProdutos">
                    <?php
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>

    <!-- =================== NOVA SEÇÃO: PRODUTOS DO BANCO =================== -->
    <div class="sessaoProdutos">
        <div class="tituloSessao">
            <p class="titulo">Produtos Dinâmicos</p>
        </div>
        <div class="frameProdutos">
            <div class="containerProdutos">
                <?php
                if (!empty($produtos)) {
                    foreach ($produtos as $p) {
                        $preco      = "R$ " . number_format((float)$p['preco'], 2, ",", ".");
                        $precoPromo = "R$ " . number_format((float)$p['precoPromo'], 2, ",", ".");
                        $img = !empty($p['imagem']) ? $p['imagem'] : 'no-image.png'; // seu componente já resolve o caminho
                        $link       = "/blablabla/app/views/usuario/detalhesDoProduto.php?id=" . $p['id_produto'];

                        // Se o componente tiver sido atualizado para aceitar o 10º parâmetro ($link)
                        // usamos; senão, deixamos o card clicável inteiro como fallback.
                        try {
                            $rf = new ReflectionFunction('createCardProduto');
                            if ($rf->getNumberOfParameters() >= 10) {
                                echo createCardProduto(
                                    $p['marca'],
                                    $p['descricaoBreve'],
                                    $preco,
                                    $img,
                                    true,
                                    $precoPromo,
                                    "#FFFFFF", "#CCCCCC", "#AAAAAA",
                                    $link
                                );
                            } else {
                                echo '<a href="'.$link.'" style="text-decoration:none;">';
                                echo createCardProduto(
                                    $p['marca'],
                                    $p['descricaoBreve'],
                                    $preco,
                                    $img,
                                    true,
                                    $precoPromo,
                                    "#FFFFFF", "#CCCCCC", "#AAAAAA"
                                );
                                echo '</a>';
                            }
                        } catch (Throwable $e) {
                            // fallback robusto
                            echo '<a href="'.$link.'" style="text-decoration:none;">';
                            echo createCardProduto(
                                $p['marca'],
                                $p['descricaoBreve'],
                                $preco,
                                $img,
                                true,
                                $precoPromo,
                                "#FFFFFF", "#CCCCCC", "#AAAAAA"
                            );
                            echo '</a>';
                        }
                    }
                } else {
                    echo "<p style='padding:1rem;color:#666;'>Nenhum produto cadastrado.</p>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- =================== FIM PRODUTOS DO BANCO =================== -->

    <?php
    echo createRodape();
    ?>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardLancamento/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/produtoDestaque/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/carousel/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>
