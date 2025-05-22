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
    <title>Pedidos</title>
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
    
    <!--cards relatorios-->
    <h1 id="titleRelatorios">Pedidos</h1>
    
    <script src="./../../../public/javascript/associado/Associado.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>