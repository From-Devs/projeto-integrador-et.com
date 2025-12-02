// ==========================================================
// CONFIGURAÇÕES GLOBAIS & ESTADO LOCAL
// ==========================================================

const dadosLocais = {
    carousel: {},   
    lancamento: {}, 
    destaque: null
};

const produtoOriginal = {
    editCarousel: null,
    editLancamento: null,
    produtoDestaque: null
};

let origemPopUp = null; 
let elementoOrigem = null; 

// Variáveis Drag & Drop
let dragSelected = null;
let dragParentOfFill = null;
let dragDoesExist = false;
let dragSwapElement = null;

// --- Helper de Imagem ---
function getImgUrl(caminho) {
    if (!caminho) return "";
    if (caminho.startsWith("data:") || caminho.startsWith("http")) return caminho;

    let caminhoLimpo = caminho;
    if (caminho.includes("public/")) {
        caminhoLimpo = caminho.substring(caminho.indexOf("public/"));
    } else if (caminho.includes("uploads/")) {
         caminhoLimpo = "public/" + caminho.substring(caminho.indexOf("uploads/"));
    }

    if (caminhoLimpo.startsWith("/")) {
        caminhoLimpo = caminhoLimpo.substring(1);
    }
    return `/projeto-integrador-et.com/${caminhoLimpo}`;
}

// --- Helper de Input de Cor ---
function setCorInput(seletorContainer, valor) {
    const elShow = document.querySelector(`${seletorContainer} .corShow`);
    const elHex = document.querySelector(`${seletorContainer} .corHex`);
    const corFinal = valor || "#000000";

    if(elShow) {
        elShow.value = corFinal;
        if(elHex) elHex.value = corFinal;
        elShow.dispatchEvent(new Event("input", { bubbles: true }));
    }
}

// --- Helper de Preço ---
function formatarPreco(produto) {
    const isPromo = produto.fgPromocao == 1 || produto.fgPromocao === true;
    const valor = isPromo ? produto.precoPromo : produto.preco;
    return `R$ ${valor}`;
}

// ==========================================================
// 1. ABRIR POPUP (CARREGAMENTO)
// ==========================================================
window.abrirPopUp = function (nomePopUp, origem = null, registroId = null, event = null) {
    const dialog = document.querySelector(`.${nomePopUp}`);
    if (!dialog) return;

    origemPopUp = origem;

    if (registroId) {
        dialog.dataset.id = registroId;
    }

    if (event) {
        elementoOrigem = event.currentTarget.closest(".imagemProdutoWrapper, .cardLancamento, .lancamentoCustom");
    }

    if (registroId) {
        carregarDadosNoPopUp(registroId);
    } 

    dialog.showModal();
}

window.closeModalDialog = function (nomePopUp) {
    const dialog = document.querySelector(`.${nomePopUp}`);
    if (!dialog) return;

    // --- RESET DOS DADOS NÃO SALVOS ---
    if (origemPopUp === 'editCarousel' && elementoOrigem) {
        const id = elementoOrigem.dataset.id;
        // Restaura os dados do produto original antes de fechar
        if (produtoOriginal.editCarousel && produtoOriginal.editCarousel[id]) {
            dadosLocais.carousel[id] = { ...produtoOriginal.editCarousel[id] };
        }
    } else if (origemPopUp === 'editLancamento' && elementoOrigem) {
        const id = elementoOrigem.dataset.id;
        // Restaura os dados do produto original antes de fechar
        if (produtoOriginal.editLancamento && produtoOriginal.editLancamento[id]) {
            dadosLocais.lancamento[id] = { ...produtoOriginal.editLancamento[id] };
        }
    }
    // O Destaque não precisa de reset aqui se ele for salvo diretamente sem PopUp de edição.

    // Reseta as variáveis de controle
    origemPopUp = null;
    elementoOrigem = null;
    
    dialog.close();
}

