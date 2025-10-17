document.addEventListener("DOMContentLoaded", function(){
   
    const cards = document.querySelectorAll(".cardProduto");
    const LoginVerific = document.getElementById('LoginVerific').innerHTML;

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
              coracaoBotao = item.childNodes[5],
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

        // if (coracaoForm && coracaoImg) {
            coracaoBotao.addEventListener("mouseenter", function(){
                balao.style.display = "block";
            });
            coracaoBotao.addEventListener("mouseleave", function(){
                balao.style.display = "none";
            });

        //     coracaoForm.addEventListener('submit', function(e){
        //         e.preventDefault(); // evita reload
        //         const formData = new FormData(this);

        //         fetch('/projeto-integrador-et.com/config/produtoRouter.php?action=adicionarFavorito', {
        //             method: 'POST',
        //             body: formData
        //         })
        //         .then(res => res.json())
        //         .then(data => {
        //             if(data.ok){
        //                 coracaoImg.classList.add('liked'); // animação coração
        //                 abrirPopUp('popUpFavorito');
        //             } else {
        //                 alert('Erro ao adicionar aos favoritos: ' + (data.msg || 'Tente novamente'));
        //             }
        //         })
        //         .catch(err => console.error(err));
        //     });
        // }

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
    });

    // Form do detalhe do produto (fora dos cards)
    const formDetalhe = document.getElementById('formFavorito');
    if(formDetalhe){
        formDetalhe.addEventListener('submit', function(e) {
            e.preventDefault(); 
            const formData = new FormData(this);

            fetch('/projeto-integrador-et.com/config/produtoRouter.php?action=adicionarFavorito', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.ok) {
                    abrirPopUp('popUpFavorito');
                } else {
                    alert('Erro: ' + (data.msg || 'Não foi possível adicionar aos favoritos'));
                }
            })
            .catch(err => console.error(err));
        });
    }
});
