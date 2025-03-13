<?php include __DIR__ . "/../../private/index.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Produtos</title>
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
            <?php botaoPadrao('./../dashboard/index.php','./../../public/icon/dashboard.png','Dashboard','iDash',)?>
            <?php botaoPadrao('./index.php','./../../public/icon/produtos.png','Produtos','iProd','usandoAgoraBotao')?>
            <?php botaoPadrao('./../pedidos/index.php','./../../public/icon/pedidos.png','Pedidos','iPedi')?>
            <?php botaoPadrao('./../associados/index.php','./../../public/icon/associados.png','Associados','iAssoc')?>
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
    <div id="container">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="./../../public/userFoto/userIMG.png" alt="userIMG">
                <p id="textUser">ADM ET</p>
            </div>
        </div>
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <form action="">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                </form>
            </div>
            <div id="filtro">
                <button id="botaoFiltragem">
                    <p>Filtros</p>
                    <img id="imagemFiltro" src="./../../public/filtros/filtro.png" alt="filtro">
                </button>
            </div>
        </div>
    </div>
</body>
</html>