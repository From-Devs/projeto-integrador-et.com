<?php 

    require __DIR__ . "/../popUp/popUp.php";
    require __DIR__ . "/../botao/botao.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="../sidebarADM_Associado/styles.css">
    <link rel="stylesheet" href="../botao/styles.css">
    <link rel="stylesheet" href="../popUp/styles.css">
</head>
<body>
    <div class="sidebar_adm">
        <nav class="nav_adm">
            <div class="logo">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca1.png" alt="">
            </div>
            <div class="linhaGradiente"></div>
            <div class="botoesMenu">
                <ul>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="fa fa-house-chimney" ></span>
                            <span class="button_name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class='bx bxs-package'></span>
                            <span class="button_name">Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class='bx bx-money-withdraw' ></span>
                            <span class="button_name">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="fa fa-clock"></span>
                            <span class="button_name">Histórico de Vendas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                            <span class='bx bxs-receipt'></span>
                            <span class="button_name">Relatórios</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="area_Sair">
                <div class="button_sair" id="button_sair" style="margin-top: 280px;">
                    <span class="fa fa-arrow-right-from-bracket" onclick='abrirPopUp("popupSair")'></span>
                    <span class="button_name" onclick='abrirPopUp("popupSair")'>Voltar a tela inicial</span>
                </div> 
                <?php
                    $btnSim = botaoPersonalizadoRedirect("Sim","btn-white","et_pontocom/app/views/usuario/paginaPrincipal.php","50px", "30px");
                    $btnNao = botaoPersonalizadoOnClick("Não", "btn-white", "fecharPopUp('popupSair')","50px", "30px");

                    echo PopUpConfirmar("popupSair","Confirmar?",$btnSim,$btnNao,"600px","white","black","30px");
                ?>
            </div>
        </nav>
    </div>
    
    <script src="./script.js"></script>
    <script src="../popUp/script.js"></script>
</body>
</html>