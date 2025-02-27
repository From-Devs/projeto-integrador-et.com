<?php
    require __DIR__ . "/../../../public/componentes/header.php"; // import do header

    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Et.com</title>
    <link rel="stylesheet" href="../../../public/css/header.css">
    <link rel="stylesheet" href="../../../public/css/testeSidebar.css">
    <link rel="stylesheet" href="../../../public/css/teste.css">
    <link rel="stylesheet" href="../../../public/css/produtoLancamento.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <?php
    echo createHeader($login) // função que cria o header
    ?>

    <div class="cardLancamento" id="cardLancamento1">
        <img class="imgCardLancamento" id="imgCardLancamento" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/marcas-com-rimel-vegano-2-e1649963065836.jpg" alt="">
        <div class="baixo" id="baixo">
            <span class="textoCardLancamento" id="textoCardLancamento">O Boticário - L'eau De Lily Soleil Perfume Feminino</span>
            <p class="CardLancamentoPreco" id="CardLancamentoPreco">R$ 000,00</p>
            <button class="botaoMaisDetalhesCardLancamento" id="botaoMaisDetalhesCardLancamento">Comprar</button>
            <button class="botaoComprarCardLancamento" id="botaoComprarCardLancamento">Comprar</button>
        </div>
    </div>

    <script src="../../../public/javascript/header.js"></script>
    <script src="../../../public/javascript/produtoLancamento.js"></script>
</body>
</html>