async function carregarDadosNoPopUp(registroId) {
    try {
        let dadosItem = null;

        if (origemPopUp === 'editCarousel' && dadosLocais.carousel[registroId]) {
            dadosItem = dadosLocais.carousel[registroId];
        } 
        else if (origemPopUp === 'editLancamento' && dadosLocais.lancamento[registroId]) {
            dadosItem = dadosLocais.lancamento[registroId];
        }
        else {
            let url = "";
            switch (origemPopUp) {
                case "editLancamento":
                    url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarLancamento&id=${registroId}`;
                    break;
                case "editCarousel":
                    url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarCarousel&id=${registroId}`;
                    break;
                default:
                    url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarProduto&id=${registroId}`;
            }

            const response = await fetch(url);
            
            // Verificação de erro HTTP
            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }

            const data = await response.json();

            if (!data || data.error) {
                console.error("Erro dados:", data?.error);
                return;
            }

            dadosItem = Array.isArray(data) ? data[0] : data;

            if (origemPopUp === 'editCarousel') dadosLocais.carousel[registroId] = dadosItem;
            if (origemPopUp === 'editLancamento') dadosLocais.lancamento[registroId] = dadosItem;
        }

        preencherCamposModal(dadosItem);

    } catch (e) {
        console.error("Erro catch carregar:", e);
    }
}

// ==========================================================
// 2. TROCA DE PRODUTO
// ==========================================================
async function trocarProdutoSelecionado(idNovoProduto) {
    try {
        const response = await fetch(`/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarProduto&id=${idNovoProduto}`);
        const data = await response.json();
        const produtoNovo = Array.isArray(data) ? data[0] : data;

        if (produtoNovo.error) return;

        // --- CASO 1: DESTAQUE ---
        if (origemPopUp === 'produtoDestaque') {
            if (!dadosLocais.destaque) dadosLocais.destaque = {};
            
            dadosLocais.destaque = {
                ...dadosLocais.destaque,
                ...produtoNovo,
                id_produto: idNovoProduto,
                cor1: produtoNovo.hex1,
                cor2: produtoNovo.hex2,
                corSombra: produtoNovo.corPrincipal
            };
            
            produtoOriginal.produtoDestaque = { ...dadosLocais.destaque };
            atualizarVisualDestaque(dadosLocais.destaque);
            return;
        }

        // --- CASO 2: MODAIS ---
        let modalEdit;
        let tipoEdit;
        
        if(origemPopUp === 'editCarousel') {
            modalEdit = document.querySelector('.popUpEditProduto');
            tipoEdit = 'carousel';
        } else if (origemPopUp === 'editLancamento') {
            modalEdit = document.querySelector('.popUpEditProdutoLancamento');
            tipoEdit = 'lancamento';
        }

        if (modalEdit) {
            const idRegistro = modalEdit.dataset.id;
            
            const dadosAtualizados = {
                ...dadosLocais[tipoEdit][idRegistro],
                ...produtoNovo, 
                corEspecial: produtoNovo.corEspecial || produtoNovo.corPrincipal, 
                hexDegrade1: produtoNovo.hexDegrade1 || produtoNovo.corPrincipal,
                hexDegrade2: produtoNovo.hexDegrade2 || produtoNovo.hex1,
                hexDegrade3: produtoNovo.hexDegrade3 || produtoNovo.hex2,
                id_produto: idNovoProduto
            };

            dadosLocais[tipoEdit][idRegistro] = dadosAtualizados;
            preencherCamposModal(dadosAtualizados);
        }

    } catch (err) {
        console.error('Erro troca produto:', err);
    }
}

function atualizarVisualDestaque(dados) {
    const nomeEditor = document.querySelector('.editProdutoDestaque .nomeProduto p');
    if (nomeEditor) nomeEditor.textContent = dados.nome;

    const imgDestaque = document.querySelector('.produtoDestaque .imagemProduto img');
    const nomeDestaque = document.querySelector('.produtoDestaque .nomeProduto');
    const marcaDestaque = document.querySelector('.produtoDestaque .marcaProduto');
    const precoDestaque = document.querySelector('.produtoDestaque .precoProduto');

    if (imgDestaque && dados.img1) imgDestaque.src = getImgUrl(dados.img1);
    if (nomeDestaque) nomeDestaque.textContent = dados.nome ? dados.nome.toUpperCase() : '';
    if (marcaDestaque) marcaDestaque.textContent = dados.marca || '';
    if (precoDestaque) precoDestaque.textContent = formatarPreco(dados);

    setCorInput('#produtoLancamentoEditCor1', dados.cor1);
    setCorInput('#produtoLancamentoEditCor2', dados.cor2);
    setCorInput('#produtoLancamentoEditCorSombra', dados.corSombra);
}

// ==========================================================
// 3. SALVAR (VISUAL + LOCAL)
// ==========================================================
window.salvarAlteracoesCarousel = function () {
    if (!elementoOrigem) { alert("Erro: elemento original perdido."); return; }

    const popUp = document.querySelector(".popUpEditProduto");
    const idRegistro = popUp.dataset.id;

    const imgElement = popUp.querySelector(".imagemProduto");
    const novaImgSrc = getImgUrl(imgElement.src);
    const nomeProduto = popUp.querySelector('.nomeProduto p').textContent; 
    
    const corDestaque = document.querySelector("#corDestaqueCarousel .corShow").value;
    const cor1 = document.querySelector("#corDegrade1 .corShow").value;
    const cor2 = document.querySelector("#corDegrade2 .corShow").value;
    const cor3 = document.querySelector("#corDegrade3 .corShow").value;

    if (!dadosLocais.carousel[idRegistro]) dadosLocais.carousel[idRegistro] = {};
    
    dadosLocais.carousel[idRegistro].nome = nomeProduto;
    dadosLocais.carousel[idRegistro].corEspecial = corDestaque;
    dadosLocais.carousel[idRegistro].hexDegrade1 = cor1;
    dadosLocais.carousel[idRegistro].hexDegrade2 = cor2;
    dadosLocais.carousel[idRegistro].hexDegrade3 = cor3;
    
    elementoOrigem.style.backgroundImage = `linear-gradient(to bottom, ${cor1} 0%, ${cor2} 50%, ${cor3} 100%)`;
    const imgCard = elementoOrigem.querySelector("img.imagemProduto");
    if (imgCard) imgCard.src = novaImgSrc; 
    const payloadItem = {
        id_carousel: idRegistro,
        // A posição será definida na função montarPayloadCarousel
        // id_produto: (dadosLocais.carousel[idRegistro].id_produto || null), // Não está definido aqui
        hexDegrade1: cor1,
        hexDegrade2: cor2,
        hexDegrade3: cor3,
        corEspecial: corDestaque
    };
    
    console.log(`\n--- Payload Local do Item Carrossel (ID: ${idRegistro}) ---`);
    console.log(payloadItem);
    console.log("------------------------------------------------------------------\n");
    
    fecharPopUp("popUpEditProduto");
    elementoOrigem = null;
};

window.salvarAlteracoesLancamento = function () {
    if (!elementoOrigem) { alert("Erro: card original perdido."); return; }

    const popUp = document.querySelector(".popUpEditProdutoLancamento");
    const idRegistro = popUp.dataset.id;
    
    const nomeElemento = popUp.querySelector(".switchProduto .nomeProduto p");
    const nome = nomeElemento.textContent.trim();
    const marca = nomeElemento.dataset.marca || ""; 

    const corBrilho = document.querySelector("#corBrilhoLancamento .corShow").value;
    
    const itensImagem = popUp.querySelectorAll(".imagemItem");
    let indiceSelecionado = 1; 
    
    itensImagem.forEach((item, index) => {
        if (item.classList.contains("imagemSelecionada")) {
            indiceSelecionado = index;
        }
    });
    
    const valorParaBanco = indiceSelecionado + 1; 

    const imagemSelecionadaEl = itensImagem[indiceSelecionado].querySelector("img");
    const imagemSrc = imagemSelecionadaEl ? getImgUrl(imagemSelecionadaEl.src) : "";

    if (!dadosLocais.lancamento[idRegistro]) dadosLocais.lancamento[idRegistro] = {};
    dadosLocais.lancamento[idRegistro].nome = nome;
    dadosLocais.lancamento[idRegistro].marca = marca;
    dadosLocais.lancamento[idRegistro].corEspecial = corBrilho; 
    dadosLocais.lancamento[idRegistro].imgSelecionada = valorParaBanco;
    
    const tituloCard = elementoOrigem.querySelector(".textoCardLancamento");
    if(tituloCard) {
        tituloCard.textContent = marca ? `${marca} - ${nome}` : nome;
    }

    elementoOrigem.style.setProperty("--corEspecial", corBrilho);
    const imgCard = elementoOrigem.querySelector(".imgCardLancamento");
    if(imgCard) imgCard.src = imagemSrc;

    let dadosAtuais = dadosLocais.lancamento[idRegistro];
    const precoCard = elementoOrigem.querySelector(".CardLancamentoPreco");
    if(precoCard && dadosAtuais.preco) {
        precoCard.textContent = formatarPreco(dadosAtuais);
    }

    const payloadItem = {
        id_lancamento: idRegistro,
        id_produto: (dadosAtuais.id_produto || null), 
        imgSelecionada: valorParaBanco,
        corEspecial: corBrilho
    };
    
    console.log(`\n--- Payload Local do Item Lançamento (ID: ${idRegistro}) ---`);
    console.log(payloadItem);
    console.log("------------------------------------------------------------------\n");

    fecharPopUp("popUpEditProdutoLancamento");
    elementoOrigem = null;
};

// ==========================================================
// 4. PREENCHIMENTO DO MODAL
// ==========================================================
function preencherCamposModal(dados) {
    if (!origemPopUp || !dados) return;

    produtoOriginal[origemPopUp] = { ...dados }; 

    switch (origemPopUp) {
        case 'editCarousel':
            preencherPopUpEditProduto(dados);
            break;
        case 'editLancamento':
            preencherPopUpEditLancamento(dados);
            break;
    }
}

function preencherPopUpEditProduto(produto) {
    const nomeEl = document.querySelector('.popUpEditProduto .nomeProduto p');
    const imgEl = document.querySelector('#wrapperEditProdutoImg .imagemProduto');
    
    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (imgEl && produto.img1) imgEl.src = getImgUrl(produto.img1);

    setCorInput('#corDestaqueCarousel', produto.corEspecial || produto.corPrincipal);
    setCorInput('#corDegrade1', produto.hexDegrade1 || produto.corPrincipal);
    setCorInput('#corDegrade2', produto.hexDegrade2 || produto.hex1);
    setCorInput('#corDegrade3', produto.hexDegrade3 || produto.hex2);
}

function preencherPopUpEditLancamento(produto) {
    const nomeEl = document.querySelector('.popUpEditProdutoLancamento .nomeProduto p');
    
    const setImg = (id, src) => {
        const el = document.querySelector(`.popUpEditProdutoLancamento .imagemItem #${id}`);
        if(el){
            if (src){
                el.parentNode.classList.remove("imagemVazia");
                el.src = getImgUrl(src);
            } else {
                el.parentNode.classList.add("imagemVazia");
                el.src = "";
            }
        }
    }

    setImg('img1ProdutoLancamento', produto.img1);
    setImg('img2ProdutoLancamento', produto.img2);
    setImg('img3ProdutoLancamento', produto.img3);

    if (nomeEl) {
        nomeEl.textContent = produto.nome || '';
        nomeEl.dataset.marca = produto.marca || ''; 
    }
    
    setCorInput('#corBrilhoLancamento', produto.corEspecial || produto.hex1);

    const cardPreview = document.querySelectorAll('.popUpEditProdutoLancamento .cardLancamento')[1];
    if(cardPreview){
        const titulo = cardPreview.querySelector('.textoCardLancamento');
        const preco = cardPreview.querySelector('.CardLancamentoPreco');

        if (titulo) titulo.textContent = `${produto.marca || ''} - ${produto.nome || ''}`;
        if (preco) preco.textContent = formatarPreco(produto);
    }
    
    let imgIndex = (produto.imgSelecionada || 2) - 1; 
    if (imgIndex < 0) imgIndex = 0;
    if (imgIndex > 2) imgIndex = 2;

    if(typeof window.selecionarImagem === 'function') {
        window.selecionarImagem(imgIndex);
    }
}

function restaurarEditProduto(botao) {
    const padrao = produtoOriginal.editCarousel;
    if (!padrao) return;

    if (botao.closest('.mainColorEdit')) {
        setCorInput('#corDestaqueCarousel', padrao.corEspecial || padrao.corPrincipal);
    }

    if (botao.closest('.degradeEdit')) {
        setCorInput('#corDegrade1', padrao.hexDegrade1 || padrao.corPrincipal);
        setCorInput('#corDegrade2', padrao.hexDegrade2 || padrao.hex1);
        setCorInput('#corDegrade3', padrao.hexDegrade3 || padrao.hex2);
    }
}

function restaurarEditLancamento(botao) {
    const padrao = produtoOriginal.editLancamento;
    if (!padrao) return;

    if (botao.closest('.brilhoColorEdit')) {
        setCorInput('#corBrilhoLancamento', padrao.corEspecial || padrao.hex1);
    }
}

function restaurarProdutoDestaque(botao) {
    const padrao = produtoOriginal.produtoDestaque;
    if (!padrao) return;
    
    if (botao.closest('.corWrapper')) {
        const wrapper = botao.closest('.corWrapper');
        if(wrapper.querySelector('#produtoLancamentoEditCor1')) setCorInput('#produtoLancamentoEditCor1', padrao.cor1 || padrao.hex1);
        if(wrapper.querySelector('#produtoLancamentoEditCor2')) setCorInput('#produtoLancamentoEditCor2', padrao.cor2 || padrao.hex2);
        if(wrapper.querySelector('#produtoLancamentoEditCorSombra')) setCorInput('#produtoLancamentoEditCorSombra', padrao.corSombra || padrao.corPrincipal);
    } else {
        setCorInput('#produtoLancamentoEditCor1', padrao.cor1 || padrao.hex1);
        setCorInput('#produtoLancamentoEditCor2', padrao.cor2 || padrao.hex2);
        setCorInput('#produtoLancamentoEditCorSombra', padrao.corSombra || padrao.corPrincipal);
    }
}

// ==========================================================
// ENVIO PARA O BANCO (UPDATE)
// ==========================================================

async function atualizarSessao(sessao) {
    // Evita erro se o clique não vier de um botão (ex: enter)
    const botao = document.activeElement && document.activeElement.tagName === "BUTTON" ? document.activeElement : null;
    let textoOriginal = "";
    
    if(botao) {
        textoOriginal = botao.innerText;
        botao.innerText = "Salvando...";
        botao.disabled = true;
    }

    try {
        let payload = {};
        let acaoPHP = "";

        if (sessao === 'carousel') {
            payload = montarPayloadCarousel();
            acaoPHP = "SalvarCarousel";
        } 
        else if (sessao === 'lancamento') {
            payload = montarPayloadLancamento();
            acaoPHP = "SalvarLancamento";
        } 
        else if (sessao === 'destaque') {
            payload = montarPayloadDestaque();
            acaoPHP = "SalvarDestaque";
        }

        console.log(`Enviando ${sessao}...`, payload);

        const response = await fetch(`/projeto-integrador-et.com/router/CustomizacaoRouter.php`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ acao: acaoPHP, dados: payload })
        });

        // Tenta ler o JSON e captura erro se não for JSON válido
        const textResponse = await response.text(); 
        let resultado;
        try {
            resultado = JSON.parse(textResponse);
        } catch (e) {
            throw new Error("Resposta do servidor inválida (não é JSON): " + textResponse);
        }

        if (resultado.status === 'sucesso') {
            alert(`${sessao.toUpperCase()} atualizado com sucesso!`);
            window.location.reload(); 
        } else {
            // Tratamento do 'undefined': Garantir que msg exista
            const msgErro = resultado.msg || "Erro desconhecido no servidor.";
            alert("Erro ao salvar: " + msgErro);
        }

    } catch (error) {
        console.error("Erro crítico:", error);
        alert("Erro ao conectar: " + error.message);
    } finally {
        if(botao) {
            botao.innerText = textoOriginal;
            botao.disabled = false;
        }
    }
}

