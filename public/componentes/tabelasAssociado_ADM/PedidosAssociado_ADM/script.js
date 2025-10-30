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

async function atualizarStatusEntrega(selectEl, idPedido){
    const novoTipo = selectEl.value;

    const resposta = await fetch("http://localhost/projeto-integrador-et.com/router/PedidosRouter.php?acao=atualizarStatusEntrega", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({tipoStatus: novoTipo, idPedido: idPedido})
    });

    if(resposta.status == 200){
        const data = await resposta.json();
        if(data.success){
            abrirPopUpCurto("popUpStatusEntrega");
        } else {
            alert('Erro ao atualizar status de entrega');
        }
    } else {
        alert('Erro na requisição ao servidor');
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const modalAberto = localStorage.getItem('modalAberto');
    if(modalAberto){
        const modal = document.getElementById(modalAberto);
        if(modal) modal.showModal();
    }

    if(sessionStorage.getItem("abrirPopUpStatus") === "true"){
        abrirPopUpCurto("popUpStatus");
        sessionStorage.removeItem("abrirPopUpStatus");
    }
});