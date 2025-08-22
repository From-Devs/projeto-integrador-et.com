<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
    require_once __DIR__ . "/../../Models/categoria.php";

    $fundos = [
        "maquiagem" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemFundo.png",
            "pele"         => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemPele.png",
            "olhos"        => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemOlhos.png",
            "boca"         => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemBoca.png",
            "sobrancelhas" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemSobrancelhas.png"
        ],
        "perfume" => [
            "default"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeFundo.png",
            "feminino"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeFeminino.png",
            "masculino" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeMasculino.png",
            "unissex"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeUnissex.png"
        ],
        "skincare" => [
            "default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareFundo.png",
            "rosto"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareRosto.png",
            "corpo"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareCorpo.png",
            "kit"     => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareKit.png"
        ],
        "cabelo" => [
            "default"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloFundo.png",
            "shampoo"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloShampoo.png",
            "condicionador" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloCondicionador.png",
            "tratamento"    => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloTratamento.png"
        ],
        "corporal" => [
            "default"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalFundo.png",
            "hidratante" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalHidratante.png",
            "esfoliante" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalEsfoliante.png",
            "oleo"       => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalOleo.png"
        ],
        "eletronicos" => [
            "default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosFundo.png",
            "secador" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosSecador.png",
            "chapinha" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosChapinha.png",
            "barbeador" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosBarbeador.png"
        ]
    ];

    renderSomenteSubcategorias($fundos[$slugCategoria], $slugCategoria);

    $slugCategoria = $_GET['tela'] ?? "maquiagem"; // fallback pra categoria
    $slugSub = $_GET['sub'] ?? "default"; // fallback pra subcategoria

    $telaAtual = ucfirst($slugCategoria);
    $subAtual  = $slugSub !== "default" ? ucfirst($slugSub) : "";

        
    if (isset($fundos[$slugCategoria][$slugSub])) {
        $fundoAtual = $fundos[$slugCategoria][$slugSub];
    } else {
        $fundoAtual = $fundos[$slugCategoria]["default"];
    }

    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "associado";
    $login = false;
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/produtoDestaque/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/filtroCategoria/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardLancamento/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/ondas/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../../../public/css/PaginaCategorias.css">
    <title><?php echo $telaAtual; ?></title>
</head>
<body>
<?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>
    <div class="Topo" style="background-image: url('<?php echo $fundoAtual; ?>')">
        <div class="tituloWrapper">
            <h1 class="Titulo">
            <?php 
                echo $telaAtual; 
                if ($subAtual) echo " - " . $subAtual;
            ?>
            </h1>
        </div>

        <?php
            echo createOnda(1);
            echo createOnda(0);
        ?>
    </div>
    
    <div class="Produtos">
        
        <div class="aVenda">
            <div class="PartedeCima">
                <h3>Produtos</h3>

                <div class="filtroSeparado">
                    <button class="filtro-botao" type="button" onclick="toggleFiltro()">
                        <img src="/projeto-integrador-et.com/public/componentes/filtroCategoria/filtroIcone.png" alt="Ícone de filtro">Filtros
                    </button>
                    
                    <div id="form-filtro" class="filtro-box">
                        <div class="form">
                            <?php 
                            renderSomenteSubcategorias($categoriasPorTela, $telaAtual);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="PartedeBaixo">
                <?php 
                echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");

                
                echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");


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
    </div>
    <?php
    echo createRodape();
    ?>
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardLancamento/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/produtoDestaque/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/filtroCategoria/script.js"></script>
</body>
</html>