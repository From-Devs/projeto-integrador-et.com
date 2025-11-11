<?php
require_once __DIR__ . "/../../../public/componentes/header/header.php";
require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";

// Controllers
require_once __DIR__ . "/../../Controllers/ProdutoController.php";
require_once __DIR__ . "/../../Controllers/CarrinhoController.php";
require_once __DIR__ . "/../../Controllers/ListaDesejosController.php";

session_start();
$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
$login = $_SESSION['login'] ?? false; 
$id_usuario = $_SESSION['id_usuario'] ?? null;

// Carrega produto por ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$produtoController = new ProdutoController();
$produto = $produtoController->buscarProdutoPeloId($id);
$produto = $produto[0];

$avaliacoes = $produtoController->buscarAvaliacoesPorProduto($id);
$mediaAvaliacao = $produtoController->mediaAvaliacoes($id);

$produtosRelacionados = $produtoController->getRelacionados($produto['categoria'], $produto['subcategoria'], $produto['marca'], $produto['id_produto']);

if (!$produto) {
    echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><title>Produto</title></head><body>";
    echo createHeader($login, $tipoUsuario);
    echo "<div style='max-width:1000px;margin:2rem auto;padding:1rem;'><h2>Produto não encontrado.</h2><p><a href='/projeto-integrador-et.com/app/views/usuario/paginaPrincipal.php'>Voltar à página principal</a></p></div>";
    echo createRodape();
    echo "</body></html>";
    exit;
}

// Prepara dados do produto
$nome        = $produto['nome'] ?? '';
$marca       = $produto['marca'] ?? '';
$descBreve   = $produto['descricaoBreve'] ?? '';
$descTotal   = $produto['descricaoTotal'] ?? '';
$preco       = (float)($produto['preco'] ?? 0);
$precoPromo  = (float)($produto['precoPromo'] ?? 0);
$temPromo    = $precoPromo > 0 && $precoPromo < $preco;

$subcategoria = $produto['subcategoria'] ?? ($produto['nomeSubcategoria'] ?? '');
$corPrincipal = $produto['corPrincipal'] ?? ($produto['cor'] ?? '');
$baseImgPath  = "/projeto-integrador-et.com/public/imagens/produto/";
$img1 = !empty($produto['img1']) ? /*$baseImgPath  . */ $produto['img1'] : $baseImgPath . 'no-image.png';
$img2 = !empty($produto['img2']) ? /*$baseImgPath . */$produto['img2'] : $img1;
$img3 = !empty($produto['img3']) ? /*$baseImgPath . */$produto['img3'] : $img1;
$imgPrincipal = $img1;

