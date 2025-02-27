<?php

function createCardProdutoLancamento($nome,$preco){

    return "
    <div class='cardLancamento' id='cardLancamento1'>
        <img class='imgCardLancamento' id='imgCardLancamento' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/marcas-com-rimel-vegano-2-e1649963065836.jpg' alt=''>
        <div class='baixo' id='baixo'>
            <span class='textoCardLancamento' id='textoCardLancamento'>".$nome."</span>
            <p class='CardLancamentoPreco' id='CardLancamentoPreco'>".$preco."</p>
            <button class='botaoMaisDetalhesCardLancamento' id='botaoMaisDetalhesCardLancamento'>Mais Detalhes</button>
            <button class='botaoComprarCardLancamento' id='botaoComprarCardLancamento'>Comprar</button>
        </div>
    </div>
    ";
}
?>


