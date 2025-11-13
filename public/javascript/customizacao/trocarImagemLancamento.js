document.addEventListener('DOMContentLoaded', () => {
    const imgSeletor1 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img1ProdutoLancamento');
    const imgSeletor2 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img2ProdutoLancamento');
    const imgSeletor3 = document.querySelector('.popUpEditProdutoLancamento .imagemItem #img3ProdutoLancamento');
    const imgCardLancamento = document.querySelectorAll('.popUpEditProdutoLancamento .cardLancamento .imgCardLancamento')[1];
    
    console.log(imgCardLancamento)
    
    function selecionarImagemLancamento(selecionado){
        imgCardLancamento.src = selecionado.src;
    };

    function trocarStyleBotoesLancamento(botao){
        if (botao.id === 'botaoSelecionarImagemLancamento1') {
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[1].textContent = "Selecionar";
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[2].textContent = "Selecionar";
        }
        if (botao.id === 'botaoSelecionarImagemLancamento2') {
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[0].textContent = "Selecionar";
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[2].textContent = "Selecionar";
        }
        if (botao.id === 'botaoSelecionarImagemLancamento3') {
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[0].textContent = "Selecionar";
            document.querySelectorAll('.botaoSelecionarImagemLancamento')[1].textContent = "Selecionar";
        }
    };

    document.querySelectorAll('.botaoSelecionarImagemLancamento').forEach(botao => {
        botao.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();

            const id = botao.id;
            if (id === 'botaoSelecionarImagemLancamento1'){
                selecionarImagemLancamento(imgSeletor1);
                botao.textContent = "Selecionado";
                trocarStyleBotoesLancamento(botao)
            }
            if (id === 'botaoSelecionarImagemLancamento2'){
                selecionarImagemLancamento(imgSeletor2);
                botao.textContent = "Selecionado";
                trocarStyleBotoesLancamento(botao)
            }
            if (id === 'botaoSelecionarImagemLancamento3'){
                selecionarImagemLancamento(imgSeletor3);
                botao.textContent = "Selecionado";
                trocarStyleBotoesLancamento(botao)
            }
        });
    });
});

