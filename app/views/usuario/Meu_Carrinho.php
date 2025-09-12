<?php
session_start();

$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Usuário";
$login = isset($_SESSION['id_usuario']);

if (!isset($_SESSION['id_usuario'])) {
    die("Você precisa estar logado para ver o carrinho.");
}

$id_usuario = $_SESSION['id_usuario'];

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

// conecta ao banco
$conn = (new Database())->connect();

// Busca produtos do carrinho
try {
    $sql = "SELECT c.id_carrinho, c.quantidade, p.id_produto, p.nome, p.preco, p.precoPromo, p.img1
            FROM carrinho c
            JOIN produto p ON p.id_produto = c.id_produto
            WHERE c.id_usuario = :id_usuario";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_usuario' => $id_usuario]);
    $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar carrinho: " . $e->getMessage());
}

// Atualiza quantidades via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantidade'])) {
    foreach ($carrinho as $index => $produto) {
        $novaQtd = (int)($_POST['quantidade'][$index] ?? $produto['quantidade']);
        if ($novaQtd > 0) {
            $sqlUpdate = "UPDATE carrinho SET quantidade = :qtd WHERE id_carrinho = :id";
            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->execute([
                ':qtd' => $novaQtd,
                ':id' => $produto['id_carrinho']
            ]);
            $carrinho[$index]['quantidade'] = $novaQtd;
        }
    }
}

// Calcula subtotal e total
$subtotal = 0;
$precosProdutos = [];
foreach ($carrinho as $produto) {
    $quantidade = $produto['quantidade'] ?? 1;
    $preco = $produto['precoPromo'] ?? $produto['preco'];
    $precosProdutos[] = $preco;
    $subtotal += $preco * $quantidade;
}

$frete = 0; // valor inicial do frete
$total = $subtotal + $frete;
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
</head>
<body>
<?php echo createHeader($login, $tipoUsuario); ?>
<?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px") ?>

<main>
    <h1 class="Meio">MEU CARRINHO</h1>
    <form method="post">
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
                <?php foreach ($carrinho as $index => $produto): 
                    $quantidade = $produto['quantidade'] ?? 1;
                    $preco = $produto['precoPromo'] ?? $produto['preco'];
                    $subtotalProduto = $preco * $quantidade;
                    $imagem = $produto['img1'] ?? 'no-image.png';
                ?>
                <tr>
                    <td>
                        <input class='check' type='checkbox' name='selecionar[<?= $index ?>]'>
                        <img class='cor1' src='/projeto-integrador-et.com/public/imagens/produto/<?= $imagem ?>' alt='<?= $produto['nome'] ?>' width='50'>
                        <span class='produto-nome'><?= $produto['nome'] ?></span>
                    </td>
                    <td></td>
                    <td></td>
                    <td class='cor2'>R$ <?= number_format($preco, 2, ',', '.') ?></td>
                    <td class='quantityColumn'>
                        <div class='quantity-container'>
                            <button type='button' class='quantity-btn' onclick='decrementQuantity(<?= $index ?>)'>-</button>
                            <input type='number' name='quantidade[<?= $index ?>]' value='<?= $quantidade ?>' min='1' class='quantity-input'>
                            <button type='button' class='quantity-btn' onclick='incrementQuantity(<?= $index ?>)'>+</button>
                        </div>
                    </td>
                    <td class='cor2' id='subtotal-item-<?= $index ?>'>R$ <?= number_format($subtotalProduto, 2, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="carrinhoVazio">Seu carrinho está vazio.</td>
                </tr>
            <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class='cor3' colspan="5">Subtotal:</td>
                    <td class="total-value" id="subtotal">R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td class='cor3' colspan="2">
                        <label for="cep">Frete: </label>
                        <input class="redondo" type="text" id="cep" name="cep" placeholder="Digite seu CEP">
                        <button type="button" class="botaoCalcular" onclick="calcularTotal()">Calcular</button>
                    </td>
                    <td></td><td></td><td></td>
                    <td><span class="total-value" id="frete">R$ <?= number_format($frete, 2, ',', '.') ?></span></td>
                </tr>
                <tr>
                    <td class='cor3' colspan="5">Total:</td>
                    <td class="total-value" id="total">R$ <?= number_format($total, 2, ',', '.') ?></td>
                </tr>
            </tfoot>
        </table>
        <div class="button-container">
            <button type="submit">Atualizar Quantidades</button>
            <button type="button" onclick="abrirPopup()">Realizar Pedido</button>
        </div>
    </form>
</main>

<script>
const precosProdutos = <?= json_encode($precosProdutos); ?>;

function calcularTotal() {
    let subtotal = 0;
    const quantidades = document.querySelectorAll('input[name^="quantidade"]');
    quantidades.forEach((input, index) => {
        const quantidade = parseInt(input.value) || 0;
        const preco = parseFloat(precosProdutos[index]);
        const subtotalItem = quantidade * preco;
        subtotal += subtotalItem;
        document.getElementById(`subtotal-item-${index}`).innerText = 'R$ ' + subtotalItem.toFixed(2).replace('.', ',');
    });
    const frete = parseFloat(document.getElementById('frete').innerText.replace('R$ ', '').replace(',', '.'));
    const total = subtotal + frete;
    document.getElementById('subtotal').innerText = 'R$ ' + subtotal.toFixed(2).replace('.', ',');
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
