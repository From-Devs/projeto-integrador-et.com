const cor1 = document.getElementById('produtoLancamentoEditCor1');
const cor2 = document.getElementById('produtoLancamentoEditCor2');
const corSombra = document.getElementById('produtoLancamentoEditCorSombra');
const produtoDestaque = document.querySelector(".produtoDestaque");

function trocarCorProdutoDestaque(){
    produtoDestaque.style.background = "linear-gradient(to top, "+ cor1.childNodes[1].value +" 0%, "+ cor2.childNodes[1].value +" 50%, rgba(255, 255, 255, 0) 100%)";
    produtoDestaque.childNodes[5].childNodes[1].style.filter = "drop-shadow(0px 0px 50px "+ corSombra.childNodes[1].value +")";
    produtoDestaque.childNodes[5].childNodes[5].style.filter = "drop-shadow(0px 0px 120px "+ corSombra.childNodes[1].value +")";
}

cor1.childNodes[1].addEventListener('input', trocarCorProdutoDestaque);
cor1.childNodes[3].addEventListener('input', trocarCorProdutoDestaque);
cor2.childNodes[1].addEventListener('input', trocarCorProdutoDestaque);
cor2.childNodes[3].addEventListener('input', trocarCorProdutoDestaque);
corSombra.childNodes[1].addEventListener('input', trocarCorProdutoDestaque);
corSombra.childNodes[3].addEventListener('input', trocarCorProdutoDestaque);
