document.addEventListener("DOMContentLoaded", function(){
   
    const produtoDestaque = document.querySelectorAll(".produtoDestaque");
    const LoginVerific = document.getElementById('LoginVerific').innerHTML;

    produtoDestaque.forEach(item => {

        let cor = item.childNodes[7],
            cores = [];

        for (let index = 1; index < cor.childNodes.length; index+=2) {
            let style = window.getComputedStyle(cor.childNodes[index]),
                corValor = style.getPropertyValue('color');
                
            cores.push(corValor);
        }

        item.style.background = "linear-gradient(to top, "+ cores[0] +" 0%, "+ cores[1] +" 50%, rgba(255, 255, 255, 0) 100%)";
        item.childNodes[5].childNodes[1].style.filter = "drop-shadow(0px 0px 50px "+ cores[2] +")";
        item.childNodes[5].childNodes[5].style.filter = "drop-shadow(0px 0px 90px "+ cores[2] +")";

        item.childNodes[3].childNodes[1].childNodes[7].childNodes[1].addEventListener('click', function(){
            if (LoginVerific == "true"){
                window.location.href = 'Meu_Carrinho.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        });

        item.childNodes[3].childNodes[1].childNodes[7].childNodes[3].addEventListener('click', function(){
            window.location.href = 'detalhesDoProduto.php'
        });
    });
 
});