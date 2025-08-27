<?php
// app/components/CardPedido.php
require_once __DIR__ . '/CardProduto.php';

function renderCardPedido($pedido) {
    $data = date('d/m/Y', strtotime($pedido['dataPedido']));
    $total = number_format((float)$pedido['total'], 2, ',', '.');
    ?>
    <div class="produtoMP">
        <span class="dataCompraMP">Data de compra: <?php echo $data; ?></span>
        <?php foreach ($pedido['itens'] as $item): ?>
            <div class="produtoCardMP">
                <img class="imagemProdutoMP" src="<?php echo $item['imagem']; ?>" alt="<?php echo $item['nome']; ?>">
                <div class="infoProdutoMP">
                    <span class="nomeProdutoMP"><?php echo $item['nome']; ?></span>
                    <span class="descricaoProdutoMP"><?php echo $item['descricaoBreve']; ?></span>
                    <span class="qtdProdutoMP">Qtd: <?php echo $item['qntProduto']; ?></span>
                    <span class="precoProdutoMP">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></span>
                    <span class="subtotalProdutoMP">Subtotal: R$ <?php echo number_format($item['subtotal'], 2, ',', '.'); ?></span>
                    <a href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=<?php echo $item['id_produto']; ?>" class="verMaisMP">Ver Mais</a>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="pedido-total">
            <strong>Total do pedido:</strong> R$ <?php echo $total; ?>
        </div>
    </div>
    <?php
}
