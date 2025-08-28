<?php
function renderCardPedido($pedido) {
    $dataCompra = date('d/m/Y', strtotime($pedido['dataPedido']));

    foreach ($pedido['itens'] as $item): ?>
    
        <div class="cards-produtoAndamento produtoMP" data-id="<?php echo $item['id_produto']; ?>" style="position:relative;">
            <span class="data-compra">Data de compra: <?php echo $dataCompra; ?></span>

            <div class="cardcoloridoCam" style="border-radius:25px; overflow:hidden; position:relative;">
                <div class="card-info" style="
                    display:flex; 
                    flex-direction:row; 
                    align-items:center; 
                    justify-content:flex-start;
                    padding:20px 20px 20px 30px;
                    border-radius:25px;
                    box-shadow:0 4px 10px rgba(0,0,0,0.1);
                ">
                    <div class="card-imagem" style="flex:0 0 120px; text-align:center;">
                        <img src="/projeto-integrador-et.com/public/imagens/produto/<?php echo $item['imagem']; ?>" 
                             alt="<?php echo $item['nome']; ?>" 
                             style="height:120px; width:auto; object-fit:contain;">
                    </div>

                    <div class="info-caminho" style="flex:1; padding-left:20px; display:flex; flex-direction:column; gap:8px;">
                        <span style="font-size:20px; font-weight:700; color:#222;">
                            <?php echo $item['nome']; ?>
                        </span>
                        <span style="font-size:16px; color:#555;">
                            <?php echo $item['descricaoBreve'] ?? $item['categoria'] ?? ''; ?>
                        </span>
                        <a href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=<?php echo $item['id_produto']; ?>" 
                           class="verMais" 
                           style="margin-top:10px; font-size:15px; font-weight:500; color:#000; text-decoration:underline;">
                           Ver Mais
                        </a>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach;
}
?>
