<?php
    session_start();

    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";

    if($tipo_usuario != "Associado" || !isset($_SESSION['id_usuario'])){
        header("Location: /projeto-integrador-et.com/app/views/usuario/Login.php?erro=acesso_negado");
        exit();
    }

    require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
    require_once __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/HistoricoVendasAssociado/hv.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
    require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
    require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
    require __DIR__ . "/../../Controllers/HistoricoDeVendasController.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";
    $controller = new UserController();
    $user = $controller->getLoggedUser();


    $parametrosExtras = [];

    if (!empty($_GET['ordem'])) {
        $parametrosExtras[] = 'ordem=' . urlencode($_GET['ordem']);
    }

    if (!empty($_GET['pesquisa'])) {
        $parametrosExtras[] = 'pesquisa=' . urlencode($_GET['pesquisa']);
    }

    $parametrosExtrasString = implode('&', $parametrosExtras);

    $ordem = $_GET['ordem'] ?? null;
    $pesquisa = $_GET['pesquisa'] ?? null;
    $historicoDeVendasController = new HistoricoDeVendasController();
    $vendas = $historicoDeVendasController->BuscarHistoricoDeVendasProdutos($ordem, $pesquisa);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico De Vendas</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/HistoricoDeVendasAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">
    <!-- <link rel="stylesheet" href="/projeto-integrador-et.com/public\componentes\tabelasAssociado_ADM\HistoricoVendasAssociado\hv.css"> -->
    

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM("Associado",$user);
    ?>
    
    <div class="main">
        <div id="container">

            <?php echo filtro("filtro",["ID", "Preço", "Data", "Quantidade"])?>
            

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Vendas mais recentes</h1>
                </div>
            <?php
                $pagina = paginarMaisDeUmaQueryString($vendas, 5);
                tabelaHistoricoVendas($pagina['dados']);
                renderPaginacaoMaisDeUmaQueryString(
                    $pagina['paginaAtual'],
                    $pagina['totalPaginas'],
                    $parametrosExtrasString
                );

            ?>
            </div>
        </div>
    </div>
    
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/FiltroQueryString.js"></script>
</body>
</html>