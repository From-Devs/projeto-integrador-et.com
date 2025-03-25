document.addEventListener("DOMContentLoaded",function(){
    const menuBotoes = document.querySelectorAll(".nav-item");

    menuBotoes.forEach(item => {
        item.addEventListener("click",function(){
            menuBotoes.forEach(el=>el.classList.remove("active"));
            this.classList.add("active");
        });
    });
})