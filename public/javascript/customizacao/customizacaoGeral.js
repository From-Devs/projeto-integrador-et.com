

// --- Helper de Preço ---
function formatarPreco(produto) {
    // Verifica se tem promoção (fgPromocao pode vir como "1", 1, true, etc)
    const isPromo = produto.fgPromocao == 1 || produto.fgPromocao === true;
    const valor = isPromo ? produto.precoPromo : produto.preco;
    
    // Formatação simples para R$
    return `R$ ${valor}`;
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
                    url = `${PASTA_PROJETO}router/CustomizacaoRouter.php?acao=BuscarLancamento&id=${registroId}`;
                    break;
                case "editCarousel":
                    url = `${PASTA_PROJETO}router/CustomizacaoRouter.php?acao=BuscarCarousel&id=${registroId}`;
                    break;
                default:
                    url = `${PASTA_PROJETO}router/CustomizacaoRouter.php?acao=BuscarProduto&id=${registroId}`;
            }

            const response = await fetch(url);
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
        const response = await fetch(`${PASTA_PROJETO}router/CustomizacaoRouter.php?acao=BuscarProduto&id=${idNovoProduto}`);
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

// CORREÇÃO: Atualização completa do Destaque (Nome, Marca, Preço, Imagem)
function atualizarVisualDestaque(dados) {
    const nomeEditor = document.querySelector('.editProdutoDestaque .nomeProduto p');
    if (nomeEditor) nomeEditor.textContent = dados.nome;

    const imgDestaque = document.querySelector('.produtoDestaque .imagemProduto img');
    const nomeDestaque = document.querySelector('.produtoDestaque .nomeProduto');
    const marcaDestaque = document.querySelector('.produtoDestaque .marcaProduto');
    const precoDestaque = document.querySelector('.produtoDestaque .precoProduto');

    if (imgDestaque && dados.img1) imgDestaque.src = getImgUrl(dados.img1);
    if (nomeDestaque) nomeDestaque.textContent = dados.nome ? dados.nome : '';
    if (marcaDestaque) marcaDestaque.textContent = dados.marca || '';
    if (precoDestaque) precoDestaque.textContent = formatarPreco(dados);

    // 3. Inputs de Cor
    setCorInput('#produtoLancamentoEditCor1', dados.cor1);
    setCorInput('#produtoLancamentoEditCor2', dados.cor2);
    setCorInput('#produtoLancamentoEditCorSombra', dados.corSombra);
}


// ==========================================================
// 3. SALVAR
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
    let indiceSelecionado = 1; // Padrão é a segunda (índice 1)
    
    itensImagem.forEach((item, index) => {
        if (item.classList.contains("imagemSelecionada")) {
            indiceSelecionado = index;
        }
    });
    
    // O banco espera 1, 2 ou 3. O array é 0, 1 ou 2. Então somamos 1.
    const valorParaBanco = indiceSelecionado + 1; 

    const imagemSelecionadaEl = itensImagem[indiceSelecionado].querySelector("img");
    const imagemSrc = imagemSelecionadaEl ? getImgUrl(imagemSelecionadaEl.src) : "";

    // --- Atualiza Memória Local ---
    if (!dadosLocais.lancamento[idRegistro]) dadosLocais.lancamento[idRegistro] = {};
    dadosLocais.lancamento[idRegistro].nome = nome;
    dadosLocais.lancamento[idRegistro].marca = marca;
    dadosLocais.lancamento[idRegistro].corEspecial = corBrilho; 
    
    // SALVANDO O INTEIRO (1, 2 ou 3)
    dadosLocais.lancamento[idRegistro].imgSelecionada = valorParaBanco;
    
    // --- Atualiza DOM Visual ---
    const tituloCard = elementoOrigem.querySelector(".textoCardLancamento");
    if(tituloCard) {
        tituloCard.textContent = marca ? `${marca} - ${nome}` : nome;
    }

    elementoOrigem.style.setProperty("--corEspecial", corBrilho);
    const imgCard = elementoOrigem.querySelector(".imgCardLancamento");
    if(imgCard) imgCard.src = imagemSrc;

    // Se houver um input de preço no card original (caso tenha)
    let dadosAtuais = dadosLocais.lancamento[idRegistro];
    const precoCard = elementoOrigem.querySelector(".CardLancamentoPreco");
    if(precoCard && dadosAtuais.preco) {
        precoCard.textContent = formatarPreco(dadosAtuais);
    }

    console.log(`Lançamento salvo! Imagem escolhida: ${valorParaBanco} (URL: ${imagemSrc})`);

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
        case 'produtoDestaque':
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
    
    // O banco/local manda 1, 2 ou 3. Se não existir, padrão é 2.
    // O Javascript espera index 0, 1 ou 2. Então subtraímos 1.
    let imgIndex = (produto.imgSelecionada || 2) - 1; 

    // Garante que o índice esteja entre 0 e 2
    if (imgIndex < 0) imgIndex = 0;
    if (imgIndex > 2) imgIndex = 2;

    // Chama a função global criada no arquivo trocarImagemLancamento.js
    if(typeof window.selecionarImagem === 'function') {
        window.selecionarImagem(imgIndex);
    }
}


// ==========================================================
// 5. RESTAURAR PADRÃO
// ==========================================================

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
        
        if(wrapper.querySelector('#produtoLancamentoEditCor1')) 
            setCorInput('#produtoLancamentoEditCor1', padrao.cor1 || padrao.hex1);
            
        if(wrapper.querySelector('#produtoLancamentoEditCor2')) 
            setCorInput('#produtoLancamentoEditCor2', padrao.cor2 || padrao.hex2);
            
        if(wrapper.querySelector('#produtoLancamentoEditCorSombra')) 
            setCorInput('#produtoLancamentoEditCorSombra', padrao.corSombra || padrao.corPrincipal);
    } else {
        // Fallback: restaura tudo se o botão estiver fora (ex: rodapé)
        setCorInput('#produtoLancamentoEditCor1', padrao.cor1 || padrao.hex1);
        setCorInput('#produtoLancamentoEditCor2', padrao.cor2 || padrao.hex2);
        setCorInput('#produtoLancamentoEditCorSombra', padrao.corSombra || padrao.corPrincipal);
    }
}

