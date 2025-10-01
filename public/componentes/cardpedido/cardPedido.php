<?php
function renderCardPedido($pedido, $tipo = 'Andamento') {
    $dataCompra = date('d/m/Y', strtotime($pedido['dataPedido']));

    // Definir classe do card dependendo do tipo
    $classeCard = $tipo === 'Finalizado' ? 'cardProduto-finalizado produtoMP' : 'cards-produtoAndamento produtoMP';

    foreach ($pedido['itens'] as $item): 
        $imagemProduto = !empty($item['imagem']) 
            ? $item['imagem'] 
            : 'imagem-padrao.jpg';
        $descricao = $item['descricaoBreve'] ?? $item['categoria'] ?? '';
        $subtotal = $item['preco'] * ($item['quantidade'] ?? 1);
    ?>

    <div class="<?= $classeCard; ?>" 
         data-id="<?= $item['id_produto']; ?>"
         data-nome="<?= htmlspecialchars($item['nome']); ?>"
         data-marca="<?= htmlspecialchars($item['marca'] ?? ''); ?>"
         data-quantidade="<?= $item['quantidade'] ?? 1; ?>"
         data-preco="<?= $item['preco']; ?>"
         data-descricao="<?= htmlspecialchars($descricao); ?>"
         data-imagem="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>"
         style="position:relative;">

        <?php if($tipo !== 'Finalizado'): ?>
        <span class="data-compra">Data de compra: <?= $dataCompra; ?></span>

        <div class="cardcoloridoCam" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info" style="
                width: 100%;
                height: 100%
                align-items:center; 
                justify-content:flex-start;
                padding: 0px 0px 0px 20px;
                border-radius:25px;
                box-shadow: inset 0px 0px 10px rgb(129, 129, 129);
            ">
                <div class="card-imagem" style="display: felx; 120px;">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>" 
                         alt="<?= $item['nome']; ?>" 
                         style="height:120px; width:auto; object-fit:contain;">
                </div>

                <div class="infoProdutoMP info-caminho" style="display: flex; flex-direction:column; gap:5px;">
                    <span class="nomeProdutoMP" style="font-size:20px; font-weight:600; color:#222;"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP" style="font-size:16px; color:#555;"><?= $descricao; ?></span>
                    <span class="precoProdutoMP" style="font-size:18px; font-weight:bold; color:#222;">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP" style="font-size:18px; font-weight:500; color:#222;">Quant: <?= $item['quantidade'] ?? 1; ?></span>
                    <!--<span class="subtotalProdutoMP" style="font-size:18px; font-weight:500; color:#222;">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>-->
                    <button class="verMais" style="font-size:18px; font-weight:bold; color:#222;">Ver Mais</button>
                </div>
                
            </div>
        </div>
        <?php else: ?>
        <span class="data-compra">Data de entrega: <?= $dataCompra; ?></span>

        <div class="cardcoloridoFin" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info2" style="
                width: 100%;
                height: 100%
                display:flex; 
                flex-direction:row; 
                align-items:center; 
                justify-content:flex-start;
                padding: 0px 0px 0px 20px;
                border-radius:25px;
                box-shadow:0 0px 10px rgba(0,0,0,0.1);
            ">
                <div class="card-imagem2" style="display: felx; 120px;">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>" 
                         alt="<?= $item['nome']; ?>" 
                         style="height:120px; width:auto; object-fit:contain;">
                </div>

                <div class="infoProdutoMP info-finalizado" style="display: flex; flex-direction:column; gap:5px;">
                    <span class="nomeProdutoMP" style="font-size:20px; font-weight:600; color:#222;"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP" style="font-size:16px; color:#555;"><?= $descricao; ?></span>
                    <span class="precoProdutoMP" style="font-size:18px; font-weight:bold; color:#222;">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP" style="font-size:18px; font-weight:500; color:#222;">Qtd: <?= $item['quantidade'] ?? 1; ?></span>
                    <!--<span class="subtotalProdutoMP">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>-->
                    <button style="background-color: white; border: none; width: 150px; height: auto; padding: 10px; border-radius: 10px">Mais Informações</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

<?php endforeach;
}
?>
