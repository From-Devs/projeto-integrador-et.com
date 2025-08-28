<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; 
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";  
    require_once __DIR__ . '/../../../config/PedidoController.php';
    require_once __DIR__ . '/../../../public/componentes/cardpedido/cardPedido.php';

    require_once "/xampp/htdocs/projeto-integrador-et.com/public/componentes/botao/botao.php";
    require_once "/xampp/htdocs/projeto-integrador-et.com/public/componentes/popUp/popUp.php";

    session_start();
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $login = false; 

    $id_usuario = 2;

    $pedidoController = new PedidoController();
    $pedidos = $pedidoController->ListarPedidosAgrupados($id_usuario);
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
    <!-- ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php echo createHeader($login,$tipoUsuario); ?>

    <div class="conteudoMeusPedidos">

        <!-- Parte Superior -->
        <div class="areaSuperiorMP">
            <h1 class="tituloPrincipalMP">MEUS PEDIDOS</h1>
            <div class="linhaSuperiorTituloMP"></div>
        </div>

        <!-- Pedidos em andamento -->
        <section class="pedidoAndamentoMP">
            <h2 class="tituloAndamentoMP">Em Andamento</h2>
            <div id="produtosAndamento">
                <?php if (!$pedidos): ?>
                    <p class="aviso">Você ainda não possui pedidos.</p>
                <?php else: ?>
                    <?php foreach ($pedidos as $pedido): ?>
                        <?php if (($pedido['tipoStatus'] ?? '') !== 'Finalizado'): ?>
                            <?php renderCardPedido($pedido); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

        <div class="linhaInferiorMP"></div>

        <!-- Pedidos finalizados -->
        <section class="pedidosFinalizadosMP">
            <h2 class="tituloFinalizadoMP">Finalizado</h2>
            <div id="produtosFinalizados">
                <?php if ($pedidos): ?>
                    <?php foreach ($pedidos as $pedido): ?>
                        <?php if (($pedido['tipoStatus'] ?? '') === 'Finalizado'): ?>
                            <?php
                                // 1) Renderiza os cards normalmente (um por produto)
                                renderCardPedido($pedido);

                                // 2) Prepara texto da data de entrega (se houver)
                                $txtEntrega = !empty($pedido['dataEntrega'])
                                    ? ('Data de entrega: ' . date('d/m/Y', strtotime($pedido['dataEntrega'])))
                                    : null;

                                // 3) Para cada item desse pedido, insere a "badge" dentro do card
                                if ($txtEntrega) {
                                    foreach ($pedido['itens'] as $item) {
                                        $pid = $item['id_produto'];
                                        $safeTxt = json_encode($txtEntrega, JSON_UNESCAPED_UNICODE);
                                        echo "<script>
                                            (function(){
                                                var sel = '.produtoMP[data-id=\"{$pid}\"] .cardcoloridoCam';
                                                var el = document.querySelector(sel);
                                                if (!el) return;
                                                var badge = document.createElement('div');
                                                badge.textContent = {$safeTxt};
                                                badge.style.position = 'absolute';
                                                badge.style.top = '8px';
                                                badge.style.right = '14px';
                                                badge.style.fontWeight = '700';
                                                badge.style.fontSize = '14px';
                                                badge.style.color = '#111';
                                                badge.style.background = 'rgba(255,255,255,0.65)';
                                                badge.style.padding = '4px 10px';
                                                badge.style.borderRadius = '12px';
                                                badge.style.backdropFilter = 'blur(2px)';
                                                el.appendChild(badge);
                                            })();
                                        </script>";
                                    }
                                }
                            ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="aviso">Nenhum pedido finalizado.</p>
                <?php endif; ?>
            </div>

           
        </section>

        <div class="linhaInferiorMP"></div>
    </div>

    <!-- PopUps -->
    <dialog class="popupMP" id="popupMP"> ... </dialog>
    <dialog class="popupMPFinalizado" id="popupMPFinalizado"> ... </dialog>
    <dialog class="popupAvaliarProduto" id="popupAvaliarProduto"> ... </dialog>

    <footer>
        <?php echo createRodape(); ?>
    </footer>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/MeusPedidos.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardpedido/cardPedido.js"></script>
</body>
</html>
