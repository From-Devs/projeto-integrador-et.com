document.addEventListener("DOMContentLoaded", function(){
    const card = document.getElementById("cardLancamento1");
    const baixo = document.getElementById("baixo");
    const imagem = document.getElementById("imgCardLancamento");
    const titulo = document.getElementById("textoCardLancamento");
    const preco = document.getElementById("CardLancamentoPreco");
    const botaoComprar = document.getElementById("botaoComprarCardLancamento");
    const botaoMaisDetalhes = document.getElementById("botaoMaisDetalhesCardLancamento");

    console.log(card)
    card.addEventListener("mouseenter", function(){
        imagem.className = "imgCardLancamento open"
        baixo.className = "baixo open"
        titulo.className = "textoCardLancamento open"
        preco.className = "CardLancamentoPreco open"
        botaoMaisDetalhes.className = "botaoMaisDetalhesCardLancamento open"
    })
    card.addEventListener("mouseleave", function(){
        imagem.className = "imgCardLancamento"
        baixo.className = "baixo"
        titulo.className = "textoCardLancamento"
        preco.className = "CardLancamentoPreco"
        botaoMaisDetalhes.className = "botaoMaisDetalhesCardLancamento"
    })
})