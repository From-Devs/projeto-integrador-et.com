document.addEventListener("DOMContentLoaded", function(){ // Após a página toda carregar, as funções irão funcionar

    // declaração de variáveis
    const header = document.querySelectorAll(".headerUsuario");

    header.forEach(item => {
        const pesquisa = item.childNodes[3];
        const input = item.childNodes[3].childNodes[1];
        const lupa = item.childNodes[5].childNodes[1].childNodes[1];
        const perfil = item.childNodes[5].childNodes[1].childNodes[7];
        const menuConta = item.childNodes[5].childNodes[3];
        const botaoMenu = item.childNodes[1].childNodes[1];
        const menu = document.getElementById('sidebar_adm');
        const overlay = document.getElementById('overlay');

        menuConta.style.display = "none"; // tive que colocar isso no script pq no CSS não estava funcionando
    
        // Abrir a Sidebar
        botaoMenu.addEventListener('click', function (event) {
            event.stopPropagation();
            menu.classList.toggle('mostrar');
            overlay.classList.toggle('mostrar'); // Ativa/desativa o overlay
            menuConta.style.display = "none";
            pesquisa.className = "pesquisaHeader closed";
            item.className = "headerUsuario";
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
            if (pesquisa.className == "pesquisaHeader closed"){
                event.stopPropagation();
                pesquisa.className = "pesquisaHeader open";
                item.className = "headerUsuario pesquisaOpen";
                menuConta.style.display = "none";
            }
        })
        
        // Abrir menu do perfil quando clicar no icone de perfil
        perfil.addEventListener("click", function(event){
            if (menuConta.style.display == "none"){
                event.stopPropagation();
                menuConta.style.display = "flex"
                pesquisa.className = "pesquisaHeader closed";
                item.className = "headerUsuario";
                input.value = "";
            }
        })
        
        // Fechar barra de pesquisa quando clicar fora dela
        document.addEventListener("click", function(event){
            if (pesquisa.className == "pesquisaHeader open" && !pesquisa.contains(event.target)){
                pesquisa.className = "pesquisaHeader closed";
                item.className = "headerUsuario";
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

})
