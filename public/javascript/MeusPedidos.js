document.addEventListener("DOMContentLoaded", () => {

    // ========================
    // === CORES DINÂMICAS ===
    // ========================
    document.querySelectorAll('.cards-produtoAndamento, .cardProduto-finalizado').forEach(card => {
        const hex1 = card.dataset.hex1 || '#cccccc'; // fallback
        const hex2 = card.dataset.hex2 || '#999999';
    
        const cardColorido = card.querySelector(".cardcoloridoCam, .cardcoloridoFin");
        if (cardColorido) {
            cardColorido.style.background = `linear-gradient(135deg, ${hex1}, ${hex2})`;
        }
    });
    
    // ========================
    // === POPUP DE AVALIAÇÃO ===
    // ========================
    let avaliacaoSelecionada = 0;
    let produtoAvaliado = null;

    function abrirPopupAvaliacao(imagemProduto, nomeProduto, marcaProduto, idProduto) {
        const dialog = document.getElementById("popupAvaliarProduto");
        document.getElementById("popupAva-imagemProduto").src = imagemProduto;
        document.getElementById("popupAva-imagemProduto").alt = nomeProduto;
        document.getElementById("popupAva-imagemProduto").dataset.id = idProduto; // guardar id produto
        document.getElementById("popupAva-nomeProduto").innerText = marcaProduto + " " + nomeProduto;
        avaliacaoSelecionada = 0;
        atualizarEstrelas(0);
        if (!dialog.open) dialog.showModal();
    }

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
        const idProduto = document.getElementById("popupAva-imagemProduto").dataset.id;
        const idUsuario = document.body.dataset.usuario; // precisa vir do PHP no <body>

        if(avaliacaoSelecionada === 0) {
            alert("Selecione pelo menos 1 estrela.");
            return;
        }

        fetch("/projeto-integrador-et.com/config/produtoRouter.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: new URLSearchParams({
                acao: "avaliarProduto",
                id_usuario: idUsuario,
                id_produto: idProduto,
                nota: avaliacaoSelecionada,
                comentario: texto
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.msg);
            if(data.success) fecharPopupAvaliacao();
        })
        .catch(err => console.error("Erro ao enviar avaliação:", err));
    }

    function fecharPopupAvaliacao() {
        const dialog = document.getElementById("popupAvaliarProduto");
        if(dialog && dialog.open) dialog.close();
    }

    // Expor funções para os botões
    window.enviarAvaliacao = enviarAvaliacao;
    window.fecharPopupAvaliacao = fecharPopupAvaliacao;

    // ========================
    // === POPUP DOS CARDS ===
    // ========================

    // Produtos em andamento
    document.querySelectorAll(".cards-produtoAndamento").forEach(card => {
        card.addEventListener("click", () => {
            const popupProdutos = document.getElementById("popupMP-Produtos");
            popupProdutos.innerHTML = "";
            const produtos = [card];
            let totalCompra = 0;

            produtos.forEach(p => {
                const nome = p.querySelector(".nomeProdutoMP")?.innerText || '';
                const quantidade = parseInt(p.querySelector(".qtdProdutoMP")?.innerText.replace('Qtd: ','') || '1');
                const subtotal = parseFloat(p.querySelector(".subtotalProdutoMP")?.innerText.replace('Subtotal: R$ ','') || '0');
                const imagem = p.querySelector("img")?.src || '';

                const miniCard = document.createElement("div");
                miniCard.classList.add("cardMini");
                miniCard.innerHTML = `
                    <div class="card-recolhido">
                        <div class="cardMini-Superior">
                            <span class="cardMini-Status">Em Andamento</span>
                            <span class="cardMini-Quantidade">${quantidade}x</span>
                        </div>
                        <div class="cardMini-conteudo">
                            <img class="cardMini-imagem" src="${imagem}" height="100px">
                            <div class="cardMini-infos">
                                <span class="cardMini-Titulo">${nome}</span>
                                <div class="preco-total">
                                    <span class="cardMini-PrecoTotal">R$ ${subtotal.toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                popupProdutos.appendChild(miniCard);
                totalCompra += subtotal;
            });

            document.getElementById("popupMP-Total").innerText = "Total: R$ " + totalCompra.toFixed(2);
            document.getElementById("popupMP").showModal();
        });
    });

    // Produtos finalizados
    document.querySelectorAll(".cardProduto-finalizado").forEach(card2 => {
        card2.addEventListener("click", () => {
            const popupProdutosFi = document.getElementById("popupMP-ProdutosFi");
            popupProdutosFi.innerHTML = "";

            const produtos = [card2];

            produtos.forEach(p => {
                const nome = p.querySelector(".nomeProdutoMP")?.innerText || '';
                const quantidade = parseInt(p.querySelector(".qtdProdutoMP")?.innerText.replace('Qtd: ','') || '1');
                const subtotal = parseFloat(p.querySelector(".subtotalProdutoMP")?.innerText.replace('Subtotal: R$ ','') || '0');
                const imagem = p.querySelector("img")?.src || '';
                const dataEntrega = p.querySelector(".data-entrega")?.innerText || '';
                const dataCompra = p.querySelector(".data-compra")?.innerText || '';
                const status = p.querySelector(".statusProdutoMP")?.innerText || 'Concluído';
                const idProduto = p.dataset.id || '';
                const marca = p.dataset.marca || '';

                const precoTotal2 = subtotal * quantidade;

                const cardpopup = document.createElement("div");
                cardpopup.classList.add("cardpopup");
                cardpopup.innerHTML = `
                    <div class="card-recolhido">
                        <div class="cardpopup-Superior">
                            <span class="cardpopup-Status">${status}</span>
                            <span class="cardpopup-Quantidade">${quantidade}x</span>
                        </div>
                        <div class="cardpopup-conteudo">
                            <img class="cardpopup-imagem" src="${imagem}">
                            <div class="cardpopup-infos">
                                <span class="cardpopup-Titulo">${nome}</span>
                                <div class="preco-total">
                                    <span class="cardpopup-PrecoTotal">R$ ${parseFloat(precoTotal2).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-expandido">
                        <span class="card-titulo">DETALHES DO PEDIDO</span>
                        <div class="detalhes-envio" style="gap:5px;">
                            <span class="detalhes-status">Status: <span style="color: green;">${status}</span></span>
                            <span class="detalhes-dataCompra">Data de Compra: <span style="font-weight: 500;">${dataCompra}</span></span>
                            <span class="detalhes-dataEntrega">Data de Entrega: <span style="font-weight: 500;">${dataEntrega}</span></span>
                        </div>
                        <span class="card-titulo2">DESCRIÇÃO DO PRODUTO</span>
                        <img class="cardpopup-imagem" src="${imagem}">
                        <div class="detalhes-info" style="gap:5px;">
                            <span class="detalhes-titulo">${nome}</span>
                            <span class="detalhes-quantidade">Quantidade: ${quantidade} produtos</span>
                            <span class="detalhes-preco">Preço Unitário: R$ ${subtotal.toFixed(2)}</span>
                            <span class="detalhes-precoTotal">Preço Total: R$ ${precoTotal2.toFixed(2)}</span>
                        </div>
                        <div class="detalhes-botoes">
                            <a class="comprarNvmtBtn" href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php">Comprar Novamente</a>
                            <button class="avaliarBtn">Avaliar</button>
                            <button class="devolverBtn">Avaliar</button>
                        </div>
                    </div>
                `;
                popupProdutosFi.appendChild(cardpopup);

                const btnAvaliar = cardpopup.querySelector(".avaliarBtn");
                btnAvaliar.addEventListener("click", () => {
                    abrirPopupAvaliacao(imagem, nome, marca, idProduto);
                });
            });

            document.getElementById("popupMPFinalizado").showModal();
        });
    });

    // ====================
    // === FECHAR POPUPS ===
    // ====================
    document.querySelectorAll(".icone-fechar button").forEach(botao => {
        botao.addEventListener("click", () => {
            const dialog = botao.closest("dialog");
            if(dialog) dialog.close();
        });
    });
    

});
document.getElementById("popupAva-imagemProduto").addEventListener("click", () => {
    const idProduto = document.getElementById("popupAva-imagemProduto").dataset.id;
    if (idProduto) {
        window.location.href = "/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=" + idProduto;
    }
});
document.getElementById("popupAva-imagemProduto").addEventListener("click", (e) => {
    e.preventDefault(); // previne qualquer ação padrão
    const idProduto = e.currentTarget.dataset.id;
    if (idProduto) {
        window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${idProduto}`;
    }
});