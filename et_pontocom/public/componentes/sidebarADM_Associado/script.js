document.addEventListener("DOMContentLoaded",function(){
    const menuBotoes = document.querySelectorAll(".nav-item");

    menuBotoes.forEach(item => {
        item.addEventListener("click",function(){
            menuBotoes.forEach(el=>el.classList.remove("active"));
            this.classList.add("active");
        });
    });
})
function fecharPopUp(className) {
    let popUp = document.querySelector(`dialog.${className}`);
    if (popUp) {
        popUp.close();
    }
} 

document.querySelectorAll(".popUpDialog").forEach(dialog => {
    dialog.addEventListener("click", (event) => {
        if (event.target === dialog) {
            dialog.close();
        }
    });
});
