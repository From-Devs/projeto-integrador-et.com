<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <link rel="stylesheet" href="../../../public/css/sidebar/sidebarA.css">
    <link rel="stylesheet" href="../../../public/css/associado/dashboard-associado.css">

</head>
<body>
    <div class="sidebar">
        <?php require "../../../public/componentes/sidebarADM_Associado/sidebarAssociado.php" ?>  
    </div>

    <div class="main">
        <div class="header">
            <div class="profile-photo">
                <img src="" alt="">
            </div>
            <div class="profile-content">
                <h2>Wellington R.</h2>
                <h3>Vendedor ET</h3>
            </div>
        </div>

        <div class="main-dashboard">
            <h1>Dashboard</h1>

            <div class="numbers-dashboard">
                <div class="number-box box1">
                    <div class="number-box-content">
                        <h2 id="h2Dashboard">Valor Vendas</h2>
                        <h3 id="h3Dashboard">R$ 1.500,00</h3>
                    </div>
                    <div class="number-box-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 20 20"><path fill="currentColor" d="M0 4c0-1.1.9-2 2-2h15a1 1 0 0 1 1 1v1H2v1h17a1 1 0 0 1 1 1v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm16.5 9a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3"/></svg>
                    </div>
                </div>
                <div class="number-box box2">
                    <div class="number-box-content">
                        <h2 id="h2Dashboard">Lucro Líquido</h2>
                        <h3 id="h3Dashboard">R$ 589,00</h3>
                    </div>
                    <div class="number-box-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24"><path fill="currentColor" d="M11.994 4a.89.89 0 0 1 .89.889V6.37h.299a3.253 3.253 0 0 1 3.256 3.26a.889.889 0 0 1-1.778 0c0-.823-.66-1.482-1.478-1.482h-2.676c-.651 0-1.18.53-1.18 1.176c0 .485.109.682.186.777c.09.11.255.222.615.344l4.3 1.425c.48.163 1.018.41 1.42.901c.416.506.59 1.148.59 1.905a2.957 2.957 0 0 1-2.956 2.954h-.599v1.481a.889.889 0 1 1-1.778 0V17.63h-.3a3.253 3.253 0 0 1-3.255-3.26a.889.889 0 0 1 1.778 0c0 .823.659 1.482 1.478 1.482h2.676c.65 0 1.179-.53 1.179-1.176c0-.485-.108-.682-.186-.777c-.09-.11-.255-.222-.615-.344L9.561 12.13c-.48-.163-1.019-.41-1.421-.901c-.416-.506-.59-1.148-.59-1.905a2.957 2.957 0 0 1 2.957-2.954h.598V4.89a.89.89 0 0 1 .89-.889"/></svg>
                    </div>
                </div>
                <div class="number-box box3">
                    <div class="number-box-content">
                        <h2 id="h2Dashboard">Vendas</h2>
                        <h3 id="h3Dashboard">233</h3>
                    </div>
                    <div class="number-box-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><path fill="currentColor" d="M32 9a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v30a3 3 0 0 1-3 3h-4a3 3 0 0 1-3-3zM19 21a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v18a3 3 0 0 1-3 3h-4a3 3 0 0 1-3-3zM9 30a3 3 0 0 0-3 3v6a3 3 0 0 0 3 3h4a3 3 0 0 0 3-3v-6a3 3 0 0 0-3-3z"/></svg>                    </div>
                    </div>
            </div>
        </div>
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
    <script src="./../../../public/javascript/javascriptAssoc.js"></script>
</body>
</html>