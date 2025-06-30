<?php

require_once __DIR__ . "/./../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/PedidosAssociado_ADM/pedidos.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    include __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";

session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="./../../../public/css/RelatorioAssociado.css">
    <link rel="stylesheet" href="./../../../public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/PedidosAssociado.css">
    
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
           
                <?php echo filtro(["ID", "Preço", "Data"])?>
            
            <div id="titulo">
                <h1 id="tituloH1">Pedidos</h1>
            </div>
            <?php
                $pedidos = [
                    ['nomeCliente' => 'Guilherme Nantes', 'nomeProduto' => 'Hidratante Natura +8', 'preco' => 44.99, 'data' => '20/06/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'João Pedro', 'nomeProduto' => 'Base Líquida', 'preco' => 666.99, 'data' => '30/03/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Daniel Fagundes', 'nomeProduto' => 'Body Splash', 'preco' => 42.91, 'data' => '19/08/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Henrico Queiroz', 'nomeProduto' => 'Colônia Coffe Woman', 'preco' => 39.99, 'data' => '17/08/2024', 'status' => 'Pendente'],
                    ['nomeCliente' => 'Cecíliano Ferraz', 'nomeProduto' => 'Kit Skincare Completo', 'preco' => 120.00, 'data' => '22/01/2024', 'status' => 'Pendente'],
                    ['nomeCliente' => 'Felipe Sales', 'nomeProduto' => 'Césio Líquido', 'preco' => 23.50, 'data' => '12/08/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Bruna Lima', 'nomeProduto' => 'Máscara Capilar', 'preco' => 34.90, 'data' => '10/04/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Renata Souza', 'nomeProduto' => 'Sabonete Esfoliante', 'preco' => 19.90, 'data' => '05/05/2024', 'status' => 'Pendente'],
                    ['nomeCliente' => 'Lucas Martins', 'nomeProduto' => 'Shampoo Revitalizante', 'preco' => 27.45, 'data' => '14/06/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Carla Dias', 'nomeProduto' => 'Perfume Femme Nuit', 'preco' => 89.90, 'data' => '28/02/2024', 'status' => 'Pendente'],
                    ['nomeCliente' => 'Thiago Ramos', 'nomeProduto' => 'Kit Barbear', 'preco' => 58.00, 'data' => '03/03/2024', 'status' => 'Pago'],
                    ['nomeCliente' => 'Natalia Barros', 'nomeProduto' => 'Hidratante Corporal', 'preco' => 29.99, 'data' => '12/07/2024', 'status' => 'Pendente']
                    ];
    
    
    
                echo tabelaPedidosAssociado($pedidos);
            ?>
        </div>
    </div>
    
    <script src="./../../../public/javascript/associado/Associado.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>