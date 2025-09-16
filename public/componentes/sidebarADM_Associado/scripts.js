//______________Parte de deixar colorida o botão do sidebar ao clicar________________
window.addEventListener("pageshow", function() {
    const menuBotoes = document.querySelectorAll(".nav-item");
    const path = location.pathname.split('/').pop(); // pega o arquivo atual

    menuBotoes.forEach(item => {
        const link = item.querySelector("a");
        if (!link) return;
        const hrefFile = link.getAttribute("href").split("/").pop();

        if (hrefFile === path) {
            item.classList.add("active");
        } else {
            item.classList.remove("active");
        }

        // Mantém clique para troca de ativo
        item.addEventListener("click", function() {
            menuBotoes.forEach(el => el.classList.remove("active"));
            this.classList.add("active");
        });
    });
});


// ____________________Parte de PopUp e botão______________________________
document.addEventListener("DOMContentLoaded", function(){
    document.addEventListener("click", function(event){
        if (event.target.matches(".btn-white")){
            const botao = event.target;
            const popUp = botao.closest("dialog");
            if (popUp){
                popUp.close();
            }
        }
    })
})


document.querySelectorAll(".popUpDialog").forEach(dialog => {
    dialog.addEventListener("click", (event) => {
        if (event.target === dialog) {
            dialog.close();
        }
    });
});


// ____________________Abrir e fechar o Sidebar no Mobile______________________________
document.addEventListener("DOMContentLoaded", function(){
    const toggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar_adm');
    const conta = document.querySelector(".componenteConta");

    if (toggle && sidebar) {
        toggle.addEventListener('click', function() {
            console.log('Botão clicado'); // <- Adicione isso!
            sidebar.classList.toggle('active');
            conta.classList.toggle('hide');
        });
    } else {
        console.error('Botão ou sidebar não encontrados.');
    }
});


//___________________________Fechar a sidebar mobile ao clicar fora______________________
document.addEventListener('click', function(e) {
    const sidebar = document.querySelector('.sidebar_adm');
    const toggle = document.querySelector('.menu-toggle');
    const conta = document.querySelector(".componenteConta");

    if (!sidebar.contains(e.target) && !toggle.contains(e.target)) {
        sidebar.classList.remove('active');
        conta.classList.remove('hide');
    }
});
