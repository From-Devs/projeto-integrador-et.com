// === Variável Global Necessária (Coloque no topo do seu JS) ===
const PASTA_PROJETO = "/projeto-integrador-et.com/";


// === botaoEditarLancamentos.js (ou customizacaoGeral.js) ===
// Parte 1 — abrir popup e preencher com dados do item clicado - CAROUSEL
document.addEventListener("DOMContentLoaded", () => {
    initCarouselEditHandlers();
});

function initCarouselEditHandlers() {
    const wrappers = document.querySelectorAll(".imagemProdutoWrapper");
    wrappers.forEach(w => {
        // remove event handlers duplicados caso o script seja recarregado
        w.removeEventListener("click", wrapperClickHandler);
        w.addEventListener("click", wrapperClickHandler);
    });
}

function wrapperClickHandler(event) {
    const wrapper = event.currentTarget;
    const id = wrapper.dataset.id ?? wrapper.getAttribute("data-id");

    if (!id) return console.warn("carousel item sem data-id");

    // Extrai imagem interna (se existir)
    const imgEl = wrapper.querySelector("img.imagemProduto");
    const imgSrc = imgEl ? imgEl.getAttribute("src") : "";

    // Extrai o background-gradient e tenta capturar 3 cores
    const bg = wrapper.style.backgroundImage || window.getComputedStyle(wrapper).backgroundImage || "";
    const colors = parseGradientColors(bg);

    // Preenche popup
    const dialog = document.querySelector(".popUpEditProduto");
    if (!dialog) {
        console.error("Dialog .popUpEditProduto não encontrado");
        return;
    }

    // Guarda id para salvar depois
    dialog.dataset.carouselId = id;

    // imagem de preview no popup
    const wrapperPreview = document.getElementById("wrapperEditProdutoImg");
    if (wrapperPreview) {
        let previewImg = wrapperPreview.querySelector("img.imagemProduto");
        if (!previewImg) {
            previewImg = document.createElement("img");
            previewImg.className = "imagemProduto";
            wrapperPreview.appendChild(previewImg);
        }
        previewImg.src = imgSrc || "/projeto-integrador-et.com/public/imagens/produto/hinode.png";
    }

    // Cores: corDestaqueCarousel
    const corDestaqueEl = document.querySelector("#corDestaqueCarousel");
    if (corDestaqueEl) {
        const colorInput = corDestaqueEl.querySelector('input[type="color"]');
        const hexInput = corDestaqueEl.querySelector('.corHex');
        if (colorInput) colorInput.value = colors[0] || "#651629";
        if (hexInput) hexInput.value = colors[0] || "#651629";
    }

    // Degrade 1..3
    const degradeIds = ["#corDegrade1", "#corDegrade2", "#corDegrade3"];
    degradeIds.forEach((sel, idx) => {
        const el = document.querySelector(sel);
        if (!el) return;
        const colorInput = el.querySelector('input[type="color"]');
        const hexInput = el.querySelector('.corHex');
        const c = colors[idx] || ["#7a3241", "#39121d", "#150106"][idx];
        if (colorInput) colorInput.value = c;
        if (hexInput) hexInput.value = c;
    });

    // Abre o dialog (usa API nativa de dialog se disponível)
    try {
        if (typeof dialog.showModal === "function") {
            dialog.showModal();
        } else {
            dialog.style.display = "block";
            dialog.classList.add("open");
        }
    } catch (e) {
        // fallback: toggla classe
        dialog.style.display = "block";
        dialog.classList.add("open");
    }
}

