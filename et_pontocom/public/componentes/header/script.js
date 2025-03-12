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
    const botao1 = document.getElementById('botao1');
    const botao2 = document.getElementById('botao2');
    const logo = document.getElementById('logoHeader');

    menuConta.style.display = "none"; // tive que colocar isso no script pq no CSS não estava funcionando

    // depois precisa trocar os caminhos que os botões levam (Ex: coração levar pra lista de desejo)
    logo.addEventListener("click", function(){ // Quando clicar na logo do header, levar para página inicial
        window.location.href = "home";
    })

    coracao.addEventListener("click", function(){ // Coração leva para lista de desejos
        window.location.href = "testeCoracao";
    })

    carrinho.addEventListener("click", function(){ // Carrinho leva pra página de carrinho
        window.location.href = "testeCarrinho";
    })

    botao1.addEventListener("click", function(){ // Função para que quando o usuário estiver logado ou deslogado, os botões levem para páginas diferentes
        console.log(botao1.innerHTML);
        switch (botao1.innerHTML) {
            case "Cadastrar-se":
                window.location.href = "teste1";
                break;

            case "Minha Conta":
                window.location.href = "teste2";
                break;
        
            default:
                break;
        }
    });

    botao2.addEventListener("click", function(){ // Mesma coisa de cima só que o outro botão
        switch (botao2.innerHTML) {
            case "Entrar":
                window.location.href = "teste3";
                break;

            case "Sair":
                window.location.href = "teste4";
                break;
        
            default:
                break;
        }
    });

    // Abrir a Sidebar
    botaoMenu.addEventListener('click', function (event) {
        event.stopPropagation();
        menu.classList.toggle('mostrar');
        // overlay.classList.toggle('mostrar'); // Ativa/desativa o overlay
        menuConta.style.display = "none";
        pesquisa.className = "pesquisa closed";
        header.className = "headerUsuario";
        input.value = "";
    });

    // Fechar Sidebar ao clicar fora dela
    document.addEventListener('click', function (event) {
        if (menu.classList.contains('mostrar') && !menu.contains(event.target)) {
            menu.classList.remove('mostrar');
            // overlay.classList.remove('mostrar');
        }
    });

    // Mesma coisa de cima mas quando clicar no fundo
    // overlay.addEventListener('click', function () {
    //     menu.classList.remove('mostrar');
    //     overlay.classList.remove('mostrar');
    // });

    // Impedir fechamento da Sidebar ao clicar dentro da mesma
    menu.addEventListener('click', function (event) {
        event.stopPropagation();
    });

    // Abrir barra de pesquisa quando clicar na lupa
    lupa.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa closed"){
            console.log("abrir lupa");
            event.stopPropagation();
            pesquisa.className = "pesquisa open";
            header.className = "headerUsuario pesquisaOpen";
            menuConta.style.display = "none";
        }
    })
    
    // Abrir menu do perfil quando clicar no icone de perfil
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
    
    // Fechar barra de pesquisa quando clicar fora dela
    document.addEventListener("click", function(event){
        if (pesquisa.className == "pesquisa open" && !pesquisa.contains(event.target)){
            console.log("fechar lupa");
            pesquisa.className = "pesquisa closed";
            header.className = "headerUsuario";
            input.value = "";
        }
    })
    
    // fechar menu do perfil quando clicar fora dele
    document.addEventListener("click", function(event){
        if (menuConta.style.display == "flex" && !menuConta.contains(event.target)){
            console.log("fechar menu");
            menuConta.style.display = "none";
        }
    })
})
