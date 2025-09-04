<?php
// Inclui todos os arquivos de componentes e controllers necessários usando require_once para evitar erros de re-declaração.
require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
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

// Verifica se a sessão já foi iniciada antes de chamar session_start().
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
$login = false; // Define o estado de login do usuário.

// Instancia o controller e lista os produtos do carrinho.
$controller = new ProdutoController();
$carrinho = $controller->ListarCarrinho();

// Variáveis para o cálculo do total
$subtotal = 0;
$frete = 10.00; // Valor de frete fixo.
$precosProdutos = [];

// Preenche o array de preços para ser usado no JavaScript.
foreach ($carrinho as $item) {
    $preco = (float)($item['precoPromo'] ?? $item['preco']);
    $precosProdutos[] = $preco;
    $subtotal += $preco; // Soma o preço de cada produto para o subtotal.
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">
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
    <link href='https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
    <script src='https://kit.fontawesome.com/661f108459.js' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
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
                        <th class="radius2">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($carrinho)): ?>
                        <?php
                        // Loop dinâmico para exibir os produtos do carrinho.
                        foreach ($carrinho as $index => $produto) {
                            $preco = number_format((float)($produto['precoPromo'] ?? $produto['preco']), 2, ',', '.');
                            $subtotalProduto = number_format((float)($produto['precoPromo'] ?? $produto['preco']) * ($produto['quantidade'] ?? 1), 2, ',', '.');
                            $imagem = !empty($produto['imagem']) ? $produto['imagem'] : 'no-image.png';
                            $quantidade = $produto['quantidade'] ?? 1;

                            echo "<tr>
                                    <td>
                                        <input class='check' type='checkbox' name='selecionar[$index]'>
                                        <img class='cor1' src='/projeto-integrador-et.com/public/imagens/produto/{$imagem}' alt='{$produto['nome']}' width='50'>
                                        <span class='produto-nome'>{$produto['nome']}</span>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td class='cor2'>R$ {$preco}</td>
                                    <td class='quantityColumn'>
                                        <div class='quantity-container'>
                                            <button type='button' class='quantity-btn' onclick='decrementQuantity({$index})'>-</button>
                                            <input type='number' name='quantidade[{$index}]' value='{$quantidade}' min='1' class='quantity-input'>
                                            <button type='button' class='quantity-btn' onclick='incrementQuantity({$index})'>+</button>
                                        </div>
                                    </td>
                                    <td class='cor2' id='subtotal-item-{$index}'>R$ {$subtotalProduto}</td>
                                </tr>";
                        }
                        ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="carrinhoVazio">Seu carrinho está vazio.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                
                <tfoot>
                    <tr>
                        <td class='cor3' colspan="5" class="total-label">Subtotal:</td>
                        <td class="total-value" id="subtotal">R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td class='cor3' colspan="2">
                            <label for="cep">Frete: </label>
                            <input class="redondo" type="text" id="cep" name="cep" placeholder="Digite seu CEP">
                            <button type="button" class="botaoCalcular" onclick="calcularTotal()">Calcular</button>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="total-value" id="frete">R$ <?php echo number_format($frete, 2, ',', '.'); ?></span></td>
                    </tr>
                    <tr>
                        <td class='cor3' colspan="5" class="total-label">Total:</td>
                        <td class="total-value" id="total">R$ <?php echo number_format($total, 2, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="button-container">
                <button type="button" onclick="abrirPopup()">Realizar Pedido</button>
                <button type="button">Excluir Pedido</button>
            </div>
        </form>
    </main>

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($produtos as $index => $produto) {
              $produtos[$index][2] = $_POST['quantidade'][$index];
            }
          }
          $subtotal = 0;
          foreach ($resultado['dados'] as $index => $produto) {
            $produtoSubtotal = $produto[1] * $produto[2];
            $subtotal += $produtoSubtotal;
            echo "<tr>
              <td>
                <input class='check' type='checkbox' name='selecionar[$index]'>
                <img class='cor1' src='{$produto[3]}' alt='{$produto[0]}' width='50'>
                <span class='produto-nome'>{$produto[0]}</span>
              </td>
              <td></td>
              <td></td>
              <td class='cor2'>R$ {$produto[1]}</td>
              <td class='quantityColumn'>
                <div class='quantity-container'>
                  <button type='button' class='quantity-btn' onclick='decrementQuantity($index)'>-</button>
                  <input type='number' name='quantidade[$index]' value='{$produto[2]}' min='1' class='quantity-input'>
                  <button type='button' class='quantity-btn' onclick='incrementQuantity($index)'>+</button>
                </div>
              </td>
              <td class='cor2'>R$ $produtoSubtotal</td>
            </tr>";
          }
          ?>
        </tbody>
        <tr>
          <td class="td-paginacao"><?php renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);?></td>
        </tr>
        <tfoot>
          <tr>
            <td class='cor3' colspan="5" class="total-label">Subtotal:</td>
            <td class="total-value" id="subtotal">R$ <?php echo $subtotal; ?></td>
          </tr>

          <tr>
            <td class='cor3' colspan="2">
              <label for="cep">Frete: </label>
              <input class="redondo" type="text" id="cep" name="cep" placeholder="Digite seu CEP" oninput="calcularTotal()">
              <button type="button" class="botaoCalcular">Calcular</button>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td><span class="total-value" id="frete">R$ 10.00</span></td>
          </tr>

          <tr>
            <td class='cor3' colspan="5" class="total-label">Total:</td>
            <td class="total-value" id="total">R$ <?php echo $subtotal + 10; ?></td>
          </tr>
        </tfoot>
      </table class="table1">

      <div class="tudo">
        <p>Selecionar Tudo:</td>
        <div class="tudoCheck"><input type="checkbox"/></div>
      </div>

      <div class="button-container">
        <button type="button" onclick="abrirPopup()">Realizar Pedido</button>
        <button type="button">Excluir</button>
      </div>
    </form>
  </main>
  <div class="sessaoProdutos">
        <div class="tituloSessao">
            <p class="titulo">Ofertas Imperdíveis</p>
            <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php">Ver Mais</a>
        </div>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerProdutos">
                    <?php
                    // Produtos estáticos de exemplo (removido no código final para evitar confusão)
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk.png", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito.png", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult.png", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "coffe.png", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>
    
    <script>
        // Passa os preços dos produtos do PHP para o JavaScript
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
            // Recalcula o total inicial e adiciona o evento de input para cada campo de quantidade
            calcularTotal();
            document.querySelectorAll('input[name^="quantidade"]').forEach(function(input) {
                input.addEventListener('input', calcularTotal);
            });
        });
    </script>

    <?php echo createRodape(); ?>
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
    
    <!-- Fundo escurecido e modal -->
    <div id="overlayPopUp" class="overlayPopUp hidden"></div>

    <div id="popup" class="popup hidden">
        <p>Vamos continuar o atendimento pelo WhatsApp<br><small>(Sobre as informações de pagamento e entrega)</small></p>
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

    document.getElementById('overlayPopUp').addEventListener('click', function () {
        document.getElementById('overlayPopUp').classList.add('hidden');
        document.getElementById('popup').classList.add('hidden');
        document.getElementById('popupConfirmado').classList.add('hidden');
    });
    </script>
</body>
</html>