// Parse simples de `linear-gradient(...)` retornando array de hexes (até 3)
function parseGradientColors(bgString) {
    if (!bgString) return [];
    // ex: linear-gradient(to bottom, #aaa 0%, #bbb 50%, #ccc 100%)
    const hexMatches = Array.from(bgString.matchAll(/#([0-9a-fA-F]{3,6})/g)).map(m => "#" + m[1]);
    return hexMatches.slice(0, 3);
}

// Parte 2 — salvar alterações do carousel
async function salvarAlteracoesCarousel() {
    const dialog = document.querySelector(".popUpEditProduto");
    if (!dialog) return alert("Popup não encontrado.");

    const id = dialog.dataset.carouselId;
    if (!id) return alert("ID do carousel não especificado.");

    // pega imagem selecionada no popup
    const wrapperPreview = document.getElementById("wrapperEditProdutoImg");
    let imgPath = "";
    if (wrapperPreview) {
        const img = wrapperPreview.querySelector("img.imagemProduto");
        if (img && img.src) {
            imgPath = img.getAttribute("src");
            // opcional: normalizar para caminho relativo se necessário
            try {
                const url = new URL(imgPath, window.location.href);
                imgPath = url.pathname.replace(/^\//, ""); // tira slash inicial
            } catch(e) {
                // keep as-is
            }
        }
    }

    // pega cores
    const corDestaqueEl = document.querySelector("#corDestaqueCarousel");
    const corDestaqueColor = corDestaqueEl ? (corDestaqueEl.querySelector('input[type="color"]')?.value || "") : "";
    const corDeg1 = document.querySelector("#corDegrade1")?.querySelector('input[type="color"]')?.value || "";
    const corDeg2 = document.querySelector("#corDegrade2")?.querySelector('input[type="color"]')?.value || "";
    const corDeg3 = document.querySelector("#corDegrade3")?.querySelector('input[type="color"]')?.value || "";

    // prepare payload conforme seu custom.class espera: id_carousel + dados
    const payload = {
        id_carousel: parseInt(id),
        img1: imgPath,
        corEspecial: corDestaqueColor,
        hexDegrade1: corDeg1,
        hexDegrade2: corDeg2,
        hexDegrade3: corDeg3
    };

    try {
        const res = await fetch(`${PASTA_PROJETO}Api/store_c`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
        });

        const json = await res.json();

        if (!res.ok) {
            console.error("Erro API:", json);
            alert("Erro ao salvar (ver console).");
            return;
        }

        // Sucesso — atualiza DOM do item com o novo valor
        updateCarouselDOMItem(id, imgPath, [corDeg1, corDeg2, corDeg3]);

        // fecha dialog
        closePopupDialog(".popUpEditProduto");

        // feedback
        alert("Alterações salvas com sucesso!");
    } catch (err) {
        console.error(err);
        alert("Erro ao conectar com a API.");
    }
}

function updateCarouselDOMItem(id, imgPath, colors) {
    const wrapper = document.querySelector(`.imagemProdutoWrapper[data-id="${id}"], .imagemProdutoWrapper[data-id='${id}']`);
    if (!wrapper) return;

    // atualiza imagem interna
    const img = wrapper.querySelector("img.imagemProduto");
    if (img && imgPath) {
        // se imgPath for relativo, coloca o /projeto-integrador-et.com/ antes se necessário
        let finalSrc = imgPath;
        if (!finalSrc.startsWith("http") && !finalSrc.startsWith("/")) finalSrc = "/" + finalSrc;
        img.src = finalSrc;
    }

    // atualiza background de degradê se colors passadas
    if (colors && colors.length >= 3) {
        wrapper.style.backgroundImage = `linear-gradient(to bottom, ${colors[0]} 0%, ${colors[1]} 50%, ${colors[2]} 100%)`;
    }
}

function closePopupDialog(selector) {
    const dialog = document.querySelector(selector);
    if (!dialog) return;
    try {
        if (typeof dialog.close === "function") dialog.close();
        dialog.style.display = "none";
        dialog.classList.remove("open");
    } catch (e) {
        dialog.style.display = "none";
        dialog.classList.remove("open");
    }
}

// LIGA O BOTÃO DE SALVAR DO CAROUSEL MANUALMENTE
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.querySelector(".popUpEditProduto .btn-black");
    if (btn) {
        btn.removeEventListener("click", salvarAlteracoesCarousel);
        btn.addEventListener("click", salvarAlteracoesCarousel);
    }
});

// ==========================================================
// 🔥 NOVO: LÓGICA DE EDIÇÃO DO LANÇAMENTO (Busca e Preenchimento)
// ==========================================================

