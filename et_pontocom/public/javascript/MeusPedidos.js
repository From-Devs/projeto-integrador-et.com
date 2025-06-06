/////// Função para exibir os cards dos produtos a caminho
fetch("/projeto-integrador-et.com/et_pontocom/public/ProdutosMP.json")
.then(response => response.json())
.then(data => {     
                            //Produtos a caminho
    const container = document.getElementById('produtosCaminho');

        const produtosPorData = {};

data.produtos.forEach(produto => {
    if (!produtosPorData[produto.dataCompra]) {
        produtosPorData[produto.dataCompra] = [];
    }
    produtosPorData[produto.dataCompra].push(produto);
});

// Criar um card por data de compra
Object.entries(produtosPorData).forEach(([dataCompra, produtos]) => {
    const produto = produtos[0];
        const card = document.createElement('div');
        card.classList.add("card-produtoMP");

        card.innerHTML = `
            <span class="data-compra">Data de compra ${produto.dataCompra}</span>
            <div class="cardcoloridoCam">
                <div class="linhaverticalcard"></div>
                <div class="card-info" style='background: linear-gradient(to right, ${produto.corFundo1}, ${produto.corFundo2}, ${produto.corFundo3} 43%, ${produto.corFundo4} 83%)'>
                        <div class="card-imagem">
                            <img src= "${produto.imagem}" alt="${produto.nome}">
                        </div>
                        <div class="info-caminho">
                            <div class="informacoes-card">
                                <span class="titulo">${produto.nome} ${produto.marca} ${produto.tamanho}</span>
                                <span class="titulo">${produto.categoria}</span>
                            </div>
                            <button class="verMais" style="font-size: 13px; border: none;">Ver Mais</button>
                        </div>
                </div>
            </div>
        `;
        container.appendChild(card);

        ///////////Abrir pop-up ao clicar em "Ver Mais"
        const verMaisBtn = card.querySelector(".verMais");

        verMaisBtn.addEventListener("click", () => {
            const produtosMesmoDia = data.produtos.filter(p => p.dataCompra === produto.dataCompra);
        
        

            const popupProdutos = document.getElementById("popupMP-Produtos");
            popupProdutos.innerHTML = ""     ////limpando produtos anteriores

            let totalCompra = 0;

            produtosMesmoDia.forEach(p => {
                const miniCard = document.createElement("div");
                miniCard.classList.add("cardMini");

                miniCard.innerHTML = `
                    <div class="card-recolhido">
                        <img class="cardMini-imagem" src="${p.imagem}" height="110px">
                        <div class="cardMini-infos">
                            <span class="cardMini-Titulo">${p.marca} ${p.nome}</span>
                            <span class="cardMini-Preco">R$${parseFloat(p.preco).toFixed(2)}</span>
                        </div>
                    </div>
                    <div class="card-expandido">
                        <span class="card-titulo">DESCRIÇÃ0</span>
                        <div class="card-linhasuperior"></div>
                        <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                        <div class="card-linhainferior"></div>
                        <div class="detalhes-info">
                            <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                            <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                            <span class="detalhes-preco">Preço: ${p.preco.toFixed(2)}</span>
                        </div>
                        <a class="detalhes-botao" href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Meu_Carrinho.php">Comprar Novamente</a>
                    </div
                `;

                totalCompra += parseFloat(p.preco);
                popupProdutos.appendChild(miniCard);
            });

            document.getElementById("popupMP-DataCompra").innerText = "Data da compra: " + produto.dataCompra;
            document.getElementById("popupMP-Total").innerText = "Total: R$" +  totalCompra.toFixed(2);

            //mostrar popup
            document.getElementById("popupMP").showModal();
        });
    });


                            //////Produtos entregues
    const container_2 = document.getElementById('produtosEntregues');
        data.produtos.forEach(produto => {
            const card = document.createElement('div');
            card.classList.add('cards-produtosEntregues');

            card.innerHTML = `

            `
        })


})
.catch(error => {
   console.log("Erro ao carregar produto:", error);
});


  




/////fechar popup
document.querySelectorAll(".icone-fechar").forEach(botao => {
    botao.addEventListener("click", () => {
        const dialog = botao.closest("dialog");
        if (dialog) {
            dialog.close();
        }
    });
});


