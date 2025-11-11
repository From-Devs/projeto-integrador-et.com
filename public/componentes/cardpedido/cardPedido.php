<?php
function renderCardPedido($pedido, $tipo = "Andamento") {
    $dataCompra = !empty($pedido['dataPedido'])
    ? date('d/m/Y', strtotime($pedido['dataPedido']))
    : '';
    $dataEntrega = !empty($pedido['dataEntrega']) 
    ? date('d/m/Y', strtotime($pedido['dataEntrega'])) 
    : '';
 
    // Define classes externas que o JS espera
    $classeCard = $tipo === 'Concluído'
        ? 'cardProduto-finalizado produtoMP'
        : 'cards-produtoAndamento produtoMP';
 
    foreach ($pedido['itens'] as $item):
        $imagemProduto = !empty($item['imagem'])
            ? $item['imagem']
            : 'imagem-padrao.jpg';
        $descricao = $item['descricaoBreve'] ?? $item['categoria'] ?? '';
        $subtotal = $item['preco'] * ($item['quantidade'] ?? 1);
?>
    <div class="<?= $classeCard; ?>"
         data-id="<?= $item['id_produto']; ?>"
         data-tipo-status="<?= htmlspecialchars($pedido['tipoStatus']);?>"
         data-data-pedido="<?= $dataCompra;?>"
         data-data-entrega="<?= $dataEntrega;?>"
         data-pedido-id="<?= $pedido['id_pedido']; ?>"
         data-nome="<?= htmlspecialchars($item['nome']); ?>"
         data-marca="<?= htmlspecialchars($item['marca'] ?? ''); ?>"
         data-quantidade="<?= $item['quantidade'] ?? 1; ?>"
         data-preco="<?= $item['preco']; ?>"
         data-descricao="<?= htmlspecialchars($descricao); ?>"
         data-imagem="/projeto-integrador-et.com/<?= $imagemProduto; ?>"
         data-categoria="<?= htmlspecialchars($item['categoria'] ?? ''); ?>"
         data-rua="<?= htmlspecialchars($pedido['endereco_rua'] ?? ''); ?>"
         data-numero="<?= htmlspecialchars($pedido['endereco_numero'] ?? ''); ?>"
         data-bairro="<?= htmlspecialchars($pedido['endereco_bairro'] ?? ''); ?>"
         data-cidade="<?= htmlspecialchars($pedido['endereco_cidade'] ?? ''); ?>"
         data-estado="<?= htmlspecialchars($pedido['endereco_estado'] ?? ''); ?>"
         data-horario="<?= htmlspecialchars($pedido['horarioEntrega'] ?? ''); ?>"
         style="position:relative; cursor:pointer;">
 
       
 
        <?php if($tipo !== 'Concluído'): ?>
        <!-- Card em andamento -->
        <span class="data-compra"><?= $dataCompra; ?></span>
        <div class="cardcoloridoCam" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info">
                <div class="card-imagem">
                    <img src="/projeto-integrador-et.com/<?= $imagemProduto; ?>"
                         alt="<?= $item['nome']; ?>"
                         style="">
                </div>
 
                <div class="infoProdutoMP info-caminho">
                    <span class="nomeProdutoMP"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP"><?= $descricao; ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP">Quant: <?= $item['quantidade'] ?? 1; ?></span>
                    <!--<span class="subtotalProdutoMP" style="font-size:18px; font-weight:500; color:#222;">Subtotal: R$<?= number_format($subtotal, 2, ',', '.'); ?></span>-->
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
                         alt="<?= $item['nome']; ?>">
                </div>
 
                <div class="infoProdutoMP info-finalizado">
                    <span class="nomeProdutoMP"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP"><?= $descricao; ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP">Quant: <?= $item['quantidade'] ?? 1; ?></span>
                    <!--<span class="subtotalProdutoMP">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>-->
                    <button class="maisInfo">Mais Info.</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php
    endforeach;
}
?>
 
 