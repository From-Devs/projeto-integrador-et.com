<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/rodape/Rodape.php";
    require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require __DIR__ . "/../../../public/componentes/cardListaDeDesejos/cardListaDeDesejos.php";
    require __DIR__ . "/../../../config/database.php";

    // session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipo_usuario'] ?? "Associado";
    // $id_usuario = $_SESSION['id_usuario'] ?? null;
    // $login = $id_usuario !== null;
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/listaDeDesejos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/sliderProdutos.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardProduto/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cardListaDeDesejos/styles.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>listaDeDesejos</title>
</head>
<body>

    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <div class="title-container">
        <div class="title">
            <h1>MINHA LISTA DE DESEJOS</h1>
        </div>
        <center><div class="line"></div></center>
    </div>

    <!-- <div class="cont-legend">
        <div class="cards-legend">
            <div class="produto">
                <p><strong>Produto</strong></p>
            </div>

            <div class="preco">
                <p><strong>Preço</strong></p>
            </div>
        </div>
    </div> -->
   
    <div class="acoesSelecionados" id="acoesSelecionados" style="display:none;">
        <input type="checkbox" id="selecionarTodos"> Selecionar todos
        <button id="adicionarCarrinho">Adicionar no carrinho</button>
        <button id="excluirSelecionados">Excluir</button>
    </div>

    <div class="container">
        <div class="degradeTopo"></div>
        <div class="degradeBaixo"></div>
        <div class="card-container">
            <?php 
                echo createCardListaDeDesejos(1,"bt-ovni.png",48.68,"Bruna Tavares", "BT Ovni Galaxy","08/07/2025", "rgba(28, 30, 37, 0.712)","rgb(217,234,37)", "rgb(221, 235, 67)");
                echo createCardListaDeDesejos(2,"superstay-ink-vinyl.png",99.51,"Maybelline", "Superstay Vinyl Ink Liquid Lipstick","08/07/2025", "rgb(160, 1, 27)","rgb(199, 43, 69)", "rgb(211, 112, 128)");
                echo createCardListaDeDesejos(3,"base-liquida-matte-vult.png",23.87,"Vult", "Base Líquida Efeito Matte","08/07/2025", "rgb(197, 153, 114)","rgb(231,187,148)", "rgb(241, 204, 171)");
                echo createCardListaDeDesejos(4,"bt-velvet-blackberry.png",35.89,"Bruna Tavares", "BT Velvet Blackberry","08/07/2025", "rgb(58, 9, 13)","rgb(112, 37, 42)", "rgb(179, 110, 116)");
                echo createCardListaDeDesejos(5,"renew-avon.png",75.90,"Avon", "Creme Renew Reversalist Dia Vitalidade 30+","08/07/2025", "rgb(143, 43, 41)","rgb(182, 78, 76)", "rgb(196, 117, 116)");
                echo createCardListaDeDesejos(6,"bodysplash-cuide-se-bem.png",84.90,"O Boticário", "Body Splash Cuide-se Bem Nuvem","08/07/2025", "rgb(139, 198, 206)","rgb(176, 237, 247)", "rgb(205, 245, 250)");
                echo createCardListaDeDesejos(7,"epidrat-mantecorp-facial.png",66.60,"Mantecorp", "Epidrat Calm Hidratante","08/07/2025", "rgb(81,74,108)","rgb(149, 140, 185)", "rgb(163, 156, 189)");
                echo createCardListaDeDesejos(8,"hidratante-nivea.png",20.99,"Nivea", "Creme Hidratante Milk","08/07/2025", "rgb(15, 44, 122)","rgb(70, 100, 182)", "rgb(117, 138, 194)");
                echo createCardListaDeDesejos(9,"Malbec_Colonia.png",169.00,"O Boticário", "Malbec Tradicional","08/07/2025", "rgb(65, 16, 16)","rgb(102, 56, 48)", "rgb(122, 92, 85)");
                echo createCardListaDeDesejos(10,"pincel-marimaria.png",95.90,"Mari Maria Makeup", "Pincel Angular Para Base","08/07/2025", "rgb(187, 49, 1)","rgb(232, 104, 63)", "rgb(235, 149, 120)");
                echo createCardListaDeDesejos(11,"esponja-mari-maria.png",35.90,"Mari Maria Makeup", "Esponja Flat Blende","08/07/2025", "rgb(241, 93, 10)","rgb(243, 130, 64)", "rgb(248, 180, 140)");
                echo createCardListaDeDesejos(12,"truss_net_masc.png",269.99,"Truss", "Net Mask Máscara Capilar","08/07/2025", "rgb(0, 150, 177)","rgb(66, 203, 228)", "rgb(141, 221, 235)");
                echo createCardListaDeDesejos(13,"amor-amor-perfume-feminino.png",405.30,"Cacharel", "AMOR AMOR","08/07/2025", "rgb(206, 21, 21)","rgb(247, 53, 53)", "rgb(255, 255, 255)");
                
                // if ($id_usuario) {
                    // $sql = "SELEC p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.imagem, ld.dataAdd
                    //         FROM ListaDesejos ld
                    //         JOIN Produto p ON ld.id_produto = p.id_produto
                    //         WHERE ld.id_usuario = ?";
                    // $stmt = $conn->prepare($sql);
                    // $stmt->execute([$id_usuario]);
                    // $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // if ($produtos){
                    //     foreach ($produtos as $produto){
                    //         echo createCardListaDeDesejos(
                    //             $produto['id_produto'],
                    //             $produto['imagem'],
                    //             $produto['precoPromo'] ?? $produto['preco'],
                    //             $produto['marca'],
                    //             $produto['nome'],
                    //             date("d/m/Y", strtotime($produto['dataAdd']))
                    //         );
                    //     }
                    // } else{
                    //     echo "<span>Sua lista de desejos está vazia.</span>";
                    // }
                // } else{
                //     echo "<span>Você precisa estar logado para adicionar e ver sua lista de desejo.</span>";
                // }
            ?>
        </div>
    </div>

    <center><div class="line2"></div></center>
    
    <div class="sliderContainer">
        <div class="sessaoProdutos">
            <div class="tituloSessao">
                <p class="titulo">Sugestões</p>
                <a href="#">Ver Mais</a>
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
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/rodape/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/cardProduto/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/slider.js"></script>

    <script> 
    function redirecionarDetalhesDoProduto() {
        window.location.href = "detalhesDoProduto.php";
    }
    </script>
    <script src="/projeto-integrador-et.com/public/javascript/listaDeDesejos.js"></script>
    
    
</body>
</html>