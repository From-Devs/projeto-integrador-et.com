document.addEventListener("DOMContentLoaded", function(){

    const cardProdutos = document.querySelectorAll('.cardLancamento');

    console.log(cardProdutos)

    
    cardProdutos.forEach(function(card){
        const overlayHover = document.createElement('div');
        overlayHover.classList.add("overlayHover")

        const botaoOverlay = document.createElement('button')
        botaoOverlay.className = "btn btn-white";
        botaoOverlay.innerHTML = "Editar";

        overlayHover.appendChild(botaoOverlay);

        card.append(overlayHover);

    })

});