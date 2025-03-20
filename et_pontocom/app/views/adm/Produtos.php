<?php include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Produtos</title>
    <link rel="stylesheet" href="./../../../public/css/ProdutosADM.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <div class="sidebar_adm">
        <nav class="nav_adm">
            <div class="logo">
                <img src="./../../../public/imagens/ET/LogoBranca1.png" alt="LogoET">
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
    <!-- aqui acaba o container esquerdo -->
    <div id="container">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
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
                    <img id="imagemFiltro" src="../../../public/imagens/imagensADM/filtro.png" alt="filtro">
                </button>
            </div>
        </div>
        <div id="titulo">
            <h1 id="tituloH1">Produtos</h1>
        </div>
        <div id="lista">
            <table id="tabelaVendas">
                <thead id="barraCima">
                    <tr>
                        <th id="bordaEsquerda" scope='col'>#</th>
                        <th id="th2" scope='col'>Nome Cliente</th>
                        <th id="th3" scope='col'>Nome Produto</th>
                        <th id="th4" scope='col'>Preço</th>
                        <th id="th5" scope='col'>Data</th>
                        <th id="bordaDireita" scope='col'>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Guilherme Nantes</td>
                        <td>Hidratante Natura +8</td>
                        <td>R$ 44,99</td>
                        <td>20/06/2024</td>
                        <td><div id="statusPago">Pago</div></td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Joao Pedro</td>
                        <td>Base Liquída</td>
                        <td>R$ 666,99</td>
                        <td>30/03/2024</td>
                        <td ><div id="statusPago"> Pago</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Daniel Fagundes</td>
                        <td>Body Splash</td>
                        <td>R$ 42,91</td>
                        <td>19/08/2024</td>
                        <td ><div id="statusPago"> Pago</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Henrico Queiroz</td>
                        <td>Colônia Coffe Woman</td>
                        <td>R$ 39,99</td>
                        <td>17/08/2024</td>
                        <td ><div id="statusPendente"> Pago</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cecíliano Ferraz</td>
                        <td>Skincare</td>
                        <td>R$ 30,00</td>
                        <td>22/01/2024</td>
                        <td ><div id="statusPendente"> Pago</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Felipe Sales</td>
                        <td>Césio Liquído</td>
                        <td>R$ 23,50</td>
                        <td>12/08/2024</td>
                        <td ><div id="statusPago"> Pago</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="./../../../public/javascript/javascriptADM.js"></script>
</body>
</html>