<?php
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../config/produtoController.php";
require_once __DIR__ . "/../../../public/componentes/header/header.php";
require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";


session_start();
$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
$login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)

$conn = (new Database())->connect();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    die("Você precisa estar logado para adicionar ao carrinho.");
}

$id_usuario = $_SESSION['id_usuario'];

// Quando o form for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produto'])) {
    $id_produto = intval($_POST['id_produto']);
    $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : 1;

    try {
        // Verifica se já existe o produto no carrinho do usuário
        $sql = "SELECT id_carrinho, quantidade 
                FROM carrinho 
                WHERE id_usuario = :id_usuario AND id_produto = :id_produto";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_usuario' => $id_usuario,
            ':id_produto' => $id_produto
        ]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            // Se já existe → atualiza quantidade
            $novaQuantidade = $item['quantidade'] + $quantidade;
            $update = "UPDATE carrinho 
                       SET quantidade = :qnt 
                       WHERE id_carrinho = :id_carrinho";
            $stmtUpdate = $conn->prepare($update);
            $stmtUpdate->execute([
                ':qnt' => $novaQuantidade,
                ':id_carrinho' => $item['id_carrinho']
            ]);
        } else {
            // Se não existe → insere novo
            $insert = "INSERT INTO carrinho (id_usuario, cep, id_produto, quantidade) 
                       VALUES (:id_usuario, '00000000', :id_produto, :qnt)";
            $stmtInsert = $conn->prepare($insert);
            $stmtInsert->execute([
                ':id_usuario' => $id_usuario,
                ':id_produto' => $id_produto,
                ':qnt' => $quantidade
            ]);
        }

        echo json_encode([
            'ok' => true,
            'mensagem' => 'Produto adicionado ao carrinho',
            'quantidade' => $quantidade
        ]);
        exit;

    } catch (PDOException $e) {
        echo "Erro ao adicionar ao carrinho: " . $e->getMessage();
    }
}

$idUsuario = $_SESSION['id_usuario'] ?? null;
if (!$idUsuario) {
    die("Usuário não logado!");
}
// carrega produto por id
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$produto = null;

if ($id > 0) {
    $produtoController = new ProdutoController();
    $produto = $produtoController->BuscarProdutoPorId($id);
}

if (!$produto) {
    // produto não encontrado
    echo "<!DOCTYPE html><html lang='pt-br'><head><meta charset='UTF-8'><title>Produto</title></head><body>";
    echo createHeader($login, $tipoUsuario);
    echo "<div style='max-width:1000px;margin:2rem auto;padding:1rem;'><h2>Produto não encontrado.</h2><p><a href='/projeto-integrador-et.com/app/views/usuario/paginaPrincipal.php'>Voltar à página principal</a></p></div>";
    echo createRodape();
    echo "</body></html>";
    exit;
}

// prepara dados
$nome        = $produto['nome'] ?? '';
$marca       = $produto['marca'] ?? '';
$descBreve   = $produto['descricaoBreve'] ?? '';
$descTotal   = $produto['descricaoTotal'] ?? '';
$preco       = (float)($produto['preco'] ?? 0);
$precoPromo  = (float)($produto['precoPromo'] ?? 0);

// Busca subcategoria/cor caso não tenham vindo do controller
if (empty($subcategoria) || empty($corPrincipal)) {
    try {
        require_once __DIR__ . '/../../../config/database.php';
        if (class_exists('Database')) {
            $db = new Database();
            $pdo = $db->Connect();
            if (empty($subcategoria)) {
                $stmt = $pdo->prepare('SELECT s.nome FROM subcategoria s JOIN produto p ON p.id_subCategoria = s.id_subCategoria WHERE p.id_produto = :id LIMIT 1');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $subcategoria = $stmt->fetchColumn() ?: '';
            }
            if (empty($corPrincipal)) {
                $stmt = $pdo->prepare('SELECT c.corPrincipal FROM cores c JOIN produto p ON p.id_cores = c.id_cores WHERE p.id_produto = :id LIMIT 1');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $corPrincipal = $stmt->fetchColumn() ?: '';
            }
        }
    } catch (Throwable $e) { /* silencioso */ }
}
$temPromo    = $precoPromo > 0 && $precoPromo < $preco;


$subcategoria = $produto['subcategoria'] ?? ($produto['nomeSubcategoria'] ?? '');
$corPrincipal = $produto['corPrincipal'] ?? ($produto['cor'] ?? '');
$imgArquivo  = trim($produto['imagem'] ?? '');
$baseImgPath = "/projeto-integrador-et.com/public/imagens/produto/";

