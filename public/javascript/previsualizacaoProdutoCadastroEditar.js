document.addEventListener("DOMContentLoaded", () => {
    const botaoCadastroPopUp = document.getElementById('botaoAssociados');
    const acoesTabela = document.querySelectorAll(".acoes-tabela");

    function gerarPorcentagemDesconto(precoDoProdutoOriginal, precoDoProdutoDesconto, ticket){
        let porcentagemDesconto = (((precoDoProdutoOriginal - precoDoProdutoDesconto)/precoDoProdutoOriginal)*100);
        porcentagemDesconto = parseInt(porcentagemDesconto);
        ticket.innerHTML = porcentagemDesconto + "%";
    }

    function atualizarCores(cardProduto){
        let cor = cardProduto.childNodes[1],
            cores = [];

        for (let index = 1; index < cor.childNodes.length; index+=2) {
            let style = window.getComputedStyle(cor.childNodes[index]),
                corValor = style.getPropertyValue('color');
            cores.push(corValor);
        }

        return cores;
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
        const imagemInput = formProduto.querySelector('input[name="img1"]');
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
        
        if (promoCheckboxProduto.checked) {
            if (cardProduto.className == "cardProduto") {
                cardProduto.classList.add("desconto");
            }
            precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value;
            precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value;
            
            gerarPorcentagemDesconto(precoProduto.value, precoPromoProduto.value, porcentagemCardProduto)

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
        
        let cores = atualizarCores(cardProduto);

        cardProduto.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
        botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";

        cardProduto.addEventListener("mouseenter", function(){
            cardProduto.style.filter = "drop-shadow(0px 1px 8px "+ cores[0] +")";
        });
        cardProduto.addEventListener("mouseleave", function(){
            cardProduto.style.filter = "drop-shadow(0px 6px 4px rgba(0, 0, 0, 0.35))";
        });

        botaoComprar.addEventListener("mouseenter", function(){
            botaoComprar.className = "botaoComprarCardProduto open";
            botaoAnimacao.style.animationName = "botaoFantasma";
        });
        botaoComprar.addEventListener("mouseleave", function(){
            botaoComprar.className = "botaoComprarCardProduto";
            botaoAnimacao.style.animationName = "";
        });

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
            gerarPorcentagemDesconto(precoProduto.value, precoPromoProduto.value, porcentagemCardProduto)
        })

        precoPromoProduto.addEventListener("input", function(){
            if (promoCheckboxProduto.checked) {
                precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value
            }
            gerarPorcentagemDesconto(precoProduto.value, precoPromoProduto.value, porcentagemCardProduto)
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

        imagemInput.addEventListener("change", function(){
            const file = this.files[0];
            if (!file) return;

            const reader = new FileReader();

            reader.onload = function (e) {
                // Troca o src da imagem existente
                imagemCardProduto.src = e.target.result;
            };

            reader.readAsDataURL(file);
        })

        corPrincipal.addEventListener("input", () => {
            corPrincipalCardProduto.style.color = corPrincipal.value;
            degrade1CardProduto.style.color = degrade1.value;
            degrade2CardProduto.style.color = degrade2.value;

            cores = atualizarCores(cardProduto);

            cardProduto.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
            botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
            botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        })
        degrade1.addEventListener("input", () => { 
            corPrincipalCardProduto.style.color = corPrincipal.value;
            degrade1CardProduto.style.color = degrade1.value;
            degrade2CardProduto.style.color = degrade2.value;

            cores = atualizarCores(cardProduto);

            cardProduto.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
            botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
            botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        })
        degrade2.addEventListener("input", () => { 
            corPrincipalCardProduto.style.color = corPrincipal.value;
            degrade1CardProduto.style.color = degrade1.value;
            degrade2CardProduto.style.color = degrade2.value;

            cores = atualizarCores(cardProduto);

            cardProduto.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
            botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
            botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        })

    }


    acoesTabela.forEach((botoes) => {
        botoes.querySelector(".editar").addEventListener("click", () => {
            setTimeout(() => {atualizarDadosProdutosPopUp("editar")}, 50)
            
        });
    })

    botaoCadastroPopUp.addEventListener("click", () => {
        atualizarDadosProdutosPopUp();
    });
});