let origemPopUp = null;

document.addEventListener('DOMContentLoaded', () => {
    const produtos = document.querySelectorAll('.itemLista');

    produtos.forEach(item => {
        item.addEventListener('click', async () => {
            console.log("clicou:", origemPopUp)
            const produtoId = item.getAttribute('data-id');

            // Faz requisição para obter os dados completos do produto
            const response = await fetch(`/app/Controllers/ProdutoController.php?action=detalhes&id=${produtoId}`);
            const produto = await response.json();

            // Fecha o pop-up
            document.querySelector('.popUpSelectProduto').close();

            // Atualiza conforme a origem
            atualizarOrigemComProduto(produto);
        });
    });
});

function atualizarOrigemComProduto(produto) {
    if (!origemPopUp || !produto) return;

    switch (origemPopUp) {
        case 'editLancamento':
            // Atualiza campos do popUpEditProdutoLancamento
            document.querySelector('.popUpEditProdutoLancamento .nomeProduto p').textContent = produto.nome;
            document.querySelector('#corBrilhoLancamento .corShow').value = produto.cor_principal ?? '#ffffff';
            // exemplo de atualizar imagem:
            // document.querySelector('.popUpEditProdutoLancamento .imagemItemSelecionada img').src = `/public/imagens/produto/${produto.imagem}`;
            break;

        case 'editProduto':
            // Atualiza campos do popUpEditProduto
            document.querySelector('.popUpEditProduto .nomeProduto p').textContent = produto.nome;
            document.querySelector('#wrapperEditProdutoImg img').src = `/public/imagens/produto/${produto.imagem}`;
            break;

        case 'produtoDestaque':
            // Atualiza dados da área de produto destaque
            document.querySelector('.editProdutoDestaque .nomeProduto p').textContent = produto.nome;
            document.querySelector('.produtoDestaque img').src = `/public/imagens/produto/${produto.imagem}`;
            break;
    }

    origemPopUp = null; // limpa a origem após o uso
}