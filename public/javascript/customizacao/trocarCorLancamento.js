// trocarCorLancamento (filtro de brilho)
const corBrilho = document.getElementById('corBrilhoLancamento');
const card = document.querySelector(".bugBizarro").childNodes[3];

function trocarCorBrilho(){
    card.addEventListener("mouseenter", function(){
        card.style.filter = "drop-shadow(0px 0px 10px "+corBrilho.childNodes[1].value+")";
    })
        
    card.addEventListener("mouseleave", function(){
        card.style.filter = "";
    })    
}

corBrilho.childNodes[1].addEventListener('input', trocarCorBrilho);
corBrilho.childNodes[3].addEventListener('input', trocarCorBrilho);
