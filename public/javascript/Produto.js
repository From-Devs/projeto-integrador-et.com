document.getElementsByClassName("campos-cadastrar")[0].addEventListener("submit", function(e) {
    e.preventDefault();

    const teste = document.getElementsByClassName("dialog-cadastrar")[0];
    console.log(teste);

    let formData = new FormData(this);

    fetch("http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=CadastrarProduto", {
        method: "POST",
        body: formData
    })
    .then(res => res.json()) 
    .then(data => {
        if (data.sucesso) {
            abrirPopUp("popUpCadastro");
            teste.close();
        } else {
            abrirPopUp("popUpErro");
        }
    })
    .catch(err => console.error("Erro:", err));
});

function buscarAtributosDoProduto(idProduto) {
    fetch(`http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=BuscarProduto&id=${idProduto}`)
        .then(response => response.json())
        .then(data => {
            const form = dialog.querySelector('form');
            form.reset();
            console.log("Produto carregado:", data[0]);
            console.log(document.getElementById("img-produto1").src = "http://localhost/projeto-integrador-et.com/" + data[0].img1)
            console.log(document.getElementById("img-produto2").src = "http://localhost/projeto-integrador-et.com/" + data[0].img2)
            console.log(document.getElementById("img-produto3").src = "http://localhost/projeto-integrador-et.com/" + data[0].img3)

            form.querySelector('input[name="id_produto"]').value = idProduto;
            form.querySelector('input[name="nome"]').value = data[0].nome ?? "";
            form.querySelector('input[name="marca"]').value = data[0].marca ?? "";
            form.querySelector('input[name="preco"]').value = data[0].preco ?? "";
            form.querySelector('input[name="precoPromocional"]').value = data[0].precoPromo ?? "";
            form.querySelector('input[name="qtdEstoque"]').value = data[0].qtdEstoque ?? "";
            form.querySelector('textarea[name="breveDescricao"]').value = data[0].descricaoBreve ?? "";
            form.querySelector('textarea[name="caracteristicasCompleta"]').value = data[0].descricaoTotal ?? "";
            form.querySelector('input[name="corPrincipal"]').value = data[0].corPrincipal || "#000000";
            form.querySelector('input[name="deg1"]').value = data[0].hex1 || "#000000";
            form.querySelector('input[name="deg2"]').value = data[0].hex2 || "#000000";

            carregarSubCategorias(
                form.querySelector('select[name="subCategoria"]'),
                data[0].id_subCategoria
            );

            (data[0].img1) ? document.getElementById("img-produto1").src = "http://localhost/projeto-integrador-et.com/" + data[0].img1 : console.log("Não tem imagem");
            (data[0].img2) ? document.getElementById("img-produto2").src = "http://localhost/projeto-integrador-et.com/" + data[0].img2 : console.log("Não tem imagem");
            (data[0].img3) ? document.getElementById("img-produto3").src = "http://localhost/projeto-integrador-et.com/" + data[0].img3 : console.log("Não tem imagem");
        })
        .catch(err => console.error("Erro ao buscar produto:", err));

    const dialog = document.querySelector('.dialog-editar');
    if (dialog) {
        dialog.showModal();
    }
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

function carregarSubCategorias(select, idSelecionado = null) {
    fetch("http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=ListarSubCategorias")
        .then(response => response.json())
        .then(data => {
            select.innerHTML = '<option value="" disabled>Selecione uma subcategoria</option>';
            
            data.forEach(sc => {
                const opt = document.createElement("option");
                opt.value = sc.id_subCategoria;
                opt.textContent = sc.nome;

                if (idSelecionado && String(sc.id_subCategoria) === String(idSelecionado)) {
                    opt.selected = true;
                }

                select.appendChild(opt);
            });
        })
        .catch(err => console.error(err));
}
