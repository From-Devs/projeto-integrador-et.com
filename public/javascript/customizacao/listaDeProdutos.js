// Variável global para armazenar a origem do pop-up
let origemPopUp = null;

const produtoOriginal = {
    editCarousel: null,
    editLancamento: null,
    produtoDestaque: null
};

// Função para abrir o pop-up e registrar origem
function abrirPopUp(nomePopUp, origem = null, produtoId = null) {
    const dialog = document.querySelector(`.${nomePopUp}`);
    if (!dialog) return;

    origemPopUp = origem; // exemplo: "editLancamento", "editProduto", "produtoDestaque"

    if (produtoId) {
        carregarProdutoNoPopUp(produtoId);
    }

    dialog.showModal();
}

async function carregarProdutoNoPopUp(produtoId) {
    try {

        let url = "";

        // Escolhe a rota conforme a origem
        switch (origemPopUp) {
            case "editLancamento":
                url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarLancamento&id=${produtoId}`;
                break;

            case "editCarousel":
                url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarCarousel&id=${produtoId}`;
                break;

            default: // editProduto ou padrão
                url = `/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarProduto&id=${produtoId}`;
        }

        const response = await fetch(url);
        const data = await response.json();

        console.log(data)

        if (!data || data.error) {
            console.error("Erro ao puxar dados:", data?.error);
            return;
        }

        // produto/lancamento/carousel normalmente retorna array
        const item = Array.isArray(data) ? data[0] : data;
        atualizarOrigemComProduto(item);

    } catch (e) {
        console.error("Erro ao carregar dados:", e);
    }
}

function salvarOriginalCarousel() {
    produtoOriginal.editCarousel = {
        corEspecial: document.querySelector('#corDestaqueCarousel .corShow')?.value || null,
        hexDegrade1: document.querySelector('#corDegrade1 .corShow')?.value || null,
        hexDegrade2: document.querySelector('#corDegrade2 .corShow')?.value || null,
        hexDegrade3: document.querySelector('#corDegrade3 .corShow')?.value || null
    };
}

function salvarOriginalLancamento() {
    produtoOriginal.editLancamento = {
        hex1: document.querySelector('#corBrilhoLancamento .corShow')?.value || null
    };
}

function salvarOriginalDestaque() {
    produtoOriginal.produtoDestaque = {
        hex1: document.querySelector('#produtoLancamentoEditCor1 .corShow')?.value || null,
        hex2: document.querySelector('#produtoLancamentoEditCor2 .corShow')?.value || null,
        corPrincipal: document.querySelector('#produtoLancamentoEditCorSombra .corShow')?.value || null
    };
}

// Escuta os cliques nos itens da lista de produtos
document.addEventListener('DOMContentLoaded', () => {
    salvarOriginalDestaque();

    const input = document.querySelector(".popUpSelectProduto .inputProduto");
    const produtos = document.querySelectorAll('.popUpSelectProduto .itemLista');
    const botoesRestaurar = document.querySelectorAll('.restaurarPadrao');

    input.addEventListener("input", () => {
        const termo = input.value.toLowerCase().trim();

        produtos.forEach(item => {
            const nome = item.textContent.toLowerCase();
            item.style.display = nome.includes(termo) ? "block" : "none";
        });
    });

    produtos.forEach(item => {
        item.addEventListener('click', async () => {
            const produtoId = item.getAttribute('data-id');
            if (!produtoId) return;

            try {
                const response = await fetch(`/projeto-integrador-et.com/router/CustomizacaoRouter.php?acao=BuscarProduto&id=${produtoId}`);
                const produto = await response.json();

                if (produto.error) {
                    console.error(produto.error);
                    return;
                }

                // Fecha o pop-up
                const popup = document.querySelector('.popUpSelectProduto');
                if (popup) popup.close();
                console.log(produto[0])
                console.log(origemPopUp)

                // Atualiza conforme a origem
                atualizarOrigemComProduto(produto[0]);
            } catch (err) {
                console.error('Erro ao buscar produto:', err);
            }
        });
    });

    botoesRestaurar.forEach(botao => {
        botao.addEventListener('click', () => {
            const popUp = botao.closest('dialog');
            console.log(produtoOriginal)

            if (popUp && popUp.classList.contains('popUpEditProduto')) {
                restaurarEditProduto(botao);
            } 
            else if (popUp && popUp.classList.contains('popUpEditProdutoLancamento')) {
                restaurarEditLancamento();
            } 
            else if (botao.closest('.editProdutoDestaque')) {
                restaurarProdutoDestaque(botao);
            }
        });
    });
});

