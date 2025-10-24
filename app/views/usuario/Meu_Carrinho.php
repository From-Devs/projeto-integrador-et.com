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

    // 🟢 PROCESSAMENTO DE AÇÕES (POST → Redirect → GET)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $acao = $_POST['acao'] ?? '';
        $selecionados = $_POST['selecionados'] ?? [];

        if ($acao === 'remover' && !empty($selecionados)) {
            $controller->removerSelecionados($selecionados);
            header("Location: Meu_Carrinho.php?removido=1");
            exit;
        }

        if ($acao === 'pedido' && !empty($selecionados)) {
            $controller->realizarPedido($id_usuario, $selecionados);
            header("Location: Meu_Carrinho.php?pedido=1");
            exit;
        }
}

    $carrinho = $controller->exibirCarrinho($id_usuario);
    $total = array_sum(array_column($carrinho, 'subtotal'));
    $precosProdutos = array_column($carrinho, 'precoCalculado');

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
    <?php if (isset($_GET['removido'])): ?>
        <!-- <div class="mensagem-sucesso">✅ Produto(s) removido(s) com sucesso!</div> -->
    <?php elseif (isset($_GET['pedido'])): ?>
        <!-- <div class="mensagem-sucesso">🛍️ Pedido realizado com sucesso!</div> -->
    <?php endif; ?>

    <h1 class="Meio">MEU CARRINHO</h1>
    <div class="line"></div>
    
    <form method="POST">
        <?php echo PopUpConfirmar(
            "popUpConfirmarExclusao",
            "Deseja realmente excluir os produtos selecionados?",
            "<button type='submit' name='acao' value='remover' id='botaoConfirmarExclusao' class='btn btn-white' style='width: auto; height: auto; font-size: 1rem;'>Sim</button>",
            "<button id='botaoCancelarExclusao' class='btn btn-white' style='width: auto; height: auto; font-size: 1rem; 'onclick='fecharPopUp(\"popUpConfirmarExclusao\")'>Não</button>"
            ) ?>
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
            <?php if (!empty($carrinho)): ?>
                <?php foreach ($carrinho as $index => $item): ?>
                    <tr>
                        <td class="prod">
                            <div class="conteudo_td">
                                <input class='check' type='checkbox' name='selecionados[]' value="<?= $item['id_prodCarrinho'] ?>" checked>
                                <img class='cor1' src='/projeto-integrador-et.com/<?= $item['img1'] ?? "no-image.png" ?>' alt='<?= $item['nome'] ?>' width='50'>
                                <span class='produto-nome'><?= htmlspecialchars($item['nome']) ?></span>
                            </div>
                        </td>
                        <td></td>
                        <td></td>
                        <td class='cor2'>R$ <?= number_format($item['precoCalculado'], 2, ',', '.') ?></td>
                        <td class='quantityColumn'>
                            <div class='quantity-container'>
                                <button type='button' class='quantity-btn' onclick='decrementQuantity(<?= $index ?>)'>-</button>
                                <input type='number' name='quantidade[<?= $index ?>]' value='<?= (int)$item['quantidade'] ?>' min='1' class='quantity-input'>
                                <button type='button' class='quantity-btn' onclick='incrementQuantity(<?= $index ?>)'>+</button>
                            </div>
                        </td>
                        <td class='cor2' id='subtotal-item-<?= $index ?>'>R$ <?= number_format($item['subtotal'], 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="carrinhoVazio">Seu carrinho está vazio.</td>
                </tr>
            <?php endif; ?>
            </tbody>

            <tfoot>
                <tr class="tot" style="padding: 0px">
                    <td class="cor3" colspan="5">Total:</td>
                    <td class="total-value" id="total">R$ <?= number_format($total, 2, ',', '.') ?></td>
                </tr>

                <!-- Checkbox "Selecionar Todos" atualizado -->
                <tr class="tudo">
                    <td><label for="selecionarTodos">Selecionar Tudo:</label></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="checkbox" id="selecionarTodos" style="margin: 0px;" checked></td>
                </tr>

            </tfoot>
        </table>
        <div class="button-container">
            <button type="submit" name="acao" value="pedido">Realizar Pedido</button>
            <button type="button" id="btnExcluirSelecionados">Excluir Selecionados</button>
        </div>
    </form>
</main>

<?php echo createRodape(); ?>

<script>

document.addEventListener("DOMContentLoaded", function() {
    const selecionarTodos = document.getElementById("selecionarTodos");
    const checkboxes = document.querySelectorAll(".check");
    
    if (!selecionarTodos) return;
    
    // Quando clicar em "Selecionar todos"
    selecionarTodos.addEventListener("change", function() {
        checkboxes.forEach(cb => cb.checked = selecionarTodos.checked);
    });
    
    // Quando desmarcar algum individual, desmarca o "Selecionar todos"
    checkboxes.forEach(cb => {
        cb.addEventListener("change", function() {
            if (!cb.checked) {
                selecionarTodos.checked = false;
            } else if ([...checkboxes].every(c => c.checked)) {
                selecionarTodos.checked = true;
            }
        });
    });

    const form = document.querySelector("form");
    const btnExcluir = document.getElementById("btnExcluirSelecionados");

    if (!btnExcluir) return;

    // Intercepta o submit do botão Excluir
    btnExcluir.addEventListener("click", function(e) {
        
        const algumSelecionado = Array.from(checkboxes).some(cb => cb.checked);
        if (!algumSelecionado) {
        alert("Selecione ao menos um produto para excluir.");
        return;
        }
        abrirPopUp("popUpConfirmarExclusao"); // abre o pop-up personalizado
    });

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
});
</script>

<script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/Meu_Carrinho.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>
