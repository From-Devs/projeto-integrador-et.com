<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header

    session_start();
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente'; // Descomente essa parte para tipo do usuario = Usuário
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado"; // Descomente essa parte para tipo do usuario = Associado
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="../../../public/componentes/header/style.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>

<div class="conteudoMeusPedidos">
            <!-- Parte Superior da Página -->
        <div class="areaSuperiorMP">
            <h1 class="tituloPrincipalMP">Meus Pedidos</h1>
            <div class="linhaSuperiorTituloMP"></div>
        </div>

            <!-- Parte de Pedidos que estão a caminho -->
        <section class="pedidoCaminhoMP">
            <h2 class="tituloCaminhoMP">A Caminho</h2>
            <div id="produtosCaminho"></div> <!-- Parte do JavaScript-->
        </section>

            <!-- Parte de Pedidos que foram entregues -->
        <section class="pedidosEntreguesMP">
            <h2 class="tituloEntregueMP">Entregue</h2>
            <div id="produtosEntregues"></div> <!-- Parte do JavaScript -->

        </section>

            <!-- PopUp mostrando todos os pedidos efetuados na compra -->
        <div class="popUpMP" id="popUpMP">
            <div class="conteudoPopUpMP">
                <span class="fecharPopUpMP" onclick="fecharPopUp()">&times;</span>
                <div class="popUpCardsMP" id="popUpCardsMP"></div>
                <div class="detalhesPopUpMP">
                    <span id="dataPedido" class="dataPedido"></span>
                    <span id="totalPedido" class="totalPedido"></span>
                </div>
            </div>
        </div>

        <div class="linhaInferiorMP"></div>
    </div>

    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/sidebar/script.js"></script>
</body>
</html>
