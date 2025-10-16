<?php 

    include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/PedidosAssociado_ADM/pedidos.php";
    require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
    require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
    require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
    require __DIR__ . "/../../Controllers/PedidosController.php";

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
    $pedidosController = new PedidosController();
    $pedidos = $pedidosController->BuscarTodosPedidos($ordem, $pesquisa);

    // // session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "ADM";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Pedidos</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/PedidosADM.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>

<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
    ?>

    <!-- aqui acaba o container esquerda -->
    <div class="main">
        <div id="container">

            <?php echo filtro("filtro",["ID", "Preço", "Data", "Status"])?>

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Pedidos</h1>
                </div>
                <?php
                // $pedidos = [
                //     [
                //         'nomeCliente' => 'Ana Beatriz',
                //         'preco' => 120.00,
                //         'data' => '10/06/2025',
                //         'status' => 'Pago',
                //         'detalhesPedido' => [
                //             ['idProduto' => 1, 'nomeProduto' => 'Creme Facial Hidratante', 'associado' => 'Luciana', 'preco' => 40.00, 'quantidade' => 1],
                //             ['idProduto' => 2, 'nomeProduto' => 'Sérum Vitamina C', 'associado' => 'Luciana', 'preco' => 80.00, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Luciana', 'telefone' => '(11) 98888-1234', 'valor' => 120.00]
                //         ]
                //     ],
                //     [
                //         'nomeCliente' => 'Bruno Silva',
                //         'preco' => 195.50,
                //         'data' => '11/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 3, 'nomeProduto' => 'Perfume Amadeirado', 'associado' => 'Carlos', 'preco' => 150.00, 'quantidade' => 1],
                //             ['idProduto' => 4, 'nomeProduto' => 'Sabonete Artesanal', 'associado' => 'Carlos', 'preco' => 45.50, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Carlos', 'telefone' => '(21) 97777-4321', 'valor' => 195.50]
                //         ]
                //     ],
                //     [
                //         'nomeCliente' => 'Carla Mendes',
                //         'preco' => 260.00,
                //         'data' => '12/06/2025',
                //         'status' => 'Pago',
                //         'detalhesPedido' => [
                //             ['idProduto' => 5, 'nomeProduto' => 'Kit Skincare Completo', 'associado' => 'Juliana', 'preco' => 200.00, 'quantidade' => 1],
                //             ['idProduto' => 6, 'nomeProduto' => 'Máscara de Argila', 'associado' => 'Juliana', 'preco' => 60.00, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Juliana', 'telefone' => '(31) 96666-9988', 'valor' => 260.00]
                //         ]
                //     ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '20/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '23/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '21/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '25/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '06/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '15/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                //     [
                //         'nomeCliente' => 'Diego Rocha',
                //         'preco' => 89.90,
                //         'data' => '29/06/2025',
                //         'status' => 'Pendente',
                //         'detalhesPedido' => [
                //             ['idProduto' => 7, 'nomeProduto' => 'Óleo Corporal Natural', 'associado' => 'Renata', 'preco' => 45.00, 'quantidade' => 1],
                //             ['idProduto' => 8, 'nomeProduto' => 'Creme para Mãos', 'associado' => 'Renata', 'preco' => 44.90, 'quantidade' => 1],
                //         ],
                //         'infoPagamentos' => [
                //             ['associado' => 'Renata', 'telefone' => '(51) 95555-3344', 'valor' => 89.90]
                //         ]
                //         ],
                // ];

                $resultado = paginar($pedidos, 6, 'pagePedidos');
                echo tabelaPedidosADM($resultado['dados']);
                renderPaginacao(
                    $resultado['paginaAtual'],
                    $resultado['totalPaginas'],
                    'pagePedidos',
                    $parametrosExtrasString
                );
                ?>
            </div>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/tabelasAssociado_ADM/PedidosAssociado_ADM/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/FiltroQueryString.js"></script>
</body>

</html>