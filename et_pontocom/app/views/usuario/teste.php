<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card

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
    <link rel="stylesheet" href="../../../public/css/teste.css">
    <link rel="stylesheet" href="../../../public/componentes/cardLancamento/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    echo createHeader($login); // função que cria o header
    ?>

    <div class="lancamentos">
        <p class="titulo" id="tituloLancamento">Lançamentos</p>
        <div class="frameLancamentos">
            <i class="fa-solid fa-chevron-left setaEsquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerLancamento">
                    <?php
                    echo createCardProdutoLancamento("Teste 1","R$ 1000,00");
                    echo createCardProdutoLancamento("Teste 2","R$ 2000,00");
                    echo createCardProdutoLancamento("Teste 3","R$ 3000,00");
                    echo createCardProdutoLancamento("Teste 4","R$ 1000,00");
                    echo createCardProdutoLancamento("Teste 5","R$ 2000,00");
                    echo createCardProdutoLancamento("Teste 6","R$ 3000,00");
                    echo createCardProdutoLancamento("Teste 7","R$ 2000,00");
                    echo createCardProdutoLancamento("Teste 8","R$ 3000,00");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaDireita"></i>
        </div>
    </div>

    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/cardLancamento/script.js"></script>
</body>
</html>
