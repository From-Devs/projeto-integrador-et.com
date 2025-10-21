<?php
    require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";
    require_once __DIR__ . "/../../../public/componentes/header/header.php";
    require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php";
    require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require_once __DIR__ . "/../../../public/componentes/produtoDestaque/produtoDestaque.php";
    require_once __DIR__ . "/../../../public/componentes/ondas/onda.php";
    require_once __DIR__ . "/../../../public/componentes/carousel/carousel.php";
    require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
    
    require_once __DIR__ . "/../../Controllers/CarrinhoController.php";

    session_start();
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)
    
    if (!$login) {
        die("Você precisa estar logado para ver o carrinho.");
    }
    
    $id_usuario = $_SESSION['id_usuario'];

    $controller = new CarrinhoController();
    $dados = $controller->exibirCarrinho($id_usuario);
    $carrinho = $dados['carrinho'];
    $total = $dados['total'];
    $precosProdutos = $dados['precosProdutos'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meu Carrinho</title>

<link rel="stylesheet" href="/projeto-integrador-et.com/public/css/Meu_Carrinho.css">
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
<script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
</head>
<body>
<?php echo createHeader($login, $tipoUsuario); ?>
<?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px") ?>

<main>
    <h1 class="Meio">MEU CARRINHO</h1>
    <div class="line"></div>
    
    <form method="POST" action="">
        <table>
            <thead>
                <tr>
                    <th class="radius">Produto</th>
                    <th></th>
                    <th></th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th class="radius2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($carrinho)): 
                foreach ($carrinho as $index => $produto): ?>
                    <tr>
                        <td class="prod">
                            <div class="conteudo_td">
                                <input class='check' type='checkbox' name='selecionados[<?= $index ?>]' value="<?= $produto['id_prodCarrinho']?>">
                                <img class='cor1' src='/projeto-integrador-et.com/<?= $produto['img1'] ?? "no-image.png" ?>' alt='<?= $produto['nome'] ?>' width='50'>
                                <span class='produto-nome'><?= htmlspecialchars($produto['nome']) ?></span>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td class='cor2'>R$ <?= number_format($produto['precoCalculado'], 2, ',', '.') ?></td>
                        <td class='quantityColumn'>
                            <div class='quantity-container'>
                                <button type='button' class='quantity-btn' onclick='decrementQuantity(<?= $index ?>)'>-</button>
                                <input type='number' name='quantidade[<?= $index ?>]' value='<?= (int)$produto['quantidade'] ?>' min='1' class='quantity-input'>
                                <button type='button' class='quantity-btn' onclick='incrementQuantity(<?= $index ?>)'>+</button>
                            </div>
                        </td>
                        <td class='cor2' id='subtotal-item-<?= $index ?>'>R$ <?= number_format($produto['subtotal'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach;
                else: ?>
                <tr>
                    <td colspan="6" class="carrinhoVazio">Seu carrinho está vazio.</td>
                </tr>
            <?php endif; ?>
            </tbody>
            <tfoot>
                <tr class="tot" style="padding: 0px">
                    <td class='cor3' colspan="5">Total:</td>
                    <td class="total-value" id="total">R$ <?= number_format($total, 2, ',', '.') ?></td>
                </tr>

                <tr class="tudo">
                    <td>Selecionar Tudo:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="checkbox" style="margin: 0px;"></td>
                </tr>

            </tfoot>
        </table>
        <div class="button-container" style="">
            <button type="submit" name="acao" value="pedido">Realizar Pedido</button>
            <button type="submit" name="acao" value="remover" onclick="return confirm('Deseja realmente excluir os produtos selecionados?')">Excluir Selecionados</button>
        </div>
    </form>
</main>

<script>
const precosProdutos = <?= json_encode($precosProdutos); ?>;

function calcularTotal() {
    let total = 0;
    document.querySelectorAll('input[name^="quantidade"]').forEach((input, index) => {
        const qtd = parseInt(input.value) || 0;
        const preco = parseFloat(precosProdutos[index]) || 0;
        const subtotal = qtd * preco;
        total += subtotal;

        // Atualiza subtotal de cada item
        document.getElementById(`subtotal-item-${index}`).innerText = 'R$ ' + subtotal.toFixed(2).replace('.', ',');
    });
    document.getElementById('total').innerText = 'R$ ' + total.toFixed(2).replace('.', ',');
}

function incrementQuantity(index) {
    const input = document.querySelector(`input[name='quantidade[${index}]']`);
    input.value = parseInt(input.value) + 1;
    calcularTotal();
}

function decrementQuantity(index) {
    const input = document.querySelector(`input[name='quantidade[${index}]']`);
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
        calcularTotal();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    calcularTotal();
    document.querySelectorAll('input[name^="quantidade"]').forEach(input => {
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
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>
