<?php

require __DIR__ . "../../../../../public/componentes/header/header.php";
require_once __DIR__ . "../../../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "../../../../../public/componentes/botao/botao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do produto</title>
    <link rel="stylesheet" href="projeto-integrador-et.com/et_pontocom/public/css/detalhesDoProduto.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/botoesComponente.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/popUpComponente.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <?php echo createHeader(false, "Usuário")?>
    
    <div class="detalhes-principal">
        <div class="detalhes-imagens">
            <div class="imagens-lateral">

            </div>
            <div class="img-principal">

            </div>
        </div>

        <div class="detalhes-info">
            <div>
                <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, laboriosam.</h2>
                <div class="sub-titulo-produto">
                    <span class="preco-produto">R$39,90</span> |
                    <a class="avaliacao" href="#">
                        <span>
                            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                        </span>
                    </a>
                </div>
            </div>
            <hr>
            <div class="mais-detalhes">
                <div class="descricao">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores illum iste hic, eius quae natus nobis eveniet voluptates qui facere modi? Explicabo, ad velit. Consequatur placeat possimus dolore accusantium iure.
                    Perspiciatis esse aut voluptas quia ex repudiandae consequuntur iste quasi, recusandae deserunt odit eos voluptatibus dicta nulla quos voluptates rerum sit! Dolorum voluptate odio quaerat explicabo praesentium obcaecati dolor natus!</p>
                </div>
                <div class="qtd-produtos">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                </div>
                <div>
                    <?php 
                    echo PopUpComImagemETitulo("AddCarrinho", "/produto/img-carrinho.png", "80px", "Adicionado ao carrinho!");
                    
                    echo botaoPersonalizadoOnClick("Adicionar ao carrinho", "btn-black", "abrirPopUp(\"AddCarrinho\")");
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/popUp.js"></script>
</body>
</html>