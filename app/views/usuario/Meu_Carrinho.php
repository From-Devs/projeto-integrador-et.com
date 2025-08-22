<?php
// Inclui todos os arquivos de componentes e controllers necessários
require_once __DIR__ . "/../../../config/ProdutoController.php";
require_once __DIR__ . "/../../../public/componentes/header/header.php";
require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require_once __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php";
require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
require_once __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
require_once __DIR__ . "/../../../public/componentes/ondas/onda.php";
require_once __DIR__ . "/../../../public/componentes/carousel/carousel.php";
require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
$login = false;

$controller = new ProdutoController();
$carrinho = $controller->ListarCarrinho();

// Cálculo dos valores
$subtotal = 0;
$frete = 10.00;
$precosProdutos = [];

foreach ($carrinho as $item) {
    $preco = (float)($item['precoPromo'] ?? $item['preco']);
    $precosProdutos[] = $preco;
    $subtotal += $preco * ($item['quantidade'] ?? 1);
}
$total = $subtotal + $frete;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/Meu_Carrinho.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/produtoDestaque/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/carousel/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/carouselPopUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/paginaPrincipal.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/661f108459.js' crossorigin='anonymous'></script>
</head>
<body>
    <?php echo createHeader($login, $tipoUsuario); ?>
    <main>
        <h1 class="Meio">MEU CARRINHO</h1>
        <form method="post" action="">
            <table>
                <thead>
                    <tr>
                        <th class="radius">Produto</th>
                        <th></th>
                        <th></th>
                        <th>Preço</th>
                        <th>Quantia</th>
                        <th>Subtotal</th>
                        <th class="radius2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($carrinho)): ?>
                        <?php foreach ($carrinho as $index => $produto): 
                            $precoUnit = (float)($produto['precoPromo'] ?? $produto['preco']);
                            $preco = number_format($precoUnit, 2, ',', '.');
                            $subtotalProduto = number_format($precoUnit * ($produto['quantidade'] ?? 1), 2, ',', '.');
                            $imagem = !empty($produto['imagem']) ? $produto['imagem'] : 'no-image.png';
                            $quantidade = $produto['quantidade'] ?? 1;
                        ?>
                            <tr>
                                <td>
                                    <input class='check' type='checkbox' name='selecionar[<?php echo $index; ?>]'>
                                    <img class='cor1' src='/projeto-integrador-et.com/public/imagens/produto/<?php echo $imagem; ?>' alt='<?php echo $produto['nome']; ?>' width='50'>
                                    <span class='produto-nome'><?php echo $produto['nome']; ?></span>
                                </td>
                                <td></td>
                                <td></td>
                                <td class='cor2'>R$ <?php echo $preco; ?></td>
                                <td class='quantityColumn'>
                                    <div class='quantity-container'>
                                        <button type='button' class='quantity-btn' onclick='decrementQuantity(<?php echo $index; ?>)'>-</button>
                                        <input type='number' name='quantidade[<?php echo $index; ?>]' value='<?php echo $quantidade; ?>' min='1' class='quantity-input'>
                                        <button type='button' class='quantity-btn' onclick='incrementQuantity(<?php echo $index; ?>)'>+</button>
                                    </div>
                                </td>
                                <td class='cor2' id='subtotal-item-<?php echo $index; ?>'>R$ <?php echo $subtotalProduto; ?></td>
                                <td>
                                    <!-- Botão remover -->
                                    <form action="/projeto-integrador-et.com/config/produtoRouter.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="id_produto" value="<?php echo $produto['id']; ?>"> 
                                        <input type="hidden" name="acao" value="remover_carrinho">
                                        <button type="submit" class="btn-remover">Remover</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="carrinhoVazio">Seu carrinho está vazio.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class='cor3' colspan="5">Subtotal:</td>
                        <td class="total-value" id="subtotal">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class='cor3' colspan="2">
                            <label for="cep">Frete: </label>
                            <input class="redondo" type="text" id="cep" name="cep" placeholder="Digite seu CEP">
                            <button type="button" class="botaoCalcular" onclick="calcularTotal()">Calcular</button>
                        </td>
                        <td colspan="3"></td>
                        <td><span class="total-value" id="frete">R$ <?php echo number_format($frete, 2, ',', '.'); ?></span></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class='cor3' colspan="5">Total:</td>
                        <td class="total-value" id="total">R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <div class="button-container">
                <button type="button" onclick="abrirPopup()">Realizar Pedido</button>
            </div>
        </form>
    </main>

    <?php echo createRodape(); ?>

    <script>
        const precosProdutos = <?php echo json_encode($precosProdutos); ?>;
        
        function calcularTotal() {
            var subtotal = 0;
            var quantidades = document.querySelectorAll('input[name^="quantidade"]');
            
            quantidades.forEach(function(input, index) {
                const quantidade = parseInt(input.value) || 0;
                const precoUnitario = parseFloat(precosProdutos[index]);
                const subtotalItem = quantidade * precoUnitario;
                subtotal += subtotalItem;
                document.getElementById(`subtotal-item-${index}`).innerText = 'R$ ' + subtotalItem.toFixed(2).replace('.', ',');
            });

            var frete = parseFloat(document.getElementById('frete').innerText.replace('R$ ', '').replace(',', '.'));
            var total = subtotal + frete;

            document.getElementById('subtotal').innerText = 'R$ ' + subtotal.toFixed(2).replace('.', ',');
            document.getElementById('total').innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
        }

        function incrementQuantity(index) {
            var input = document.querySelector(`input[name='quantidade[${index}]']`);
            input.value = parseInt(input.value) + 1;
            calcularTotal();
        }

        function decrementQuantity(index) {
            var input = document.querySelector(`input[name='quantidade[${index}]']`);
            if (input.value > 1) {
                input.value = parseInt(input.value) - 1;
                calcularTotal();
            }
        }
        
        document.addEventListener("DOMContentLoaded", function() {
            calcularTotal();
            document.querySelectorAll('input[name^="quantidade"]').forEach(function(input) {
                input.addEventListener('input', calcularTotal);
            });
        });
    </script>

    <!-- Popups -->
    <div id="overlayPopUp" class="overlayPopUp hidden"></div>
    <div id="popup" class="popup hidden">
        <p>Vamos continuar o atendimento pelo WhatsApp<br><small>(Informações de pagamento e entrega)</small></p>
        <div class="popup-buttons">
            <button onclick="fecharPopup()">Cancelar</button>
            <button onclick="confirmarCompra()">Continuar</button>
        </div>
    </div>
    <div id="popupConfirmado" class="popup hidden">
        <p>✅ Compra confirmada com sucesso!</p>
        <div class="popup-buttons">
            <button onclick="fecharPopup()">Fechar</button>
        </div>
    </div>

    <script>
    function abrirPopup() {
        document.getElementById('overlayPopUp').classList.remove('hidden');
        document.getElementById('popup').classList.remove('hidden');
    }
    function fecharPopup() {
        document.getElementById('overlayPopUp').classList.add('hidden');
        document.getElementById('popup').classList.add('hidden');
        document.getElementById('popupConfirmado').classList.add('hidden');
    }
    function confirmarCompra() {
        document.getElementById('popup').classList.add('hidden');
        document.getElementById('popupConfirmado').classList.remove('hidden');
    }
    document.getElementById('overlayPopUp').addEventListener('click', fecharPopup);
    </script>
</body>
</html>
