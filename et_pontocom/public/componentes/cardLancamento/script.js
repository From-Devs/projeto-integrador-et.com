document.addEventListener("DOMContentLoaded", function(){
    const card = document.getElementById("cardLancamento1");
    const baixo = document.getElementById("baixo");
    const imagem = document.getElementById("imgCardLancamento");
    const titulo = document.getElementById("textoCardLancamento");
    const preco = document.getElementById("CardLancamentoPreco");
    const botaoComprar = document.getElementById("botaoComprarCardLancamento");
    const botaoEspectro = document.getElementById("botaoEspectro")
    const botaoMaisDetalhes = document.getElementById("botaoMaisDetalhesCardLancamento");

    console.log(card)
    card.addEventListener("mouseenter", function(){
        card.className = "cardLancamento open"
        imagem.className = "imgCardLancamento open"
        baixo.className = "baixo open"
        titulo.className = "textoCardLancamento open"
        preco.className = "CardLancamentoPreco open"
        botaoMaisDetalhes.className = "botaoMaisDetalhesCardLancamento open"
    })
    card.addEventListener("mouseleave", function(){
        card.className = "cardLancamento"
        imagem.className = "imgCardLancamento"
        baixo.className = "baixo"
        titulo.className = "textoCardLancamento"
        preco.className = "CardLancamentoPreco"
        botaoMaisDetalhes.className = "botaoMaisDetalhesCardLancamento"
    })
    botaoComprar.addEventListener("mouseenter", function(){
        botaoComprar.className = "botaoComprarCardLancamento open"
        botaoEspectro.style.animationName = "botaoFantasma"
    })
    botaoComprar.addEventListener("mouseleave", function(){
        botaoComprar.className = "botaoComprarCardLancamento"
        botaoEspectro.style.animationName = ""
    })
})