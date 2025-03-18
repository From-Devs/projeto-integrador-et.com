<?php include __DIR__ . "/../../private/index.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Produtos</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <div class="sidebar_adm">
        <nav class="nav_adm">
            <div class="logo">
                <img src="../../public/ET/LogoET.png" alt="LogoET">
            </div>
            <div class="linhaGradiente"></div>
            <div class="botoesMenu">
                <ul>
                    <li class="nav-item">
                        <a href="./../dashboard/index.php" class="nav-link">
                            <span class="fa fa-house-chimney"></span>
                            <span class="button_name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <span class='bx bxs-package'></span>
                            <span class="button_name">Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./../pedidos/index.php" class="nav-link">
                            <span class='bx bx-money-withdraw' ></span>
                            <span class="button_name">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./../associados/index.php" class="nav-link">
                            <span class="fa fa-users"></span>
                            <span class="button_name">Associados</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./../relatorios/index.php" class="nav-link">
                            <span class='bx bxs-receipt'></span>
                            <span class="button_name">Relatórios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./../customizacao/index.php" class="nav-link">
                            <span class='bx bxs-palette'></span>
                            <span class="button_name">Customização</span>   
                        </a>
                    </li>
                </ul>
            </div>
            <div class="area_Sair">
                <a href="#" class="button_sair" style="margin-top: 280px;">
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
                <img id="fotoUser" src="./../../public/userFoto/userIMG.png" alt="userIMG">
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
                    <img id="imagemFiltro" src="./../../public/filtros/filtro.png" alt="filtro">
                </button>
            </div>
        </div>
    </div>
    <script src="./../../private/javascript.js"></script>
</body>
</html>