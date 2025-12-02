// variaveis globais
const PASTA_PROJETO = '/projeto-integrador-et.com/';
const dadosLocais = {
    carousel: {},
    lancamento: {},
    destaque: {}
};
const produtoOriginal = {
    editCarousel: null,
    editLancamento: null,
    produtoDestaque: null
};
let origemPopUp = null;
let elementoOrigem = null;

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
    return `${PASTA_PROJETO}${caminhoLimpo}`;
}

// --- Helper de Preço ---
function formatarPreco(produto) {
    const isPromo = produto.fgPromocao == 1 || produto.fgPromocao === true;
    const valor = isPromo ? produto.precoPromo : produto.preco;
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
            // REMOVIDO: A lógica de fetch para o CustomizacaoRouter.php foi removida.
            console.error(`ERRO: Dados locais para ${origemPopUp} com ID ${registroId} não encontrados. Router de busca removido por instrução.`);
            return;
        }

        preencherCamposModal(dadosItem);

    } catch (e) {
        console.error("Erro no catch de carregarDadosNoPopUp:", e);
    }
}
// ==========================================================
// 2. TROCA DE PRODUTO
// ==========================================================
async function trocarProdutoSelecionado(idNovoProduto) {
     try {
         // 🔥 CORREÇÃO 1/2: Atualiza a rota de busca de produto para o novo formato de API
         const response = await fetch(`${PASTA_PROJETO}Api/BuscarProduto?id=${idNovoProduto}`);
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
            
             // Preserva edições de cor feitas antes da troca do produto
             let dadosAtualizados = {
                 ...dadosLocais[tipoEdit][idRegistro], // Preserva corEspecial e imgSelecionada anterior
                 ...produtoNovo,
                 id_produto: idNovoProduto
             };

             if (tipoEdit === 'lancamento') {
                 // Lançamento usa corEspecial, mas o padrão é hex1 (cor do produto)
                 dadosAtualizados.corEspecial = produtoNovo.corEspecial || produtoNovo.hex1;
                
                 // Limpa props de Carousel, se vierem
                 delete dadosAtualizados.hexDegrade1;
                 delete dadosAtualizados.hexDegrade2;
                 delete dadosAtualizados.hexDegrade3;
                
             } else if (tipoEdit === 'carousel') {
                 // Cores específicas de Carousel (Degrade)
                 dadosAtualizados.corEspecial = produtoNovo.corEspecial || produtoNovo.corPrincipal; // Destaque
                 dadosAtualizados.hexDegrade1 = produtoNovo.hexDegrade1 || produtoNovo.corPrincipal;
                 dadosAtualizados.hexDegrade2 = produtoNovo.hexDegrade2 || produtoNovo.hex1;
                 dadosAtualizados.hexDegrade3 = produtoNovo.hexDegrade3 || produtoNovo.hex2;
             }

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
// 3. SALVAR ALTERAÇÕES NO BANCO (FUNÇÃO PRINCIPAL DO BOTÃO SALVAR DO CAROUSEL)
// ==========================================================
window.salvarAlteracoesCarousel = function () {
    // 1. Pega o container do PopUp e dados de origem
    const dialog = document.querySelector(".popUpEditProduto");
    if (!dialog) return console.error("PopUp não encontrado.");

    if (!elementoOrigem) { alert("Erro: elemento original perdido."); return; } 
    
    // O ID pode vir como string, "null" ou undefined. Se for edição, tem o ID. Se for novo, é null.
    const carouselId = dialog.dataset.id; 
    
    // 3. Pega os valores das cores
    const corDegrade1 = document.getElementById('corDegrade1');
    const corDegrade2 = document.getElementById('corDegrade2');
    const corDegrade3 = document.getElementById('corDegrade3');
    const corDestaque = document.querySelector("#corDestaqueCarousel .corShow"); 

    // ⚠️ ATENÇÃO: Se for NOVO item, você PRECISA de um ID de produto.
    const idProdutoNovo = document.getElementById('selectProdutoId')?.value; 

    const dataToSend = {
        // Envia o ID: se existir, o PHP faz UPDATE. Se for nulo, o PHP faz CREATE.
        id_carousel: carouselId || null, 
        
        // Cores (pegando o valor final do input de texto/hex)
        corEspecial: corDestaque ? corDestaque.value : '#000000',
        hexDegrade1: corDegrade1 ? corDegrade1.childNodes[3].value : '#000000',
        hexDegrade2: corDegrade2 ? corDegrade2.childNodes[3].value : '#000000',
        hexDegrade3: corDegrade3 ? corDegrade3.childNodes[3].value : '#000000',

        // Se for CRIAR um novo, enviamos o ID do produto selecionado
        id_produto: carouselId ? null : idProdutoNovo 
    };

    // Remove a chave id_produto se ela for nula ou for um UPDATE
    if (!dataToSend.id_produto) {
        delete dataToSend.id_produto;
    }

    // 4. Envia para a API!
    fetch('/projeto-integrador-et.com/Api/store_c', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(dataToSend),
    })
    .then(response => response.json())
    .then(data => {
        // Se deu sucesso (ou o PHP devolveu o ID do novo registro)
        if (data.success || data.id) { 
            
            // --- ATUALIZAÇÃO VISUAL (Se for UPDATE) ---
            const idRegistro = carouselId || data.id; 
            const nomeProduto = dialog.querySelector('.nomeProduto p').textContent;
            const imgElement = dialog.querySelector("#wrapperEditProdutoImg .imagemProduto");
            const novaImgSrc = imgElement.src;
            
            // 1. Atualiza a memória local
            if (!dadosLocais.carousel[idRegistro]) dadosLocais.carousel[idRegistro] = {};
            dadosLocais.carousel[idRegistro] = {
                ...dadosLocais.carousel[idRegistro], // Preserva outros dados
                nome: nomeProduto, 
                corEspecial: dataToSend.corEspecial,
                hexDegrade1: dataToSend.hexDegrade1,
                hexDegrade2: dataToSend.hexDegrade2,
                hexDegrade3: dataToSend.hexDegrade3
            };
            
            // 2. Atualiza o DOM original (somente se for um item existente, ou se você for injetar o novo)
            if(elementoOrigem) {
                elementoOrigem.style.backgroundImage = `linear-gradient(to bottom, ${dataToSend.hexDegrade1} 0%, ${dataToSend.hexDegrade2} 50%, ${dataToSend.hexDegrade3} 100%)`;
                const imgCard = elementoOrigem.querySelector("img.imagemProduto");
                if (imgCard) imgCard.src = novaImgSrc;
            }
            // --------------------------------------------------------

            alert(`Carrossel ${carouselId ? 'atualizado' : 'criado'} com sucesso, Dev! kkk`);
            
            dialog.close(); 
            // Se for criação, recarrega para ver o novo item
            if(!carouselId) {
                 location.reload(); 
            }
            
        } else {
            alert("Erro ao salvar! Olha o console, irmão.");
            console.error(data);
        }
    })
    .catch(error => {
        console.error("Erro na requisição: ", error);
        alert("Erro de conexão com o servidor! 😭");
    });
}

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
    const imagemSrcSegura = imagemSelecionadaEl ? getImgUrl(imagemSelecionadaEl.src) : "";


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
    if(imgCard) imgCard.src = imagemSrcSegura;

    // Se houver um input de preço no card original (caso tenha)
    let dadosAtuais = dadosLocais.lancamento[idRegistro];
    const precoCard = elementoOrigem.querySelector(".CardLancamentoPreco");
    if(precoCard && dadosAtuais.preco) {
        precoCard.textContent = formatarPreco(dadosAtuais);
    }

    console.log(`Lançamento salvo visualmente! Imagem escolhida: ${valorParaBanco} (URL: ${imagemSrcSegura})`);

    // fecharPopUp("popUpEditProdutoLancamento"); // Não definida no escopo, deve ser global
    document.querySelector(".popUpEditProdutoLancamento").close();
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

    // Chama a função global selecionarImagem (definida mais abaixo no bloco DOMContentLoaded)
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
    const botao = document.activeElement; 
    const textoOriginal = botao.innerText;
    
    if (botao && botao.tagName === 'BUTTON') {
        botao.innerText = "Salvando...";
        botao.disabled = true;
    }

    try {
        let payload = {};
        let caminhoApi = ""; // store_c, store_l, store_d

        if (sessao === 'carousel') {
            payload = montarPayloadCarousel();
            // Rota POST /store_c
            caminhoApi = "store_c"; 
        } else if (sessao === 'lancamento') {
            payload = montarPayloadLancamento();
            // Rota POST /store_l
            caminhoApi = "store_l";
        } else if (sessao === 'destaque') {
            payload = montarPayloadDestaque();
            // Rota POST /store_d
            caminhoApi = "store_d"; 
        } else {
            // Se o dev esquecer, melhor dar um erro na tela
            throw new Error("Sessão de salvamento inválida."); 
        }

        // 🔥 CORREÇÃO 2/2: Remove CustomizacaoRouter.php e usa a rota direta /Api/funcao
        const url = `${PASTA_PROJETO}Api/${caminhoApi}`;
        
        // Enviamos o payload puro, sem a chave 'acao' ou 'dados'
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json' 
            },
            body: JSON.stringify(payload) // PHP recebe e decodifica diretamente
        });

        const resultado = await response.json();

        if (resultado.status === 'sucesso') {
            alert(`${sessao.toUpperCase()} atualizado com sucesso!`);
            window.location.reload(); 
        } else {
            alert("Erro ao salvar: " + (resultado.msg || "Erro desconhecido."));
        }

    } catch (error) {
        console.error("Erro na requisição:", error);
        alert("Erro ao conectar com o servidor ou sessao inválida.");
    } finally {
        if (botao && botao.tagName === 'BUTTON') {
            botao.innerText = textoOriginal;
            botao.disabled = false;
        }
    }
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