// Variável global para armazenar a origem do pop-up
let origemPopUp = null;

const produtoOriginal = {
    editProduto: null,
    editLancamento: null,
    produtoDestaque: null
};

// Função para abrir o pop-up e registrar origem
function abrirPopUp(nomePopUp, origem = null) {
    const dialog = document.querySelector(`.${nomePopUp}`);
    if (!dialog) return;

    origemPopUp = origem; // exemplo: "editLancamento", "editProduto", "produtoDestaque"
    dialog.showModal();
}

// Escuta os cliques nos itens da lista de produtos
document.addEventListener('DOMContentLoaded', () => {
    const input = document.querySelector(".popUpSelectProduto .inputProduto");
    const produtos = document.querySelectorAll('.popUpSelectProduto .itemLista');
    const botoesRestaurar = document.querySelectorAll('.restaurarPadrao');

    input.addEventListener("input", () => {
        const termo = input.value.toLowerCase().trim();

        produtos.forEach(item => {
            const nome = item.textContent.toLowerCase();
            console.log()
            item.style.display = nome.includes(termo) ? "block" : "none";
        });
    });

    produtos.forEach(item => {
        item.addEventListener('click', async () => {
            const produtoId = item.getAttribute('data-id');
            if (!produtoId) return;

            try {
                const response = await fetch(`/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarProduto&id=${produtoId}`);
                const produto = await response.json();

                if (produto.error) {
                    console.error(produto.error);
                    return;
                }

                // Fecha o pop-up
                const popup = document.querySelector('.popUpSelectProduto');
                if (popup) popup.close();
                console.log(produto[0])

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
        case 'editProduto':
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

    if (corDestaque && produto.corPrincipal){
        corDestaque.value = produto.corPrincipal
        corDestaque.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor1 && produto.corPrincipal){
        cor1.value = produto.corPrincipal;
        cor1.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor2 && produto.hex1){
        cor2.value = produto.hex1
        cor2.dispatchEvent(new Event("input", { bubbles: true }));
    };
    if (cor3 && produto.hex2){
        cor3.value = produto.hex2
        cor3.dispatchEvent(new Event("input", { bubbles: true }));
    };
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
        corEl.value = produto.hex1 || '#ffffff'
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
}

function restaurarEditProduto(botao) {
    const produto = produtoOriginal.editProduto;
    if (!produto) return;

    // Se o botão estiver na área de cor de destaque
    if (botao.closest('.mainColorEdit')) {
        const corDestaque = document.querySelector('#corDestaqueCarousel .corShow');
        if (corDestaque && produto.corPrincipal) {
            corDestaque.value = produto.corPrincipal;
            corDestaque.dispatchEvent(new Event('input', { bubbles: true }));
        }
    }

    // Se o botão estiver na área de degradê
    if (botao.closest('.degradeEdit')) {
        const cor1 = document.querySelector('#corDegrade1 .corShow');
        const cor2 = document.querySelector('#corDegrade2 .corShow');
        const cor3 = document.querySelector('#corDegrade3 .corShow');

        if (cor1 && produto.corPrincipal) {
            cor1.value = produto.corPrincipal;
            cor1.dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (cor2 && produto.hex1) {
            cor2.value = produto.hex1;
            cor2.dispatchEvent(new Event('input', { bubbles: true }));
        }
        if (cor3 && produto.hex2) {
            cor3.value = produto.hex2;
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