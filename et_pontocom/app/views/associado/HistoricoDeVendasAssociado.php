<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/HistoricoVendasAssociado/hv.php";


    session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico De Vendas-Associado</title>
    <link rel="stylesheet" href="../../../public/css/HistoricoDeVendasAssociado.css">
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
    
    <div id="container">   
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <div id="texts">
                    <p id="textUser">Wellinton R.</p>
                    <p id="textUser2">Vendedor ET</p>
                </div>
            </div>
        </div> 
        <div id="pesquisar">
                <form action="">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto... ">
                </form> 
        </div>
        <div id="vendasmais">
            <h1>Vendas mais recentes</h1>
        </div>
        <?php
            echo tabelaHistoricoVendas()
        ?>
    </div>
    

    
<script src="script.js"></script>
<script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
<script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>