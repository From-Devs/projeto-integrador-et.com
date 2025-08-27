function buscarAtributosDoProduto(idProduto) {
    const dialog = document.querySelector('.dialog-editar');
    if (dialog) {
        dialog.showModal();
    }

    fetch(`http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarProduto&id=${idProduto}`)
        .then(response => response.json())
        .then(data => {
            document.querySelector('input[name="nome"]').value = data.nome;
            document.querySelector('input[name="marca"]').value = data.marca;
            document.querySelector('select[name="subCategoria"]').value = data.subCategoria;
            document.querySelector('input[name="preco"]').value = data.preco;
            document.querySelector('input[name="qtdEstoque"]').value = data.qtdEstoque;
            document.querySelector('input[name="precoPromocional"]').value = data.precoPromocional;
            document.querySelector('textarea[name="caracteristicasCompleta"]').value = data.caracteristicasCompleta;
        })
        .catch(err => console.error(err));
}