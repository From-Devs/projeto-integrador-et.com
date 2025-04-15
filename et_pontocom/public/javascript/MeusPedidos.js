/////// Função para exibir os cards dos produtos a caminho
fetch("")
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
               <div class="card-info">
                   <img src= "${produto.imagem}" alt="${produto.nome}">
                   <div class="info-caminho">
                       <span class="titulo">${produto.marca} ${produto.nome}</span>
                       <span class="verMais">Mais produtos</span>
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
