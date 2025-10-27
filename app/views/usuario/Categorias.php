<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    // NOTE: Vamos usar o componente de filtro diretamente no HTML, não o require aqui.
    // require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php"; // REMOVIDO DAQUI
    require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
    require_once __DIR__ . "/../../Models/categoria.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

    $categoriasPorTela = [ 
        "Maquiagem" => ["Tipos" => ["Olhos", "Sombrancelhas","Boca","Pele"]],
        "Perfume"   => ["Gênero" => ["Feminino", "Masculino", "Infantil","Body Splash"]],
        "Skincare"  => ["Tipos" => ["Limpeza facial", "Esfoliação", "Hidratação", "Máscara", "Protetor Solar","Tratamentos"]],
        "Cabelo"    => ["Tipos" => ["Dia-A-Dia", "Tratamentos", "Estilização","Acessórios"]],
        "Utensílios" => ["Tipos" => ["Cabelos", "Maquiagem", "Unhas","Cuidados Faciais"]],
        "Corporal"  => ["Produtos" => ["Hidratantes e Cremes", "Óleos Corporais", "Protetores"]],        
    ];
    
    $fundos = [
        "maquiagem" => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaquiagemFundo.png"],
        "perfume"   => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/PerfumeFundo.png"],
        "skincare"  => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/SkinCareFundo.png"],
        "cabelo"    => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CabeloFundo.png"], 
        "utensílios" => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/utensíliosFundo.png"],
        "corporal"  => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/CorporalFundo.png"],
        "ofertas"   => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/OfertasFundo.png"],
        "mais_vendidos" => ["default" => "/projeto-integrador-et.com/public/imagens/PaginaCategoria/MaisVendidosFundo.png"],
    ];
    
    // --- ALTERAÇÃO AQUI: CAPTURA DO FILTRO COMO ARRAY ---
    $slugCategoria = $_GET['tela'] ?? "maquiagem"; 
    $subSelecionados = $_GET['sub'] ?? []; // Pega os filtros 'sub' (agora como array)
    
    // Garante que $subSelecionados é sempre um array
    if (!is_array($subSelecionados)) {
        $subSelecionados = [$subSelecionados];
    }
    // ---------------------------------------------------
    
    function renderSomenteSubcategoriasDB($id_categoria, $subSelecionados) {
        require_once __DIR__ . "/../../Models/categoria.php";
        $subcategorias = CategoriaModel::getSubcategorias($id_categoria);
    
        if (!$subcategorias) {
            echo "<p>Nenhum filtro disponível para essa categoria.</p>";
            return;
        }
    
        foreach ($subcategorias as $sub) {
            $nomeSub = $sub["nome"];
            // Verifica se a subcategoria está no array de selecionados
            $checked = in_array($nomeSub, $subSelecionados, true) ? 'checked' : '';
    
            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox" name="sub[]" value="' . htmlspecialchars($nomeSub) . '" ' . $checked . ' onchange="this.form.submit()"> 
                        <span class="checkmark"></span>
                        ' . htmlspecialchars($nomeSub) . '
                    </label>
                </div>
            ';
        }
    }
    
    $telaAtual = str_replace("_"," ", ucfirst($slugCategoria));
    // Usa apenas o fundo 'default' para simplificar, já que pode haver múltiplos filtros
    $fundoAtual = $fundos[$slugCategoria]["default"];
    
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
                                <?php
                                    // As variáveis $categoriasPorTela, $telaAtual, $slugCategoria e $subSelecionados
                                    // estão no escopo global e serão usadas no componente.
                                    require __DIR__ . "/../../../public/componentes/filtroCategoria/filtroCategoria.php"; 
                                ?>
                            </div>
                        </div>

                </div>
        
                <div class="PartedeBaixo">
            <?php

                // --- NOVO CÓDIGO DE BUSCA (Verificado e Corrigido) ---
                // Certifique-se que o caminho para Products.php está correto
                require_once __DIR__ . "/../../Models/productscategoria.php"; 
                $productModel = new Products();

                // $slugCategoria e $subSelecionados já estão definidos acima
                $produtosDB = $productModel->getProdutosFiltrados($slugCategoria, $subSelecionados);

                $produtos = [];

                if ($produtosDB === false) {
                    echo "<p>Houve um erro ao buscar os produtos.</p>";
                } elseif (empty($produtosDB)) {
                    echo "<p>Nenhum produto encontrado para os filtros selecionados.</p>";
                } else {
                    foreach ($produtosDB as $produto) {
                        // Mapeia os dados do banco para a sua função de card
                        $desconto = (floatval($produto['preco']) > floatval($produto['precoPromo']) && floatval($produto['preco']) > 0) 
                                        ? round(100 - (floatval($produto['precoPromo']) / floatval($produto['preco']) * 100))
                                        : 0;

                        foreach ($produtosDB as $produto) {
                        echo createCardProduto(
                            $produto['marca'],
                            $produto['nome'],
                            $produto['precoPromo'] == 0 ? $produto['preco'] : $produto['precoPromo'],
                            $produto['img1'],
                            $produto['fgPromocao'],
                            $produto['preco'],
                            $produto['corPrincipal'] ?? "#000",
                            // CORRIGIDO: Troca 'corDegrade1' por 'hexDegrade1'
                            $produto['hexDegrade1'] ?? "#000",
                            // CORRIGIDO: Troca 'corDegrade2' por 'hexDegrade2'
                            $produto['hexDegrade2'] ?? "#333",
                            $produto['id_produto']
                        );
                    }}
                }
                // --- FIM NOVO CÓDIGO DE BUSCA ---


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