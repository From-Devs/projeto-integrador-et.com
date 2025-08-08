let botaoClicado = null;

function preencheValidar() {
    if (!botaoClicado) return;  
    
    const parent = botaoClicado.closest('.verticalizacao');
    const validarButton = parent.querySelector('.validarButton');
    const cancelarButton = parent.querySelector('.cancelarButton');
    cancelarButton.disabled = false

    validarButton.classList.add("marcarValido");
    cancelarButton.classList.remove("marcarCancelar");
    
    
    const popUp = document.getElementsByClassName("popUpConfirmar")[0];
    popUp.close();
    
    const linha = botaoClicado.closest("tr");
    const motivo = linha.querySelector(".motivo");
    const motivoHeader = document.querySelector(".motivo-header");
    
    if(verificaSeTemMotivo()){
        motivo.style.display = "none";
        motivoHeader.style.display = "none";
    }else{
        motivo.style.display = "table-cell";
        motivoHeader.style.display = "table-cell";
    }
    
    botaoClicado = null;
    validarButton.disabled =true
}

function preencheCancelar() {
    if (!botaoClicado) return;
    
    const textareaPopUp = document.querySelector(".textarea-popUp textarea");
    
    if (textareaPopUp.value.trim() === "") {
        textareaPopUp.style.border = "1px solid red";
    } else {
        const parent = botaoClicado.closest('.verticalizacao');
        const validarButton = parent.querySelector('.validarButton');
        const cancelarButton = parent.querySelector('.cancelarButton');
        validarButton.disabled =  false;
        
        cancelarButton.classList.add("marcarCancelar");
        validarButton.classList.remove("marcarValido");
        
        const popUp = document.getElementsByClassName("popUpCancelar")[0];
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
}


function verificaSeTemMotivo(){
    const motivo = document.getElementsByClassName("motivo")[0];

    if(motivo.style.display === "none"){
        return  false;
    }else{
        return true;
    }
}

function abrirMotivo(botao){
    const motivo = botao.closest("td").getAttribute("data-motivo");

    const popUp = document.getElementsByClassName("popUpMotivo")[0];
    const textoPopUp = popUp.querySelector(".texto-popUp");

    textoPopUp.textContent = motivo;

    abrirPopUp("popUpMotivo");
}
