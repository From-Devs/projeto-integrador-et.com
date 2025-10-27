document.addEventListener("DOMContentLoaded", () => {
    const botaoCadastroPopUp = document.getElementById('botaoAssociados');
    const acoesTabela = document.querySelectorAll(".acoes-tabela");

    function gerarPorcentagemDesconto(precoDoProdutoOriginal, precoDoProdutoDesconto){
        let porcentagemDesconto = (((precoDoProdutoOriginal - precoDoProdutoDesconto)/precoDoProdutoOriginal)*100);
        porcentagemDesconto = parseInt(porcentagemDesconto);
        porcentagemCardProduto.innerHTML = porcentagemDesconto + "%";
    }
    
    function atualizarDadosProdutosPopUp(tipoPopUp = "cadastro"){
        // observer.disconnect()
        if (tipoPopUp == "editar") {
            popUp = document.querySelector(".dialog-editar");
        }else{
            popUp = document.querySelector(".dialog-cadastrar");
        }
        // console.log(popUp)
        console.log("entrou na função")
        const formProduto = popUp.querySelector('.formProduto');

        // Dados do form
        const nomeProduto = formProduto.querySelector('input[name="nome"]');
        const marcaProduto = formProduto.querySelector('input[name="marca"]');
        const precoProduto = formProduto.querySelector('input[name="preco"]');
        const precoPromoProduto = formProduto.querySelector('input[name="precoPromocional"]');
        const promoCheckboxProduto = formProduto.querySelector('input[name="fgPromocao"]');
        const corPrincipal = formProduto.querySelector('input[name="corPrincipal"]');
        const degrade1 = formProduto.querySelector('input[name="deg1"]');
        const degrade2 = formProduto.querySelector('input[name="deg2"]');
        const imagemProduto = formProduto.querySelectorAll('.imagem-produto')[0];
        
        // Campos do Card de produto
        const cardProduto = formProduto.querySelector('.cardProduto');
        const nomeCardProduto = cardProduto.querySelector('.nomeProduto');
        const marcaCardProduto = cardProduto.querySelector('.marca');
        const precoAtualCardProduto = cardProduto.querySelector('.preco');
        const precoOriginalCardProduto = cardProduto.querySelector('.precoOriginal');
        const porcentagemCardProduto = cardProduto.querySelector('.descontoPorcento');
        const corPrincipalCardProduto = cardProduto.querySelector('.corDestaque');
        const degrade1CardProduto = cardProduto.querySelector('.corDegrade1');
        const degrade2CardProduto = cardProduto.querySelector('.corDegrade2');
        const imagemCardProduto = cardProduto.querySelector('.imagemCardProdutoComum');
        const botaoComprar = cardProduto.querySelector(".botaoComprarCardProduto");
        const botaoAnimacao = cardProduto.querySelector(".botaoEspectro");
        // console.log(imagemProduto);
        // console.log(nomeCardProduto);
        // console.log(marcaCardProduto);
        // console.log(precoAtualCardProduto);
        // console.log(precoOriginalCardProduto);

        
        if (promoCheckboxProduto.checked) {
            if (cardProduto.className == "cardProduto") {
                cardProduto.classList.add("desconto");
            }
            precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value;
            precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value;

            let porcentagemDesconto = (((precoProduto.value - precoPromoProduto.value)/precoProduto.value)*100);
            porcentagemDesconto = parseInt(porcentagemDesconto);
            porcentagemCardProduto.innerHTML = porcentagemDesconto + "%";
        }else{
            if (cardProduto.className == "cardProduto desconto") {
                cardProduto.classList.remove("desconto");
            }
            precoAtualCardProduto.innerHTML = "R$" + precoProduto.value;
        }

        nomeCardProduto.innerHTML = nomeProduto.value;
        marcaCardProduto.innerHTML = marcaProduto.value;
        imagemCardProduto.src = imagemProduto.src;
        corPrincipalCardProduto.style.color = corPrincipal.value;
        degrade1CardProduto.style.color = degrade1.value;
        degrade2CardProduto.style.color = degrade2.value;

        let cor = cardProduto.childNodes[1],
            cores = [];

        for (let index = 1; index < cor.childNodes.length; index+=2) {
            let style = window.getComputedStyle(cor.childNodes[index]),
                corValor = style.getPropertyValue('color');
            cores.push(corValor);
        }

        cardProduto.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
        botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";

        nomeProduto.addEventListener("input", function(){
            nomeCardProduto.innerHTML = nomeProduto.value;
        })

        marcaProduto.addEventListener("input", function(){
            marcaCardProduto.innerHTML = marcaProduto.value;
        })

        precoProduto.addEventListener("input", function(){
            if (promoCheckboxProduto.checked) {
                precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value
            }else{
                precoAtualCardProduto.innerHTML = "R$" + precoProduto.value;
            }
        })

        precoPromoProduto.addEventListener("input", function(){
            if (promoCheckboxProduto.checked) {
                precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value
            }
        })
    
        promoCheckboxProduto.addEventListener("input", function(){
            if (promoCheckboxProduto.checked) {
                cardProduto.classList.add("desconto");
                precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value;
                precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value;
            }else{
                cardProduto.classList.remove("desconto");
                precoAtualCardProduto.innerHTML = "R$" + precoProduto.value;
            }
        })



        
        // observer.observe(document.body, { childList: true, subtree: true});
    }

    // const observer = new MutationObserver(() => {
    //     const popUpEditar = document.querySelector(".dialog-editar[open]");
    //     const popUpCadastrar = document.querySelector(".dialog-cadastrar[open]");

    //     if (popUpEditar){
    //         atualizarDadosProdutosPopUp("editar");
    //     } 
    //     if(popUpCadastrar){
    //         atualizarDadosProdutosPopUp();
    //     }
    // })

    // observer.observe(document.body, { childList: true, subtree: true});


    acoesTabela.forEach((botoes) => {
        botoes.querySelector(".editar").addEventListener("click", () => {
            setTimeout(() => {atualizarDadosProdutosPopUp("editar")}, 50)
            
        });
    })

    botaoCadastroPopUp.addEventListener("click", () => {
        atualizarDadosProdutosPopUp();
    });
});