document.addEventListener("DOMContentLoaded", function(){
   
    const card = document.querySelectorAll(".content");
    console.log(card);

    card.forEach(item => {
        item.childNodes[5].childNodes[10].addEventListener("mouseenter", function(){
            item.childNodes[5].childNodes[10].className = "botaoComprarCardLancamento open"
            item.childNodes[5].childNodes[12].style.animationName = "botaoFantasma"
        })
        item.childNodes[5].childNodes[10].addEventListener("mouseleave", function(){
            item.childNodes[5].childNodes[10].className = "botaoComprarCardLancamento"
            item.childNodes[5].childNodes[12].style.animationName = ""
        })

    })
 
})