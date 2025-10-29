document.addEventListener("DOMContentLoaded", () => {
    const botaoCadastroPopUp = document.getElementById('botaoAssociados');
    const acoesTabela = document.querySelectorAll(".acoes-tabela");

    function gerarPorcentagemDesconto(precoOriginal, precoDesconto, ticket){
        const original = parseFloat(precoOriginal);
        const desconto = parseFloat(precoDesconto);

        if (!original || !desconto || desconto >= original) {
            ticket.innerHTML = "%";
            return;
        }

        const porcentagem = Math.floor(((original - desconto) / original) * 100);
        ticket.innerHTML = `${porcentagem}%`;
    }

    function atualizarCores(cardProduto){
        const cores = [];
        const elementosCor = cardProduto.querySelectorAll(".cores > div");

        elementosCor.forEach(el => {
            const style = window.getComputedStyle(el);
            cores.push(style.getPropertyValue("color"));
        });

        return cores;
    }
    
    function atualizarDadosProdutosPopUp(tipoPopUp = "cadastrar"){
        const popUp = document.querySelector(`.dialog-${tipoPopUp}`);
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

        // Função de atualizar cores e fundo do card
        function atualizarCoresCard() {
            corPrincipalCardProduto.style.color = corPrincipal.value;
            degrade1CardProduto.style.color = degrade1.value;
            degrade2CardProduto.style.color = degrade2.value;

            const cores = atualizarCores(cardProduto);
            const gradienteCard = `linear-gradient(35deg, ${cores[1]} 30%, ${cores[2]} 100%)`;
            const gradienteBotao = `linear-gradient(to top, ${cores[1]} 0%, ${cores[2]} 75%)`;

            cardProduto.style.background = gradienteCard;
            botaoComprar.style.backgroundImage = gradienteBotao;
            botaoAnimacao.style.backgroundImage = gradienteBotao;

            return cores; // Retorna cores atualizadas para usar no hover
        }

        function atualizarDesconto() {
            if (promoCheckboxProduto.checked) {
                cardProduto.classList.add("desconto");
                precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value;
                precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value;
                gerarPorcentagemDesconto(precoProduto.value, precoPromoProduto.value, porcentagemCardProduto);
            } else {
                cardProduto.classList.remove("desconto");
                precoAtualCardProduto.innerHTML = "R$" + precoProduto.value;
                precoOriginalCardProduto.innerHTML = "";
                porcentagemCardProduto.innerHTML = "%";
            }
        }

        
        if (promoCheckboxProduto.checked) {
            cardProduto.classList.add("desconto");
            precoAtualCardProduto.innerHTML = "R$" + precoPromoProduto.value;
            precoOriginalCardProduto.innerHTML = "R$" + precoProduto.value;
            
            gerarPorcentagemDesconto(precoProduto.value, precoPromoProduto.value, porcentagemCardProduto)
        }else{
            cardProduto.classList.remove("desconto");
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

        if (tipoPopUp === "cadastrar") {
            nomeCardProduto.innerHTML = "Nome do Produto";
            marcaCardProduto.innerHTML = "Marca";
            precoAtualCardProduto.innerHTML = "R$ 0,00";
            precoOriginalCardProduto.innerHTML = "";
            porcentagemCardProduto.innerHTML = "%";
            corPrincipalCardProduto.style.color = "#000000";
            degrade1CardProduto.style.color = "#000000";
            degrade2CardProduto.style.color = "#000000";
            imagemCardProduto.src = ""; // vazio por padrão

            atualizarCoresCard();
        }

        cardProduto.addEventListener("mouseenter", function(){
            const cores = atualizarCoresCard();
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

        promoCheckboxProduto.addEventListener("input", atualizarDesconto)
        precoPromoProduto.addEventListener("input", atualizarDesconto)
        precoProduto.addEventListener("input", atualizarDesconto)

        if (imagemInput) {
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
        }

        corPrincipal.addEventListener("input", atualizarCoresCard)
        degrade1.addEventListener("input", atualizarCoresCard)
        degrade2.addEventListener("input", atualizarCoresCard)
    }

    acoesTabela.forEach((botoes) => {
        const btn = botoes.querySelector(".editar");
        if (btn) {
            btn.addEventListener("click", () => {
                setTimeout(() => { atualizarDadosProdutosPopUp("editar"); }, 50);
            });
        }
    })

    if (botaoCadastroPopUp) {
        botaoCadastroPopUp.addEventListener("click", () => {
            atualizarDadosProdutosPopUp("cadastrar");
        });
    }
});