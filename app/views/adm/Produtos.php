<?php 

include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/ProdutoADM/produto.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Produtos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/ProdutosADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
    ?>

    <!-- aqui acaba o container esquerdo -->
    <div class="main">
        <div id="container">

            <?php echo filtro("Filtro",["ID", "Preço", "Data"])?>

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Produtos</h1>
                </div>
                <?php 
                    $produtos = [
                        ['nome' => 'Hidratante', 'sku' => 'S5D56GE'],
                        ['nome' => 'Shampoo Anticaspa', 'sku' => 'A1B2C3D'],
                        ['nome' => 'Condicionador Suave', 'sku' => 'E4F5G6H'],
                        ['nome' => 'Sabonete Neutro', 'sku' => 'I7J8K9L'],
                        ['nome' => 'Protetor Solar FPS 50', 'sku' => 'M1N2O3P'],
                        ['nome' => 'Creme Facial Noturno', 'sku' => 'Q4R5S6T'],
                        ['nome' => 'Gel Antisséptico', 'sku' => 'U7V8W9X'],
                        ['nome' => 'Desodorante Spray', 'sku' => 'Y1Z2A3B'],
                        ['nome' => 'Loção Pós-Barba', 'sku' => 'C4D5E6F'],
                        ['nome' => 'Máscara Capilar', 'sku' => 'G7H8I9J']
                    ];
                            
                    $resultado = paginar($produtos, 7);

                    tabelaProdutoAdm($resultado['dados']);

                    renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);
                ?>
            </div>
        </div>
    </div>
   
    <script src="./../../../public/javascript/javascriptADM.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>