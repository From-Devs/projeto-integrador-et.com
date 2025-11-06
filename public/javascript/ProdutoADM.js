function buscarAssociadoProdutos(idProduto, nome){
    const bodyAssociadosProduto = document.getElementById("bodyAssociadosProduto");
    const imgUsuario = document.getElementById("avatarPreview");
    const nomeProduto = document.getElementById("nomeProduto");
    const descricaoBreve = document.getElementById("descricaoBreve");
    
    fetch(`/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarAssociadosPorProduto&idProduto=${idProduto}`, {
        method: "GET",
    }).then(response => response.json())
    .then(data => {
        console.log(data);
        nomeProduto.innerText = `${data[0].marca} - ${nome}`;
        imgUsuario.src = `/projeto-integrador-et.com/${data[0].foto != "" ? data[0].foto : 'public/imagens/user-icon.png'}`;
        descricaoBreve.innerText = data[0].descricaoBreve != null ? data[0].descricaoBreve : '';

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