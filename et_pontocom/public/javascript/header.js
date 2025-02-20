const header = document.getElementById("headerUsuario");
const pesquisa = document.getElementById("pesquisaHeader");
const input = document.getElementById("inputHeader");
const lupa = document.getElementById("lupa2");
const coracao = document.getElementById("coracao");
const carrinho = document.getElementById("carrinho");
const perfil = document.getElementById("perfil");

console.log(header)

lupa.addEventListener("click", function(){
    if (pesquisa.className == "pesquisa closed"){
        pesquisa.className = "pesquisa open"
        header.className = "headerUsuario pesquisaOpen"
        console.log("1")
    }else{
        pesquisa.className = "pesquisa closed"
        header.className = "headerUsuario"
        input.value = ""
        console.log("2")
    }
})