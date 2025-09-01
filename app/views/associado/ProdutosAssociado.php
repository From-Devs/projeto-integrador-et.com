<?php

require_once __DIR__ . "/../../Models/products.php";
require_once __DIR__ . "/./../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/ProdutoADM/produto.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

function verificaELimpaQueryString(){
    if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
        if(isset($_GET['acao']) && $_GET['acao'] === 'CadastrarProduto'){
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
        }else if(isset($_GET['acao']) && $_GET['acao'] === 'EditarProduto'){
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
        }else if(isset($_GET['acao']) && $_GET['acao'] === 'RemoverProduto'){
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
    }else if(isset($_GET['status']) && $_GET['status'] === 'erro'){
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

function buscarTodosProdutos(){
    $produtoController = new ProdutoController();
    return $produtoController->buscarTodosProdutos();
}

verificaELimpaQueryString();
$produtos = buscarTodosProdutos();

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
        echo createContaAssociadoADM("Associado");
    ?>
    
    <div class="main">
        <div id="container">

            <?php echo filtro("produto", ["ID", "Preço", "Data"]);?>
        
            <!--cards relatorios-->
            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Produtos</h1>
                </div>
                <?php
                    // $produtos = [
                    //     ['id' => 1, 'nome' => 'Hidratante', 'estoque' => 26, 'custo' => 12.00, 'preco' => 29.90, 'pedidos' => 1243, 'sku' => 'S5D56GE'],
                    //     ['id' => 2, 'nome' => 'Base Líquida', 'estoque' => 32, 'custo' => 14.00, 'preco' => 27.90, 'pedidos' => 543, 'sku' => 'FA9DSF56'],
                    //     ['id' => 3, 'nome' => 'Body Splash', 'estoque' => 105, 'custo' => 13.00, 'preco' => 34.90, 'pedidos' => 432, 'sku' => 'UJ47R8S'],
                    //     ['id' => 4, 'nome' => 'Colônia Coffee Man', 'estoque' => 64, 'custo' => 9.00, 'preco' => 18.90, 'pedidos' => 368, 'sku' => 'FDAS94A'],
                    //     ['id' => 5, 'nome' => 'Skincare', 'estoque' => 82, 'custo' => 5.00, 'preco' => 16.90, 'pedidos' => 321, 'sku' => '9WE8FWS'],
                    //     ['id' => 6, 'nome' => 'Césio Líquido', 'estoque' => 22, 'custo' => 12.00, 'preco' => 39.90, 'pedidos' => 302, 'sku' => 'F99W2C9'],
                    //     ['id' => 7, 'nome' => 'Américo de Limpeza', 'estoque' => 14, 'custo' => 8.00, 'preco' => 22.90, 'pedidos' => 298, 'sku' => '98DF5AFE8'],
                    //     ['id' => 8, 'nome' => 'Gel de Limpeza Facial', 'estoque' => 35, 'custo' => 4.00, 'preco' => 19.90, 'pedidos' => 256, 'sku' => 'V3D9S5FW8'],
                    //     ['id' => 9, 'nome' => 'Kit Essenciais', 'estoque' => 40, 'custo' => 16.00, 'preco' => 54.90, 'pedidos' => 234, 'sku' => 'GER9S8DF9'],
                    //     ['id' => 10, 'nome' => 'Perfume Floral', 'estoque' => 50, 'custo' => 20.00, 'preco' => 59.90, 'pedidos' => 178, 'sku' => 'ASD5648K'],
                    //     ['id' => 11, 'nome' => 'Shampoo Nutritivo', 'estoque' => 75, 'custo' => 7.50, 'preco' => 18.00, 'pedidos' => 120, 'sku' => 'JKD589DS'],
                    //     ['id' => 12, 'nome' => 'Condicionador Revitalizante', 'estoque' => 70, 'custo' => 8.00, 'preco' => 19.50, 'pedidos' => 110, 'sku' => 'DJKL8923'],
                    //     ['id' => 13, 'nome' => 'Sabonete Líquido', 'estoque' => 90, 'custo' => 3.00, 'preco' => 10.00, 'pedidos' => 300, 'sku' => 'DKL34SDS'],
                    //     ['id' => 14, 'nome' => 'Creme para Mãos', 'estoque' => 55, 'custo' => 5.00, 'preco' => 14.90, 'pedidos' => 210, 'sku' => 'LKJ34DFS'],
                    //     ['id' => 15, 'nome' => 'Máscara Facial', 'estoque' => 60, 'custo' => 6.00, 'preco' => 15.90, 'pedidos' => 150, 'sku' => 'SDF234DF']
                    // ];

                    $resultado = paginar($produtos, 7);

                    tabelaProduto($resultado['dados']);

                    renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);
                ?>
            </div>
        </div>
    </div>
        
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/Produto.js"></script>
</body>
</html>