// Carrega avaliações do produto
$avaliacoes = $produtoController->BuscarAvaliacoesPorProduto($produto['id_produto']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do produto</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/detalhesDoProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 
echo createHeader($login, $tipoUsuario);
echo PopUpComImagemETitulo("popUpCarrinho", "../../public/imagens/verificar.png", "100px", "Adicionado ao Carrinho!", "", "", "", "300px");
?>

<div class="container-detalhes">
    <div class="detalhes-principal">
        <div class="boxFotos">
            <div class="imagens-lateral">
                <div><img src="/projeto-integrador-et.com/<?= htmlspecialchars($img1) ?>" alt="img-lateral"></div>
                <div><img src="/projeto-integrador-et.com/<?= htmlspecialchars($img2) ?>" alt="img-lateral"></div>
                <div><img src="/projeto-integrador-et.com/<?= htmlspecialchars($img3) ?>" alt="img-lateral"></div>
            </div>

            <div class="img-principal">
                <div><img id='img-principal' src="/projeto-integrador-et.com/<?= htmlspecialchars($imgPrincipal) ?>" alt="img-principal"></div>
            </div>
        </div>

        <div class="detalhes-info">
            <div class="titulo-produto">
                <div class="titulo">
                    <h3><?= htmlspecialchars($nome) ?></h3>

                    <?php
                    echo PopUpComImagemETitulo(
                        "popUpFavorito",
                        "/popUp_Botoes/img-favorito.png",
                        "160px",
                        "Adicionado à Lista de Desejos!",
                        "",
                        "",
                        "",
                        "352px"
                    );
                    ?>

                    <form id="formFavorito" method="POST">
                        <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                        <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                        <abbr class="abbr-favoritos" title="Adicionar aos favoritos">
                            <button type="submit" class="imgCoracao">
                                <img src='/projeto-integrador-et.com/public/imagens/produto/coracao-detalhes-produto.png' alt='Coração'>
                            </button>
                        </abbr>
                    </form>
                </div>
                <div class="sub-titulo-produto">
                    <span class="preco-produto">
                        <?php if ($temPromo): ?>
                            <span style="font-weight:700;">R$ <?= number_format($precoPromo, 2, ',', '.') ?></span>
                            <span style="text-decoration:line-through;margin-left:.5rem;color:#777;">R$ <?= number_format($preco, 2, ',', '.') ?></span>
                        <?php else: ?>
                            R$ <?= number_format($preco, 2, ',', '.') ?>
                        <?php endif; ?>
                    </span>
                    <abbr title="Avaliações" class="avaliacao-descricao">
                        <a href="#all-avaliacoes">
                            <div class="media-avaliacao">
                                <span><?= number_format($mediaAvaliacao, 1) ?></span>
                                <span class="estrelas-media">
                                    <?php 
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= floor($mediaAvaliacao)) {
                                            echo '<i class="fa fa-star" style="color:#FFD700;"></i>';
                                        } elseif ($i - $mediaAvaliacao < 1) {
                                            echo '<i class="fa fa-star-half-o" style="color:#FFD700;"></i>';
                                        } else {
                                            echo '<i class="fa fa-star-o" style="color:#FFD700;"></i>';
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                            <span class="qtd-reviews">(<?= count($avaliacoes) ?> reviews)</span>
                        </a>
                    </abbr>
                </div>
            </div>

            <div class="mais-detalhes">
                <div class="descricao">
                    <p><?= nl2br(htmlspecialchars( $descBreve)) ?></p>
                    <span>Disponível no estoque <img src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/img-confirmar.png" alt="img-correto"></span>
                    <p style="margin-top:.5rem;color:#666;">Marca: <strong><?= htmlspecialchars($marca) ?></strong></p>
                </div>
                <div class="botoes-detalhes">
                    <div class="btn-juntos">
                        <div class="qtd-produtos">
                            <button type="button" id="diminuir">-</button>
                            <input type="text" id="quantidadeInput" value="1">
                            <button type="button" id="aumentar">+</button>
                        </div>

                        <form id="formCarrinho" method="post">
                            <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                            <input type="hidden" name="quantidade" id="quantidadeInputForm" value="1">
                            <button type="submit" class="btn btn-success">Adicionar ao Carrinho</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="description-box">
        <div class="description-header">
            <h2>DESCRIÇÃO</h2>
            <p>
                Marca: <?= htmlspecialchars($marca) ?><br>
                Categoria: <?= htmlspecialchars($subcategoria ?: 'Não definida') ?><br>
                Cor: <?= htmlspecialchars($corPrincipal ?: 'Não definida') ?><br>
            </p>
        </div>
        <h3>Características: </h3>
        <ul>
            <li><?= nl2br(htmlspecialchars($descTotal ?: $descBreve)) ?></li>
            <li>Categoria: <strong><?= htmlspecialchars($subcategoria ?: 'Não definida') ?></strong></li>
            <li>Cor principal: <strong><?= htmlspecialchars($corPrincipal ?: 'Não definida') ?></strong></li>
        </ul>
    </div>

    <!-- Avaliações -->
    <div id="all-avaliacoes">
        <div class="avaliacoes">
            <div class="titulo-avaliacoes">
                <div class="titulo-aval">
                    <h1>Avaliações</h1>
                    <div class="media-avaliacao">
                        <span><?= number_format($mediaAvaliacao, 1) ?></span>
                        <span class="estrelas-media">
                            <?php 
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= floor($mediaAvaliacao)) {
                                    echo '<i class="fa fa-star" style="color:#FFD700;"></i>';
                                } elseif ($i - $mediaAvaliacao < 1) {
                                    echo '<i class="fa fa-star-half-o" style="color:#FFD700;"></i>';
                                } else {
                                    echo '<i class="fa fa-star-o" style="color:#FFD700;"></i>';
                                }
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="qtd-respostas">
                    <h2><?= count($avaliacoes) ?> respostas obtidas</h2>
                </div>
                <select name="ordenar" id="ordenar">
                    <option value="" disabled selected>Ordenar por</option>
                    <option value="maisRecentes">Mais recentes</option>
                    <option value="maisAntigas">Mais antigas</option>
                </select>
            </div>
            <div class="container-avaliacoes">
                <?php if (!empty($avaliacoes)): ?>
                    <?php foreach ($avaliacoes as $ava): ?>
                        <div class="avaliacao">
                            <div class="container-nome-usuario">
                                <h3 class="nome-usuario"><?php echo htmlspecialchars($ava['nome_usuario']); ?></h3>
                                <img class="avaliacao-usuario" src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-<?php echo (int)$ava['nota']; ?>.png" alt="img-avaliacao">
                            </div>
                            <div class="data-avaliacao">
                                <span><?php echo date('d/m/Y', strtotime($ava['data_avaliacao'])); ?></span>
                            </div>
                            <div class="descricao-avaliacao">
                                <p><?php echo nl2br(htmlspecialchars($ava['comentario'])); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhuma avaliação encontrada para este produto.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="sliderContainer">
        <div class="sessaoProdutos">
            <div class="tituloSessao">
                <p class="titulo">Produtos similares</p>
            </div>
            <div class="frameSlider">
                <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
                <div class="degradeEsquerda"></div>
                <div class="frameProdutos">
                    <div class="containerProdutos">
                        <?php
                        foreach ($produtosRelacionados as $produtoRelacionado) {
                            echo createCardProduto(
                                $produtoRelacionado['marca'],
                                $produtoRelacionado['nome'],
                                $produtoRelacionado['precoPromo'] == 0 ? $produtoRelacionado['preco'] : $produtoRelacionado['precoPromo'],
                                $produtoRelacionado['img1'],
                                $produtoRelacionado['fgPromocao'],
                                $produtoRelacionado['preco'],
                                $produtoRelacionado['corPrincipal'] ?? "#000",
                                $produtoRelacionado['corDegrade1'] ?? "#000",
                                $produtoRelacionado['corDegrade2'] ?? "#333",
                                $produtoRelacionado['id_produto']
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="degradeDireita"></div>
                <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
            </div>
        </div>
    </div>
</div>

<?php echo createRodape(); ?>

<script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/detalhesDoProduto.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>

<script>
const imgPrinc = document.getElementById('img-principal');
const imgLater = document.querySelectorAll('.imagens-lateral img');
imgLater.forEach(img => img.addEventListener('click', () => imgPrinc.src = img.src));
</script>

</body>
