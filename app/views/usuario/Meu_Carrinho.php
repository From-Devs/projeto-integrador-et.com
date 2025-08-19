<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require __DIR__ . "/../../../public/componentes/carousel/carousel.php";
    require __DIR__ . "/../../../public/componentes/popup/popUp.php";
    
    
    // session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Carrinho</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">
  <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/Meu_Carrinho.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
<?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
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
          <?php
          $produtos = [
            ["CREME CORTES SÉRUM", 50.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (1).png"],
            ["MÁSCARA CAPILAR", 30.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (2).png"],
            ["CONDICIONADOR", 20.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (3).png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
            ["BODY LOTION", 40.00, 1, "/projeto-integrador-et.com/public/imagens/MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
          ];

          $resultado = paginar($produtos, 3);

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
      <div class="button-container">
        <button type="button" onclick="abrirPopup()">Realizar Pedido</button>
        <button type="button">Excluir Pedido</button>
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
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>
  <script>
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
    function calcularTotal() {
      var subtotal = 0;
      var quantidades = document.querySelectorAll('input[name^="quantidade"]');
      var precos = <?php echo json_encode(array_column($produtos, 1)); ?>;
      quantidades.forEach(function(input, index) {
        subtotal += input.value * precos[index];
      });
      var frete = 10; 
      var total = subtotal + frete;
      document.getElementById('subtotal').innerText = 'R$ ' + subtotal.toFixed(2);
      document.getElementById('total').innerText = 'R$ ' + total.toFixed(2);
    }
    
    document.querySelectorAll('input[name^="quantidade"]').forEach(function(input) {
      input.addEventListener('input', calcularTotal);
    });
  </script>
   <?php
    echo createRodape();
    ?>
    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
</body>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll("tr");

  rows.forEach(row => {
    const qtyInput = row.querySelector(".quantity-input");
    const priceSpan = row.querySelector(".unit-price");
    const subtotalSpan = row.querySelector(".subtotal-value");

    if (qtyInput && priceSpan && subtotalSpan) {
      const price = parseFloat(priceSpan.dataset.price);
      qtyInput.addEventListener("input", () => {
        const qty = parseInt(qtyInput.value) || 0;
        subtotalSpan.textContent = "R$ " + (price * qty).toFixed(2);
      });
    }
  });
});
</script>


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

// Fechar Sidebar ao clicar fora dela

document.getElementById('overlayPopUp').addEventListener('click', function () {
    document.getElementById('overlayPopUp').classList.add('hidden');
    document.getElementById('popup').classList.add('hidden');
    document.getElementById('popupConfirmado').classList.add('hidden');
});

</script>

</body>
</html>