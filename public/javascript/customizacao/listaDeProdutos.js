// Variável global para armazenar a origem do pop-up
let origemPopUp = null;

// Função para abrir o pop-up e registrar origem
function abrirPopUp(nomePopUp, origem = null) {
    const dialog = document.querySelector(`.${nomePopUp}`);
    if (!dialog) return;

    origemPopUp = origem; // exemplo: "editLancamento", "editProduto", "produtoDestaque"
    dialog.showModal();
}

// Escuta os cliques nos itens da lista de produtos
document.addEventListener('DOMContentLoaded', () => {
    const produtos = document.querySelectorAll('.itemLista');

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
});

// Atualiza os dados no contexto de origem
function atualizarOrigemComProduto(produto) {
    if (!origemPopUp || !produto) return;

    switch (origemPopUp) {
        case 'editLancamento':
            preencherPopUpEditLancamento(produto);
            break;

        case 'editProduto':
            preencherPopUpEditProduto(produto);
            break;

        case 'produtoDestaque':
            preencherProdutoDestaque(produto);
            break;
    }

    origemPopUp = null; // limpa a origem após o uso
}

// Funções específicas para cada origem

function preencherPopUpEditLancamento(produto) {
    const nomeEl = document.querySelector('.popUpEditProdutoLancamento .nomeProduto p');
    const corEl = document.querySelector('#corBrilhoLancamento .corShow');
    const imgEl = document.querySelector('.popUpEditProdutoLancamento .imagemItemSelecionada img');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (corEl) corEl.value = produto.hex1 || '#ffffff';
    if (imgEl && produto.imagem) imgEl.src = `/public/imagens/produto/${produto.imagem}`;
}

function preencherPopUpEditProduto(produto) {
    const nomeEl = document.querySelector('.popUpEditProduto .nomeProduto p');
    const imgEl = document.querySelector('#wrapperEditProdutoImg img');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (imgEl && produto.imagem) imgEl.src = `/public/imagens/produto/${produto.imagem}`;
}

function preencherProdutoDestaque(produto) {
    const nomeEl = document.querySelector('.editProdutoDestaque .nomeProduto p');
    const imgEl = document.querySelector('.produtoDestaque .imagemProduto img');
    const cor1 = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCor1 .corShow');
    const cor2 = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCor2 .corShow');
    const corSombra = document.querySelector('.editProdutoDestaque #produtoLancamentoEditCorSombra .corShow');

    if (nomeEl) nomeEl.textContent = produto.nome || '';
    if (imgEl && produto.img1) imgEl.src = `/projeto-integrador-et.com/${produto.img1}`;
    if (cor1 && produto.hex1) cor1.value = produto.hex1;
    if (cor2 && produto.hex2) cor2.value = produto.hex2;
    if (corSombra && produto.corPrincipal) corSombra.value = produto.corPrincipal;

    trocarCorProdutoDestaque();
}
