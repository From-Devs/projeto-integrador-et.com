document.addEventListener("DOMContentLoaded", function(){

    const cardProdutos = document.querySelectorAll('.lancamentoCustom');
    
    cardProdutos.forEach(function(card){
        const overlayHover = document.createElement('div');
        overlayHover.classList.add("overlayHover")

        const botaoOverlay = document.createElement('button')
        botaoOverlay.className = "btn btn-white botaoOverlay";
        botaoOverlay.innerHTML = "Editar";

        botaoOverlay.addEventListener("click", function(event){
            const lancamentoId = card.getAttribute('data-id');
            abrirPopUp('popUpEditProdutoLancamento', 'editLancamento', lancamentoId, event)
        })

        overlayHover.appendChild(botaoOverlay);
        card.append(overlayHover);
        
        card.addEventListener("mouseenter", function(){
            overlayHover.style.opacity = "1";
        })
        card.addEventListener("mouseleave", function(){
            overlayHover.style.opacity = "0";
        })
    })
    
});