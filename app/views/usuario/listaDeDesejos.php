<?php
    require_once __DIR__ . "/../../../config/ProdutoController.php";
    require_once __DIR__ . "/../../../config/database.php";
    require_once __DIR__ . "/../../../public/componentes/header/header.php"; 
    require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require_once __DIR__ . "/../../../public/componentes/cardListaDeDesejos/cardListaDeDesejos.php";
    require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
    require_once __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

    session_start();

    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)

    // Cria uma instância do controlador para buscar os produtos favoritos.
    $controller = new ProdutoController();
    
    //pega o id do usuario logado
    $idUsuario = $_SESSION['id_usuario'] ?? null;
    //busca os favoritos
    $favoritos = $idUsuario ? $controller->ListarFavoritos($idUsuario) : [];  

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Inclusão de todos os arquivos CSS -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/listaDeDesejos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardListaDeDesejos/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">

    <!-- Fontes e ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <title>Lista de Desejos</title>
</head>
<body>

    <?php
    echo createHeader($login, $tipoUsuario);
    ?>

    <?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px")?>

    <div class="title-container">
        <div class="title">
            <h1>MINHA LISTA DE DESEJOS</h1>
        </div>
        <center><div class="line"></div></center>
    </div>

   
    <div class="acoesWrapper">
        <div class="acoesSelecionados" id="acoesSelecionados" style="display:none;">
            <div class="inputCheck">
                <input type="checkbox" id="selecionarTodos"> 
                <label>Selecionar todos</label>
            </div>
            <div class="btnCheck">
                <button id="adicionarCarrinho" onclick="adicionarAoCarrinho($item['id_produto'])">Adicionar ao Carrinho</button>
                <button id="excluirSelecionados" onclick="removerDosFavoritos($item['id_produto'])"> Excluir</button>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="degradeTopo"></div>
        <div class="degradeBaixo"></div>
        <div class="card-container">

        <?php
            // Verificação para garantir que o array está populado e para exibir os cards dinamicamente      
            if (!empty($favoritos)) {
                foreach ($favoritos as $item) {
                    $preco = $item['preco'];
                    $precoPromo = $item['precoPromo'] ?? null;
                    $imagem     = !empty($item['imagem']) ? $item['imagem'] : 'no-image.png';
                    $dataAdicionado = $item['dataAdd'];

                    $produtosListaDesejos = [
                        createCardListaDeDesejos(
                            $item['id_produto'],
                            $imagem,
                            $preco,
                            $item['marca'],
                            $item['nome'],
                            $dataAdicionado,
                            $item['corPrincipal'] ?? "#919191",
                            $item['hexDegrade1'] ?? "#919191",
                            $item['hexDegrade2'] ?? "#919191",
                            $precoPromo
                        ),
                    ];

                    $resultado = paginar($produtosListaDesejos, 16);

                    foreach ($resultado['dados'] as $produtos){
                        echo $produtos;
                    }

                    renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);
                    
                }
            } else {
                // echo "<p style='text-align: center; margin-top: 2rem;'>Sua lista de desejos está vazia.</p>";

                //Colocarei essa parte apenas para mostrar como ficaria o front. Quando ficar pronto o back-end, descomentar a parte de cima e apagar essa:    
                $produtosListaDesejos = [
                    createCardListaDeDesejos(1,"bt-ovni",48.68,"Bruna Tavares", "BT Ovni Galaxy","08/07/2025", "rgba(28, 30, 37, 0.712)","rgb(217,234,37)", "rgb(221, 235, 67)"),
                    createCardListaDeDesejos(2,"superstay",99.51,"Maybelline", "Superstay Vinyl Ink Liquid Lipstick","08/07/2025", "rgb(160, 1, 27)","rgb(199, 43, 69)", "rgb(211, 112, 128)",50.00),
                    createCardListaDeDesejos(3,"vult",23.87,"Vult", "Base Líquida Efeito Matte","08/07/2025", "rgb(197, 153, 114)","rgb(231,187,148)", "rgb(241, 204, 171)"),
                    createCardListaDeDesejos(4,"bt-blackberry",35.89,"Bruna Tavares", "BT Velvet Blackberry","08/07/2025", "rgb(58, 9, 13)","rgb(112, 37, 42)", "rgb(179, 110, 116)"),
                    createCardListaDeDesejos(5,"renew",75.90,"Avon", "Creme Renew Reversalist Dia Vitalidade 30+","08/07/2025", "rgb(143, 43, 41)","rgb(182, 78, 76)", "rgb(196, 117, 116)"),
                    createCardListaDeDesejos(6,"nuvem",84.90,"O Boticário", "Body Splash Cuide-se Bem Nuvem","08/07/2025", "rgb(139, 198, 206)","rgb(176, 237, 247)", "rgb(205, 245, 250)"),
                    createCardListaDeDesejos(7,"epidrat",66.60,"Mantecorp", "Epidrat Calm Hidratante","08/07/2025", "rgb(81,74,108)","rgb(149, 140, 185)", "rgb(163, 156, 189)"),
                    createCardListaDeDesejos(8,"milk",20.99,"Nivea", "Creme Hidratante Milk","08/07/2025", "rgb(15, 44, 122)","rgb(70, 100, 182)", "rgb(117, 138, 194)"),
                    createCardListaDeDesejos(9,"malbec",169.00,"O Boticário", "Malbec Tradicional","08/07/2025", "rgb(65, 16, 16)","rgb(102, 56, 48)", "rgb(122, 92, 85)"),
                    createCardListaDeDesejos(10,"pincel",95.90,"Mari Maria Makeup", "Pincel Angular Para Base","08/07/2025", "rgb(187, 49, 1)","rgb(232, 104, 63)", "rgb(235, 149, 120)"),
                    createCardListaDeDesejos(11,"esponja",35.90,"Mari Maria Makeup", "Esponja Flat Blende","08/07/2025", "rgb(241, 93, 10)","rgb(243, 130, 64)", "rgb(248, 180, 140)"),
                    createCardListaDeDesejos(12,"truss",269.99,"Truss", "Net Mask Máscara Capilar","08/07/2025", "rgb(0, 150, 177)","rgb(66, 203, 228)", "rgb(141, 221, 235)"),
                    createCardListaDeDesejos(13,"amor-amor",405.30,"Cacharel", "AMOR AMOR","08/07/2025", "rgb(206, 21, 21)","rgb(247, 53, 53)", "rgb(242, 116, 116)"),
                ];

                $resultado = paginar($produtosListaDesejos, 10);

                    foreach ($resultado['dados'] as $produtos){
                        echo $produtos;
                    }

                    
            }

            ?>
        </div>     
    </div>
    <div class="paginação" style="width: 100%; justify-items: center;">
        <?php renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']); ?>
    </div>
    
    <center><div class="line2"></div></center>
    
    <!-- Seção de Sugestões: Mantida como a original -->
    <div class="sliderContainer">
        <div class="sessaoProdutos">
            <div class="tituloSessao">
                <p class="titulo">Sugestões</p>
            </div>
            <div class="frameSlider">
                <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
                <div class="degradeEsquerda"></div>
                <div class="frameProdutos">
                    <div class="containerProdutos">
                        <?php
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065");
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065");

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

    <!-- Scripts -->
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    
    <script>
    /**
     * Redireciona para a página de detalhes do produto.
     * @param {number} idProduto O ID do produto a ser visualizado.
     */
    function redirecionarDetalhesDoProduto(idProduto) {
        window.location.href = `detalhesDoProduto.php?id=${idProduto}`;
    }

    /**
     * Adiciona um produto ao carrinho.
     * @param {number} idProduto O ID do produto a ser adicionado.
     */
    function adicionarAoCarrinho(idProduto) {
        // Envia um formulário dinâmico para o router PHP
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/projeto-integrador-et.com/config/produtoRouter.php';

        const acaoInput = document.createElement('input');
        acaoInput.type = 'hidden';
        acaoInput.name = 'acao';
        acaoInput.value = 'carrinho';
        form.appendChild(acaoInput);

        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id_produto';
        idInput.value = idProduto;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
    }
    
    /**
     * Remove um produto da lista de favoritos.
     * @param {number} idProduto O ID do produto a ser removido.
     */
    function removerDosFavoritos(idProduto) {
        // Envia uma requisição POST para o router PHP
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/projeto-integrador-et.com/config/produtoRouter.php';

        const acaoInput = document.createElement('input');
        acaoInput.type = 'hidden';
        acaoInput.name = 'acao';
        acaoInput.value = 'remover_favorito';
        form.appendChild(acaoInput);

        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id_produto';
        idInput.value = idProduto;
        form.appendChild(idInput);

        document.body.appendChild(form);
        form.submit();
    }
    
    </script>
    
    <script src="/projeto-integrador-et.com/public/javascript/listaDeDesejos.js"></script>
    

</body>
</html>
