function abrirMotivo(botao) {
    const motivo = botao.closest("td").getAttribute("data-motivo");
    const popUp = document.querySelector(".popUpMotivo");
    if (!popUp) return;

    const textoPopUp = popUp.querySelector(".texto-popUp");
    if (!textoPopUp) return;

    textoPopUp.textContent = motivo;
    abrirPopUp("popUpMotivo");
}

async function ValidarAssociado(idUsuario){
    const popUpSucesso = document.getElementsByClassName("popUpValidou")[0];
    const popUpConfirmar = document.getElementsByClassName(`popUpConfirmar_${idUsuario}`)[0];

    try {
        const resposta = await fetch("http://localhost/projeto-integrador-et.com/router/AssociadosRouter.php?acao=ValidarAssociado", { 
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({idUsuario: idUsuario})
        });

        const validou = await resposta.json();

        if(validou === true){
            popUpConfirmar.close()
            abrirPopUp("popUpValidou");

            popUpSucesso.addEventListener("close", function(){
                window.location.reload();
            })
        } else {
            console.error("Falha ao validar", validou);
        }
    } catch (error) {
        console.error(error);
    }
}


async function recusarAssociado(idUsuario){
    const popUpSucesso = document.getElementsByClassName("popUpRecusou")[0];
    const popUpConfirmar = document.getElementsByClassName(`popUpCancelar_${idUsuario}`)[0];
    const valorTextArea = document.querySelector(`.popUpCancelar_${idUsuario} textarea`).value;

    try {
        const resposta = await fetch("http://localhost/projeto-integrador-et.com/router/AssociadosRouter.php?acao=recusarAssociado", { 
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({idUsuario: idUsuario, motivo: valorTextArea})
        });

        const invalidou = await resposta.json();

        if(invalidou === true){
            popUpConfirmar.close()
            abrirPopUp("popUpRecusou");

            popUpSucesso.addEventListener("close", function(){
                window.location.reload();
            })
        } else {
            console.error("Falha ao validar", invalidou);
        }
    } catch (error) {
        console.error(error);
    }
}