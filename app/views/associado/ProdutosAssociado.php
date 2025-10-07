<?php
session_start();
    require_once __DIR__ . "/../../Models/products.php";
    require_once __DIR__ . "/./../../../public/componentes/popup/popUp.php";
    require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
    include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/ProdutoADM/produto.php";
    require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
    require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";
    $controller = new UserController();
    $user = $controller->getLoggedUser();

    function verificaELimpaQueryString(){
        if (isset($_GET['status']) && $_GET['status'] == 'sucesso') {
            if(isset($_GET['acao']) && $_GET['acao'] == 'CadastrarProduto'){
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        abrirPopUp('popUpCadastro');
                        // Remove ?status=sucesso da URL
                        if (window.history.replaceState) {
                            const urlSemParametro = window.location.origin + window.location.pathname;
                            window.history.replaceState({}, document.title, urlSemParametro);
                        }
                    });
                </script>";    
            }else if(isset($_GET['acao']) && $_GET['acao'] == 'EditarProduto'){
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        abrirPopUp('popUpEdicao');
                        // Remove ?status=sucesso da URL
                        if (window.history.replaceState) {
                            const urlSemParametro = window.location.origin + window.location.pathname;
                            window.history.replaceState({}, document.title, urlSemParametro);
                        }
                    });
                </script>";
            }else if(isset($_GET['acao']) && $_GET['acao'] == 'RemoverProduto'){
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        abrirPopUp('popUpRemocao');
                        // Remove ?status=sucesso da URL
                        if (window.history.replaceState) {
                            const urlSemParametro = window.location.origin + window.location.pathname;
                            window.history.replaceState({}, document.title, urlSemParametro);
                        }
                    });
                </script>";
            }
        }else if(isset($_GET['status']) && $_GET['status'] == 'erro'){
            if(isset($_GET['acao']) && $_GET['acao'] === 'CadastrarProduto'){
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        abrirPopUp('popUpErro');
                        // Remove ?status=sucesso da URL
                        if (window.history.replaceState) {
                            const urlSemParametro = window.location.origin + window.location.pathname;
                            window.history.replaceState({}, document.title, urlSemParametro);
                        }
                    });
                </script>";
            }
        }
    }

    verificaELimpaQueryString();

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
    $products = new Products();
    $produtos = $products->buscarTodosProdutos($ordem, $pesquisa);
    
    // // session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css"> 
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/AssociadoGeral.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/ProdutosAssociado.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM("Associado",$user);
    ?>
    
    <div class="main">
        <div id="container">
            <?php echo filtro("produto", ["ID", "Preço", "Qtd. Estoque"]);?>
        
            <!--cards relatorios-->
            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Produtos</h1>
                </div>
                <?php                    
                    $pagina = paginar($produtos, 7, 'page');
                    tabelaProduto($pagina['dados']);
                    renderPaginacao(
                        $pagina['paginaAtual'],
                        $pagina['totalPaginas'],
                        'page',
                        $parametrosExtrasString
                    );
                ?>
            </div>
        </div>
    </div>
        
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/Produto.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/FiltroQueryString.js"></script>
</body>
</html>