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
    <title id="titleRelatorioAssociado">Relatórios</title>
    <link rel="stylesheet" href="./../../../public/componentes/popup/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="./../../../public/css/RelatorioAssociado.css">
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
    <div id="titulo">
        <h1 id="tituloH1">Relatórios</h1>
    </div>
    <div class="cardsRelatorios">
        <?php echo PopUpConfirmar("relatorioReceitas", "Relatório de Receitas", "<button class='btn-relatorio'>Fazer Download em PDF<img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-download.png' alt='img-download'></button>", "", "500px", "gray", "white")?>
        <div class="cardRelatorio" onclick="abrirPopUp('relatorioReceitas')">
            <h2 id="textCard">Relatorio de Receitas</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeRelatorioReceitas.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioProduto", "Relatório de Receitas por Produto", "<button class='btn-relatorio'>Fazer Download em PDF<img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-download.png' alt='img-download'></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio" onclick="abrirPopUp('relatorioProduto')">
            <h2 id="textCard">Receita por Produto</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeReceitaProduto.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioVendas", "Relatório de Vendas Abandonadas", "<button class='btn-relatorio'>Fazer Download em PDF<img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-download.png' alt='img-download'></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio" onclick="abrirPopUp('relatorioVendas')">
            <h2 id="textCard">Vendas Abandonadas</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeVendasAbandonadas.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioSaldo", "Relatório de Saldo a Receber", "<button class='btn-relatorio'>Fazer Download em PDF<img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-download.png' alt='img-download'></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio" onclick="abrirPopUp('relatorioSaldo')">
            <h2 id="textCard">Saldo a Receber</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeSaldoReceber.png" alt="">
            </div>
        </div>
    </div>
    <script src="./../../../public/javascript/RelatorioAssociado.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/script.js"></script>
</body>
</html>