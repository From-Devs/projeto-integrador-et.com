// Função para percorrer o DOM e enviar a nova ordem para a API
function salvarNovaOrdem() {
    // 1. Coleta os IDs na ordem atual
    // Pega o 'data-id' de todos os wrappers na ordem em que estão no HTML
    const idsEmOrdem = Array.from(
        document.querySelectorAll(".editarCarouselContainer .imagemProdutoWrapper")
    ).map(item => item.getAttribute("data-id"));

    // 2. Manda pro backend (você criará a rota /reorder_c no PHP)
    fetch('/projeto-integrador-et.com/Api/reorder_c', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ newOrder: idsEmOrdem }), // Envia o array de IDs
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log("Ordem salva no DB! Posições atualizadas.");
        } else {
            console.error("Bug de save da ordem: ", data);
            alert("Erro ao salvar a nova ordem no servidor!");
        }
    })
    .catch(error => {
        console.error("Erro na requisição de reorder: ", error);
        alert("Erro de conexão ao salvar a ordem! 😭");
    });
}

// Modifique a função dragDrop para chamar a função de salvar
function dragDrop() {
    this.className = "produtoContainer";
    selected.style.opacity = "1";
    if (doesExist) {
        parentOfFill.append(swapElement);
    }
    this.append(selected);
    
    // 🔥 NOVO: SALVA A NOVA ORDEM!
    salvarNovaOrdem(); 
}