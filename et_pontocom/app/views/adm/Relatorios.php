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
    <title>Administrador - Relatórios</title>
    <link rel="stylesheet" href="./../../../public/css/RelatoriosADM.css">
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

    <!-- aqui acaba a sidebar esquerda -->
    <div id="container">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <p id="textUser">ADM ET</p>
            </div>
        </div>
        <div id="titulo">
            <h1 id="tituloH1">Relátorios</h1>
        </div>
        <div id="geralInformacoes">
            <!-- $nomeDiv,$icone, $titulo, $alt=''-->
            <?php dadosInforRelatorios('receita','../../../public/imagens/imagensADM/graficoRelatorios.png','Relátorio de Receitas','','grafico') ?>
            <?php dadosInforRelatorios('produto','../../../public/imagens/imagensADM/folhaRelatorios.png','Receita por Produto','folha') ?>
            <?php dadosInforRelatorios('abandonadas','../../../public/imagens/imagensADM/sadFaceRelatorios.png','Vendas Abandonadas','sadFace') ?>
        </div>

    </div>

    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>