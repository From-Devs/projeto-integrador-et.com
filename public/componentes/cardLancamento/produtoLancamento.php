<?php

function createCardProdutoLancamento(
    $marca = "Indefinido",
    $nome = "Indefinido",
    $preco = "R$ 000,00",
    $cor = "#000000",
    $imagem = "",
    $idProduto = 0,
    $idLancamento = 0,
    $classeExtra = ""
    ){
    $titulo = $marca . " - " . $nome;

    return "
    <article class='cardLancamento $classeExtra' id='cardLancamento' produto-id='$idProduto' lancamento-id='$idLancamento'>
        <img class='imgCardLancamento' id='imgCardLancamento' src='/projeto-integrador-et.com/$imagem' alt=''>
        <div class='baixo' id='baixo'>
            <span class='textoCardLancamento' id='textoCardLancamento'>$titulo</span>
            <p class='CardLancamentoPreco' id='CardLancamentoPreco'>R$ $preco</p>
            <button class='botaoMaisDetalhesCardLancamento' id='botaoMaisDetalhesCardLancamento'>Mais Detalhes</button>
            <button class='botaoComprarCardLancamento' id='botaoComprarCardLancamento' type='submit' form='formCardProdutoCarrinho$idProduto'>Comprar</button>
            <button class='botaoEspectro' id='botaoEspectro'></button>
            <form id='formCardProdutoCarrinho$idProduto' class='formCardProdutoCarrinho' method='POST' style='display: none;'>
                <input type='hidden' name='id_produto' value='$idProduto'>
            </form>
        </div>
        <div class='cor' style='color:$cor';></div>
    </article>
    ";
}
?>