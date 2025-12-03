<?php 

include __DIR__ . "/../../../public/componentes/componentesADM_Associado/componentesADM_Associado.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require_once __DIR__ . "/../../Controllers/Dashboard_ADM_Controller.php";

// session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';

$obj = new Dashboard_ADM_Controller();

$dados = $obj->getDashboardData();
$topVendedores = $dados["top_vendedores"];
$topCategorias = $dados["top_categorias"];

$labelsVendedores = array_column($topVendedores, "vendedor");
$valuesVendedores = array_column($topVendedores, "total_vendas");

$labelsCategorias = array_column($topCategorias, "categoria");
$valuesCategorias = array_column($topCategorias, "total_vendas");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Dashboard</title>
    <link rel="stylesheet" href="./../../../public/css/DashboardADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
    ?>

    <!-- aqui acaba o lado esquerdo -->
    <div id="main">
        <div id="container">
            <div id="titulo">
                <h1 id="tituloH1">Dashboard</h1>
            </div>
            <div id="geralInformacoes">
                <!-- $nomeDiv,$icone, $titulo, $valor, $alt=''-->
                <?php dadosInfor('valorVendas','./../../../public/imagens/imagensADM/walletDashboard.png','Lucro total', '$ ' . htmlspecialchars($dados['lucro_total']['lucro_total']),'wallet') ?>
                <?php dadosInfor('lucroLiquido','./../../../public/imagens/imagensADM/cifraoDashboard.png','Vendas realizadas',htmlspecialchars($dados['unidades_vendidas']['unidades_vendidas']),'cifrao') ?>
                <?php dadosInfor('vendas','./../../../public/imagens/imagensADM/graficoDashboard.png','Associados á ET',htmlspecialchars($dados['total_associados']['total_associados']),'grafico') ?>
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
    </div>

    <script>
    var vendedoresLabels = <?= json_encode($labelsVendedores) ?>;
    var vendedoresData   = <?= json_encode($valuesVendedores) ?>;

    var categoriasLabels = <?= json_encode($labelsCategorias) ?>;
    var categoriasData   = <?= json_encode($valuesCategorias) ?>;
    </script>

    <script src="./../../../public/js/dashboardCharts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</htmld>