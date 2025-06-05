<?php

require_once __DIR__ . "/./../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/ProdutoADM/produto.php";

session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="./../../../public/css/RelatorioAssociado.css">
    <link rel="stylesheet" href="./../../../public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/tabelasAssociado_ADM/ProdutoAssociado/produto.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/tabelasAssociado_ADM/ProdutoADM/produto.css">
    <link rel="stylesheet" href="./../../../public/css/ProdutosADM.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
        ?>
    <div id="container">
    <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
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
                    <img id="imagemFiltro" src="../../../public/imagens/imagensADM/filtro.png" alt="filtro">
                </button>
            </div>
        </div>
    
    <!--cards relatorios-->
        <h1 id="titleRelatorios">Produtos</h1>
        <?php
            $produtos = [
                ['id' => 1, 'nome' => 'Hidratante', 'estoque' => 26, 'custo' => 12.00, 'preco' => 29.90, 'pedidos' => 1243, 'sku' => 'S5D56GE'],
                ['id' => 2, 'nome' => 'Base Líquida', 'estoque' => 32, 'custo' => 14.00, 'preco' => 27.90, 'pedidos' => 543, 'sku' => 'FA9DSF56'],
                ['id' => 3, 'nome' => 'Body Splash', 'estoque' => 105, 'custo' => 13.00, 'preco' => 34.90, 'pedidos' => 432, 'sku' => 'UJ47R8S'],
                ['id' => 4, 'nome' => 'Colônia Coffee Man', 'estoque' => 64, 'custo' => 9.00, 'preco' => 18.90, 'pedidos' => 368, 'sku' => 'FDAS94A'],
                ['id' => 5, 'nome' => 'Skincare', 'estoque' => 82, 'custo' => 5.00, 'preco' => 16.90, 'pedidos' => 321, 'sku' => '9WE8FWS'],
                ['id' => 6, 'nome' => 'Césio Líquido', 'estoque' => 22, 'custo' => 12.00, 'preco' => 39.90, 'pedidos' => 302, 'sku' => 'F99W2C9'],
                ['id' => 7, 'nome' => 'Américo de Limpeza', 'estoque' => 14, 'custo' => 8.00, 'preco' => 22.90, 'pedidos' => 298, 'sku' => '98DF5AFE8'],
                ['id' => 8, 'nome' => 'Gel de Limpeza Facial', 'estoque' => 35, 'custo' => 4.00, 'preco' => 19.90, 'pedidos' => 256, 'sku' => 'V3D9S5FW8'],
                ['id' => 9, 'nome' => 'Kit Essenciais', 'estoque' => 40, 'custo' => 16.00, 'preco' => 54.90, 'pedidos' => 234, 'sku' => 'GER9S8DF9'],
                ['id' => 10, 'nome' => 'Perfume Floral', 'estoque' => 50, 'custo' => 20.00, 'preco' => 59.90, 'pedidos' => 178, 'sku' => 'ASD5648K'],
                ['id' => 11, 'nome' => 'Shampoo Nutritivo', 'estoque' => 75, 'custo' => 7.50, 'preco' => 18.00, 'pedidos' => 120, 'sku' => 'JKD589DS'],
                ['id' => 12, 'nome' => 'Condicionador Revitalizante', 'estoque' => 70, 'custo' => 8.00, 'preco' => 19.50, 'pedidos' => 110, 'sku' => 'DJKL8923'],
                ['id' => 13, 'nome' => 'Sabonete Líquido', 'estoque' => 90, 'custo' => 3.00, 'preco' => 10.00, 'pedidos' => 300, 'sku' => 'DKL34SDS'],
                ['id' => 14, 'nome' => 'Creme para Mãos', 'estoque' => 55, 'custo' => 5.00, 'preco' => 14.90, 'pedidos' => 210, 'sku' => 'LKJ34DFS'],
                ['id' => 15, 'nome' => 'Máscara Facial', 'estoque' => 60, 'custo' => 6.00, 'preco' => 15.90, 'pedidos' => 150, 'sku' => 'SDF234DF']
            ];
            tabelaProduto($produtos);
            ?>
    </div>
    
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>