<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="../../../public/css/MeusDadosAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?= createSidebarInterna($tipo_usuario); ?>

    <div class="container-principal">
        <header>
            <div class="titulo">Meus dados</div>
        </header>

        <div class="area-conteudo">
            <div class="box-principal">
                <div class="usuario-bloco-1">
                    <div class="usuario_titulo">
                        <h1>Pefil</h1>
                        <div class="x">🖊</div>
                    </div>
                    <div class="usuario_imagem_1">
                        <img src="https://uploads.spiritfanfiction.com/historias/capas/202201/ben-10-com-alcool-23539545-270120222055.jpg" alt="">
                        <p>nome sobrenome</p>
                    </div>
                </div>
                <div class="dados-secundarios">
                    <div class="box_campo_de_dados"></div>
                    <div class="box_campo_de_dados"></div>
                    <div class="box_campo_de_dados"></div>
                    <div class="box_campo_de_dados"></div>
                    <div class="box_campo_de_dados"></div>
                </div>
                <div class="dados-topo">
                    <h1>Editar</h1>
                </div>
                <div class="usuario-bloco-2"></div>
            </div>
        </div>
    </div>
</body>
</html>
