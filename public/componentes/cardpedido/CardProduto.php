<?php
// app/components/CardProduto.php
function renderCardProduto($produto, $opts = []) {
    $opts = array_merge([
        'mostrarBotaoDetalhes' => true,
        'rotaDetalhes'         => 'detalhesDoProduto.php',
        'mostrarQuantidade'    => false,
        'badge'                => null, // ex.: 'Aguardando pagamento'
    ], $opts);

    $preco = number_format((float)$produto['preco'], 2, ',', '.');
    $qnt   = isset($produto['qntProduto']) ? (int)$produto['qntProduto'] : 1;
    ?>
    <div class="card" style="width: 18rem; margin:10px; display:inline-block;">
        <img src="<?php echo htmlspecialchars($produto['imagem']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($produto['nome']); ?>">
        <div class="card-body">
            <?php if ($opts['badge']): ?>
                <span style="font-size:12px;padding:3px 8px;border-radius:12px;border:1px solid #ddd;">
                    <?php echo htmlspecialchars($opts['badge']); ?>
                </span>
            <?php endif; ?>
            <h5 class="card-title" style="margin-top:8px;"><?php echo htmlspecialchars($produto['nome']); ?></h5>
            <?php if (!empty($produto['descricaoBreve'])): ?>
                <p class="card-text"><?php echo htmlspecialchars($produto['descricaoBrere'] ?? $produto['descricaoBreve']); ?></p>
            <?php endif; ?>
            <p><strong>Preço:</strong> R$ <?php echo $preco; ?></p>
            <?php if ($opts['mostrarQuantidade']): ?>
                <p><strong>Qtd:</strong> <?php echo $qnt; ?></p>
                <p><strong>Subtotal:</strong> R$ <?php echo number_format($qnt * (float)$produto['preco'], 2, ',', '.'); ?></p>
            <?php endif; ?>
            <?php if ($opts['mostrarBotaoDetalhes'] && !empty($produto['id_produto'])): ?>
                <a href="<?php echo $opts['rotaDetalhes']; ?>?id=<?php echo (int)$produto['id_produto']; ?>" class="btn btn-primary">Detalhes</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
