<?php
// Arquivo: /../../../public/componentes/carouselPopUp/carouselPopUp.php (ou similar)

/**
 * Cria o HTML de PopUp de detalhes para CADA item do carrossel.
 * Cada item terá a classe 'detalheProdutoCarousel' e precisará de uma forma 
 * de ser ativado/desativado pelo JS. 
 *
 * @param array $carousels Array de produtos com 'nome', 'marca', 'preco', 'img1', etc.
 * @return string O HTML contendo todos os painéis de detalhe.
 */
function createCarouselPopUp($carousels) {
    // CORREÇÃO ESSENCIAL: Inicie a variável $html fora do loop.
    $html = ''; 
    
    // Adiciona uma div wrapper para o JS manipular o conjunto
    $html .= '<div class="detalheProdutoCarouselWrapper">';
    
    foreach ($carousels as $index => $cs) {
        // Escapa para evitar bugs ou ataques
        $nome = htmlspecialchars($cs['nome'] ?? 'Nome Indefinido');
        $marca = htmlspecialchars($cs['marca'] ?? 'Marca Indefinida');
        
        // Define o preço, verificando 'precoPromo' primeiro
        $preco = number_format($cs['precoPromo'] ?? $cs['preco'] ?? 0.00, 2, ',', '.');
        $id    = (int)($cs['id_produto'] ?? 0);
        $corPrincipal = htmlspecialchars($cs['corPrincipal'] ?? '');
        $corDegrade1 = htmlspecialchars($cs['corDegrade1'] ?? '');

        // Adiciona um painel de detalhe para cada produto.
        // Adicionamos a classe 'active-detail' apenas ao primeiro item
        $active_class = ($index === 0) ? ' active-detail' : '';

        // Note o uso de DATA ATTRIBUTES para o JS ler a cor e ID.
        $html .= '
        <div class="detalheProdutoCarousel' . $active_class . '"
             data-product-id="' . $id . '"
             data-cor-principal="' . $corPrincipal . '"
             data-cor-degrade1="' . $corDegrade1 . '">
            
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