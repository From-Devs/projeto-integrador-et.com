document.addEventListener("DOMContentLoaded", function(){
    
    const card = document.querySelectorAll(".cardLancamento");

    card.forEach(item => {
        let cor = item.childNodes[5],
            style = window.getComputedStyle(cor),
            corValor = style.getPropertyValue('color');

        item.addEventListener("mouseenter", function(){
            item.className = "cardLancamento open";
            item.style.filter = "drop-shadow(0px 0px 10px "+corValor+")";
            item.childNodes[1].className = "imgCardLancamento open";
            item.childNodes[3].className = "baixo open";
            item.childNodes[3].childNodes[1].className = "textoCardLancamento open";
            item.childNodes[3].childNodes[3].className = "CardLancamentoPreco open";
            item.childNodes[3].childNodes[5].className = "botaoMaisDetalhesCardLancamento open";
        })
        item.addEventListener("mouseleave", function(){
            item.className = "cardLancamento";
            item.style.filter = "";
            item.childNodes[1].className = "imgCardLancamento";
            item.childNodes[3].className = "baixo";
            item.childNodes[3].childNodes[1].className = "textoCardLancamento";
            item.childNodes[3].childNodes[3].className = "CardLancamentoPreco";
            item.childNodes[3].childNodes[5].className = "botaoMaisDetalhesCardLancamento";
        })

        item.childNodes[3].childNodes[7].addEventListener("mouseenter", function(){
            item.childNodes[3].childNodes[7].className = "botaoComprarCardLancamento open";
            item.childNodes[3].childNodes[9].style.animationName = "botaoFantasma";
        })
        item.childNodes[3].childNodes[7].addEventListener("mouseleave", function(){
            item.childNodes[3].childNodes[7].className = "botaoComprarCardLancamento";
            item.childNodes[3].childNodes[9].style.animationName = "";
        })
    })
})