// --- 1. Montar Carousel (A ORDEM DO DOM DEFINE A POSIÇÃO) ---
function montarPayloadCarousel() {
    const listaFinal = [];
    // Pega os containers na ordem visual atual (pós drag-and-drop)
    const containers = document.querySelectorAll('.editarCarouselContainer .produtoContainer');

    containers.forEach((container, index) => {
        const wrapper = container.querySelector('.imagemProdutoWrapper');
        if (!wrapper) return;

        const idCarousel = wrapper.dataset.id; 
        const novaPosicao = index + 1; // 1, 2, 3...

        const edicoesLocais = dadosLocais.carousel[idCarousel] || {};

        listaFinal.push({
            id_carousel: idCarousel,
            posicao: novaPosicao,
            id_produto: edicoesLocais.id_produto || null, 
            hexDegrade1: edicoesLocais.hexDegrade1 || null,
            hexDegrade2: edicoesLocais.hexDegrade2 || null,
            hexDegrade3: edicoesLocais.hexDegrade3 || null,
            corEspecial: edicoesLocais.corEspecial || null
        });
    });
    return listaFinal;
}

// --- 2. Montar Lançamentos ---
function montarPayloadLancamento() {
    const cards = document.querySelectorAll('.customizacaoMain #containerLancamentos .cardLancamento'); // Seletor ajustado?
    // Verifique se no seu HTML do lançamento tem a classe .cardLancamento
    // e se o wrapper pai ou ele mesmo tem data-id
    
    // Se o seu HTML no Customizacao.php usa uma div pai, ajuste aqui:
    // No PHP você deve ter algo como: <div class="cardLancamento" data-id="...">
    
    const listaFinal = [];

    cards.forEach(card => {
        // Tenta pegar o ID do dataset. Se não achar no card, tenta no pai.
        let idLancamento = card.dataset.id;
        
        // Se o createCardProdutoLancamento não poe o ID na div raiz, precisamos ver onde ele está.
        // Assumindo que você ajustou o PHP para colocar data-id na div .cardLancamento
        
        if(idLancamento) {
            const edicoes = dadosLocais.lancamento[idLancamento] || {};
            listaFinal.push({
                id_lancamento: idLancamento,
                id_produto: edicoes.id_produto || null,
                imgSelecionada: edicoes.imgSelecionada || null,
                corEspecial: edicoes.corEspecial || null
            });
        }
    });
    return listaFinal;
}