// Atualiza os dados no contexto de origem
function atualizarOrigemComProduto(produto) {
    if (!origemPopUp || !produto) return;

    produtoOriginal[origemPopUp] = produto;

    switch (origemPopUp) {
        case 'editCarousel':
            preencherPopUpEditProduto(produto);
            break;
            
        case 'editLancamento':
            preencherPopUpEditLancamento(produto);
            selecionarImagem(1);
            break;

        case 'produtoDestaque':
            preencherProdutoDestaque(produto);
            break;
    }

    origemPopUp = null; // limpa a origem após o uso
}

// Funções específicas para cada origem

function preencherPopUpEditProduto(produto) {
    const nomeEl = document.querySelector('.popUpEditProduto .nomeProduto p');
    const imgEl = document.querySelector('#wrapperEditProdutoImg .imagemProduto');
    const corDestaque = document.querySelector('.editProdutoContainer #corDestaqueCarousel .corShow');
    const cor1 = document.querySelector('.editProdutoContainer #corDegrade1 .corShow');
    const cor2 = document.querySelector('.editProdutoContainer #corDegrade2 .corShow');
    const cor3 = document.querySelector('.editProdutoContainer #corDegrade3 .corShow');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (imgEl && produto.img1) imgEl.src = `/projeto-integrador-et.com/${produto.img1}`;

    if (corDestaque && produto.corEspecial || produto.corPrincipal){
        corDestaque.value = produto.corEspecial || produto.corPrincipal
        corDestaque.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor1 && produto.hexDegrade1 || produto.corPrincipal){
        cor1.value = produto.hexDegrade1 || produto.corPrincipal;
        cor1.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor2 && produto.hexDegrade2 || produto.hex1){
        cor2.value = produto.hexDegrade2 || produto.hex1
        cor2.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor3 && produto.hexDegrade3 || produto.hex2){
        cor3.value = produto.hexDegrade3 || produto.hex2
        cor3.dispatchEvent(new Event("input", { bubbles: true }));
    };

    salvarOriginalCarousel();
}