$img1 = !empty($produto['img1']) ? $baseImgPath . $produto['img1'] : $baseImgPath . 'no-image.png';
$img2 = !empty($produto['img2']) ? $baseImgPath . $produto['img2'] : $img1;
$img3 = !empty($produto['img3']) ? $baseImgPath . $produto['img3'] : $img1;
$imgPrincipal = $img1;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css"> 
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/detalhesDoProduto.css">
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Detalhes do produto</title>
</head>
<body>
    <?php echo createHeader($login, $tipoUsuario) ?>
    
    <div class="container-detalhes">
        <div class="detalhes-principal">
            <div class="imagens-lateral">
                <div><img src="<?php echo htmlspecialchars($img1); ?>" alt="img-lateral"></div>
                <div><img src="<?php echo htmlspecialchars($img2); ?>" alt="img-lateral"></div>
                <div><img src="<?php echo htmlspecialchars($img3); ?>" alt="img-lateral"></div>
            </div>

            <div class="img-principal">
                <div><img id='img-principal' src="<?php echo htmlspecialchars($imgPrincipal); ?>" alt="img-principal"></div>
            </div>
            <div class="detalhes-info">
                <div class="titulo-produto">
                    <div class="titulo">
                    <h3><?php echo htmlspecialchars($nome); ?></h3>

                        <!-- Pop-up de confirmação -->
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

                        <!-- Formulário + botão de coração -->
                        <form id="formFavorito" method="POST">
                            <input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>">
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
                                <span style="font-weight:700;">R$ <?php echo number_format($precoPromo, 2, ',', '.'); ?></span>
                                <span style="text-decoration:line-through;margin-left:.5rem;color:#777;">R$ <?php echo number_format($preco, 2, ',', '.'); ?></span>
                            <?php else: ?>
                                R$ <?php echo number_format($preco, 2, ',', '.'); ?>
                            <?php endif; ?>
                        </span>
                        <abbr title="Avaliações" class="avaliacao-descricao">
                            <a href="#all-avaliacoes">
                                <img src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                                <span class="qtd-reviews">(10 reviews)</span>
                            </a>
                        </abbr>
                    </div>
                </div>
                <div class="mais-detalhes">
                    <div class="descricao">
                        <p><?php echo nl2br(htmlspecialchars($descTotal ?: $descBreve)); ?></p>
<span>Disponível no estoque <img src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/img-confirmar.png" alt="img-correto"></span>
                        <p style="margin-top:.5rem;color:#666;">Marca: <strong><?php echo htmlspecialchars($marca); ?></strong></p>
                    </div>
                    <div class="botoes-detalhes">
                        <div class="btn-juntos">
                        <div class="qtd-produtos">
                            <button type="button" id="diminuir">-</button>
                            <input type="text" id="quantidadeInput" value="1">
                            <button type="button" id="aumentar">+</button>
                        </div>

                            <form id="formCarrinho" method="post">
                                <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                                <input type="hidden" name="quantidade" id="quantidadeInput" value="1">
                                <button type="submit" class="btn btn-success">
                                    Adicionar ao Carrinho
                                </button>
                            </form>

                            <!-- Pop-up de confirmação -->
                            <div id="popUpCarrinho" class="popUp" style="display:none;">
                                <img src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/img-confirmar.png" alt="Sucesso">
                                <p>Produto adicionado ao carrinho!</p>
                            </div>

                        </div>
                        <div class="div-favorito-e-carrinho">
    
    



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-ir-descricao">
            <button onclick="document.querySelector('.description-box').scrollIntoView({ behavior: 'smooth' });">
                Ver mais detalhes do produto ↓
            </button>
        </div>
    </div>

    <div class="description-box">
        <div class="description-header">
            <h2>DESCRIÇÃO</h2>
            <p>
                Marca: <?php echo htmlspecialchars($marca); ?><br>
                Categoria: <?php echo htmlspecialchars($subcategoria ?: 'Não definida'); ?><br>
                Cor: <?php echo htmlspecialchars($corPrincipal ?: 'Não definida'); ?><br>
<!-- Campos extras podem ser preenchidos dinamicamente se existirem no banco -->
            </p>
        </div>
        
        <h3>Características: </h3>
        <ul>
            <li><?php echo nl2br(htmlspecialchars($descTotal ?: $descBreve)); ?></p>
            <li>Categoria: <strong><?php echo htmlspecialchars($subcategoria ?: 'Não definida'); ?></strong></li>
            <li>Cor principal: <strong><?php echo htmlspecialchars($corPrincipal ?: 'Não definida'); ?></strong></li>
        </ul>
    </div>

    <div id="all-avaliacoes">
        <div class="avaliacoes">
            <div class="titulo-avaliacoes">
                <div class="titulo-aval">
                    <h1>Avaliações</h1>
                    <img src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                </div>
                <div class="qtd-respostas">
                    <h2>4 respostas obtidas</h2>
                </div>
                <select name="ordenar" id="ordenar">
                    <option value="" disabled selected>Ordenar por</option>
                    <option value="maisRelevantes">Mais relevantes</option>
                    <option value="maisRecentes">Mais recentes</option>
                    <option value="maisAntigas">Mais antigas</option>
                </select>
            </div>
            <div class="container-avaliacoes">
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Maria Silva</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-5.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>10/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Produto excelente, recomendo!</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                            <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "60px", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "60px", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <!-- (demais avaliações mantidas do seu template) -->
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Nícolas Eloy</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-2.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>25/12/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Muito bom custo-benefício.</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                            <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "60px", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "60px", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Marcos Rosa</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>03/08/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Atendeu minhas expectativas.</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                            <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "60px", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "60px", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Evandro Marques</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/public/imagens/produto/avaliacao-3.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>01/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Chegou rapidinho e bem embalado.</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                            <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "60px", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "60px", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
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
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                        echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "milk", false, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
                        echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "biscoito", false, "R$30,00", "#31BADA", "#00728C", "#31BADA");
                        echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "vult", false, "R$30,00", "#DBA980", "#72543A", "#E4B186");
                        echo createCardProduto("O Boticário", "Colonia Coffee Man", "R$30,00", "coffee", false, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
                        ?>
                    </div>
                </div>
                <div class="degradeDireita"></div>
                <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
            </div>
        </div>
    </div>

    <?php 
    echo createRodape(); 
    ?>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/detalhesDoProduto.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>

    <script>
        const imgPrinc = document.getElementById('img-principal');
        const imgLater = document.querySelectorAll('.imagens-lateral img');

        imgLater.forEach(img => {
            img.addEventListener('click', () => {
                imgPrinc.src = img.src;
            });
        });
    </script>
</body>
</html>