// --- 3. Montar Destaque ---
function montarPayloadDestaque() {
    if (!dadosLocais.destaque) return null;
    return {
        id_produto: dadosLocais.destaque.id_produto || null,
        cor1: dadosLocais.destaque.cor1,
        cor2: dadosLocais.destaque.cor2,
        corSombra: dadosLocais.destaque.corSombra
    };
}

// ==========================================================
// LISTENERS & DRAG AND DROP
// ==========================================================
document.addEventListener('DOMContentLoaded', () => {
    
    // Inicializar Destaque
    const cor1Input = document.querySelector('#produtoLancamentoEditCor1 .corShow');
    const cor2Input = document.querySelector('#produtoLancamentoEditCor2 .corShow');
    const corSombraInput = document.querySelector('#produtoLancamentoEditCorSombra .corShow');
    const destaqueWrapper = document.querySelector('.produtoDestaque');
    const idProdutoDestaque = destaqueWrapper 
        ? destaqueWrapper.getAttribute('data-id') 
        : null;
    
    dadosLocais.destaque = {
        id_produto: idProdutoDestaque,
        cor1: cor1Input ? cor1Input.value : '#000000',
        cor2: cor2Input ? cor2Input.value : '#000000',
        corSombra: corSombraInput ? corSombraInput.value : '#000000',
    };
    produtoOriginal.produtoDestaque = { ...dadosLocais.destaque };

    const input = document.querySelector(".popUpSelectProduto .inputProduto");
    const produtosLista = document.querySelectorAll('.popUpSelectProduto .itemLista');
    if(input){
        input.addEventListener("input", () => {
            const termo = input.value.toLowerCase().trim();
            produtosLista.forEach(item => {
                const nome = item.textContent.toLowerCase();
                item.style.display = nome.includes(termo) ? "block" : "none";
            });
        });
    }

    produtosLista.forEach(item => {
        item.addEventListener('click', async () => {
            const idNovoProduto = item.getAttribute('data-id'); 
            if (!idNovoProduto) return;
            const popupSelecao = document.querySelector('.popUpSelectProduto');
            if (popupSelecao) popupSelecao.close();
            await trocarProdutoSelecionado(idNovoProduto);
        });
    });

    const botoesRestaurar = document.querySelectorAll('.restaurarPadrao');
    botoesRestaurar.forEach(botao => {
        botao.addEventListener('click', () => {
            const popUp = botao.closest('dialog');
            if (popUp && popUp.classList.contains('popUpEditProduto')) restaurarEditProduto(botao);
            else if (popUp && popUp.classList.contains('popUpEditProdutoLancamento')) restaurarEditLancamento(botao);
            else if (botao.closest('.editProdutoDestaque')) restaurarProdutoDestaque(botao);
        });
    });

    // --- LÓGICA DRAG & DROP ---
    const imagens = document.querySelectorAll(".imagemProdutoWrapper");
    const containers = document.querySelectorAll(".produtoContainer");

    function dragStart(e) {
        dragSelected = this;
        e.dataTransfer.setDragImage(dragSelected, 129, 129);
        dragParentOfFill = dragSelected.parentNode;
        this.className += " hold";
        setTimeout(() => { if(dragSelected) dragSelected.style.opacity = "0.6"; }, 0);
    }

    function dragOver(e) {
        e.preventDefault();
        if (!this.className.includes("hovered")) this.className += " hovered";
    }

    function dragEnter(e) {
        e.preventDefault();
        if (this.querySelector(".imagemProdutoWrapper") !== null) {
            dragDoesExist = true;
            const elements = this.querySelectorAll(".imagemProdutoWrapper");
            dragSwapElement = elements[0];
        } else {
            dragDoesExist = false;
        }
    }

    function dragLeave() { this.className = "produtoContainer"; }

    function dragDrop() {
        this.className = "produtoContainer";
        if(dragSelected) dragSelected.style.opacity = "1";
        if (dragDoesExist && dragParentOfFill && dragSwapElement) {
            dragParentOfFill.append(dragSwapElement);
        }
        this.append(dragSelected);
    }

    function dragEnd() {
        this.className = "imagemProdutoWrapper";
        if (dragSelected && dragSelected.style.opacity === "0.6") dragSelected.style.opacity = "1";
    }

    imagens.forEach(element => {
        element.addEventListener("dragstart", dragStart);
        element.addEventListener("dragend", dragEnd);
    });

    containers.forEach(element => {
        element.addEventListener("dragover", dragOver);
        element.addEventListener("dragenter", dragEnter);
        element.addEventListener("dragleave", dragLeave);
        element.addEventListener("drop", dragDrop);
    });
});