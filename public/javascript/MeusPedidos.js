document.addEventListener("DOMContentLoaded", () => {
    
    document.querySelectorAll('.cards-produtoAndamento, .cardProduto-finalizado').forEach(card => {
        const cores =[
            ["#FAD0C4", "#FFD1FF"],  
            ["#A1C4FD", "#C2E9FB"],  
            ["#FFDEE9", "#B5FFFC"],  
            ["#FEE9B2", "#FBC2EB"],  
            ["#C9FFBF", "#FFAFBD"],  
            ["#D4FC79", "#96E6A1"],  
            ["#FBC2EB", "#A6C1EE"],  
            ["#FFD3A5", "#FD6585"],  
            ["#E0C3FC", "#8EC5FC"],  
            ["#FFF1EB", "#ACE0F9"],  
            ["#FBD3E9", "#BB377D"],  
            ["#C2FFD8", "#465EFB"],  
            ["#F6D365", "#FDA085"],  
            ["#E8CBC0", "#636FA4"],  
            ["#FEE140", "#FA709A"]
        ];

        const [hex1, hex2] = cores[Math.floor(Math.random() * cores.length)];
    
        const cardColorido = card.querySelector(".cardcoloridoCam, .cardcoloridoFin");
        if (cardColorido) {
            cardColorido.style.background = `linear-gradient(135deg, ${hex1}, ${hex2})`;
        }
    });

    // ========================
    // === POPUP DE AVALIAÇÃO ===
    // ========================
    let avaliacaoSelecionada = 0;

    function abrirPopupAvaliacao(imagemProduto, nomeProduto, marcaProduto, idProduto) {
        const dialog = document.getElementById("popupAvaliarProduto");
        const img = document.getElementById("popupAva-imagemProduto");
        img.src = imagemProduto;
        img.alt = nomeProduto;
        img.dataset.id = idProduto;
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

        if(avaliacaoSelecionada === 0) {
            alert("Selecione pelo menos 1 estrela.");
            return;
        }

        fetch("/projeto-integrador-et.com/router/ProdutoRouter.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: new URLSearchParams({
                acao: "avaliarProduto",
                id_produto: idProduto,
                nota: avaliacaoSelecionada,
                comentario: texto
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.msg);
            if(data.ok) fecharPopupAvaliacao();
        })
        .catch(err => console.error("Erro ao enviar avaliação:", err));
    }

    function fecharPopupAvaliacao() {
        const dialog = document.getElementById("popupAvaliarProduto");
        if(dialog && dialog.open) dialog.close();
    }

    window.enviarAvaliacao = enviarAvaliacao;
    window.fecharPopupAvaliacao = fecharPopupAvaliacao;

    // ========================
    // === POPUP CARDS EM ANDAMENTO ===
    // ========================
    // ========================
    // === POPUP CARDS EM ANDAMENTO (CORRIGIDO) ===
    // ========================
    document.querySelectorAll(".cards-produtoAndamento .verMais").forEach(botao => {
    botao.addEventListener("click", (e) => {
        e.stopPropagation();
        const card = botao.closest(".cards-produtoAndamento");
        if (!card) return;

        // garante que existe o dialog/popup e o container onde vamos inserir
        const popupDialog = document.getElementById("popupMP");
        const popupProdutos = document.getElementById("popupMP-Produtos");
        if (!popupDialog || !popupProdutos) {
        console.warn("popupMP ou popupMP-Produtos não encontrado no DOM");
        return;
        }

        // se já expandido, recolhe e sai
        if (card.classList.contains("expandido")) {
        card.classList.remove("expandido");
        const ex = card.querySelector(".card-expandido");
        if (ex) ex.remove();
        return;
        }

        // fecha outra expansão ativa (opcional)
        document.querySelectorAll(".cards-produtoAndamento.expandido").forEach(c => {
        c.classList.remove("expandido");
        const ex = c.querySelector(".card-expandido");
        if (ex) ex.remove();
        });

        card.classList.add("expandido");

        // PARTE IMPORTANTE: parse seguro do data-itens
        let itens = [];
        try {
        itens = JSON.parse(card.dataset.itens || "[]");
        } catch (err) {
        console.error("Erro ao fazer JSON.parse(data-itens):", err, card.dataset.itens);
        itens = [];
        }

        if (itens.length === 0) {
        // mostra mensagem leve dentro do popup (evita quebra)
        popupProdutos.innerHTML = "<div class='mensagem-vazia'>Nenhum item encontrado para este pedido.</div>";
        popupDialog.showModal();
        return;
        }

        // limpa o container antes de inserir
        popupProdutos.innerHTML = "";

        // Preenche o popup com mini-cards, um por item
        itens.forEach(item => {
        // corrige caminho da imagem: se começar com '/' usa direto, senão prefixa
        let imgSrc = item.imagem || "";
        if (imgSrc && imgSrc[0] !== "/") imgSrc = "/projeto-integrador-et.com/" + imgSrc;

        const precoTotal = Number(item.preco || 0) * Number(item.quantidade || 1);
        const miniCard = document.createElement("div");
        miniCard.className = "cardMini";
        miniCard.innerHTML = `
            <div class="card-recolhido">
            <div class="cardMini-Superior">
                <span class="cardMini-Status">${card.dataset.tipoStatus || card.dataset.tipoStatus || "Em andamento"}</span>
                <span class="cardMini-Quantidade">${item.quantidade || 1}x</span>
            </div>
            <div class="cardMini-conteudo">
                <img class="cardMini-imagem" src="${imgSrc}" height="100" onerror="this.src='/projeto-integrador-et.com/imagem-padrao.jpg'">
                <div class="cardMini-infos">
                <span class="cardMini-Titulo">${item.nome}</span>
                <div class="preco-total">
                    <span class="cardMini-PrecoTotal">R$ ${precoTotal.toFixed(2).replace('.', ',')}</span>
                </div>
                </div>
            </div>
            </div>
            <div class="card-expandido">
            <span class="card-titulo">DETALHES DO PRODUTO</span>
            <div class="detalhes-imagem">
                <img class="" src="${imgSrc}" height="100" onerror="this.src='/projeto-integrador-et.com/imagem-padrao.jpg'">
            </div>
            <div class="detalhes-info" style="gap: 10px;">
                <span class="detalhes-titulo">${item.nome} — ${item.marca || ''}</span>
                <span class="detalhes-status">Status: <span style="color: red;">${card.dataset.tipoStatus || 'Aguardando'}</span></span>
                <span class="detalhes-categoria">Categoria: ${item.categoria || 'Não definida'}</span>
                <span class="detalhes-preco" style="margin-bottom: 10px; font-size:12px; font-weight:500;">
                Preço Unitário: R$ ${Number(item.preco || 0).toFixed(2).replace('.', ',')}
                </span>
            </div>
            <div style="display: flex; justify-content: center; gap: 10px; margin-top:8px;">
                <button class="comprarNovamenteBtn" data-id="${item.id_produto}">Comprar Novamente</button>
                <button class="cancelarBtn">Cancelar</button>
            </div>
            </div>
        `;
        // actions
        miniCard.querySelector(".comprarNovamenteBtn").addEventListener("click", () => {
            const id = miniCard.querySelector(".comprarNovamenteBtn").dataset.id;
            if (id) window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${id}`;
        });

        popupProdutos.appendChild(miniCard);
        });

        // total (tenta usar data-total do card, senão soma)
        let totalPedido = parseFloat(card.dataset.total || 0);
        if (!totalPedido) {
        totalPedido = itens.reduce((acc, it) => acc + (Number(it.preco || 0) * Number(it.quantidade || 0)), 0);
        }
        document.getElementById("popupMP-Total").innerText = "Total: R$ " + totalPedido.toFixed(2).replace('.', ',');

        // mostra o dialog
        popupDialog.showModal();
    });
    });



    // ========================
    // === POPUP CARDS FINALIZADOS ===
    // ========================
    document.querySelectorAll(".cardProduto-finalizado").forEach(card2 => {
        card2.addEventListener("click", () => {
            const popupProdutosFi = document.getElementById("popupMP-ProdutosFi");
            popupProdutosFi.innerHTML = "";

            const nome = card2.dataset.nome || '';
            const quantidade = parseInt(card2.dataset.quantidade) || 1;
            const subtotal = parseFloat(card2.dataset.preco) || 0;
            const imagem = card2.querySelector("img")?.src || '';
            const dataEntrega = card2.dataset.dataEntrega || '';
            const dataCompra = card2.dataset.dataPedido || '';
            const status = card2.dataset.tipoStatus || '';
            const idProduto = card2.dataset.id || '';
            const marca = card2.dataset.marca || '';
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
                                <span class="cardpopup-PrecoTotal">R$ ${precoTotal2.toFixed(2).replace('.', ',')}</span>
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
                    <a href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${idProduto}">
                        <img class="cardpopup-imagem" src="${imagem}" >
                    </a>
                    <div class="detalhes-info" style="gap:5px;">
                        <span class="detalhes-titulo">${nome}</span>
                        <span class="detalhes-quantidade">Quantidade: ${quantidade}</span>
                        <span class="detalhes-preco">Preço Unitário: R$ ${subtotal.toFixed(2).replace('.', ',')}</span>
                        <span class="detalhes-precoTotal">Preço Total: R$ ${precoTotal2.toFixed(2).replace('.', ',')}</span>
                    </div>
                    <div class="detalhes-botoes">
                        <button class="comprarNovamenteBtn" data-id="${idProduto}">Comprar Nov.</button>
                        <button class="avaliarBtn" data-id="${idProduto}" data-nome="${nome}" data-marca="${marca}" data-imagem="${imagem}">Avaliar</button>
                        <button class="devolverBtn">Devolver</button>
                    </div>
                </div>
            `;
            popupProdutosFi.appendChild(cardpopup);

            // Comprar novamente
            cardpopup.querySelector(".comprarNovamenteBtn").addEventListener("click", (e) => {
                const id = e.currentTarget.dataset.id;
                if(id) window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${id}`;
            });

            // Avaliar
            cardpopup.querySelector(".avaliarBtn").addEventListener("click", (e) => {
                const btn = e.currentTarget;
                abrirPopupAvaliacao(
                    btn.dataset.imagem,
                    btn.dataset.nome,
                    btn.dataset.marca,
                    btn.dataset.id
                );
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

    // Redirecionamento ao clicar na imagem do produto no popup de avaliação
    document.getElementById("popupAva-imagemProduto").addEventListener("click", (e) => {
        e.preventDefault();
        const idProduto = e.currentTarget.dataset.id;
        if (idProduto) {
            window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${idProduto}`;
        }
    });

});
