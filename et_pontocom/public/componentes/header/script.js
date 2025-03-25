document.addEventListener("DOMContentLoaded", function(){ // Após a página toda carregar, as funções irão funcionar

    // declaração de variáveis
    const header = document.getElementById("headerUsuario");
    const pesquisa = document.getElementById("pesquisaHeader");
    const input = document.getElementById("inputHeader");
    const lupa = document.getElementById("lupa2");
    const coracao = document.getElementById("coracao");
    const carrinho = document.getElementById("carrinho");
    const perfil = document.getElementById("perfil");
    const menuConta = document.getElementById("menuConta");
    const botaoMenu = document.getElementById('menu-toggle');
    const menu = document.getElementById('sidebar_adm');
    const overlay = document.getElementById('overlay');
    const logo = document.getElementById('logoHeader');

    menuConta.style.display = "none"; // tive que colocar isso no script pq no CSS não estava funcionando

    // depois precisa trocar os caminhos que os botões levam (Ex: coração levar pra lista de desejo)
    logo.addEventListener("click", function(){ // Quando clicar na logo do header, levar para página inicial
        window.location.href = "home";
    })

    // Abrir a Sidebar
    botaoMenu.addEventListener('click', function (event) {
        event.stopPropagation();
        menu.classList.toggle('mostrar');
        overlay.classList.toggle('mostrar'); // Ativa/desativa o overlay
        menuConta.style.display = "none";
        pesquisa.className = "pesquisa closed";
        header.className = "headerUsuario";
        input.value = "";
    });

    // Fechar Sidebar ao clicar fora dela
    document.addEventListener('click', function (event) {
        if (menu.classList.contains('mostrar') && !menu.contains(event.target)) {
            menu.classList.remove('mostrar');
            overlay.classList.remove('mostrar');
        }
    });

    // Mesma coisa de cima mas quando clicar no fundo
    overlay.addEventListener('click', function () {
        menu.classList.remove('mostrar');
        overlay.classList.remove('mostrar');
    });

    // Impedir fechamento da Sidebar ao clicar dentro da mesma
    menu.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Abrir barra de pesquisa quando clicar na lupa
    lupa.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa closed"){
            event.stopPropagation();
            pesquisa.className = "pesquisa open";
            header.className = "headerUsuario pesquisaOpen";
            menuConta.style.display = "none";
        }
    })
    
    // Abrir menu do perfil quando clicar no icone de perfil
    perfil.addEventListener("click", function(event){
        if (menuConta.style.display == "none"){
            event.stopPropagation();
            menuConta.style.display = "flex"
            pesquisa.className = "pesquisa closed";
            header.className = "headerUsuario";
            input.value = "";
        }
    })
    
    // Fechar barra de pesquisa quando clicar fora dela
    document.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa open" && !pesquisa.contains(event.target)){
            pesquisa.className = "pesquisa closed";
            header.className = "headerUsuario";
            input.value = "";
        }
    })
    
    // fechar menu do perfil quando clicar fora dele
    document.addEventListener("click", function(event){
        if (menuConta.style.display == "flex" && !menuConta.contains(event.target)){
            menuConta.style.display = "none";
        }
    })
})
