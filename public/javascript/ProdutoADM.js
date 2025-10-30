function buscarAssociadoProdutos(idProduto, nome){
    const bodyAssociadosProduto = document.getElementById("bodyAssociadosProduto");
    const nomeProduto = document.getElementById("nomeProduto");
    nomeProduto.innerText = nome;

    fetch(`/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarAssociadosPorProduto&idProduto=${idProduto}`, {
        method: "GET",
    }).then(response => response.json())
    .then(data => {
        console.log(data);

        bodyAssociadosProduto.innerHTML = "";

        data.forEach(associado => {
            const linha = document.createElement("tr");
            linha.innerHTML = `
                <td class='idAssociado'>${associado.id_usuario}</td>
                <td class='nomeAssociado'>${associado.nome}</td>
                <td class='telefone'>${associado.telefone}</td>
                <td class='cidade'>${associado.cidade != null ? associado.cidade : "-"}</td>
            `;
            bodyAssociadosProduto.appendChild(linha);
        });
        
        abrirPopUp("dialog-produto-associados");
    })
}