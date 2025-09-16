<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php";
    require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
    require_once __DIR__ . "/../../Models/categoria.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

    $categoriasPorTela = [ 
        "Maquiagem" => [
            "Tipos" => ["Olhos", "Sombrancelhas","Boca","Pele"],
        ],
        "Perfume" => [
            "Gênero" => ["Feminino", "Masculino", "Unissex"],
        ],
        "SkinCare" => [
            "Tipos" => ["Limpeza", "Esfoliação", "Hidratação", "Máscara", "Protetor Solar", "Especiais"],
        ],
        "Cabelos" => [
            "Tipos" => ["Dia-A-Dia", "Tratamentos", "Estilização", "Especiais", "Acessórios"],
        ],
        "Eletronicos" => [
            "Acessórios" => ["Cabelos", "Pincel", "Esponja"],
        ],
        "Corporal" => [
            "Produtos" => ["Body Splash", "Óleos", "Creme", "Protetor"],
        ],
    ];

    $fundos = [
        "maquiagem" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemFundo.png",
            "olhos"        => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemOlhos.png",
            "sombrancelhas" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemSombrancelhas.png",
            "boca"       => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemBoca.png",
            "pele"         => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemPele.png"
        ],
        "perfume" => [
            "default"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeFundo.png",
            "feminino"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeFeminino.png",
            "masculino" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeMasculino.png",
            "unissex"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeUnissex.png"
        ],
        "skincare" => [
            "default"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareFundo.png",
            "limpeza"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareLimpeza.png",   
            "esfoliação"=> "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareEsfoliacao.png",   
            "hidratação"=> "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareHidratacao.png",     
            "mascara"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareMascara.png",
            "protetorsolar"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareProtetorSolar.png",
            "especiais" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareEspeciais.png"
        ],
        "cabelo" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloFundo.png",
            "dia-a-dia"    => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloDiaADia.png",
            "tratamentos"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloTratamentos.png",
            "estilização"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloEstilizacao.png",
            "especiais"    => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloEspeciais.png",
            "acessórios"   => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloAcessorios.png"
        ],
        "eletronicos" => [
            "default"     => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosFundo.png",
            "cabelos"     => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosSecador.png",
            "pincel"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosChapinha.png",
            "esponja"     => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/EletronicosBarbeador.png"
        ],
        "corporal" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalFundo.png",
            "body splash"  => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalHidratante.png",
            "óleos"        => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalOleo.png",
            "creme"        => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalHidratante.png",
            "protetor"     => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalEsfoliante.png"
        ],
        "ofertas" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalFundo.png"
        ],
        "mais_vendidos" => [
            "default"      => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalFundo.png"
        ]
    ];

    $slugCategoria = $_GET['tela'] ?? "maquiagem"; 
    $slugSub       = $_GET['sub'] ?? "default";    

    function renderSomenteSubcategoriasDB($id_categoria) {
        require_once __DIR__ . "/../../Models/categoria.php";
        $subcategorias = CategoriaModel::getSubcategorias($id_categoria);
    
        if (!$subcategorias) {
            echo "<p>Nenhum filtro disponível para essa categoria.</p>";
            return;
        }
    
        foreach ($subcategorias as $sub) {
            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox" name="subcategorias[]" value="' . htmlspecialchars($sub["nome"]) . '"> 
                        <span class="checkmark"></span>
                        ' . htmlspecialchars($sub["nome"]) . '
                    </label>
                </div>
            ';
        }
    }

    $telaAtual = str_replace("_"," ", ucfirst($slugCategoria));
    $subAtual  = $slugSub !== "default" ? ucfirst($slugSub) : "";

    if (isset($fundos[$slugCategoria][$slugSub])) {
        $fundoAtual = $fundos[$slugCategoria][$slugSub];
    } else {
        $fundoAtual = $fundos[$slugCategoria]["default"];
    }

    session_start();
    
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)
        
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">

    <link rel="stylesheet" href="../../../public/css/PaginaCategorias.css">
    <title><?php echo $telaAtual; ?></title>
</head>
<body>
<?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px")?>
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
                <h3 class="TituloProdutos">Produtos</h3>

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

                    $produtos = [
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),

                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
    
                         createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9"),
                         createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA"),
                         createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186"),
                         createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065"),
                    ];


                    $resultado = paginar($produtos, 16);

                    foreach ($resultado['dados'] as $produto){
                        echo $produto;
                    }

                ?>
            </div>
            <?php
            renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);
            ?>
            
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
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>