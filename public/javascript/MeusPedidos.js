// JS de cores (mantém cores dinâmicas nos cards)
document.querySelectorAll('.produtoMP, .cards-produtoAndamento, .cardProduto-finalizado').forEach(card => {
    const id = card.dataset.id;
    if(!id) return;
    const hash = id.toString().split('').reduce((a,b)=>a+b.charCodeAt(0),0);
    const cor = `#${(hash*123456 % 0xFFFFFF).toString(16).padStart(6,'0')}`;
    const cardColorido = card.querySelector(".cardcoloridoCam, .cardcoloridoFin");
    if (cardColorido) {
        cardColorido.style.background = `linear-gradient(135deg, ${cor}33, ${cor}aa)`;
    }
});

// === POPUP DE AVALIAÇÃO ===
function abrirPopupAvaliacao(imagemProduto, nomeProduto, marcaProduto) {
    const dialog = document.getElementById("popupAvaliarProduto");
    document.getElementById("popupAva-imagemProduto").src = imagemProduto;
    document.getElementById("popupAva-imagemProduto").alt = nomeProduto;
    document.getElementById("popupAva-nomeProduto").innerText = marcaProduto + " " + nomeProduto;
    if (!dialog.open) dialog.showModal();
}

let avaliacaoSelecionada = 0;
function atualizarEstrelas(valor) {
    const estrelas = document.querySelectorAll("#popupAvaliarProduto .estrela");
    estrelas.forEach((estrela, index) => {
        estrela.classList.toggle("selecionada", index < valor);
    });
}
document.querySelectorAll("#popupAvaliarProduto .estrela").forEach((estrela, index) => {
    estrela.addEventListener("click", () => {
        const valor = index + 1;
        avaliacaoSelecionada = (avaliacaoSelecionada === valor ? 0 : valor);
        atualizarEstrelas(avaliacaoSelecionada);
    });
});
function enviarAvaliacao() {
    const texto = document.getElementById("popupAva-textoAvaliacao").value;
    if(avaliacaoSelecionada === 0) { alert("Selecione pelo menos 1 estrela."); return; }
    console.log("Avaliação enviada:", avaliacaoSelecionada, texto);
    alert("Avaliação enviada com sucesso!");
    fecharPopupAvaliacao();
}
function fecharPopupAvaliacao() {
    const dialog = document.getElementById("popupAvaliarProduto");
    if(dialog && dialog.open) dialog.close();
}

// === POPUP DOS CARDS ===
document.querySelectorAll(".verMais, .maisInfo").forEach(botao => {
    botao.addEventListener("click", e => {
        const card = e.target.closest("[data-id]");
        if(!card) return;

        // Dados do card
        const nome = card.querySelector(".nomeProdutoMP")?.innerText || '';
        const descricao = card.querySelector(".descricaoProdutoMP")?.innerText || '';
        const quantidade = card.querySelector(".qtdProdutoMP")?.innerText.replace('Qtd: ','') || '1';
        const subtotal = card.querySelector(".subtotalProdutoMP")?.innerText.replace('Subtotal: R$ ','') || '0';
        const imagem = card.querySelector("img")?.src || '';
        const dataCompra = card.querySelector(".data-compra")?.innerText || '';

        // Define qual popup abrir
        const isFinalizado = card.classList.contains("cardProduto-finalizado");

        if(isFinalizado) {
            const popupProdutosFi = document.getElementById("popupMP-ProdutosFi");
            if(!popupProdutosFi) return;
            popupProdutosFi.innerHTML = `
                <div class="cardpopup">
                    <div class="card-recolhido">
                        <div class="cardpopup-Superior"> 
                            <span class="cardpopup-Status">Finalizado</span>
                            <span class="cardpopup-Quantidade">${quantidade}x</span>
                        </div>
                        <div class="cardpopup-conteudo">
                            <img class="cardpopup-imagem" src="${imagem}" height="100px">
                            <div class="cardpopup-infos">
                                <span class="cardpopup-Titulo">${nome}</span>
                                <span class="cardpopup-Descricao">${descricao}</span>
                                <div class="preco-total">
                                    <span class="cardpopup-PrecoTotal">R$ ${parseFloat(subtotal).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById("popupMP-DataEntrega").innerText = dataCompra;
            document.getElementById("popupMPFinalizado").showModal();
        } else {
            const popupProdutos = document.getElementById("popupMP-Produtos");
            if(!popupProdutos) return;
            popupProdutos.innerHTML = `
                <div class="cardMini">
                    <div class="card-recolhido">
                        <div class="cardMini-Superior"> 
                            <span class="cardMini-Status">Em Andamento</span>
                            <span class="cardMini-Quantidade">${quantidade}x</span>
                        </div>
                        <div class="cardMini-conteudo">
                            <img class="cardMini-imagem" src="${imagem}" height="100px">
                            <div class="cardMini-infos">
                                <span class="cardMini-Titulo">${nome}</span>
                                <span class="cardMini-Descricao">${descricao}</span>
                                <div class="preco-total">
                                    <span class="cardMini-PrecoTotal">R$ ${parseFloat(subtotal).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            document.getElementById("popupMP-DataCompra").innerText = dataCompra;
            document.getElementById("popupMP-Total").innerText = "Total: R$ " + parseFloat(subtotal).toFixed(2);
            document.getElementById("popupMP").showModal();
        }
    });
});

// === FECHAR POPUPS ===
document.querySelectorAll(".icone-fechar button").forEach(botao => {
    botao.addEventListener("click", () => {
        const dialog = botao.closest("dialog");
        if(dialog) dialog.close();
    });
});
