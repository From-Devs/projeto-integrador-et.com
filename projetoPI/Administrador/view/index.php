<?php include __DIR__ . "/../private/index.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="containerEsquerda">
        <div id="imagem">
            <img id="fotoEt" src="./../public/ET/LogoET.png" alt="LogoET">
        </div>
        <div id="opcoes">
            <!-- $icone, $nome, $alt='' -->
            <?php botaoPadrao('./../public/icon/dashboard.png','Dashboard','iDash')?>
            <?php botaoPadrao('./../public/icon/produtos.png','Produtos','iProd')?>
            <?php botaoPadrao('./../public/icon/pedidos.png','Pedidos','iPedi')?>
            <?php botaoPadrao('./../public/icon/associados.png','Associados','iAssoc')?>
            <?php botaoPadrao('./../public/icon/relatorios.png','Relatórios','iRela')?>
            <?php botaoPadrao('./../public/icon/customizacao.png','Customização','iCustom')?>
            <div id="saindo">
                <button id="botaoSair">
                    <img src="./../public/icon/sair.png" alt="sair">
                </button>
                <p id="sairP">Sair</p>
            </div>  
        </div>
    </div>
    <div id="container">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="./../public/userFoto/userIMG.png" alt="userIMG">
                <p id="textUser">ADM ET</p>
            </div>
        </div>
        <div id="titulo">
            <h1 id="tituloH1">Dashboard</h1>
        </div>
        <div id="geralInformacoes">
            <!-- $nomeDiv,$icone, $titulo, $valor, $alt=''-->
            <?php dadosInfor('valorVendas','./../public/iforma/wallet.png','Valor Vendas','R$ 1.500,00','wallet') ?>
            <?php dadosInfor('lucroLiquido','./../public/iforma/cifrao.png','Lucro Líquido','R$ 569,00','cifrao') ?>
            <?php dadosInfor('vendas','./../public/iforma/grafico.png','Vendas','233','grafico') ?>
        </div>
        <div id="controlePizzas">
            <div id="divPizzaEsquerda">
                <?php pizzas('pizzaTop','Top 5 vendedores') ?>
            </div>
            <div id="divPizzaDireita">
                <?php pizzas('Regioes','Regiões que mais compram') ?>
            </div>
        </div>
    </div>
    <script src="./../private/javascript.js"></script>
</body>
</html>