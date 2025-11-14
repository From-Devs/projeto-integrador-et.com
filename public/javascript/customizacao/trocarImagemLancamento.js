document.addEventListener('DOMContentLoaded', () => {
    const imagemPrincipal = document.querySelectorAll(
        '.popUpEditProdutoLancamento .cardLancamento .imgCardLancamento'
    )[1];

    const imagens = [
        document.querySelector('#img1ProdutoLancamento'),
        document.querySelector('#img2ProdutoLancamento'),
        document.querySelector('#img3ProdutoLancamento')
    ];

    const botoes = document.querySelectorAll('.botaoSelecionarImagemLancamento');

    // Pegamos todos os .imagemItem (pais das imagens)
    const imagemItems = document.querySelectorAll('.imagemItem');

    window.selecionarImagem = function (indexClicado) {

        // Trocar imagem do card de lançamento
        imagemPrincipal.src = imagens[indexClicado].src;

        // Atualizar texto/disable dos botões
        botoes.forEach((botao, index) => {
            if (index === indexClicado) {
                botao.textContent = "Selecionado";
                botao.disabled = true;
            } else {
                botao.textContent = "Selecionar";
                botao.disabled = false;
            }
        });

        // *** NOVO: Atualizar classe de seleção no pai das imagens ***
        imagemItems.forEach((item, index) => {
            if (index === indexClicado) {
                item.classList.add("imagemSelecionada");
            } else {
                item.classList.remove("imagemSelecionada");
            }
        });
    }

    // adicionar listeners nos botões
    botoes.forEach((botao, index) => {
        botao.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
            selecionarImagem(index);
        });
    });
});
