async function mudarStatus(btnId, idPedido){
    const novoStatus = btnId.id == "statusPago" ? 1 : 2;

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

async function abrirPopUpDetalhes(idPedido) {
    console.log("Entrou abrir");
    // const resposta = await fetch(`http://localhost/projeto-integrador-et.com/router/PedidosRouter.php?acao=BuscarProdutosDoPedido&idPedido=${idPedido}`, { 
    //     method: "GET",
    //     headers: {
    //         "Content-Type": "application/json"
    //     }
    // });

    // const dados = await resposta.json();
    // console.log(dados);
}