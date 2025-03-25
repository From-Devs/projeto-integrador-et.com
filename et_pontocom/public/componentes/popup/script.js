const closeButton = document.getElementsByClassName("icone-fechar")[0];


function abrirPopUp(id){
    const dialog = document.getElementsByClassName(id)[0];
    if (dialog) {
        dialog.showModal();
    }
}

document.querySelectorAll(".icone-fechar").forEach(botao => {
    botao.addEventListener("click", () => {
        const dialog = botao.closest("dialog");
        if (dialog) {
            dialog.close();
        }
    });
});