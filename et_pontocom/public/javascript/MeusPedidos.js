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
                        <span class="verMais">Ver Mais</span>
                    </div>
                    <div class="popupMPcaminho>+</div>
               </div>
           </div>
       `;
       container.appendChild(card);
   });
 })
.catch(error => {
   console.log("Erro ao carregar produto:", error);
});


