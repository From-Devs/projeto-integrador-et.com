<?php 

include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Pedidos</title>
    <link rel="stylesheet" href="./../../../public/css/PedidosADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>

<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>

    <!-- aqui acaba o container esquerda -->
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
            <h1 id="tituloH1">Pedidos</h1>
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
                        <td ><div id="statusPendente"> Pendente</div></td> 
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Cecíliano Ferraz</td>
                        <td>Skincare</td>
                        <td>R$ 30,00</td>
                        <td>22/01/2024</td>
                        <td ><div id="statusPendente"> Pendente</div></td> 
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
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>

</html>