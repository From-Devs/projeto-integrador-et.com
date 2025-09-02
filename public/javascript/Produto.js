function buscarAtributosDoProduto(idProduto) {
    const dialog = document.querySelector('.dialog-editar');
    if (dialog) {
        dialog.showModal();
    }

    fetch(`http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarProduto&id=${idProduto}`)
        .then(response => response.json())
        .then(data => {
            const form = dialog.querySelector('form');
            form.reset();
            console.log(data[0]);

            form.querySelector('input[name="id_produto"]').value = idProduto;
            form.querySelector('input[name="nome"]').value = data[0].nome ?? "";
            form.querySelector('input[name="marca"]').value = data[0].marca ?? "";
            form.querySelector('select[name="subCategoria"]').value = data[0].id_subCategoria ?? "";
            form.querySelector('input[name="preco"]').value = data[0].preco ?? "";
            form.querySelector('input[name="precoPromocional"]').value = data[0].precoPromo ?? "";
            form.querySelector('input[name="qtdEstoque"]').value = data[0].qtdEstoque ?? "";
            form.querySelector('textarea[name="breveDescricao"]').value = data[0].descricaoBreve ?? "";
            form.querySelector('textarea[name="caracteristicasCompleta"]').value = data[0].descricaoTotal ?? "";
            form.querySelector('input[name="corPrincipal"]').value = data[0].corPrincipal || "#000000";
            form.querySelector('input[name="deg1"]').value = data[0].hex1 || "#000000";
            form.querySelector('input[name="deg2"]').value = data[0].hex2 || "#000000";

            if (data[0].img1) document.getElementById("img-editar1").src = "/projeto-integrador-et.com/" + data[0].img1;
            if (data[0].img2) document.getElementById("img-editar2").src = "/projeto-integrador-et.com/" + data[0].img2;
            if (data[0].img3) document.getElementById("img-editar3").src = "/projeto-integrador-et.com/" + data[0].img3;
        })
        .catch(err => console.error(err));
}

function removerProduto(idProduto) {
    fetch("http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=RemoverProduto", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({ id: idProduto })
    })
    .then(() => fecharPopUp("popUpExcluir_" + idProduto))
    .then(() => abrirPopUp("popUpRemocao"))

    const popUpRemocao = document.getElementsByClassName("popUpRemocao")[0];   

    //Recarrega a página ao fechar popUpRemocao
    popUpRemocao.addEventListener('close', () => {
        window.location.reload();
    }, { once: true });
}