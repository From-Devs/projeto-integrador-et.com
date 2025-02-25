const header = document.getElementById("headerUsuario");
const pesquisa = document.getElementById("pesquisaHeader");
const input = document.getElementById("inputHeader");
const lupa = document.getElementById("lupa2");
const coracao = document.getElementById("coracao");
const carrinho = document.getElementById("carrinho");
const perfil = document.getElementById("perfil");
const menuConta = document.getElementById("menuConta");

console.log(menuConta)

lupa.addEventListener("click", function(event){
    if (pesquisa.className == "pesquisa closed"){
        event.stopPropagation();
        pesquisa.className = "pesquisa open";
        header.className = "headerUsuario pesquisaOpen";
        menuConta.style.visibility = "hidden";
    }
    // else{
    //     pesquisa.className = "pesquisa closed"
    //     header.className = "headerUsuario"
    //     input.value = ""
    // }
})

document.addEventListener("click", function(event){
    if (pesquisa.className == "pesquisa open" && !pesquisa.contains(event.target)){
        pesquisa.className = "pesquisa closed";
        header.className = "headerUsuario";
        input.value = "";
    }
})

perfil.addEventListener("click", function(event){
    if (menuConta.style.visibility == "hidden"){
        event.stopPropagation();
        menuConta.style.visibility = "visible"
    }
    // else{
    //     menuConta.style.visibility = "visible"
    // }
})

document.addEventListener("click", function(event){
    if (menuConta.style.visibility == "visible" && !menuConta.contains(event.target)){
        menuConta.style.visibility = "hidden";
    }
})