// Função global para abrir e buscar dados (chamada pelo listener do botão "Editar")
function abrirPopUp(popUpId, acao, lancamentoId, event) {
    if (event) event.stopPropagation();

    const popUp = document.getElementById(popUpId);
    if (!popUp) {
        console.error("PopUp de ID " + popUpId + " não encontrado.");
        return;
    }
    // Abre o PopUp
    popUp.style.display = 'block';

    // Se a ação for de edição de Lançamento, faz o FETCH
    if (acao === 'editLancamento' && lancamentoId) {
        // Usa a rota /Api/get_lancamento_by_id que criamos no PHP
        const urlApi = `${PASTA_PROJETO}Api/get_lancamento_by_id?id=${lancamentoId}`;
        
        fetch(urlApi)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar dados do lançamento: ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                if (data && data.id_lancamento) {
                    // Chama a função para preencher os inputs do modal
                    preencherModalLancamento(data);
                } else {
                    console.error("Lançamento não encontrado ou dados inválidos.", data);
                    alert("Lançamento não encontrado ou dados inválidos. Verifique o console.");
                }
            })
            .catch(error => {
                console.error("Erro no fetch de lançamento:", error);
                alert("Erro ao buscar dados do lançamento. Verifique o console.");
            });
    }
}


// Auxiliar: Preenche os inputs do Modal de Lançamento
function preencherModalLancamento(lancamentoData) {
    const modal = document.querySelector('.popUpEditProdutoLancamento');

    // 1. Guarda o ID do Lançamento para a próxima requisição de UPDATE
    modal.dataset.lancamentoId = lancamentoData.id_lancamento;
    
    // 2. Preenche o ID do Produto (Input oculto ou de seleção)
    document.getElementById('idProdutoLancamento').value = lancamentoData.id_produto;

    // 3. Atualiza textos de preview (Nome e Marca)
    const nomeProduto = modal.querySelector('.pop-up-body h3');
    const marcaProduto = modal.querySelector('.pop-up-body h4');
    if (nomeProduto) nomeProduto.textContent = lancamentoData.nome;
    if (marcaProduto) marcaProduto.textContent = lancamentoData.marca;


    // 4. Preenche as cores (Cor Especial e Degrades)
    // OBS: Assumimos os IDs: #corEspecialLancamento, #corDegrade1Lancamento, etc.
    document.querySelector('#corEspecialLancamento input[type="color"]').value = lancamentoData.corEspecial || '#000000';
    document.querySelector('#corDegrade1Lancamento input[type="color"]').value = lancamentoData.hexDegrade1 || '#000000';
    document.querySelector('#corDegrade2Lancamento input[type="color"]').value = lancamentoData.hexDegrade2 || '#000000';
    document.querySelector('#corDegrade3Lancamento input[type="color"]').value = lancamentoData.hexDegrade3 || '#000000';
    
    // 5. Preenche as imagens de preview e marca a imagem selecionada
    if (window.selecionarImagem) { // Função definida em trocarImagemLancamento.js
        // Preenche os src das imagens no modal
        document.getElementById('img1ProdutoLancamento').src = lancamentoData.img1;
        document.getElementById('img2ProdutoLancamento').src = lancamentoData.img2;
        document.getElementById('img3ProdutoLancamento').src = lancamentoData.img3;

        // Calcula qual é o índice da imagem marcada como 'Selecionada' no banco (ex: 'img2' -> 1)
        const imgIndex = parseInt(lancamentoData.imgSelecionada.replace('img', '')) - 1; 
        
        // Chama a função global para atualizar o card de preview e os botões "Selecionar"
        window.selecionarImagem(imgIndex);
    }
}

