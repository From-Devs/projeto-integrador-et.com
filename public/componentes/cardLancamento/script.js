document.addEventListener("DOMContentLoaded", function(){
    
    const card = document.querySelectorAll(".lancamentoFuncional");
    const loginElement = document.getElementById('LoginVerific');
    const LoginVerific = loginElement ? loginElement.innerHTML : null; // ✅ só pega se existir

    card.forEach(item => {
        let cor = item.childNodes[5],
            style = window.getComputedStyle(cor),
            corValor = style.getPropertyValue('color');

        const botaoMaisDetalhes = item.querySelector('.botaoMaisDetalhesCardLancamento');
        const formCarrinhoLancamento = item.querySelector('.formCardProdutoCarrinho');

        formCarrinhoLancamento.addEventListener('submit', function(e){
            e.preventDefault();

            const idProduto = this.querySelector('input[name="id_produto"]').value;
            const quantidadeVar = 1;

            if (LoginVerific == "true"){
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
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })

        botaoMaisDetalhes.addEventListener('click', function(){
            const id = item.getAttribute('data-id');
            window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${id}`;
        })

        item.addEventListener("mouseenter", function(){
            item.classList.add("open");
            item.style.filter = "drop-shadow(0px 0px 10px "+corValor+")";
        })
        
        item.addEventListener("mouseleave", function(){
            item.classList.remove("open");
            item.style.filter = "";
        })

        item.childNodes[3].childNodes[7].addEventListener("mouseenter", function(){
            item.childNodes[3].childNodes[9].style.animationName = "botaoFantasma";
        })
        item.childNodes[3].childNodes[7].addEventListener("mouseleave", function(){
            item.childNodes[3].childNodes[9].style.animationName = "";
        })
    })
})