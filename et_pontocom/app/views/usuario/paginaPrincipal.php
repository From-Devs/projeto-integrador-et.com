<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card

    session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Et.com</title>
    <link rel="stylesheet" href="../../../public/componentes/header/style.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
    <link rel="stylesheet" href="../../../public/componentes/produtoDestaque/style.css">
    <link rel="stylesheet" href="../../../public/css/paginaPrincipal.css">
    <link rel="stylesheet" href="../../../public/componentes/cardLancamento/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>

    <div class="lancamentos">
        <p class="titulo" id="tituloLancamento">Lançamentos</p>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerLancamento">
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
            <i class="fa-solid fa-chevron-right setaDireita" id="direita"></i>
        </div>
    </div>

    <div class="produtoDestaque">
        <div class="imagemProduto">
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/idole.png" alt="" class="produto">
            <span class="luzProduto"></span>
        </div>
        <div class="infoProdutoDestaque">
            <h1 class="nomeProduto">KIT LANCÔME LASH IDÔLEA</h1>
            <h2 class="marcaProduto">LANCÔME</h2>
            <h1 class="precoProduto">R$ 00.00</h1>
            <div class="botoesProdutoDestaque">
                <button class="comprar">Comprar</button> <!-- Trocar pelos componentes do Nicolas -->
                <button class="verDetalhes">Ver Detalhes</button>
            </div>
        </div>
        <img class="ondaProdutoDestaque ondaPrincipal" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/ondaBranca.png" alt="">
        <img class="ondaProdutoDestaque ondaFantasma" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/ondaFantasma.png" alt="">
        <img class="retanguloProdutoDestaque retanguloBlur" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/retanguloBlur.png" alt="">
    </div>

    <div class="lancamentos">
        <p class="titulo" id="tituloLancamento">Lançamentos</p>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerLancamento">
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
            <i class="fa-solid fa-chevron-right setaDireita" id="direita"></i>
        </div>
    </div>

    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/sidebar/script.js"></script>
    <script src="../../../public/componentes/cardLancamento/script.js"></script>
    <script src="../../../public/javascript/slider.js"></script>
</body>
</html>
