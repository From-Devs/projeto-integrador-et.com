let contador = 1;
const maxValor = 1000;
const minValor = 1;

function aumentarQtdProduto() {
    if (contador < maxValor) {
        contador++;
        atualizarValor();
    }
}

function diminuirQtdProduto() {
    if (contador > minValor) {
        contador--;
        atualizarValor();
    }
}

function atualizarValor() {
    document.getElementById('valor').textContent = contador;
}

function abrirFiltro(){
    let filtro = document.querySelector(".div-ordenar div");
    let btnOrdenar = document.getElementsByClassName("btn-ordenar")[0];
    filtro.classList.toggle("filtro-ordenar");

    btnOrdenar.addEventListener("click", () => {
        filtro.classList.toggle("filtro-ordenar");
    })
}