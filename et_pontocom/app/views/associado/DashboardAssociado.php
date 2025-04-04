<?php include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php" ?>
<?php

require_once __DIR__ . "/./../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";

session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="./../../../public/css/RelatorioAssociado.css">
    <link rel="stylesheet" href="./../../../public/componentes/popup/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>
    <!-- conteudo main dashboard -->
    <div class="mainRelatorio">
        <div class="controleIcon">
            <div class="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <div class="contentUser">
                    <p id="textUser">Wellinton R.</p>
                    <p id="cargoUser">Vendedor</p>
                </div>
            </div>
        </div>
    </div>


    <div id="titulo">
        <h1 id="tituloH1">Dashboard</h1>
    </div>
    <div id="geralInformacoes">
        <!-- $nomeDiv,$icone, $titulo, $valor, $alt=''-->
        <?php dadosInfor('valorVendas','./../../public/iforma/wallet.png','Valor Vendas','R$ 1.500,00','wallet') ?>
        <?php dadosInfor('lucroLiquido','./../../public/iforma/cifrao.png','Lucro Líquido','R$ 569,00','cifrao') ?>
        <?php dadosInfor('vendas','./../../public/iforma/grafico.png','Vendas','233','grafico') ?>
    </div>
        <div id="controlePizzas">
            <div id="divPizzaEsquerda">
                <div id="divControladoraTexto">
                    <?php pizzas('Vendedores') ?>
                </div>
                <canvas id="myChartEsquerda"></canvas>
            </div>
            <div id="divPizzaDireita">
                <?php pizzas('Regioes') ?>
                <canvas id="myChartDireita"></canvas>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./../../../public/javascript/javascriptADM.js"></script>
</body>
</html>