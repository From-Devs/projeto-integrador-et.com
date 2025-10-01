<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";  //importar rodapé
    require __DIR__ . "/../../../public/componentes/botao/botao.php";  //importar rodapé
    require __DIR__ . "/../../../public/componentes/popUp/popUp.php";  //importar rodapé
    require_once __DIR__ . '/../../../config/PedidoController.php';
    require_once __DIR__ . '/../../../public/componentes/cardpedido/cardPedido.php';
 
    session_start(); // garante que a sessão está ativa
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)
    $id_usuario = $_SESSION['id_usuario'] ?? null;

    if (!$id_usuario) {
        die("Você precisa estar logado para ver os pedidos.");
    }
 
    $pedidoController = new PedidoController();
    $pedidos = $pedidoController->ListarPedidosPorUsuario($id_usuario);
 
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <!-- css -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/MeusPedidos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <!-- botao e popup -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <!-- link para icones e outros -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght…" rel="stylesheet">
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
            <div class="tituloPrincipalMP"><h1>MEUS PEDIDOS</h1></div>
            <div class="linhaSuperiorTituloMP"></div>
        </div>
    
        <!-- Pedidos em andamento -->
        <section class="pedidoAndamentoMP">
            <h2 class="tituloAndamentoMP">Em Andamento</h2>
            <div id="produtosAndamento">
                <?php if (!$pedidos): ?>
                    <p class="aviso">Você ainda não possui pedidos.</p>
                <?php else: 
                        foreach ($pedidos as $pedido):
                            if ($pedido['tipoStatus'] !== 'Finalizado'):
                                renderCardPedido($pedido, 'Andamento'); 
                                endif; 
                            endforeach; 
                    endif; ?>
            </div>
        </section>
    
        <!-- Pedidos finalizados -->
        <section class="pedidosFinalizadosMP">
            <h2 class="tituloFinalizadoMP">Finalizado</h2>
            <div id="produtosFinalizados">
                <?php if ($pedidos):
                    foreach ($pedidos as $pedido):
                        if ($pedido['tipoStatus'] === 'Finalizado'):
                            renderCardPedido($pedido, 'Finalizado');
                        endif;
                    endforeach;
                else: ?>
                    <p class="aviso">Você ainda não possui pedidos finalizados.</p>
                <?php endif; ?>
            </div>
        </section>
    
        <div class="linhaInferiorMP"></div>
    </div>
 
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
            <div class="popupMP-data">
                <span class="popupMP-DataEntrega" id="popupMP-DataEntrega"></span>
            </div>
            <div class="popupMP-inferior">
                <div class="popupMP-ProdutosFi" id="popupMP-ProdutosFi"></div>
            </div>
            
            <div class="popupMP-linhainferior"></div>
        </div>
    </dialog>

    <dialog class="popupAvaliarProduto" id="popupAvaliarProduto">
        <div class="popupAva-conteudo">
            <span class="popupAva-titulo">Avaliação de Produto</span>
            <div class="produto-info-avaliacao">
                <a class="produto-ir" href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php">
                    <img class="popupAva-imagemProduto" id="popupAva-imagemProduto" src="" alt="Imagem do produto" />
                    <span class="popupAva-nomeProduto" id="popupAva-nomeProduto"></span>
                </a>
            </div>
            <div class="popupAva-main">
                <div class="avaliando">
                    <span class="popupAva-titulo">Avalie este produto</span>
                    <div class="estrelas">
                        <button class="estrela" data-avaliacao="1">&#9733;</button>
                        <button class="estrela" data-avaliacao="2">&#9733;</button>
                        <button class="estrela" data-avaliacao="3">&#9733;</button>
                        <button class="estrela" data-avaliacao="4">&#9733;</button>
                        <button class="estrela" data-avaliacao="5">&#9733;</button>
                    </div>
                </div>
                <div class="partefinal">
                    <textarea class="popupAva-textoAvaliacao" id="popupAva-textoAvaliacao" placeholder="Escreva aqui sua avaliação..."></textarea>
                    <div class="botoesfinal">
                        <button class="enviarAvaliacaoBtn" onclick="enviarAvaliacao()">Enviar Avaliação</button>
                        <button class="cancelarAvaliacaoBtn" onclick="fecharAvaliacao()">Fechar</button>
                </div>
            </div>
        </div>
    </dialog>

    <div class="linhaInferiorMP"></div>

    <?php  
        echo createRodape()
    ?>
 
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/MeusPedidos.js"></script>
</body>
</html>
 
 