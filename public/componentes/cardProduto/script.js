document.addEventListener("DOMContentLoaded", function(){
   
    const cards = document.querySelectorAll(".cardProduto");
    let LoginVerific = document.getElementById('LoginVerific');

    if (LoginVerific) {
        LoginVerific = LoginVerific.innerHTML;
    }else{
        console.log("LoginVerific não existe.")
    }

    cards.forEach(item => {
        let cor = item.childNodes[1],
            cores = [];

        for (let index = 1; index < cor.childNodes.length; index+=2) {
            let style = window.getComputedStyle(cor.childNodes[index]),
                corValor = style.getPropertyValue('color');
            cores.push(corValor);
        }
            
        const balao = item.childNodes[3],
              coracaoForm = item.querySelector('.formFavoritoCard'),
              coracaoImg = coracaoForm ? coracaoForm.querySelector('.coracaoImg') : null,
              botaoComprar = item.querySelector(".botaoComprarCardProduto"),
              botaoAnimacao = item.querySelector(".botaoEspectro"),
              coracaoBotao = item.querySelector(".coracaoFofo"),
              imagemCardProdutoPadrao = item.querySelector(".imagemCardProdutoComumContainer");

        item.style.background = "linear-gradient(35deg, "+ cores[1] +" 30%, "+ cores[2] +" 100%)";
        botaoComprar.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";
        botaoAnimacao.style.backgroundImage = "linear-gradient(to top, "+ cores[1] +" 0%, "+ cores[2] +" 75%)";

        item.addEventListener("mouseenter", function(){
            item.style.filter = "drop-shadow(0px 1px 8px "+ cores[0] +")";
        });
        item.addEventListener("mouseleave", function(){
            item.style.filter = "drop-shadow(0px 6px 4px rgba(0, 0, 0, 0.35))";
        });

        coracaoBotao.addEventListener("mouseenter", function(){
            balao.style.display = "block";
        });
        coracaoBotao.addEventListener("mouseleave", function(){
            balao.style.display = "none";
        });

        imagemCardProdutoPadrao.addEventListener('click', e => {
            const id = item.getAttribute('data-id');
            window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${id}`;
        });
        imagemCardProdutoPadrao.addEventListener('mousedown', function(e){
            e.preventDefault();
        });
        imagemCardProdutoPadrao.addEventListener('mouseup', function(e){
            e.preventDefault();
        });

        botaoComprar.addEventListener("mouseenter", function(){
            botaoComprar.className = "botaoComprarCardProduto open";
            botaoAnimacao.style.animationName = "botaoFantasma";
        });
        botaoComprar.addEventListener("mouseleave", function(){
            botaoComprar.className = "botaoComprarCardProduto";
            botaoAnimacao.style.animationName = "";
        });
        botaoComprar.addEventListener('click', function(){
            if (LoginVerific == "true"){
                window.location.href = 'Meu_Carrinho.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        });

        const formCarrinho = item.querySelector('.formCardProdutoCarrinho');
        formCarrinho.addEventListener('submit', function(e){
            e.preventDefault();

            const idProduto = this.querySelector('input[name="id_produto"]').value;
            const quantidadeVar = 1;

            fetch('/projeto-integrador-et.com/router/CarrinhoRouter.php?action=adicionarCarrinho', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id_produto: idProduto, quantidade: quantidadeVar })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    if (window.abrirPopUp) window.abrirPopUp("popUpCarrinho"); 
                } else {
                    if (window.abrirPopUp) window.abrirPopUp("popUpErro"); 
                }
            })
            .catch(err => {
                console.error(err);
                if (window.abrirPopUp) window.abrirPopUp("popUpErro");
            });
        });

        // Form do detalhe do produto (fora dos cards)
        const formFavorito = item.querySelector('.formCardProdutoListaDesejos');
        formFavorito.addEventListener('submit', function(e){
            e.preventDefault();
            const idProduto = this.querySelector('input[name="id_produto"]').value;

            fetch('/projeto-integrador-et.com/router/ListaDesejosRouter.php?action=adicionarFavorito', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id_produto: idProduto })
            })
            .then(res => res.json())
            .then(data => {
                if (data.ok) {
                    if (window.abrirPopUp) window.abrirPopUp("popUpFavorito"); 
                } else {
                    if (window.abrirPopUp) window.abrirPopUp("popUpErroFavorito"); 
                }
            })
            .catch(err => {
                console.error(err);
                if (window.abrirPopUp) window.abrirPopUp("popUpErroFavorito");
            });
        });
    });


    
});
