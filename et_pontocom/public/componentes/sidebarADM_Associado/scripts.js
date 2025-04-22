//______________Parte de deixar colorida o botão do sidebar ao clicar________________
document.addEventListener("DOMContentLoaded",function(){
    const menuBotoes = document.querySelectorAll(".nav-item");

    menuBotoes.forEach(item => {
        item.addEventListener("click",function(){
            menuBotoes.forEach(el=>el.classList.remove("active"));
            this.classList.add("active");
        });
    });
})


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
