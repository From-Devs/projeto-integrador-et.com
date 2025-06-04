/////// Função para exibir os cards dos produtos a caminho
fetch("/projeto-integrador-et.com/et_pontocom/public/ProdutosMP.json")
.then(response => response.json())
.then(data => {
   const container = document.getElementById('produtosCaminho');

    data.produtos.forEach(produto => {
       const card = document.createElement('div');
       card.classList.add("card-produtoMP");

       card.innerHTML = `
           <span class="data-compra">Data de compra ${produto.dataCompra}</span>
           <div class="cardcoloridoCam">
               <div class="linhaverticalcard"></div>
               <div class="card-info" style='background: ${produto.corFundo}'>
                    <div class="card-imagem">
                        <img src= "${produto.imagem}" alt="${produto.nome}">
                    </div>
                    <div class="info-caminho">
                        <div class="informacoes-card">
                            <span class="titulo">${produto.nome} ${produto.marca} ${produto.tamanho}</span>
                            <span class="titulo">${produto.categoria}</span>
                        </div>
                        <button class="verMais" style="font-size: 13px;">Ver Mais</button>
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
                    <span class="card-titulo">Descrição</span>
                    <div class="card-linhasuperior"></div>
                    <img class="cardMini-imagem" src="${p.imagem}" height="130px">
                    <div class="card-linhainferior"></div>
                    <div class="detalhes-info">
                        <span class="detalhes-titulo">${p.marca} ${p.nome}</span>
                        <span class="detalhes-categoria">Categoria: ${p.categoria}</span>
                        <span class="detalhes-preco">Preço: ${p.preco}</span>
                    </div>
                    <button class="detalhes-botao">Comprar Novamente</button>
                </div
            `;

            totalCompra += parseFloat(p.preco);
            popupProdutos.appendChild(miniCard);
        });

        document.getElementById("popupMP-DataCompra").innerText = "Data da compra: " + produto.dataCompra;
        document.getElementById("popupMP-Total").innerText = "Total: R$" +  totalCompra;

        //mostrar popup
        document.getElementById("popupMP").showModal();
       });
   });

   //Fechar popup
   document.querySelector('.icone-fechar').addEventListener('click', () => {
    document.getElementById('popupMP').closest();
   });
 })
.catch(error => {
   console.log("Erro ao carregar produto:", error);
});