function preencherPopUpEditLancamento(produto) {
    const nomeEl = document.querySelector('.popUpEditProdutoLancamento .nomeProduto p');
    const corEl = document.querySelector('#corBrilhoLancamento .corShow');
    const cardProdutoLancamento = document.querySelectorAll('.popUpEditProdutoLancamento .cardLancamento')[1];
    const textoProdutoLancamento = cardProdutoLancamento.querySelector('.textoCardLancamento');
    const precoProdutoLancamento = cardProdutoLancamento.querySelector('.CardLancamentoPreco');
    const imgEl = document.querySelector('.popUpEditProdutoLancamento .imagemItemSelecionada img');
    const imgSeletor1 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img1ProdutoLancamento');
    const imgSeletor2 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img2ProdutoLancamento');
    const imgSeletor3 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img3ProdutoLancamento');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (textoProdutoLancamento) textoProdutoLancamento.textContent = `${produto.marca} - ${produto.nome}` || '';
    if (precoProdutoLancamento) precoProdutoLancamento.textContent = produto.fgPromocao ? `R$ ${produto.precoPromo}` : `R$ ${produto.preco}`;
    if (corEl){
        corEl.value = produto.corEspecial || produto.hex1 || '#ffffff'
        corEl.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (imgSeletor1){
        if (produto.img1){
            if(imgSeletor1.parentNode.classList.contains("imagemVazia")){
                imgSeletor1.parentNode.classList.remove("imagemVazia");
            }
            imgSeletor1.src = `/projeto-integrador-et.com/${produto.img1}`;
        }else{
            imgSeletor1.parentNode.classList.add("imagemVazia")
        }
    }  
    if (imgSeletor2){
        if (produto.img2){
            if(imgSeletor2.parentNode.classList.contains("imagemVazia")){
                imgSeletor2.parentNode.classList.remove("imagemVazia");
            }
            imgSeletor2.src = `/projeto-integrador-et.com/${produto.img2}`;
        }else{
            imgSeletor2.parentNode.classList.add("imagemVazia")
        }
    }  
    if (imgSeletor3){
        if (produto.img3){
            if(imgSeletor3.parentNode.classList.contains("imagemVazia")){
                imgSeletor3.parentNode.classList.remove("imagemVazia");
            }
            imgSeletor3.src = `/projeto-integrador-et.com/${produto.img3}`;
        }else{
            imgSeletor3.parentNode.classList.add("imagemVazia")
        }
    }

    salvarOriginalLancamento();
}

function preencherProdutoDestaque(produto) {
    const nomeEl = document.querySelector('.editProdutoDestaque .nomeProduto p');
    const imgEl = document.querySelector('.produtoDestaque .imagemProduto img');
    const nomeProdutoDestaque = document.querySelector('.produtoDestaque .nomeProduto');
    const marcaProdutoDestaque = document.querySelector('.produtoDestaque .marcaProduto');
    const precoProdutoDestaque = document.querySelector('.produtoDestaque .precoProduto');
    const cor1 = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCor1 .corShow');
    const cor2 = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCor2 .corShow');
    const corSombra = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCorSombra .corShow');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (nomeProdutoDestaque) nomeProdutoDestaque.textContent = produto.nome.toUpperCase() || '';
    if (marcaProdutoDestaque) marcaProdutoDestaque.textContent = produto.marca || '';
    if (precoProdutoDestaque) precoProdutoDestaque.textContent = produto.fgPromocao ? `R$ ${produto.precoPromo}` : `R$ ${produto.preco}`;
    if (imgEl && produto.img1) imgEl.src = `/projeto-integrador-et.com/${produto.img1}`;
    if (cor1 && produto.hex1){
        cor1.value = produto.hex1;
        cor1.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor2 && produto.hex2){
        cor2.value = produto.hex2
        cor2.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (corSombra && produto.corPrincipal){
        corSombra.value = produto.corPrincipal
        corSombra.dispatchEvent(new Event("input", { bubbles: true }));
    };

    salvarOriginalDestaque();
}

function restaurarEditProduto(botao) {
    const produto = produtoOriginal.editCarousel;
    if (!produto) return;

    // Se o botão estiver na área de cor de destaque
    if (botao.closest('.mainColorEdit')) {
        const corDestaque = document.querySelector('#corDestaqueCarousel .corShow');
        if (corDestaque && produto.corEspecial) {
            corDestaque.value = produto.corEspecial;
            corDestaque.dispatchEvent(new Event('input', { bubbles: true }));
        }
    }

    // Se o botão estiver na área de degradê
    if (botao.closest('.degradeEdit')) {
        const cor1 = document.querySelector('#corDegrade1 .corShow');
        const cor2 = document.querySelector('#corDegrade2 .corShow');
        const cor3 = document.querySelector('#corDegrade3 .corShow');

        if (cor1 && produto.hexDegrade1) {
            cor1.value = produto.hexDegrade1;
            cor1.dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (cor2 && produto.hexDegrade2) {
            cor2.value = produto.hexDegrade2;
            cor2.dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (cor3 && produto.hexDegrade3) {
            cor3.value = produto.hexDegrade3;
            cor3.dispatchEvent(new Event('input', { bubbles: true }));
        }
    }
}

function restaurarEditLancamento() {
    const produto = produtoOriginal.editLancamento;
    if (!produto) return;

    const corBrilho = document.querySelector('#corBrilhoLancamento .corShow');
    if (corBrilho && produto.hex1) {
        corBrilho.value = produto.hex1;
        corBrilho.dispatchEvent(new Event('input', { bubbles: true }));
    }
}

function restaurarProdutoDestaque(botao) {
    const produto = produtoOriginal.produtoDestaque;
    if (!produto) return;

    const cor1 = document.querySelector('#produtoLancamentoEditCor1 .corShow');
    const cor2 = document.querySelector('#produtoLancamentoEditCor2 .corShow');
    const corSombra = document.querySelector('#produtoLancamentoEditCorSombra .corShow');

    if (cor1 && produto.hex1) {
        cor1.value = produto.hex1;
        cor1.dispatchEvent(new Event('input', { bubbles: true }));
    }
    if (cor2 && produto.hex2) {
        cor2.value = produto.hex2;
        cor2.dispatchEvent(new Event('input', { bubbles: true }));
    }
    if (corSombra && produto.corPrincipal) {
        corSombra.value = produto.corPrincipal;
        corSombra.dispatchEvent(new Event('input', { bubbles: true }));
    }
}