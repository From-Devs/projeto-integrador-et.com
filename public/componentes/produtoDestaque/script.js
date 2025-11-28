document.addEventListener("DOMContentLoaded", function(){
   
    const produtoDestaque = document.querySelectorAll(".produtoDestaque");
    const LoginVerific = document.getElementById('LoginVerific').innerHTML;

    produtoDestaque.forEach(item => {
        const formCarrinhoDestaque = item.querySelector('.formCardProdutoCarrinho');
        formCarrinhoDestaque.addEventListener('submit', function(e){
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
                        window.location.href = 'Meu_Carrinho.php';
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
        });

        item.childNodes[3].childNodes[1].childNodes[7].childNodes[3].addEventListener('click', function(){
            const id = item.getAttribute('data-id');
            window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${id}`;
        });
    });
 
});