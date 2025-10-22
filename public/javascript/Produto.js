document.getElementsByClassName("campos-cadastrar")[0].addEventListener("submit", function(e) {
    e.preventDefault();

    const popUpCadastrar = document.getElementsByClassName("dialog-cadastrar")[0];
    const popUpSucesso = document.getElementsByClassName("popUpCadastro")[0];

    const vlTamanho = this.querySelector('input[name="valorTamanho"]').value;
    const tipoTamanho = this.querySelector('select[name="tipoTamanho"]').value;
    const tamanhoFinal = vlTamanho + " " + tipoTamanho;

    let formData = new FormData(this);
    formData.delete("valorTamanho");
    formData.delete("tipoTamanho");
    formData.append("tamanho", tamanhoFinal);
    console.log(...formData);

    fetch("/projeto-integrador-et.com/router/ProdutoRouter.php?acao=CadastrarProduto", {
        method: "POST",
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.json()) 
    .then(data => {
        if (data.sucesso) {
            abrirPopUp("popUpCadastro");
            popUpCadastrar.close();

            // Recarrega a página ao cadastrar
            popUpSucesso.addEventListener("close", function(){
                window.location.reload();
            })
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
            const dialog = document.querySelector('.dialog-editar');
            if (dialog) {
                dialog.showModal();
            }

            const form = dialog.querySelector('form');
            form.reset();

            valoresTamanho = ajustarCamposDeTamanho(data[0]);

            form.querySelector('input[name="id_produto"]').value = idProduto;
            form.querySelector('input[name="nome"]').value = data[0].nome ?? "";
            form.querySelector('input[name="marca"]').value = data[0].marca ?? "";
            form.querySelector('input[name="preco"]').value = data[0].preco ?? "";
            form.querySelector('input[name="precoPromocional"]').value = data[0].precoPromo ?? "";
            form.querySelector('input[name="fgPromocao"]').checked = (String(data[0].fgPromocao) === "1");
            form.querySelector('input[name="valorTamanho"]').value = valoresTamanho[0] ?? "";
            form.querySelector('select[name="tipoTamanho"]').value = valoresTamanho[1] ?? "";
            form.querySelector('input[name="qtdEstoque"]').value = data[0].qtdEstoque ?? "";
            form.querySelector('textarea[name="breveDescricao"]').value = data[0].descricaoBreve ?? "";
            form.querySelector('textarea[name="caracteristicasCompleta"]').value = data[0].descricaoTotal ?? "";
            form.querySelector('input[name="corPrincipal"]').value = data[0].corPrincipal || "#000000";
            form.querySelector('input[name="deg1"]').value = data[0].hex1 || "#000000";
            form.querySelector('input[name="deg2"]').value = data[0].hex2 || "#000000";

            const chkPromo = form.querySelector('input[name="fgPromocao"]');
            const inputPromo = form.querySelector('input[name="precoPromocional"]');
            inputPromo.disabled = !chkPromo.checked;
            
            carregarSubCategorias(
                form.querySelector('select[name="subCategoria"]'),
                data[0].id_subCategoria
            );

            document.getElementById("img-produto-editar1").src = montarUrlImagem(data[0].img1) ?? "";
            document.getElementById("img-produto-editar2").src = montarUrlImagem(data[0].img2) ?? "";
            document.getElementById("img-produto-editar3").src = montarUrlImagem(data[0].img3) ?? "";
        })
        .catch(err => console.error("Erro ao buscar produto:", err));
}

document.getElementsByClassName("campos-editar")[0].addEventListener("submit", function(e) {
    e.preventDefault();

    const vlTamanho = this.querySelector('input[name="valorTamanho"]').value;
    const tipoTamanho = this.querySelector('select[name="tipoTamanho"]').value;
    const tamanhoFinal = vlTamanho + " " + tipoTamanho;

    let formData = new FormData(this);
    formData.delete("valorTamanho");
    formData.delete("tipoTamanho");
    formData.append("tamanho", tamanhoFinal);
    console.log(...formData);
    
    if(formData.get("fgPromocao") === null){
        formData.delete("precoPromocional");
    }

    fetch("/projeto-integrador-et.com/router/ProdutoRouter.php?acao=EditarProduto", {
        method: "POST",
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        if (data.sucesso) {
            abrirPopUp("popUpSalvar");
            // Recarrega a página ao fechar o popUpSalvar
            const popUpSalvar = document.getElementsByClassName("popUpSalvar")[0];
            if (popUpSalvar) {
                popUpSalvar.addEventListener('close', () => window.location.reload(), { once: true });
                // garante que o popUp apareça
                abrirPopUp('popUpSalvar');
            } else {
                window.location.reload();
            }
        } else {
            abrirPopUp("popUpErro");
        }
    })
    .catch(err => {
        console.error(err);
        abrirPopUp("popUpErro");
    })
});

function ajustarCamposDeTamanho(data){
    const res = [];
    const tamanhoParts = data.tamanho ? data.tamanho.split(" ") : ["", ""];
    const valorTamanho = tamanhoParts.slice(0, -1).join(" ");
    const tipoTamanho = tamanhoParts.slice(-1);

    res.push(valorTamanho);
    res.push(tipoTamanho[0]);

    return res;
}

function montarUrlImagem(img) {
    if (!img || img === "null") return null;
    return "http://localhost/projeto-integrador-et.com/" + img;
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

function mudarFgPromo(chkPromo){
    const inputPromo = chkPromo.form.querySelector('input[name="precoPromocional"]');
    if (chkPromo.checked) {
        inputPromo.disabled = false;
    } else {
        inputPromo.disabled = true; 
    }
}