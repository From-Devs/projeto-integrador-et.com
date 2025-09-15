<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/HistoricoVendasAssociado/hv.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";


    // session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
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
        echo createContaAssociadoADM("Associado");
    ?>
    
    <div class="main">
        <div id="container">

            <?php echo filtro("filtro",["ID", "Preço", "Data"])?>
            

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Vendas mais recentes</h1>
                </div>
            <?php

                //Exemplos de teste (antes de puxar do banco)
                $vendas = [
                    [
                        "id" => 1,
                        "nomeProduto" => "Batom Matte Vermelho",
                        "dataVenda" => "2025-09-01",
                        "preco" => "39.90",
                        "quantidade" => 2
                    ],
                    [
                        "id" => 2,
                        "nomeProduto" => "Base Líquida Bege Médio",
                        "dataVenda" => "2025-09-02",
                        "preco" => "79.90",
                        "quantidade" => 1
                    ],
                    [
                        "id" => 3,
                        "nomeProduto" => "Perfume Floral 100ml",
                        "dataVenda" => "2025-09-03",
                        "preco" => "199.00",
                        "quantidade" => 1
                    ],
                    [
                        "id" => 4,
                        "nomeProduto" => "Kit Máscara Capilar Hidratante",
                        "dataVenda" => "2025-09-04",
                        "preco" => "89.90",
                        "quantidade" => 3
                    ],
                    [
                        "id" => 5,
                        "nomeProduto" => "Creme Facial Anti-idade",
                        "dataVenda" => "2025-09-05",
                        "preco" => "129.90",
                        "quantidade" => 1
                    ],
                    [
                        "id" => 6,
                        "nomeProduto" => "Paleta de Sombras Nude",
                        "dataVenda" => "2025-09-06",
                        "preco" => "99.90",
                        "quantidade" => 2
                    ],
                    [
                        "id" => 7,
                        "nomeProduto" => "Delineador Líquido Preto",
                        "dataVenda" => "2025-09-07",
                        "preco" => "45.00",
                        "quantidade" => 4
                    ],
                    [
                        "id" => 8,
                        "nomeProduto" => "Shampoo Reconstrutor 300ml",
                        "dataVenda" => "2025-09-08",
                        "preco" => "55.00",
                        "quantidade" => 2
                    ],
                    [
                        "id" => 9,
                        "nomeProduto" => "Condicionador Reconstrutor 300ml",
                        "dataVenda" => "2025-09-09",
                        "preco" => "59.90",
                        "quantidade" => 2
                    ],
                    [
                        "id" => 10,
                        "nomeProduto" => "Hidratante Corporal 400ml",
                        "dataVenda" => "2025-09-10",
                        "preco" => "49.90",
                        "quantidade" => 5
                    ]
                ];

                $pagina = paginar($vendas, 5, 'page');
                tabelaHistoricoVendas($pagina['dados']);
                renderPaginacao(
                    $pagina['paginaAtual'],
                    $pagina['totalPaginas'],
                    'page'
                );

            ?>
            </div>
        </div>
    </div>
    
<script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>