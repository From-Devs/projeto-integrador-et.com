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

    Object.entries(produtosPorData).forEach(([dataCompra, produtos]) => {
        const produto = produtos[0]; // pegar qualquer produto dessa data para exibir no card

        const card = document.createElement('div');
        card.classList.add("cards-produtoCaminho");

        card.innerHTML = `
            <span class="data-compra">Data de compra ${dataCompra}</span>
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

        /////////// Abrir pop-up ao clicar em "Ver Mais"
        const verMaisBtn = card.querySelector(".verMais");

        verMaisBtn.addEventListener("click", () => {
            const popupProdutos = document.getElementById("popupMP-Produtos");
            popupProdutos.innerHTML = ""; // limpar popup anterior

            let totalCompra = 0;

            produtos.forEach(p => {
                const miniCard = document.createElement("div");
                miniCard.classList.add("cardMini");
                const precoTotal = p.preco * p.quantidade;

                if(p.quantidade == 1){
                    miniCard.innerHTML = `
                        <div class="card-recolhido">
                            <span class="cardMini-Quantidade">${p.quantidade}x</span>
                            <div class="cardMini-conteudo">
                                <img class="cardMini-imagem" src="${p.imagem}" height="100px">
                                <div class="cardMini-infos">
                                    <span class="cardMini-Titulo">${p.marca} ${p.nome}</span>
                                    
                                    <div class="preco-total">
                                        <span class="cardMini-PrecoTotal">R$${parseFloat(precoTotal).toFixed(2)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-expandido">
                            <span class="card-titulo">DESCRIÇÃO</span>
                            <div class="card-linhasuperior"></div>
                            <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                            <div class="card-linhainferior"></div>
                            <div class="detalhes-info">
                                <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                                <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                                <span class="detalhes-preco" style="margin-bottom: 10px; font-size:12px; font-weight:500;">Preço: R$${p.preco.toFixed(2)}</span>
                            </div>
                            <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto.php" class="detalhes-botao">Comprar Novamente</a>
                        </div>
                    `;
                } else if(p.quantidade != 1){
                    miniCard.innerHTML = `
                        <div class="card-recolhido">
                            <span class="cardMini-Quantidade">${p.quantidade}x</span>
                            <div class="cardMini-conteudo">
                                <img class="cardMini-imagem" src="${p.imagem}" height="100px">
                                <div class="cardMini-infos">
                                    <span class="cardMini-Titulo">${p.marca} ${p.nome}</span>
                                    
                                    <div class="preco-total">
                                        <span class="cardMini-PrecoTotal">R$${parseFloat(precoTotal).toFixed(2)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-expandido">
                            <span class="card-titulo">DESCRIÇÃO</span>
                            <div class="card-linhasuperior"></div>
                            <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                            <div class="card-linhainferior"></div>
                            <div class="detalhes-info">
                                <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                                <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                                <span class="detalhes-preco" style="margin-bottom: 0px; font-size: 12px;">Preço Unitário: R$${p.preco.toFixed(2)}</span>
                                <span class="detalhes-quantidade">Quantidade: ${p.quantidade} produtos</span>
                                <span class="detalhes-precoTotal">Preço Total: R$${(precoTotal).toFixed(2)}</span>
                            </div>
                            <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto.php" class="detalhes-botao">Comprar Novamente</a>
                        </div>
                    `;
                }

                totalCompra += parseFloat(precoTotal);
                popupProdutos.appendChild(miniCard);
            });

            document.getElementById("popupMP-DataCompra").innerText = "Data da compra: " + dataCompra;
            document.getElementById("popupMP-Total").innerText = "Total: R$" + totalCompra.toFixed(2);

            document.getElementById("popupMP").showModal();
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

    });

                    ///Produtos entregues
    const container2 = document.getElementById('produtosEntregues');
    const produtosPorData2 = {};

    data.produtos.forEach(produto2 => {
        if (!produtosPorData2[produto2.dataEntrega]) {
            produtosPorData2[produto2.dataEntrega] = [];
        }
        produtosPorData2[produto2.dataEntrega].push(produto2);
    });


    Object.entries(produtosPorData2).forEach(([dataEntrega, produtos]) => {
        const produto2 = produtos[0];

        const card2 = document.createElement('div');
        card2.classList.add('cardProduto-entregue');

        card2.innerHTML = `
        
        `;
    });



});


