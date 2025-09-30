// Botão de pesquisa
const btnPesquisar = document.getElementsByClassName("lupaPesquisarInput")[0];
const inputPesquisar = document.getElementById("inputPesquisar");

btnPesquisar.addEventListener("click", function() {
    const url = new URL(window.location.href);
    url.searchParams.set('pesquisa', inputPesquisar.value);
    window.location.href = url.toString();
});

// Ordenação
document.querySelector("#botaoOrdenar").addEventListener("change", function () {
    const url = new URL(window.location.href);
    url.searchParams.set('ordem', this.value);
    window.location.href = url.toString();
});