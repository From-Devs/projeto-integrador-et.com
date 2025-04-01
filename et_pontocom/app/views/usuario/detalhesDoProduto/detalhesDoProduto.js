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

// const avaliacoes = document.getElementsByClassName("container-avaliacoes")[0];

// console.log(avaliacoes.children[1]);

// var datas = []

// avaliacoes.forEach(div => {
//     if(div.className == "avaliacao"){
//         if(div.childNodes){
//            div.childNodes.forEach(divAvaliacao => {

//            }); 
//         }
//     }
// });

document.getElementById("ordenar").addEventListener("change", function() {
    let container = document.querySelector(".container-avaliacoes");
    let avaliacoes = Array.from(container.getElementsByClassName("avaliacao"));

    avaliacoes.sort((a, b) => {
        let dataA = new Date(a.querySelector(".data-avaliacao span").innerText.split("/").reverse().join("-"));
        let dataB = new Date(b.querySelector(".data-avaliacao span").innerText.split("/").reverse().join("-"));

        let estrelasA = parseInt(a.querySelector(".avaliacao-usuario").src.match(/avaliacao-(\d+)\.png/)[1]);
        let estrelasB = parseInt(b.querySelector(".avaliacao-usuario").src.match(/avaliacao-(\d+)\.png/)[1]);

        if (this.value === "maisRecentes") {
            return dataB - dataA;
        } else if (this.value === "maisAntigas") {
            return dataA - dataB; 
        } else if (this.value === "maisRelevantes") {
            return estrelasB - estrelasA;
        }
        return 0;
    });

    avaliacoes.forEach(avaliacao => container.appendChild(avaliacao));
});