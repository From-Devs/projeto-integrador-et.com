<?php include __DIR__ . "/../../../public/componentes/telaAssociado/componenteAssociado.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./../../../public/css/associado/dashboard-associado.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <div class="sidebar_adm">
        <nav class="nav_adm">
            <div class="logo">
                <img src="../../../public/imagens/ET/LogoBranca1.png" alt="LogoET">
            </div>
            <div class="linhaGradiente"></div>
            <div class="botoesMenu">
                <ul>
                    <li class="nav-item">
                        <a href="Dashboard.php" class="nav-link">
                            <span class="fa fa-house-chimney"></span>
                            <span class="button_name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Produtos.php" class="nav-link">
                            <span class='bx bxs-package'></span>
                            <span class="button_name">Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Pedidos.php" class="nav-link">
                            <span class='bx bx-money-withdraw' ></span>
                            <span class="button_name">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Associados.php" class="nav-link">
                            <span class="fa fa-users"></span>
                            <span class="button_name">Associados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Relatorios.php" class="nav-link">
                            <span class='bx bxs-receipt'></span>
                            <span class="button_name">Relatórios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Customizacao.php" class="nav-link">
                            <span class='bx bxs-palette'></span>
                            <span class="button_name">Customização</span>   
                        </a>
                    </li>
                </ul>
            </div>
            <div class="area_Sair">
                <a href="./../usuario/paginaPrincipal.php" class="button_sair" style="margin-top: 280px;">
                <span class="fa fa-arrow-right-from-bracket"></span>
                <span class="button_name">Sair</span>
                </a>
            </div>
        </nav>
    </div>
    <!-- aqui acaba o lado esquerdo -->
    <div id="container">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <p id="textUser">Associado ET</p>
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
</htmld>