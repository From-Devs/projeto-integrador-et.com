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
            <div class="card-info" style="
                display: grid;
                grid-template-columns: 160px auto;
                width: 100%;
                height: 100%
                align-items: center;
                padding: 0px 0px 0px 0px;
                border-radius:25px;
                box-shadow: inset 0px 0px 10px rgb(129, 129, 129);
            ">
                <div class="card-imagem" style="display: felx; justify-content: center;">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/<?= $imagemProduto; ?>"
                         alt="<?= $item['nome']; ?>"
                         style="height:120px; width:auto; object-fit:contain;">
                </div>
 
                <div class="infoProdutoMP info-caminho" style="display: flex; flex-direction:column; gap:5px; padding-right: 20px;">
                    <span class="nomeProdutoMP" style="font-size: 20px; font-weight:600; color:#222;"><?= $item['nome']; ?></span>
                    <span class="descricaoProdutoMP" style="font-size:16px; color:#555;"><?= $descricao; ?></span>
                    <span class="precoProdutoMP" style="font-size:18px; font-weight: bold; color:#222;">R$ <?= number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="qtdProdutoMP" style="font-size:18px; font-weight: 500; color:#222;">Quant: <?= $item['quantidade'] ?? 1; ?></span>
                    <!--<span class="subtotalProdutoMP" style="font-size:18px; font-weight:500; color:#222;">Subtotal: R$ <?= number_format($subtotal, 2, ',', '.'); ?></span>-->
                    <button class="verMais" style="font-size:18px; font-weight: 450; color:#222;">Ver Mais</button>
                </div>
               
            </div>
        </div>
 
        <?php else: ?>
        <!-- Card finalizado -->
        <span class="data-entrega" style=""><?= $dataEntrega; ?></span>
        <span class="statusProdutoMP">Concluído</span>
        <div class="cardcoloridoFin" style="border-radius:25px; overflow:hidden; position:relative; border: red solid;">
            <div class="card-info2" style="
                display: grid;
                grid-template-columns: 160px auto;
                width: 100%;
                height: 100%
                align-items: center;
                padding: 0px 0px 0px 0px;
                border-radius:25px;
                box-shadow: inset 0px 0px 10px rgb(129, 129, 129);
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
                    <button style="text-align: left;
                                border: none;
                                background-color: transparent;
                                text-decoration: underline;
                                cursor: pointer;
                                font-size:18px;
                                font-weight:bold;
                                color:#222;"
                    >Mais Informações</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php
    endforeach;
}
?>
 
 