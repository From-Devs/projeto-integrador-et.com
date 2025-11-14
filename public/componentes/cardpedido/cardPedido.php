<?php
function renderCardPedido($pedido, $tipo = "Andamento") {
    $dataCompra = !empty($pedido['dataPedido'])
        ? date('d/m/Y', strtotime($pedido['dataPedido']))
        : '';
    $dataEntrega = !empty($pedido['dataEntrega'])
        ? date('d/m/Y', strtotime($pedido['dataEntrega']))
        : '';

    // Define classes externas
    $classeCard = $tipo === 'Concluído'
        ? 'cardProduto-finalizado produtoMP'
        : 'cards-produtoAndamento produtoMP';

    // Pega o primeiro item apenas para mostrar no card principal
    $itemPrincipal = $pedido['itens'][0] ?? null;
    if (!$itemPrincipal) return;

    $imagemProduto = !empty($itemPrincipal['imagem'])
        ? $itemPrincipal['imagem']
        : 'imagem-padrao.jpg';
    $descricao = $itemPrincipal['descricaoBreve'] ?? $itemPrincipal['categoria'] ?? '';
    $subtotal = $itemPrincipal['preco'] * ($itemPrincipal['quantidade'] ?? 1);
?>
    <div class="<?= $classeCard; ?>"
         data-itens='<?= json_encode($pedido["itens"], JSON_HEX_APOS | JSON_HEX_QUOT); ?>'
         data-id="<?= $pedido['id_pedido']; ?>"
         data-tipo-status="<?= htmlspecialchars($pedido['tipoStatus']);?>"
         data-data-pedido="<?= $dataCompra;?>"
         data-data-entrega="<?= $dataEntrega;?>"
         data-total="<?= $pedido['precoTotal'] ?? 0; ?>"
         style="position:relative; cursor:pointer;">

        <?php if($tipo !== 'Concluído'): ?>
        <!-- Card em andamento -->
        <span class="data-compra"><?= $dataCompra; ?></span>
        <div class="cardcoloridoCam" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info">
                <div class="card-imagem">
                    <img src="/projeto-integrador-et.com/<?= $imagemProduto; ?>"
                         alt="<?= htmlspecialchars($itemPrincipal['nome']); ?>">
                </div>

                <div class="infoProdutoMP info-caminho">
                    <span class="nomeProdutoMP"><?= htmlspecialchars($itemPrincipal['nome']); ?></span>
                    <span class="descricaoProdutoMP"><?= htmlspecialchars($descricao); ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($itemPrincipal['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP">Quant: <?= $itemPrincipal['quantidade'] ?? 1; ?></span>
                    <button class="verMais">Ver Mais</button>
                </div>
            </div>
        </div>

        <?php else: ?>
        <!-- Card finalizado -->
        <span class="data-entrega"><?= $dataEntrega; ?></span>
        <span class="statusProdutoMP">Concluído</span>
        <div class="cardcoloridoFin" style="border-radius:25px; overflow:hidden;">
            <div class="card-info2">
                <div class="card-imagem2">
                    <img src="/projeto-integrador-et.com/<?= $imagemProduto; ?>"
                         alt="<?= htmlspecialchars($itemPrincipal['nome']); ?>">
                </div>

                <div class="infoProdutoMP info-finalizado">
                    <span class="nomeProdutoMP"><?= htmlspecialchars($itemPrincipal['nome']); ?></span>
                    <span class="descricaoProdutoMP"><?= htmlspecialchars($descricao); ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($itemPrincipal['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP">Quant: <?= $itemPrincipal['quantidade'] ?? 1; ?></span>
                    <button class="maisInfo">Mais Info.</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php
}
?>
