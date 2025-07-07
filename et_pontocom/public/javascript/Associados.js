let botaoClicado = null;

function preencheValidar() {
    if (!botaoClicado) return;  

    const parent = botaoClicado.closest('.verticalizacao');
    const validarButton = parent.querySelector('.validarButton');
    const cancelarButton = parent.querySelector('.cancelarButton');

    validarButton.classList.add("marcarValido");
    cancelarButton.classList.remove("marcarCancelar");

    botaoClicado = null;

    const popUp = document.getElementsByClassName("popUpConfirmar")[0];
    popUp.close();
}

function preencheCancelar() {
    if (!botaoClicado) return;

    const parent = botaoClicado.closest('.verticalizacao');
    const validarButton = parent.querySelector('.validarButton');
    const cancelarButton = parent.querySelector('.cancelarButton');

    cancelarButton.classList.add("marcarCancelar");
    validarButton.classList.remove("marcarValido");

    botaoClicado = null;

    const popUp = document.getElementsByClassName("popUpCancelar")[0];
    popUp.close();
}
