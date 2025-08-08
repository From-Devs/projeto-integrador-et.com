document.addEventListener("DOMContentLoaded", function(){
    
    const card = document.querySelectorAll(".lancamentoFuncional");

    card.forEach(item => {
        let cor = item.childNodes[5],
            style = window.getComputedStyle(cor),
            corValor = style.getPropertyValue('color');

        const botaoMaisDetalhes = item.querySelector('.botaoMaisDetalhesCardLancamento')

        botaoMaisDetalhes.addEventListener('click', function(){
            window.location.href = '/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php'
        })

        item.addEventListener("mouseenter", function(){
            item.classList.add("open");
            item.style.filter = "drop-shadow(0px 0px 10px "+corValor+")";
        })
        
        item.addEventListener("mouseleave", function(){
            item.classList.remove("open");
            item.style.filter = "";
        })

        item.childNodes[3].childNodes[7].addEventListener("mouseenter", function(){
            item.childNodes[3].childNodes[9].style.animationName = "botaoFantasma";
        })
        item.childNodes[3].childNodes[7].addEventListener("mouseleave", function(){
            item.childNodes[3].childNodes[9].style.animationName = "";
        })
    })
})