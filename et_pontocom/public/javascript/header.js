document.addEventListener("DOMContentLoaded", function(){

    const header = document.getElementById("headerUsuario");
    const pesquisa = document.getElementById("pesquisaHeader");
    const input = document.getElementById("inputHeader");
    const lupa = document.getElementById("lupa2");
    const coracao = document.getElementById("coracao");
    const carrinho = document.getElementById("carrinho");
    const perfil = document.getElementById("perfil");
    const menuConta = document.getElementById("menuConta");
    const botaoMenu = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    const overlay = document.getElementById('overlay');

    menuConta.style.display = "none";

    // Abrir/fechar o menu
    botaoMenu.addEventListener('click', function (event) {
        event.stopPropagation();
        menu.classList.toggle('mostrar');
        overlay.classList.toggle('mostrar'); // Ativa/desativa o overlay
        menuConta.style.display = "none";
        pesquisa.className = "pesquisa closed";
        header.className = "headerUsuario";
        input.value = "";
    });

    // Fechar ao clicar fora ou no overlay
    document.addEventListener('click', function (event) {
        if (menu.classList.contains('mostrar') && !menu.contains(event.target)) {
            menu.classList.remove('mostrar');
            overlay.classList.remove('mostrar');
        }
    });

    // Fechar ao clicar no overlay
    overlay.addEventListener('click', function () {
        menu.classList.remove('mostrar');
        overlay.classList.remove('mostrar');
    });

    // Impedir fechamento ao clicar dentro do menu
    menu.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    lupa.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa closed"){
            console.log("abrir lupa");
            event.stopPropagation();
            pesquisa.className = "pesquisa open";
            header.className = "headerUsuario pesquisaOpen";
            menuConta.style.display = "none";
        }
    })
    
    perfil.addEventListener("click", function(event){
        if (menuConta.style.display == "none"){
            console.log("abrir menu");
            event.stopPropagation();
            menuConta.style.display = "flex"
            pesquisa.className = "pesquisa closed";
            header.className = "headerUsuario";
            input.value = "";
        }
    })
    
    document.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa open" && !pesquisa.contains(event.target)){
            console.log("fechar lupa");
            pesquisa.className = "pesquisa closed";
            header.className = "headerUsuario";
            input.value = "";
        }
    })
    
    
    document.addEventListener("click", function(event){
        if (menuConta.style.display == "flex" && !menuConta.contains(event.target)){
            console.log("fechar menu");
            menuConta.style.display = "none";
        }
    })
})
