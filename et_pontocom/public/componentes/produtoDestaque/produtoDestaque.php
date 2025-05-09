<?php
function createProdutoDestaque($nome = "KIT LANCÔME LASH IDÔLE", $marca = "LANCÔME", $preco = "R$ 00.00", $imagem = "idole.png", $corDegrade1 = "rgb(180, 147, 138)", $corDegrade2 = "rgb(254, 225, 216)", $corSombra = "rgb(56, 21, 7)"){
    $botaoComprar = botaoPersonalizadoRedirect('Comprar', 'btn-black', '', '262px', '67px', '20px');
    $botaoMaisDetalhes = botaoPersonalizadoRedirect('Ver Detalhes', 'btn-white', '', '262px', '67px', '20px');
    return "
    <div class='produtoDestaque'>
        <div class='imagemProduto'>
            <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/$imagem' alt='' class='produto'>
            <span class='luzProduto'></span>
        </div>
        <div class='wrapperInfoProdutoDestaque'>
            <div class='infoProdutoDestaque'>
                <h1 class='nomeProduto'>$nome</h1>
                <h2 class='marcaProduto'>$marca</h2>
                <h1 class='precoProduto'>$preco</h1>
                <div class='botoesProdutoDestaque'>
                    $botaoComprar
                    $botaoMaisDetalhes
                </div>
            </div>
        </div>
        <div class='ondasProdutoDestaque'>
            <img class='ondaProdutoDestaque ondaPrincipal' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/ondaBranca.png' alt=''>
            <img class='ondaProdutoDestaque ondaFantasma' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/ondaFantasma.png' alt=''>
            <img class='retanguloProdutoDestaque retanguloBlur' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoDestaque/retanguloBlur.png' alt=''>
        </div>
        <div class='cores'>
            <div class='corDegrade1' style='color: $corDegrade1;'></div>
            <div class='corDegrade2' style='color: $corDegrade2;'></div>
            <div class='corSombra' style='color: $corSombra;'></div>
        </div>
    </div>
    ";
}
?>