function buscarAssociadoProdutos(idProduto){
    fetch(`/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarAssociadosPorProduto&idProduto=${idProduto}`, {
        method: "GET",
    }).then(response => response.json())
    .then(data => {
        console.log(data);
        //Preencher dialog com dados dos associados e abrir
    })
}