// ==========================================================
// LOGICA DE ENVIO PARA O BANCO (UPDATE)
// ==========================================================

async function atualizarSessao(sessao) {
    const botao = document.activeElement; // Pega o botão clicado para efeito de loading
    const textoOriginal = botao.innerText;
    botao.innerText = "Salvando...";
    botao.disabled = true;

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

        // Envia para o Router PHP
        const response = await fetch(`${PASTA_PROJETO}router/CustomizacaoRouter.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json' // Importante para enviar JSON complexo
            },
            body: JSON.stringify({
                acao: acaoPHP,
                dados: payload
            })
        });

        const resultado = await response.json();

        if (resultado.status === 'sucesso') {
            alert(`${sessao.toUpperCase()} atualizado com sucesso!`);
            // Opcional: Limpar dadosLocais[sessao] pois já está salvo
            // dadosLocais[sessao] = {}; 
            window.location.reload(); // Recarrega para garantir sincronia total
        } else {
            alert("Erro ao salvar: " + resultado.msg);
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao conectar com o servidor.");
    } finally {
        botao.innerText = textoOriginal;
        botao.disabled = false;
    }
}

// --- 1. Montar dados do Carousel (Ordem + Edição) ---
function montarPayloadCarousel() {
    const listaFinal = [];
    
    // Selecionamos os containers NA ORDEM que estão na tela (pós drag & drop)
    const containers = document.querySelectorAll('.editarCarouselContainer .produtoContainer');

    containers.forEach((container, index) => {
        // Dentro do container tem o wrapper que tem o ID do Carousel
        const wrapper = container.querySelector('.imagemProdutoWrapper');
        const idCarousel = wrapper.dataset.id; 

        // Nova posição baseada na ordem da DOM (index 0 vira posicao 1)
        const novaPosicao = index + 1;

        // Verifica se houve edição local para esse card
        const edicoesLocais = dadosLocais.carousel[idCarousel] || {};

        // Monta o objeto para o PHP
        listaFinal.push({
            id_carousel: idCarousel,
            posicao: novaPosicao,
            // Se tiver id_produto na edição local usa ele, senão, não mandamos (PHP mantém o atual)
            id_produto: edicoesLocais.id_produto || null, 
            // Cores (se editadas)
            hexDegrade1: edicoesLocais.hexDegrade1 || null,
            hexDegrade2: edicoesLocais.hexDegrade2 || null,
            hexDegrade3: edicoesLocais.hexDegrade3 || null,
            corEspecial: edicoesLocais.corEspecial || null
        });
    });

    return listaFinal;
}

// --- 2. Montar dados de Lançamentos ---
function montarPayloadLancamento() {
    const cards = document.querySelectorAll('.customizacaoMain #containerLancamentos .cardLancamento');
    const listaFinal = [];

    cards.forEach(card => {
        const idLancamento = card.dataset.id; 
        
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

// --- 3. Montar dados de Destaque ---
function montarPayloadDestaque() {
    // Destaque é um item único
    // Se não houver edição local, enviamos null ou objeto vazio, mas o ideal é verificar
    if (!dadosLocais.destaque) return null;

    return {
        id_produto: dadosLocais.destaque.id_produto || null,
        cor1: dadosLocais.destaque.cor1,
        cor2: dadosLocais.destaque.cor2,
        corSombra: dadosLocais.destaque.corSombra
    };
}

// ==========================================================
// LISTENERS
// ==========================================================
document.addEventListener('DOMContentLoaded', () => {
    
    // Inicializar Destaque (Lê do DOM para ter um ponto de restauração inicial)
    const cor1Input = document.querySelector('#produtoLancamentoEditCor1 .corShow');
    const cor2Input = document.querySelector('#produtoLancamentoEditCor2 .corShow');
    const corSombraInput = document.querySelector('#produtoLancamentoEditCorSombra .corShow');
    
    dadosLocais.destaque = {
        cor1: cor1Input ? cor1Input.value : '#000000',
        cor2: cor2Input ? cor2Input.value : '#000000',
        corSombra: corSombraInput ? corSombraInput.value : '#000000',
    };
    produtoOriginal.produtoDestaque = { ...dadosLocais.destaque };

    
    // Filtro de Busca
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

    // Trocar Produto
    produtosLista.forEach(item => {
        item.addEventListener('click', async () => {
            const idNovoProduto = item.getAttribute('data-id'); 
            if (!idNovoProduto) return;

            const popupSelecao = document.querySelector('.popUpSelectProduto');
            if (popupSelecao) popupSelecao.close();

            await trocarProdutoSelecionado(idNovoProduto);
        });
    });

    // Restaurar Padrão
    const botoesRestaurar = document.querySelectorAll('.restaurarPadrao');
    botoesRestaurar.forEach(botao => {
        botao.addEventListener('click', () => {
            const popUp = botao.closest('dialog');
            
            if (popUp && popUp.classList.contains('popUpEditProduto')) {
                restaurarEditProduto(botao);
            } 
            else if (popUp && popUp.classList.contains('popUpEditProdutoLancamento')) {
                restaurarEditLancamento(botao);
            }
            else if (botao.closest('.editProdutoDestaque')) {
                restaurarProdutoDestaque(botao);
            }
        });
    });
});
