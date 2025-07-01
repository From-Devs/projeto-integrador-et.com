<?php 

    include __DIR__ . "/../../../public/componentes/componentesADM_Associado/componentesADM_Associado.php";
    include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/PedidosAssociado_ADM/pedidos.php";
    require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
    require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
    require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";

    session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Pedidos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/PedidosADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/FiltrosADMeAssociados/filtros.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>

<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
    ?>

    <!-- aqui acaba o container esquerda -->
    <div class="main">
        <div id="container">

            <?php echo filtro(["ID", "Preço", "Data"])?>

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Pedidos</h1>
                </div>
                <?php
                    echo tabelaPedidos();
                ?>
            </div>
        </div>
    </div>

    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>

</html>