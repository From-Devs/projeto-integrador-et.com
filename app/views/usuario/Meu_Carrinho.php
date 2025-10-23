<?php
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

session_start();
$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
$login = $_SESSION['login'] ?? false;

if (!$login) {
    die("Você precisa estar logado para ver o carrinho.");
}

$id_usuario = $_SESSION['id_usuario'];

// conecta ao banco
$conn = (new Database())->connect();

// Busca produtos do carrinho
try {
    $sql = "
        SELECT 
            pc.id_prodCarrinho,
            c.id_carrinho,
            p.id_produto,
            p.nome,
            p.marca,
            p.preco,
            p.precoPromo,
            p.img1,
            p.tamanho,
            pc.qntProduto AS quantidade,
            c.data_criacao,
            c.data_atualizacao
        FROM ProdutoCarrinho pc
        JOIN Carrinho c ON c.id_carrinho = pc.id_carrinho
        JOIN Produto p ON p.id_produto = pc.id_produto
        WHERE c.id_usuario = :id_usuario
    ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id_usuario' => $id_usuario]);
    $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao carregar carrinho: " . $e->getMessage());
}

// Calcula subtotal e total
$total = 0;
$precosProdutos = [];
$subtotaisProdutos = [];

foreach ($carrinho as $index => $produto) {
    $quantidade = (int)($produto['quantidade'] ?? 1);
    $preco = ($produto['precoPromo'] !== null && $produto['precoPromo'] > 0) 
                ? (float)$produto['precoPromo'] 
                : (float)$produto['preco'];

    $subtotal = $preco * $quantidade;
    $total += $subtotal;

    // Armazenar preços e subtotais para JS
    $precosProdutos[$index] = $preco;
    $subtotaisProdutos[$index] = $subtotal;

    // Adicionar campos ao carrinho para renderizar
    $carrinho[$index]['precoCalculado'] = $preco;
    $carrinho[$index]['subtotal'] = $subtotal;
}
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
    <div class="line"><div></div></div>
    
    <form method="post">
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
            <tbody id="carrinhoBody" data-precos='<?= json_encode($precosProdutos) ?>'>
            <?php if (!empty($carrinho)): ?>
                <?php foreach ($carrinho as $index => $produto): 
                    $quantidade = $produto['quantidade'] ?? 1;
                    $preco = $produto['precoPromo'] ?? $produto['preco'];
                    $subtotalProduto = $preco * $quantidade;
                    $imagem = $produto['img1'] ?? 'no-image.png';
                ?>
                <tr class="linhaCarrinho" data-id="<?= $produto['id_produto'] ?>">
                    <td class="prod">
                        <div class="conteudo_td">
                            <!-- Checkbox individual atualizado -->
                            <input 
                                class="checkbox-individual check" 
                                type="checkbox" 
                                data-id="<?= $produto['id_produto'] ?>"
                                name="selecionar[<?= $index ?>]"
                            >
                            <img class="cor1" src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagem ?>" alt="<?= $produto['nome'] ?>" width="50">
                            <span class="produto-nome"><?= $produto['nome'] ?></span>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="cor2">R$ <?= number_format($preco, 2, ',', '.') ?></td>
                    <td class="quantityColumn">
                        <div class="quantity-container">
                            <button type="button" onclick="decrementarQuantidade(<?= $index ?>)">-</button>
                            <input type="number" name="quantidade[<?= $index ?>]" value="<?= $quantidade ?>" min="1">
                            <button type="button" onclick="incrementarQuantidade(<?= $index ?>)">+</button>
                        </div>
                    </td>
                    <td class="cor2" id="subtotal-item-<?= $index ?>">R$ <?= number_format($subtotalProduto, 2, ',', '.') ?></td>
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
                    <td class="cor3" colspan="5">Total:</td>
                    <td class="total-value" id="total">R$ <?= number_format($total, 2, ',', '.') ?></td>
                </tr>

                <!-- Checkbox "Selecionar Todos" atualizado -->
                <tr class="tudo">
                    <td>Selecionar Tudo:</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="checkbox" id="selecionarTodos" style="margin: 0px;">
                    </td>
                </tr>

                <tr>
                    <td class="bot" style="border: none;">
                        <div class="button-container" style="">
                            <button type="submit">Realizar Pedido</button>
                            <button type="button" id="btnExcluirSelecionados">Excluir selecionados</button>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>

<?php echo createRodape(); ?>
<script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/Meu_Carrinho.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>
