async function mudarStatus(btnId, idPedido){
    const novoStatus = btnId.id == "statusPago" ? 1 : 2;
    console.log(novoStatus)

    const resposta = await fetch("http://localhost/projeto-integrador-et.com/router/AssociadosRouter.php?acao=mudarStatus", { 
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({novoStatus: novoStatus, idPedido: idPedido})
    });

    if(resposta.status == 200){
        sessionStorage.setItem("abrirPopUpStatus", "true");
        window.location.reload();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    if(sessionStorage.getItem("abrirPopUpStatus") === "true"){
        abrirPopUpCurto("popUpStatus");
        sessionStorage.removeItem("abrirPopUpStatus");
    }
});