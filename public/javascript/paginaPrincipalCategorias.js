document.addEventListener("DOMContentLoaded", function(){

    const categorias = document.querySelectorAll(".botaoCategoria");
    const cores = ["rgb(255, 136, 136)", "rgb(255, 166, 117)", "rgb(255, 231, 106)", "rgb(120, 208, 123)", "rgb(147, 164, 255)", "rgb(204, 123, 253)"];
    let cont = 0

    categorias.forEach(item => {
        console.log(item);
        item.addEventListener("mouseenter", function(){
            console.log("drop-shadow(0px 0px 25px "+ cores[cont] +")")
            item.style.filter = "drop-shadow(0px 0px 25px "+ cores[cont] +")";
        });
        item.addEventListener("mouseleave", function(){
            console.log("saiu")
            item.style.filter = "drop-shadow(0px 4px 2px rgba(0, 0, 0, 0.25))";
        });
        cont += 1;
    });

});