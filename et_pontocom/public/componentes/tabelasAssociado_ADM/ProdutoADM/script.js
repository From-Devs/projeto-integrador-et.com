const popUpSalvar = document.getElementsByClassName("popUpSalvar")[0];
const popUpEditar = document.getElementsByClassName("dialog-editar")[0];    
popUpSalvar.addEventListener("close", () => {
    popUpEditar.close();
})