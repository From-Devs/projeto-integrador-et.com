document.addEventListener("DOMContentLoaded", () => {

    // ========================
    // === CORES DINÂMICAS ===
    // ========================
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

    // ========================
    // === POPUP DE AVALIAÇÃO ===
    // ========================
    let avaliacaoSelecionada = 0;

    function abrirPopupAvaliacao(imagemProduto, nomeProduto, marcaProduto) {
        const dialog = document.getElementById("popupAvaliarProduto");
        document.getElementById("popupAva-imagemProduto").src = imagemProduto;
        document.getElementById("popupAva-imagemProduto").alt = nomeProduto;
        document.getElementById("popupAva-nomeProduto").innerText = marcaProduto + " " + nomeProduto;
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
        if(avaliacaoSelecionada === 0) { alert("Selecione pelo menos 1 estrela."); return; }
        console.log("Avaliação enviada:", avaliacaoSelecionada, texto);
        alert("Avaliação enviada com sucesso!");
        fecharPopupAvaliacao();
    }

    function fecharPopupAvaliacao() {
        const dialog = document.getElementById("popupAvaliarProduto");
        if(dialog && dialog.open) dialog.close();
    }

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
                const dataCompra = p.querySelector(".data-compra")?.innerText || '';

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
                    <div class="card-expandido" style="height: 420px;">
                        <span class="card-titulo">DESCRIÇÃO</span>
                        <div class="card-linhasuperior"></div>
                        <img class="cardMini-imagem" src="${imagem}" height="130px">
                        <div class="card-linhainferior"></div>
                        <div class="detalhes-info" style="gap:5px;">
                            <span class="detalhes-titulo">${nome}</span>
                            <span class="detalhes-quantidade">Quantidade: ${quantidade} produtos</span>
                            <span class="detalhes-precoTotal">Subtotal: R$ ${subtotal.toFixed(2)}</span>
                        </div>
                    </div>
                `;
                popupProdutos.appendChild(miniCard);
                totalCompra += subtotal;
            });

            document.getElementById("popupMP-DataCompra").innerText = produtos[0].querySelector(".data-compra")?.innerText || '';
            document.getElementById("popupMP-Total").innerText = "Total: R$ " + totalCompra.toFixed(2);
            document.getElementById("popupMP").showModal();
        });
    });

    // Produtos finalizados
    document.querySelectorAll(".cardProduto-finalizado").forEach(card2 => {

        // Abrir popup ao clicar no card
        card2.addEventListener("click", () => {
            const popupProdutosFi = document.getElementById("popupMP-ProdutosFi");
            popupProdutosFi.innerHTML = ""; // limpar popup

            const produtos = [card2]; // array de produtos, pode ser expandido se necessário

            produtos.forEach(p => {
                const nome = p.querySelector(".nomeProdutoMP")?.innerText || '';
                const quantidade = parseInt(p.querySelector(".qtdProdutoMP")?.innerText.replace('Qtd: ','') || '1');
                const subtotal = parseFloat(p.querySelector(".subtotalProdutoMP")?.innerText.replace('Subtotal: R$ ','') || '0');
                const imagem = p.querySelector("img")?.src || '';
                const dataEntrega = p.querySelector(".data-entrega")?.innerText || '';
                const dataCompra = p.querySelector(".data-compra")?.innerText || '';
                const status = p.querySelector(".statusProdutoMP")?.innerText || 'Concluído';
                const endereco = {
                    rua: p.dataset.rua || '',
                    numero: p.dataset.numero || '',
                    bairro: p.dataset.bairro || '',
                    cidade: p.dataset.cidade || '',
                    estado: p.dataset.estado || '',
                    horarioEntrega: p.dataset.horario || ''
                };
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
                            <span class="detalhes-endereco">Foi entregue às ${endereco.horarioEntrega} no endereço <span style="font-weight: 500;">${endereco.rua} ${endereco.numero}</span>, bairro ${endereco.bairro}. ${endereco.cidade}, ${endereco.estado}.</span>
                        </div>
                        <span class="card-titulo2">DESCRIÇÃO DO PRODUTO</span>
                        <div class="card-linhasuperior"></div>
                        <img class="cardpopup-imagem" src="${imagem}">
                        <div class="card-linhainferior"></div>
                        <div class="detalhes-info" style="gap:5px;">
                            <span class="detalhes-titulo">${nome}</span>
                            <span class="detalhes-categoria">${p.dataset.categoria || ''}</span>
                            <span class="detalhes-quantidade">Quantidade: ${quantidade} produtos</span>
                            <span class="detalhes-preco">Preço Unitário: R$ ${subtotal.toFixed(2)}</span>
                            <span class="detalhes-precoTotal">Preço Total: R$ ${precoTotal2.toFixed(2)}</span>
                        </div>
                        <div class="detalhes-botoes">
                            <a class="comprarNvmtBtn" href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php">Comprar Novamente</a>
                            <button class="avaliarBtn">Avaliar</button>
                        </div>
                    </div>
                `;
                popupProdutosFi.appendChild(cardpopup);

                const btnAvaliar = cardpopup.querySelector(".avaliarBtn");
                btnAvaliar.addEventListener("click", () => {
                    abrirPopupAvaliacao(imagem, nome, p.dataset.marca || '');
                });
            });

            document.getElementById("popupMP-DataEntrega").innerText = "Data da entrega: " + (produtos[0].querySelector(".data-entrega")?.innerText || '');
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
function enviarAvaliacao() {
    const texto = document.getElementById("popupAva-textoAvaliacao").value;
  
    if (avaliacaoSelecionada === 0) {
      alert("Por favor, selecione pelo menos 1 estrela.");
      return;
    }
  
    console.log("Avaliação enviada:");
    console.log("Estrelas:", avaliacaoSelecionada);
    console.log("Texto:", texto);
  
    alert("Avaliação enviada com sucesso!");
    fecharPopupAvaliacao();
  }
  
  function fecharAvaliacao() {
    const dialog = document.getElementById("popupAvaliarProduto");
    if (dialog && dialog.open) {
      dialog.close();
    }
  }
