

document.addEventListener("DOMContentLoaded", function(){

    const cardProdutos = document.querySelectorAll('.cardLancamento');

    console.log(cardProdutos)

    
    cardProdutos.forEach(function(card){
        const overlayHover = document.createElement('div');
        overlayHover.classList.add("overlayHover")

        const botaoOverlay = document.createElement('button')
        botaoOverlay.className = "btn btn-white botaoOverlay";
        botaoOverlay.innerHTML = "Editar";

        overlayHover.appendChild(botaoOverlay);
        card.append(overlayHover);

        card.addEventListener("mouseenter", function(){
            overlayHover.style.opacity = "1";
        })
        card.addEventListener("mouseleave", function(){
            overlayHover.style.opacity = "0";
        })

    })

    const allBotaoOverlay = document.querySelectorAll('.botaoOverlay');

    allBotaoOverlay.forEach(function(botao){
        botao.addEventListener("click", abrirPopUp("popUpSelectProduto"))
    })

});