// ==========================================================
// 💾 NOVO: LÓGICA DE EDIÇÃO DO LANÇAMENTO (Salvar/UPDATE)
// ==========================================================
async function salvarAlteracoesLancamento() {
    const dialog = document.querySelector(".popUpEditProdutoLancamento");
    if (!dialog) return alert("Popup de Lançamento não encontrado.");

    const id = dialog.dataset.lancamentoId;
    if (!id) return alert("ID do lançamento não especificado. Não é possível salvar.");

    // 1. Pega ID do Produto (pode ter sido trocado no modal)
    const idProduto = document.getElementById('idProdutoLancamento')?.value;
    if (!idProduto) return alert("ID do produto é obrigatório.");

    // 2. Pega Cores
    const corEspecial = document.querySelector("#corEspecialLancamento input[type='color']")?.value || "";
    const hexDegrade1 = document.querySelector("#corDegrade1Lancamento input[type='color']")?.value || "";
    const hexDegrade2 = document.querySelector("#corDegrade2Lancamento input[type='color']")?.value || "";
    const hexDegrade3 = document.querySelector("#corDegrade3Lancamento input[type='color']")?.value || "";

    // 3. Pega Imagem Selecionada (nome da coluna: img1, img2 ou img3)
    let imgSelecionada = "";
    // O elemento com a classe 'imagemSelecionada' está dentro do .popUpEditProdutoLancamento
    const imagemItems = dialog.querySelectorAll('.imagemItem'); 
    for (let i = 0; i < imagemItems.length; i++) {
        if (imagemItems[i].classList.contains('imagemSelecionada')) {
            // Index 0 -> img1, 1 -> img2, 2 -> img3
            imgSelecionada = `img${i + 1}`;
            break;
        }
    }
    if (!imgSelecionada) return alert("Selecione uma imagem principal.");
    
    // Payload para o Controller
    const payload = {
        id_lancamento: parseInt(id), // ID do Lançamento (para forçar o UPDATE no Controller)
        id_produto: parseInt(idProduto),
        corEspecial: corEspecial,
        hexDegrade1: hexDegrade1,
        hexDegrade2: hexDegrade2,
        hexDegrade3: hexDegrade3,
        imgSelecionada: imgSelecionada
    };
    
    // 4. Envia para a API de store_l
    try {
        const res = await fetch(`${PASTA_PROJETO}Api/store_l`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload)
        });

        const json = await res.json();

        if (!res.ok || json.success === false) {
            console.error("Erro API Lançamento:", json);
            alert("Erro ao salvar lançamento. Verifique o console.");
            return;
        }
        
        // Sucesso
        closePopupDialog(".popUpEditProdutoLancamento");

        // O ideal seria recarregar o DOM do card do lançamento aqui, mas por enquanto, só o feedback.
        alert("Lançamento atualizado com sucesso!");

        // ⚠️ Opcional: Recarrega a página para ver a mudança no card (se não tiver update DOM)
        // window.location.reload(); 

    } catch (err) {
        console.error(err);
        alert("Erro ao conectar com a API de Lançamento.");
    }
}


// === CORREÇÃO CRÍTICA: LIGA O BOTÃO DE EDITAR DO LANÇAMENTO (seu código) ===
document.addEventListener("DOMContentLoaded", function(){

    const cardProdutos = document.querySelectorAll('.lancamentoCustom');
    
    cardProdutos.forEach(function(card){
        const overlayHover = document.createElement('div');
        overlayHover.classList.add("overlayHover")

        const botaoOverlay = document.createElement('button')
        botaoOverlay.className = "btn btn-white botaoOverlay";
        botaoOverlay.innerHTML = "Editar";

        botaoOverlay.addEventListener("click", function(event){
            // Usamos data-id primeiro, depois 'lancamento-id'
            const lancamentoId = card.dataset.id || card.getAttribute('lancamento-id');
            // Chama a função global para abrir o pop-up de Lançamento
            abrirPopUp('popUpEditProdutoLancamento', 'editLancamento', lancamentoId, event)
        })

        overlayHover.appendChild(botaoOverlay);
        card.append(overlayHover);
        
        card.addEventListener("mouseenter", function(){
            overlayHover.style.opacity = "1";
        })
        card.addEventListener("mouseleave", function(){
            overlayHover.style.opacity = "0";
        })
    })
    
});

// ==========================================================
// 💾 NOVO: LIGA O BOTÃO DE SALVAR DO LANÇAMENTO MANUALMENTE
// ==========================================================
document.addEventListener("DOMContentLoaded", () => {
    // OBS: O seletor '.btn-black' deve ser o do modal de Lançamento
    const btn = document.querySelector(".popUpEditProdutoLancamento .btn-black");
    if (btn) {
        btn.removeEventListener("click", salvarAlteracoesLancamento);
        btn.addEventListener("click", salvarAlteracoesLancamento);
    }
});