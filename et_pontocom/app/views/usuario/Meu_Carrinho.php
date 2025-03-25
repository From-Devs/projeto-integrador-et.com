<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Carrinho</title>
  <link rel="stylesheet" href="Meu_Carrinho.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <header class="teste">
    <div class="logo">Logo</div>
    <div class="icons">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>
  <main>
    <h1 class="Meio">Meu Carrinho</h1>
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
            ["CREME CORTES SÉRUM", 50.00, 1, "MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (1).png"],
            ["MÁSCARA CAPILAR", 30.00, 1, "MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (2).png"],
            ["CONDICIONADOR", 20.00, 1, "MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4 (3).png"],
            ["BODY LOTION", 40.00, 1, "MeuCarrinho/creme-para-pentear-e-hidratante-2-em-1-divino-potinho-kids-skala-1000g-7897042007226-1 4.png"],
          ];
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($produtos as $index => $produto) {
              $produtos[$index][2] = $_POST['quantidade'][$index];
            }
          }
          $subtotal = 0;
          foreach ($produtos as $index => $produto) {
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
              <td>
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
        <tfoot>
          <tr>
            <td class='cor3' colspan="5" class="total-label">Subtotal:</td>
            <td class="total-value" id="subtotal">R$ <?php echo $subtotal; ?></td>
          </tr>
          <tr>
            <td class='cor3' colspan="2"><label for="cep">Frete: </label><input class="redondo" type="text" id="cep" name="cep" placeholder="Digite seu CEP" oninput="calcularTotal()"></td>
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
      </table class="table1>
      <div class="button-container">
        <button type="submit" formaction="realizar_pedido.php">Realizar Pedido</button>
        <button type="submit" formaction="excluir_pedido.php">Excluir Pedido</button>
      </div>
    </form>
  </main>
  <section class="related-products">
    <h2>Relacionados</h2>
    
  </section>
  <footer>
    <div class="footer-links">
      <a href="#">Sobre</a>
      <a href="#">Contato</a>
      <a href="#">Política de Privacidade</a>
    </div>
    <div class="social-media">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </footer>
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
</body>
</html>