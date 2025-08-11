<?php

function createCardProdutoLancamento($marca = "Indefinido", $nome = "Indefinido",$preco = "R$ 000,00",$cor = "#000000", $imagem = "", $classeExtra = ""){
    $titulo = $marca . " - " . $nome;

    return "
    <article class='cardLancamento $classeExtra' id='cardLancamento'>
        <img class='imgCardLancamento' id='imgCardLancamento' src='/projeto-integrador-et.com/public/imagens/produto/$imagem' alt=''>
        <div class='baixo' id='baixo'>
            <span class='textoCardLancamento' id='textoCardLancamento'>$titulo</span>
            <p class='CardLancamentoPreco' id='CardLancamentoPreco'>$preco</p>
            <button class='botaoMaisDetalhesCardLancamento' id='botaoMaisDetalhesCardLancamento'>Mais Detalhes</button>
            <button class='botaoComprarCardLancamento' id='botaoComprarCardLancamento'>Comprar</button>
            <button class='botaoEspectro' id='botaoEspectro'></button>
        </div>
        <div class='cor' style='color:$cor';></div>
    </article>
    ";
}
?>