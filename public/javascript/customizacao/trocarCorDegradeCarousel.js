const corDegrade1 = document.getElementById('corDegrade1');
const corDegrade2 = document.getElementById('corDegrade2');
const corDegrade3 = document.getElementById('corDegrade3');
const wrapperProduto = document.getElementById("wrapperEditProdutoImg");
const degradeBarra = document.getElementById("degradeBar");
const marcador1 = document.getElementById("markerOne");
const marcador2 = document.getElementById("markerTwo");
const marcador3 = document.getElementById("markerThree");
const swapDegrade = document.getElementById("swapDegrade");

function atualizarCor(){
    corDegrade1.childNodes[3].value = corDegrade1.childNodes[1].value.toUpperCase()
    corDegrade1.childNodes[1].value = corDegrade1.childNodes[3].value.toUpperCase()
    corDegrade2.childNodes[3].value = corDegrade2.childNodes[1].value.toUpperCase()
    corDegrade2.childNodes[1].value = corDegrade2.childNodes[3].value.toUpperCase()
    corDegrade3.childNodes[3].value = corDegrade3.childNodes[1].value.toUpperCase()
    corDegrade3.childNodes[1].value = corDegrade3.childNodes[3].value.toUpperCase()
}


function trocarCorProdutoImg(){
    wrapperProduto.style.background = "linear-gradient(to bottom, "+ corDegrade1.childNodes[1].value +" 0%, "+ corDegrade2.childNodes[1].value +" 50%, "+ corDegrade3.childNodes[1].value +" 100%)";
    degradeBarra.style.background = "linear-gradient(to right, "+ corDegrade1.childNodes[1].value +" 0%, "+ corDegrade2.childNodes[1].value +" 50%, "+ corDegrade3.childNodes[1].value +" 100%)";
    marcador1.childNodes[1].style.background = corDegrade1.childNodes[1].value;
    marcador2.childNodes[1].style.background = corDegrade2.childNodes[1].value;
    marcador3.childNodes[1].style.background = corDegrade3.childNodes[1].value;
}

corDegrade1.childNodes[1].addEventListener('input', trocarCorProdutoImg);
corDegrade1.childNodes[3].addEventListener('input', trocarCorProdutoImg);
corDegrade2.childNodes[1].addEventListener('input', trocarCorProdutoImg);
corDegrade2.childNodes[3].addEventListener('input', trocarCorProdutoImg);
corDegrade3.childNodes[1].addEventListener('input', trocarCorProdutoImg);
corDegrade3.childNodes[3].addEventListener('input', trocarCorProdutoImg);

swapDegrade.addEventListener("click", function(){
    let corContainer = corDegrade1.childNodes[1].value;
    corDegrade1.childNodes[1].value = corDegrade3.childNodes[1].value;
    corDegrade3.childNodes[1].value = corContainer;
    trocarCorProdutoImg();
    atualizarCor();
})