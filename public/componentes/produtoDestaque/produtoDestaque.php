<?php
function createProdutoDestaque(
    $idProduto = 0,
    $nome = "KIT LANCÔME LASH IDÔLE",
    $marca = "LANCÔME",
    $preco = "R$ 00.00",
    $imagem = "public/imagens/produto/idole.png",
    $corDegrade1 = "rgb(180, 147, 138)",
    $corDegrade2 = "rgb(254, 225, 216)",
    $corSombra = "rgb(56, 21, 7)"
    ){
        return "
        <div class='produtoDestaque' style='background: linear-gradient(rgba(255, 255, 255, 0) 0%, $corDegrade1 50%, $corDegrade2 100%);' data-id='$idProduto'>>
            <div class='imagemProduto'>
                <img src='/projeto-integrador-et.com/$imagem' alt='' class='produto'>
                <span class='luzProduto'></span>
            </div>
            <div class='wrapperInfoProdutoDestaque'>
                <div class='infoProdutoDestaque'>
                    <h1 class='nomeProduto'>$nome</h1>
                    <h2 class='marcaProduto'>$marca</h2>
                    <h1 class='precoProduto'>R$ $preco</h1>
                    <div class='botoesProdutoDestaque'>
                        <button id='botaoComprarProdutoDestaque' type='submit' form='formCardProdutoCarrinho$idProduto' class='btn btn-black' style='width:262px; height:67px;font-size:20px;'>Comprar</button>
                        <button id='botaoDetalhesProdutoDestaque' class='btn btn-white' style='width:262px; height:67px;font-size:20px;'>Ver Detalhes</button>
                    </div>
                </div>
            </div>
            <div class='ondasProdutoDestaque'>
                <img class='ondaProdutoDestaque ondaPrincipal' src='/projeto-integrador-et.com/public/imagens/produtoDestaque/ondaBranca.png' alt='' style='filter: drop-shadow($corSombra 0px 0px 50px);'>
                <img class='ondaProdutoDestaque ondaFantasma' src='/projeto-integrador-et.com/public/imagens/produtoDestaque/ondaFantasma.png' alt=''>
                <img class='retanguloProdutoDestaque retanguloBlur' src='/projeto-integrador-et.com/public/imagens/produtoDestaque/retanguloBlur.png' alt='' style='filter: drop-shadow($corSombra 0px 0px 120px);'>
            </div>
            <form id='formCardProdutoCarrinho$idProduto' class='formCardProdutoCarrinho' method='POST' style='display: none;'>
                <input type='hidden' name='id_produto' value='$idProduto'>
            </form>
        </div>
        ";
    }
?>