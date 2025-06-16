// var validarButton = document.getElementsByClassName("validarButton")[0];
// var cancelarButton = document.getElementsByClassName("cancelarButton")[0];

// validarButton.addEventListener("click", () => {
//     console.log(validarButton);
//     validarButton.classList.add("marcarValido");
//     cancelarButton.classList.remove("marcarCancelar");
// })

// cancelarButton.addEventListener("click", () => {
//     cancelarButton.classList.add("marcarCancelar");
//     validarButton.classList.remove("marcarValido");
// })

function preencheValidar(id){
    const validarButton = document.getElementsByClassName("validarButton")[id - 1];
    const cancelarButton = document.getElementsByClassName("cancelarButton")[id - 1];

    validarButton.classList.add("marcarValido");
    cancelarButton.classList.remove("marcarCancelar");
}

function preencheCancelar(id){
    const validarButton = document.getElementsByClassName("validarButton")[id - 1];
    const cancelarButton = document.getElementsByClassName("cancelarButton")[id - 1];

    console.log(validarButton)

    cancelarButton.classList.add("marcarCancelar");
    validarButton.classList.remove("marcarValido");
}