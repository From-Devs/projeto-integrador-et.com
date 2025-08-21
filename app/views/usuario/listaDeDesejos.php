<?php
// Inclui os arquivos necessários para o funcionamento da página.
// Mantive todos os requires no início para melhor organização.
require_once __DIR__ . "/../../../config/ProdutoController.php";
require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
require_once __DIR__ . "/../../../public/componentes/header/header.php";
require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";

session_start();
// Define o tipo de usuário e o estado de login com base na sessão.
$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
$login = !empty($_SESSION['id_usuario']); // Uma forma mais confiável de verificar o login

// Cria uma instância do controlador para buscar os produtos favoritos.
$controller = new ProdutoController();
$favoritos = $controller->ListarFavoritos();

?>

<!DOCTYPE html>
<html lang="pt-br">
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
            <?php
            // Verificação para garantir que o array está populado e para exibir os cards dinamicamente
            if (!empty($favoritos)) {
                foreach ($favoritos as $item) {
                    $preco      = "R$ " . number_format((float)$item['preco'], 2, ",", ".");
                    $precoPromo = "R$ " . number_format((float)$item['precoPromo'], 2, ",", ".");
                    $emDesconto = $item['precoPromo'] < $item['preco']; // Adiciona a lógica para verificar o desconto
                    $imagem     = !empty($item['imagem']) ? $item['imagem'] : 'no-image.png';

                    echo "
                    <div class='cardDesejos' data-id='{$item['id_produto']}'>
                        <div class='cardImg'>
                            <img src='/projeto-integrador-et.com/public/imagens/produto/{$imagem}' alt='Imagem do produto'>
                        </div>

                        <div class='cardPreco'>
                            <p><strong>{$preco}</strong></p>
                        </div>

                        <div class='cardInfo'>
                            <p>{$item['marca']} {$item['nome']}</p>
                        </div>

                        <div class='cardButtons'>
                            <button class='buttonDesejos' onclick='adicionarAoCarrinho({$item['id_produto']})'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </button>
                            <button class='buttonDesejos' onclick='removerDosFavoritos({$item['id_produto']})'>
                                <img src='/projeto-integrador-et.com/public/imagens/produtoAssociado/lixeira.png' alt='Remover da lista'>
                            </button>
                        </div>
                    </div>";
                }
            } else {
                echo "<p style='text-align: center; margin-top: 2rem;'>Sua lista de desejos está vazia.</p>";
            }
            ?>
        </div>
    </div>
    
    <center><div class="line2"></div></center>
    
    <!-- Seção de Sugestões: Mantida como a original -->
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
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", false, "R$30,00", "#DBA980", "72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
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
</body>
</html>
