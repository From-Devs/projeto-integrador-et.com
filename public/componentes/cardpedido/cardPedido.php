<?php
function renderCardPedido($pedido, $tipo = 'Andamento') {
    $dataCompra = date('d/m/Y', strtotime($pedido['dataPedido']));
    $dataEntrega = !empty($pedido['dataEntrega']) ? date('d/m/Y', strtotime($pedido['dataEntrega'])) : '';

    // Define classes externas que o JS espera
    $classeCard = $tipo === 'Finalizado' 
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
         data-pedido-id="<?= $pedido['id_pedido']; ?>"
         data-nome="<?= htmlspecialchars($item['nome']); ?>"
         data-marca="<?= htmlspecialchars($item['marca'] ?? ''); ?>"
         data-quantidade="<?= $item['quantidade'] ?? 1; ?>"
         data-preco="<?= $item['preco']; ?>"
         data-descricao="<?= htmlspecialchars($descricao); ?>"
         data-imagem="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>"
         data-categoria="<?= htmlspecialchars($item['categoria'] ?? ''); ?>"
         data-rua="<?= htmlspecialchars($pedido['endereco_rua'] ?? ''); ?>"
         data-numero="<?= htmlspecialchars($pedido['endereco_numero'] ?? ''); ?>"
         data-bairro="<?= htmlspecialchars($pedido['endereco_bairro'] ?? ''); ?>"
         data-cidade="<?= htmlspecialchars($pedido['endereco_cidade'] ?? ''); ?>"
         data-estado="<?= htmlspecialchars($pedido['endereco_estado'] ?? ''); ?>"
         data-horario="<?= htmlspecialchars($pedido['horarioEntrega'] ?? ''); ?>"
         style="position:relative; cursor:pointer;">

        <span class="data-compra"><?= $dataCompra; ?></span>

        <?php if($tipo !== 'Finalizado'): ?>
        <!-- Card em andamento -->
        <div class="cardcoloridoCam" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info" style="display:flex; flex-direction:row; align-items:center; padding:20px 20px 20px 30px; border-radius:25px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                <div class="card-imagem" style="flex:0 0 120px; text-align:center;">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>" 
                         alt="<?= $item['nome']; ?>" 
                         style="height:120px; width:auto; object-fit:contain;">
                </div>

                <div class="infoProdutoMP info-caminho" style="flex:1; padding-left:20px; display:flex; flex-direction:column; gap:8px;">
                    <span class="nomeProdutoMP"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP"><?= $descricao; ?></span>
                    <span class="qtdProdutoMP">Qtd: <?= $item['quantidade'] ?? 1; ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="subtotalProdutoMP">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>
                    <button class="verMais">Ver Mais</button>
                </div>
            </div>
        </div>

        <?php else: ?>
        <!-- Card finalizado -->
        <span class="data-entrega"><?= $dataEntrega; ?></span>
        <span class="statusProdutoMP">Concluído</span>

        <div class="cardcoloridoFin" style="border-radius:25px; overflow:hidden; position:relative;">
            <div class="card-info2" style="display:flex; flex-direction:row; align-items:center; padding:20px 20px 20px 30px; border-radius:25px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
                <div class="card-imagem2" style="flex:0 0 120px; text-align:center;">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>" 
                         alt="<?= $item['nome']; ?>" 
                         style="height:120px; width:auto; object-fit:contain;">
                </div>

                <div class="infoProdutoMP info-finalizado" style="flex:1; padding-left:20px; display:flex; flex-direction:column; gap:8px;">
                    <span class="nomeProdutoMP"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP"><?= $descricao; ?></span>
                    <span class="qtdProdutoMP">Qtd: <?= $item['quantidade'] ?? 1; ?></span>
                    <span class="precoProdutoMP">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="subtotalProdutoMP">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>
                    <button class="maisInfo">Mais Informações</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php 
    endforeach;
}
?>
