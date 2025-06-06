document.addEventListener("DOMContentLoaded", function(){
   
    const card = document.querySelectorAll(".cardProduto");

    card.forEach(item => {
        let cor = item.childNodes[1],
            cores = [];

        for (let index = 1; index < cor.childNodes.length; index+=2) {
            let style = window.getComputedStyle(cor.childNodes[index]),
                corValor = style.getPropertyValue('color');
                
            cores.push(corValor);
        }
            
        const balao = item.childNodes[3].childNodes[1],
              coracao = item.childNodes[3].childNodes[3],
              botaoComprar = item.querySelector(".botaoComprarCardProduto"),
              botaoAnimacao = item.childNodes[7].childNodes[12];

        console.log(botaoComprar)


        item.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";

        botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";

        item.addEventListener("mouseenter", function(){
            item.style.filter = "drop-shadow(0px 1px 8px "+ cores[0] +")";
        });
        item.addEventListener("mouseleave", function(){
            item.style.filter = "drop-shadow(0px 6px 4px rgba(0, 0, 0, 0.35))";
        });

        coracao.addEventListener("mouseenter", function(){
            balao.style.display = "block";
        });
        coracao.addEventListener("mouseleave", function(){
            balao.style.display = "none";
        });

        botaoComprar.addEventListener("mouseenter", function(){
            botaoComprar.className = "botaoComprarCardProduto open";
            botaoAnimacao.style.animationName = "botaoFantasma";
        });
        botaoComprar.addEventListener("mouseleave", function(){
            botaoComprar.className = "botaoComprarCardProduto";
            botaoAnimacao.style.animationName = "";
        });
        botaoComprar.addEventListener('click', function(){
            window.location.href = '/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto.php'
        })

    });
 
});