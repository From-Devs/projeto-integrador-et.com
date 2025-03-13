<?php include __DIR__ . "/../../private/index.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Associados</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="containerEsquerda">
        <div id="imagem">
            <img id="fotoEt" src="./../../public/ET/LogoET.png" alt="LogoET">
        </div>
        <div id="opcoes">
            <!-- $icone, $nome, $alt='', $tipoBotao, $redirecionamento -->
            <?php botaoPadrao('./../dashboard/index.php','./../../public/icon/dashboard.png','Dashboard','iDash')?>
            <?php botaoPadrao('./../produtos/index.php','./../../public/icon/produtos.png','Produtos','iProd')?>
            <?php botaoPadrao('./../pedidos/index.php','./../../public/icon/pedidos.png','Pedidos','iPedi')?>
            <?php botaoPadrao('./index.php','./../../public/icon/associados.png','Associados','iAssoc','usandoAgoraBotao')?>
            <?php botaoPadrao('./../relatorios/index.php','./../../public/icon/relatorios.png','Relatórios','iRela')?>
            <?php botaoPadrao('./../customizacao/index.php','./../../public/icon/customizacao.png','Customização','iCustom')?>
            <div id="saindo">
                <button id="botaoSair">
                    <img src="./../../public/icon/sair.png" alt="sair">
                </button>
                <p id="sairP">Sair</p>
            </div>  
        </div>
    </div>
</body>
</html>