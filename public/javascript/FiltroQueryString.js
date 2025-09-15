// Pesquisa
const btnPesquisar = document.getElementsByClassName("lupaPesquisarInput")[0];
const inputPesquisar = document.getElementById("inputPesquisar");

btnPesquisar.addEventListener("click", function() {
    window.location.href = `?pesquisa=${inputPesquisar.value}`;
});