let botaoClicado = null;

function preencheValidar(popUpId) {
    if (!botaoClicado) return;

    const parent = botaoClicado.closest('.verticalizacao');
    const validarButton = parent.querySelector('.validarButton');
    const cancelarButton = parent.querySelector('.cancelarButton');
    cancelarButton.disabled = false;

    validarButton.classList.add("marcarValido");
    cancelarButton.classList.remove("marcarCancelar");

    const popUp = document.getElementById(popUpId);
    if (!popUp) return;
    popUp.close();

    const linha = botaoClicado.closest("tr");
    const motivo = linha.querySelector(".motivo");
    const motivoHeader = document.querySelector(".motivo-header");

    if (verificaSeTemMotivo(linha)) {
        motivo.style.display = "none";
        motivoHeader.style.display = "none";
    } else {
        motivo.style.display = "table-cell";
        motivoHeader.style.display = "table-cell";
    }

    botaoClicado = null;
    validarButton.disabled = true;
}

function preencheCancelar(popUpId) {
    if (!botaoClicado) return;
    
    const popUp = document.getElementById(popUpId);
    if (!popUp) return;
    
    const textareaPopUp = popUp.querySelector("textarea");
    if (!textareaPopUp) return;
    
    if (textareaPopUp.value.trim() === "") {
        textareaPopUp.style.border = "1px solid red";
        return;
    }
    console.log(botaoClicado);
    console.log(textareaPopUp);
    console.log(popUp);

    const parent = botaoClicado.closest('.verticalizacao');
    const validarButton = parent.querySelector('.validarButton');
    const cancelarButton = parent.querySelector('.cancelarButton');
    validarButton.disabled = false;

    cancelarButton.classList.add("marcarCancelar");
    validarButton.classList.remove("marcarValido");

    popUp.close();

    const linha = botaoClicado.closest("tr");
    const motivo = linha.querySelector(".motivo");
    const motivoHeader = document.querySelector(".motivo-header");

    motivo.setAttribute("data-motivo", textareaPopUp.value.trim());
    motivo.style.display = "table-cell";
    motivoHeader.style.display = "table-cell";

    textareaPopUp.value = "";
    botaoClicado = null;
    cancelarButton.disabled = true;
}

function verificaSeTemMotivo(linha) {
    const motivo = linha.querySelector(".motivo");
    return motivo && motivo.style.display !== "none";
}

function abrirMotivo(botao) {
    const motivo = botao.closest("td").getAttribute("data-motivo");
    const popUp = document.querySelector(".popUpMotivo");
    if (!popUp) return;

    const textoPopUp = popUp.querySelector(".texto-popUp");
    if (!textoPopUp) return;

    textoPopUp.textContent = motivo;
    abrirPopUp("popUpMotivo");
}
