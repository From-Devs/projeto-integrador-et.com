/////// Função para exibir os cards dos produtos a caminho
fetch("/projeto-integrador-et.com/et_pontocom/public/ProdutosMP.json")
.then(response => response.json())
.then(data => {     
                            //Produtos a caminho

    const produtosAtivos = data.produtos.filter(prod => 
        prod.status === "Preparando" || prod.status === "A Caminho"   //Filtra por status
    );

    const produtosPorData = {};                                 //Seleciona por data
    produtosAtivos.forEach(produto => {
        if (!produtosPorData[produto.dataCompra]) {
            produtosPorData[produto.dataCompra] = [];
        }
        produtosPorData[produto.dataCompra].push(produto);
    });

    const container = document.getElementById('produtosAndamento');


    Object.entries(produtosPorData).forEach(([dataCompra, produtos]) => {
        const produto = produtos[0]; // pegar qualquer produto dessa data para exibir no card

        const card = document.createElement('div');
        card.classList.add("cards-produtoAndamento");

        card.innerHTML = `
            <span class="data-compra">Data de compra: ${dataCompra}</span>
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
                            <div class="cardMini-Superior"> 
                                <span class="cardMini-Status">${p.status}</span>
                                <span class="cardMini-Quantidade">${p.quantidade}x</span>
                            </div>
                            <div class="cardMini-conteudo">
                                <img class="cardMini-imagem" src="${p.imagem}" height="100px">
                                <div class="cardMini-infos">
                                    <span class="cardMini-Titulo">${p.marca} ${p.nome}</span>
                                    
                                    <div class="preco-total">
                                        <span class="cardMini-PrecoTotal">R$ ${parseFloat(precoTotal).toFixed(2)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-expandido" style="height: 390px; align-items: center;">
                            <span class="card-titulo">DESCRIÇÃO</span>
                            <div class="card-linhasuperior" style="margin-top: 10px;"></div>
                            <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                            <div class="card-linhainferior" style="margin-bottom: 15px;"></div>
                            <div class="detalhes-info" style="gap: 10px;">
                                <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                                <span class="detalhes-status">Status: <span style="color: red;">${p.status}</span></span>
                                <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                                <span class="detalhes-preco" style="margin-bottom: 20px; font-size:12px; font-weight:500;">Preço: R$ ${p.preco.toFixed(2)}</span>
                            </div>
                            <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto.php" class="detalhes-botao">Comprar Novamente</a>
                        </div>
                    `;
                } else if(p.quantidade >= 1){
                    miniCard.innerHTML = `
                        <div class="card-recolhido">
                            <div class="cardMini-Superior"> 
                                <span class="cardMini-Status">${p.status}</span>
                                <span class="cardMini-Quantidade">${p.quantidade}x</span>
                            </div>
                            <div class="cardMini-conteudo">
                                <img class="cardMini-imagem" src="${p.imagem}" height="100px">
                                <div class="cardMini-infos">
                                    <span class="cardMini-Titulo">${p.marca} ${p.nome}</span>
                                    
                                    <div class="preco-total">
                                        <span class="cardMini-PrecoTotal">R$ ${parseFloat(precoTotal).toFixed(2)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-expandido" style="height: 420px;">
                            <span class="card-titulo">DESCRIÇÃO</span>
                            <div class="card-linhasuperior" style="margin-top: 5px;"></div>
                            <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                            <div class="card-linhainferior" style="margin-bottom: 10px;"></div>
                            <div class="detalhes-info" style="gap: 5px;">
                                <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                                <span class="detalhes-status">Status: <span style="color: red;">${p.status}</span></span>
                                <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                                <span class="detalhes-quantidade">Quantidade: ${p.quantidade} produtos</span>
                                <span class="detalhes-preco" style="margin-bottom: 0px; font-size: 12px;">Preço Unitário: R$ ${p.preco.toFixed(2)}</span>
                                <span class="detalhes-precoTotal" style="margin-bottom: 10px;">Preço Total: R$ ${(precoTotal).toFixed(2)}</span>
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

    const produtosFinalizados = data.produtos.filter(prod => 
        prod.status === "Concluído"                                   
    );

    const produtosPorData2 = {};  
    
    
    produtosFinalizados.forEach(produto2 => {
        if (!produtosPorData2[produto2.dataEntrega]) {
            produtosPorData2[produto2.dataEntrega] = [];
        }
        produtosPorData2[produto2.dataEntrega].push(produto2);
    });

    const container2 = document.getElementById('produtosFinalizados');
    

    Object.entries(produtosPorData2).forEach(([dataEntrega, produtos]) => {
        const produto2 = produtos[0];

        const card2 = document.createElement("div");
        card2.classList.add("cardProduto-finalizado");

        card2.innerHTML = `
            <div class="cardcoloridoFin">
                <div class="card-info2" style="background: linear-gradient(to right, ${produto2.corFundo1}, ${produto2.corFundo2}, ${produto2.corFundo3} 43%, ${produto2.corFundo4} 83%)">
                    <span class="data-entrega">Data de entrega: ${dataEntrega}</span>
                    <div class="cardcolestrutura">
                        <div class="card-imagem2">
                            <img src= "${produto2.imagem}" alt="${produto2.nome}">
                        </div>
                        <div class="info-finalizado">
                            <div class="informacoes-card">
                                <span class="titulo">${produto2.nome} ${produto2.marca} ${produto2.tamanho}</span>
                                <span class="titulo">${produto2.categoria}</span>
                            </div>
                            <button class="maisInfo" style="font-size: 13px; border: none;">Mais Informações</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        container2.appendChild(card2);

        //Abrir popup ao apertar no botão
        const maisInfoBtn = card2.querySelector(".maisInfo");

        maisInfoBtn.addEventListener("click", () => {
            const popupProdutosFi = document.getElementById("popupMP-ProdutosFi");
            popupProdutosFi.innerHTML = ""; 

            produtos.forEach(p => {
                const cardpopup = document.createElement("div");
                cardpopup.classList.add("cardpopup");
                const precoTotal2 = p.preco * p.quantidade;


                cardpopup.innerHTML = `
                    <div class="card-recolhido">
                        <div class="cardpopup-Superior"> 
                            <span class="cardpopup-Status">${p.status}</span>
                            <span class="cardpopup-Quantidade">${p.quantidade}x</span>
                        </div>
                        <div class="cardpopup-conteudo">
                            <img class="cardpopup-imagem" src="${p.imagem}" style="height:100px;">
                            <div class="cardpopup-infos">
                                <span class="cardpopup-Titulo">${p.marca} ${p.nome}</span>
                                <div class="preco-total">
                                    <span class="cardpopup-PrecoTotal">R$ ${parseFloat(precoTotal2).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-expandido" style="height: 560px; align-items: center;">
                        <span class="card-titulo">DETALHES DO PEDIDO</span>
                        <div class="detalhes-envio" style="gap: 5px;">
                            <span class="detalhes-status">Status: <span style="color: green;">${p.status}</span></span>
                            <span class="detalhes-dataCompra">Data de Compra: <span style="font-weight: 500;">${p.dataCompra}</span></span>
                            <span class="detalhes-dataEntrega">Data de Entrega: <span style="font-weight: 500;">${p.dataEntrega}</span></span>
                            <span class="detalhes-endereco">Foi entregue às ${p.horarioEntrega} no endereço <span style="font-weight: 500; ">${p.rua} ${p.numero}</span>, bairro ${p.bairro}. ${p.cidade}, ${p.estado}.</span>
                        </div>
                        <span class="card-titulo2" style="margin-top: 12px;">DESCRIÇÃO DO PRODUTO</span>
                        <div class="card-linhasuperior" style="margin-top: 6px;"></div>
                        <img class="cardpopup-imagem" src="${p.imagem}" height="120px">
                        <div class="card-linhainferior" style="margin-bottom: 10px;"></div>
                        <div class="detalhes-info" style="gap: 5px;">
                            <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                            <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                            <span class="detalhes-quantidade">Quantidade: ${p.quantidade} produtos</span>
                            <span class="detalhes-preco" style="margin-bottom: 0px; font-size: 12px;">Preço Unitário: R$ ${p.preco.toFixed(2)}</span>
                            <span class="detalhes-precoTotal" style="margin-bottom: 10px;">Preço Total: R$ ${(precoTotal2).toFixed(2)}</span>
                        </div>
                        <a class="comprarNvmtBtn" href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto.php">Comprar Novamente</a>
                    </div>
                
                `;

                popupProdutosFi.appendChild(cardpopup);
            });

            document.getElementById("popupMPFinalizado").showModal();

        });

    })

})


.catch(err => console.log("Erro ao carregar produtos:", err));


