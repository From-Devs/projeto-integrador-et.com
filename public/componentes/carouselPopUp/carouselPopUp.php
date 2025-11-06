<?php
function createCarouselPopUp($carousels) {
    $html = '<div class="detalheProdutoCarouselWrapper">';
    
    foreach ($carousels as $index => $cs) {
        $nome = htmlspecialchars($cs['nome'] ?? 'Nome Indefinido');
        $marca = htmlspecialchars($cs['marca'] ?? 'Marca Indefinida');
        $preco = number_format($cs['precoPromo'] ?? $cs['preco'] ?? 0.00, 2, ',', '.');
        $id = (int)($cs['id_produto'] ?? 0);

        // Cores do carrossel (agora pegando até 3 degradês)
        $corPrincipal = htmlspecialchars($cs['corEspecial'] ?? '');
        $corDegrade1  = htmlspecialchars($cs['hexDegrade1'] ?? '');
        $corDegrade2  = htmlspecialchars($cs['hexDegrade2'] ?? '');
        $corDegrade3  = htmlspecialchars($cs['hexDegrade3'] ?? '');

        $active_class = ($index === 0) ? ' active-detail' : '';

        $html .= '
        <div class="detalheProdutoCarousel' . $active_class . '"
             data-product-id="' . $id . '"
             data-cor-principal="' . $corPrincipal . '"
             data-cor-degrade1="' . $corDegrade1 . '"
             data-cor-degrade2="' . $corDegrade2 . '"
             data-cor-degrade3="' . $corDegrade3 . '">
            
            <div class="CarouselProdutoText">
                <div class="carouselProdutoName">
                    <p class="carouselProdutoTitulo">' . $nome . '</p>
                    <p class="carouselProdutoMarca">' . $marca . '</p>
                </div>
                <div class="carouselProdutoBottom">
                    <p class="carouselProdutoPreco">R$ ' . $preco . '</p>
                    <a class="carouselProdutoMaisDetalhes" href="/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=' . $id . '">
                        CLIQUE PARA VER MAIS DETALHES
                    </a>
                </div>
            </div>
            <div class="frameImagemCarousel cor-item-' . $index . '"></div>
        </div>';
    }
    
    $html .= '</div>';
    return $html;
}
?>