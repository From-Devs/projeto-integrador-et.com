<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/public/css/sidebar-adm.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav class="sidebar">
        <div class="logo"><img src="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/public/imagens/sidebar-adm/logo-et.png" alt=""></div>

        <div class="line"><img src="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/public/imagens/sidebar-adm/vector-line-et-dashboard.png" alt=""></div>

        <div class="menu">
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/app/views/layouts/dashboard-adm.php">
                        <i class='bx bxs-home icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/app/views/layouts/produtos-adm.php">
                        <i class='bx bxs-package icon' ></i>
                        <span class="text nav-text">Produtos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                       <i class='bx bx-money-withdraw icon'></i>
                        <span class="text nav-text">Pedidos</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-history icon' ></i>
                        <span class="text nav-text">Histórico de vendas</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bxs-download icon' ></i>
                        <span class="text nav-text">Relatórios</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bottom-content">
            <li class="nav-link">
                <a href="#">
                    <i class='bx bx-arrow-back icon'></i>
                    <span class="text nav-text">Voltar ao inicio</span>
                </a>
            </li>
        </div>
    </nav>

    <script src="<?php $_SERVER["DOCUMENT_ROOT"];?>/projeto-integrador-et.com/et_pontocom/public/javascript/sidebar-adm.js"></script>
</body>
</html>