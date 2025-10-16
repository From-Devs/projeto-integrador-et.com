<?php
    session_start();
    
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";

    if($tipo_usuario != "Associado" || !isset($_SESSION['id_usuario'])){
        header("Location: /projeto-integrador-et.com/app/views/usuario/Login.php?erro=acesso_negado");
        exit();
    }

    require __DIR__ . "/../../../public/componentes/componentesADM_Associado/componentesADM_Associado.php";
    require __DIR__ . "/./../../../public/componentes/popup/popUp.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
    require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";

    //icone
    require_once __DIR__ . "/../../Controllers/UserController.php";
    $controller = new UserController();
    $user = $controller->getLoggedUser();
    //fim icone

    // session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/componentesADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/RelatorioAssociado.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM("Associado");
    ?>
    
    <!--cards relatorios-->
    <div class="main">
        <div id="container">
            <div id="titulo">
                <h1 id="tituloH1">Relatórios</h1>
            </div>
            <div id="geralInformacoes">
                <?php echo PopUpConfirmar("relatorioReceitas", "Relatório de Receitas", "<a class='btn-relatorio' href='/projeto-integrador-et.com/app/views/associado/gerar_relatorio.php?tipo=receita' target='_blank'>Fazer Download em PDF</a>", "", "500px", "gray", "white" )?>
                <?php dadosInforRelatorios('receita','../../../public/imagens/associado/iconeRelatorioReceitas.png','Relatório de Receitas','relatorioReceitas','grafico') ?>
                <?php echo PopUpConfirmar("relatorioProduto", "Relatório de Receitas por Produto", "<a class='btn-relatorio' href='/projeto-integrador-et.com/app/views/associado/gerar_relatorio.php?tipo=produto' target='_blank'>Fazer Download em PDF</a>", "", "500px", "gray", "white" ) ?>
                <?php dadosInforRelatorios('produto','../../../public/imagens/associado/iconeReceitaProduto.png','Receita por Produto','relatorioProduto','folha') ?>
                <?php echo PopUpConfirmar("relatorioVendas", "Relatório de Vendas Abandonadas", "<a class='btn-relatorio' href='/projeto-integrador-et.com/app/views/associado/gerar_relatorio.php?tipo=abandonadas' target='_blank'>Fazer Download em PDF</a>", "", "500px", "gray", "white" ) ?>
                <?php dadosInforRelatorios('abandonadas','../../../public/imagens/associado/iconeVendasAbandonadas.png','Vendas Abandonadas','relatorioVendas','sadFace') ?>
                <?php echo PopUpConfirmar("relatorioSaldo", "Relatório de Saldo a Receber", "<a class='btn-relatorio' href='/projeto-integrador-et.com/app/views/associado/gerar_relatorio.php?tipo=saldo' target='_blank'>Fazer Download em PDF</a>", "", "500px", "gray", "white" ) ?>
                <?php dadosInforRelatorios('saldo','../../../public/imagens/associado/iconeSaldoReceber.png','Saldo a Receber','relatorioSaldo','sadFace') ?>
            </div>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popUp/script.js"></script>
</body>
</html>