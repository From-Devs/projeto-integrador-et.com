<?php

require_once __DIR__."/./../../../public/componentes/popup/popUp.php";

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
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
    <h1 id="titleRelatorios">Relatórios</h1>
    <div class="cardsRelatorios">
        <?php echo PopUpConfirmar("relatorioReceitas", "Relatório receitas", "<button id='btnRelatorio'>teste <img src='' alt=''></button>", "", "500px", "gray", "white")?>
        <div class="cardRelatorio" onclick="abrirPopUp('relatorioReceitas')">
            <h2 id="textCard">Relatorio de Receitas</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeRelatorioReceitas.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioReceitas", "Relatório receitas", "<button id='btnRelatorio'>teste <img src='' alt=''></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio">
            <h2 id="textCard">Receita por Produto</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeReceitaProduto.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioReceitas", "Relatório receitas", "<button id='btnRelatorio'>teste <img src='' alt=''></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio">
            <h2 id="textCard">Vendas Abandonadas</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeVendasAbandonadas.png" alt="">
            </div>
        </div>
        <?php echo PopUpConfirmar("relatorioReceitas", "Relatório receitas", "<button id='btnRelatorio'>teste <img src='' alt=''></button>", "", "", "gray", "white")?>
        <div class="cardRelatorio">
            <h2 id="textCard">Saldo a Receber</h2>
            <div class="iconCard">
                <img src="./../../../public/imagens/associado/iconeSaldoReceber.png" alt="">
            </div>
        </div>
    </div>
    <script src="./../../../public/javascript/associado/RelatorioAssociado.js"></script>
    <script src="./../../../public/componentes/popup/script.js"></script>
</body>
</html>