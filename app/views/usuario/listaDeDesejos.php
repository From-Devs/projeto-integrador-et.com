<?php
require_once __DIR__ . "/../../../config/produtoController.php";
require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../public/componentes/header/header.php"; 
require_once __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
require_once __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
require_once __DIR__ . "/../../../public/componentes/cardListaDeDesejos/cardListaDeDesejos.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require_once __DIR__ . "/../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

session_start();

$tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
$login = $_SESSION['login'] ?? false;
$controller = new ProdutoController();
$idUsuario = $_SESSION['id_usuario'] ?? null;
$favoritos = $idUsuario ? $controller->ListarFavoritos($idUsuario) : [];

$btnExcluirSelecionados = botaoPersonalizadoOnClick('Sim','btn-green','enviarFormulario("removerFavorito", getSelecionados()); fecharPopUp("removerSelecionados")','85px','40px','18px');
$btnCancelarExclusão = botaoPersonalizadoOnClick('Não','btn-red','fecharPopUp("removerSelecionados")','85px','40px','18px');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Desejos</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/listaDeDesejos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardListaDeDesejos/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">

    <!-- Fontes e ícones -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
</head>
<body data-usuario-id="<?php echo $idUsuario ?? ''; ?>">

<?php 
echo createHeader($login, $tipoUsuario); 
echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "160px", "Adicionado à Lista de Desejos!", "", "", "", "352px");
?>

<div class="title-container">
    <div class="title"><h1>MINHA LISTA DE DESEJOS</h1></div>
    <center><div class="line"></div></center>
</div>

<div class="acoesWrapper">
    <div class="acoesSelecionados" id="acoesSelecionados" style="display:none;">
        <div class="inputCheck">
            <input type="checkbox" id="selecionarTodos"> 
            <label>Selecionar todos</label>
        </div>
        <div class="btnCheck">
            <button id="adicionarCarrinho">Adicionar ao Carrinho</button>
            <button id="excluirSelecionados">Excluir</button>
            <?php 
                echo PopUpConfirmar('removerSelecionados','Deseja eliminar <span id="idProdutosSelecionados">0</span> produto(s) da sua lista de desejos?',$btnExcluirSelecionados,$btnCancelarExclusão,'500px');
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="degradeTopo"></div>
    <div class="degradeBaixo"></div>
    <div class="card-container" id="cardContainer">
        <?php
        if (!empty($favoritos)) {
            $produtosListaDesejos = [];
            foreach ($favoritos as $item) {
                $preco = $item['preco'];
                $precoPromo = $item['precoPromo'] ?? null;

                // Usa img1 direto do banco e fallback para default.png
                $imagem = isset($item['img1']) ? trim($item['img1']) : 'default.png';

                $dataAdicionado = $item['dataAdd'];

                $produtosListaDesejos[] = createCardListaDeDesejos(
                    $item['id_produto'],
                    $imagem,
                    $preco,
                    $item['marca'],
                    $item['nome'],
                    $item['tamanho'],
                    $dataAdicionado,
                    $item['corPrincipal'] ?? "#919191",
                    $item['hexDegrade1'] ?? "#919191",
                    $item['hexDegrade2'] ?? "#919191",
                    $precoPromo
                );
            }

            $resultado = paginar($produtosListaDesejos, 10);
            foreach ($resultado['dados'] as $produtos){
                echo $produtos;
            }
        } else {
            echo "<p style='text-align: center; margin-top: 2rem;'>Sua lista de desejos está vazia.</p>";
        }
        ?>
    </div>     
</div>

<div class="paginacao" style="width: 100%; justify-items: center;">
    <?php if (!empty($favoritos)) renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']); ?>
</div>

<center><div class="line2"></div></center>

<!-- Sugestões -->
<div class="sliderContainer">
    <div class="sessaoProdutos">
        <div class="tituloSessao"><p class="titulo">Sugestões</p></div>
        <div class="frameSlider">
            <i class="fa-solid fa-chevron-left setaSlider setaEsquerda" id="esquerda"></i>
            <div class="degradeEsquerda"></div>
            <div class="frameProdutos">
                <div class="containerProdutos">
                    <?php
                    echo createCardProduto("Nivea", "Hidratante Corporal Milk", 20, "milk", false, 30, "#3E7FD9", "#133285", "#3F7FD9");
                    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", 20, "biscoito", false, 30, "#31BADA", "#00728C", "#31BADA");
                    echo createCardProduto("Vult", "Base Líquida Efeito Matte", 20, "vult", false, 30, "#DBA980", "#72543A", "#E4B186");
                    echo createCardProduto("O Boticário", "Colonia Coffee Man", 30, "coffee", false, 30, "#D2936A", "#6C4A34", "#D29065");
                    ?>
                </div>
            </div>
            <div class="degradeDireita"></div>
            <i class="fa-solid fa-chevron-right setaSlider setaDireita" id="direita"></i>
        </div>
    </div>
</div>

<?php echo createRodape(); ?>

<!-- Scripts -->
<script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
<script src="/projeto-integrador-et.com/public/javascript/listaDeDesejos.js"></script>

<script>

</script>


</body>
</html>