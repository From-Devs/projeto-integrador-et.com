<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";  //importar rodapé

    require_once "/xampp/htdocs/projeto-integrador-et.com/et_pontocom/public/componentes/botao/botao.php";
    require_once "/xampp/htdocs/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/popUp.php";

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
    <!-- css -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/MeusPedidos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/styles.css">
    <!-- botao e popup -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <!-- link para icones e outros -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>

    <div class="conteudoMeusPedidos">
            <!-- Parte Superior da Página -->
        <div class="areaSuperiorMP">
            <h1 class="tituloPrincipalMP">MEUS PEDIDOS</h1>
            <div class="linhaSuperiorTituloMP"></div>
        </div>

            <!-- Parte de Pedidos que estão a caminho -->
        <section class="pedidoAndamentoMP">
            <h2 class="tituloAndamentoMP">Em Andamento</h2>
            <div id="produtosAndamento"></div> <!-- Parte do JavaScript-->
        </section>

            <!-- Parte de Pedidos que foram entregues -->
        <section class="pedidosFinalizadosMP">
            <h2 class="tituloFinalizadoMP">Finalizado</h2>
            <div id="produtosFinalizados"></div> <!-- Parte do JavaScript -->

        </section>

            <!-- PopUp mostrando todos os pedidos efetuados na compra -->
        <dialog class="popupMP" id="popupMP">
            <div class="popupMP-conteudo">
                <div class="popupMP-superior">
                    <div class="popupMP-linhasuperior"></div>
                    <div class='icone-fechar'>
                        <button class='bx bx-x'></button>
                    </div>
                </div>
                <div class="popupMP-main">
                    <div class="popupMP-Produtos" id="popupMP-Produtos"></div>
                </div>
                <div class="popupMP-inferior">
                    <span class="popupMP-DataCompra" id="popupMP-DataCompra"></span>
                    <span class="popupMP-Total" id="popupMP-Total"></span>
                </div>
                <div class="popupMP-linhainferior"></div>
            </div>
        </dialog>

        
        <dialog class="popupMPFinalizado" id="popupMPFinalizado">
            <div class="popupMP-conteudoFi">
                <div class="popupMP-superior">
                    <div class="popupMP-linhasuperior"></div>
                    <div class='icone-fechar'>
                        <button class='bx bx-x'></button>
                    </div>
                </div>
                <div class="popupMP-main">
                    <span class="popupMP-DataEntrega" id="popupMP-DataEntrega"></span>
                </div>
                <div class="popupMP-inferior">
                    <div class="popupMP-ProdutosFi" id="popupMP-ProdutosFi"></div>
                </div>
                
                <div class="popupMP-linhainferior"></div>
            </div>
        </dialog>


         

        <div class="linhaInferiorMP"></div>
    </div>
    <footer>
        <?php  
            echo createRodape()
        ?>
    </footer>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/MeusPedidos.js"></script>
</body>
</html>
