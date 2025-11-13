document.addEventListener("DOMContentLoaded", function(){ // Após a página toda carregar, as funções irão funcionar

    // declaração de variáveis
    const header = document.querySelectorAll(".headerUsuario");
    const LoginVerific = document.getElementById('LoginVerific').innerHTML;
    const botaoSidebarMeusPedidos = document.getElementById('botaoSidebarMeusPedidos');

    header.forEach(item => {
        const pesquisa = item.childNodes[3];
        const input = item.childNodes[3].childNodes[1];
        // debounce helper to avoid firing requests on every keystroke
        function debounce(fn, delay){
            let timer;
            return function(...args){
                clearTimeout(timer);
                timer = setTimeout(() => fn.apply(this, args), delay);
            }
        }
        const lupa = item.childNodes[5].childNodes[1].childNodes[1];
        const favHeaderBotao = item.childNodes[5].childNodes[1].childNodes[3];
        const carrinhoBotaoHeader = item.childNodes[5].childNodes[1].childNodes[5];
        const perfil = item.childNodes[5].childNodes[1].childNodes[7];
        const menuConta = item.childNodes[5].childNodes[3];
        const botaoMenu = item.childNodes[1].childNodes[1];
        const botaoMenuMobile = document.getElementById('menu-toggle-mobile');
        const menu = document.getElementById('sidebar');
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

        favHeaderBotao.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'listaDeDesejos.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })
        
        carrinhoBotaoHeader.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'Meu_Carrinho.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })

        botaoSidebarMeusPedidos.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'meusPedidos.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
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

        botaoMenuMobile.addEventListener("click", function(event){
            event.stopPropagation();
            menu.classList.remove('mostrar');
            overlay.classList.remove('mostrar'); // Ativa/desativa o overlay
            menuConta.style.display = "none";
            pesquisa.className = "pesquisaHeader closed";
            item.className = "headerUsuario";
            input.value = "";
        })

        // Chamar a busca ao digitar (com debounce) e ao pressionar Enter
        if (input) {
            input.addEventListener('input', debounce(function(e){
                // passa o valor atual para a função de busca
                ObterDadosProdutoHeader(e.target.value);
            }, 300));

            input.addEventListener('keydown', function(e){
                if (e.key === 'Enter') {
                    e.preventDefault();
                    ObterDadosProdutoHeader(e.target.value);
                }
            });
        }
    })



})


async function ObterDadosProdutoHeader(textoPesquisa = null){
    // permite passar o texto como argumento ou ler o primeiro inputHeader do DOM
    if (textoPesquisa === null){
        const el = document.getElementsByClassName("inputHeader")[0];
        textoPesquisa = el ? el.value : "";
    }
    console.log("Texto: ", textoPesquisa);

    // proteger/escapar o valor antes de enviar na query string
    const pesquisaParam = encodeURIComponent(textoPesquisa);

    const resposta = await fetch(`http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=buscarTodosProdutos&ordem=%22%22&pesquisa=${pesquisaParam}`, { 
        method: "GET",
        headers: {
            "Content-Type": "application/json"
        }
    });

    const dados = await resposta.json();
    console.log(dados);
    return dados;
}
