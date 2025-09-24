<?php  
function createCardListaDeDesejos( 
    $id_produto,
    $imagemProd, 
    $preco = 0.00, 
    $marca = "", 
    $nome = "", 
    $dataAdicionado = "", 
    $corprincipal = "#919191", 
    $corhexdegrade1 = "#919191", 
    $corhexdegrade2 = "#919191", 
    $precoPromo = null
){
    // Preço com ou sem promoção
    if (!empty($precoPromo) && $precoPromo < $preco){
        $precoCarrinho = "
            <span class='precoAntigo'>R$ ".number_format($preco, 2, ',', '.')."</span>
            <span class='precoNovo'>R$ ".number_format($precoPromo, 2, ',', '.')."</span>
        ";
    } else {
        $precoCarrinho = "
            <span class='cardPreco'>R$ ".number_format($preco, 2, ',', '.')."</span>
        ";
    }

    // Caminho da imagem: usa diretamente a pasta 'produto'
    $imagemPath = !empty($imagemProd) ? "/projeto-integrador-et.com/public/uploads/{$imagemProd}" : "/projeto-integrador-et.com/public/imagens/produto/default.png";


    return "
        <div class='cardDesejos card' data-id='{$id_produto}'>
            <div class='checkboxes'>
                <input type='checkbox' class='cardCheckbox' data-id='{$id_produto}'>
            </div>
            <div class='cardColorido' style='background: linear-gradient(to right, {$corprincipal}, {$corhexdegrade1}, {$corhexdegrade2}, #FFFFFF 85%);'>
                <div class='cardImg'>
                    <img src='{$imagemPath}' alt='".htmlspecialchars($nome, ENT_QUOTES)."'>
                </div>
                <div class='cardConteudo'>
                    <div class='precoinfo'>
                        <span class='cardPrecoArea'>
                            {$precoCarrinho}
                        </span>
                        <span class='cardInfo'>".htmlspecialchars($nome)." ".htmlspecialchars($marca)."</span>
                    </div>
                    <div class='areaFinal'>
                        <span class='cardDate'>Adicionado ".(!empty($dataAdicionado) ? date("d/m/Y", strtotime($dataAdicionado)) : "")."</span>
                        <div class='buttonsListaDesejos'>
                            <button class='buttonCarrinho icon-carrinho' data-id='{$id_produto}'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </button>
                            <button class='buttonLixeira icon-lixeira' data-id='{$id_produto}'>
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    ";
}
?>
