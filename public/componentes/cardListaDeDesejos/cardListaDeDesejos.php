<?php  
function createCardListaDeDesejos( 
    $id_produto,
    $imagemProd, 
    $preco = 0.00, 
    $marca = "", 
    $nome = "", 
    $tamanho = null,
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

    if (!empty($tamanho)){
        $tamanhoCard = "– $tamanho";
    }
    else{
        $tamanhoCard = "";
    }

    // Caminho da imagem: usa diretamente a pasta 'produto'
    $imagemPath = !empty($imagemProd) ? "/projeto-integrador-et.com/{$imagemProd}" : "/projeto-integrador-et.com/public/imagens/produto/default.png";

    //Botões do pop-up
    
    $btnExcluir = botaoPersonalizadoOnClick('Sim','btn-green','enviarFormulario("removerFavorito", [window.produtoParaExcluir]); fecharPopUp("removerLista")','85px','40px','18px');
    $btnCancelar = botaoPersonalizadoOnClick('Não','btn-red','fecharPopUp("removerLista")', '85px', '40px', '18px');

    return "
        <div class='cardDesejos card' data-id='{$id_produto}'>
            <div class='checkboxes'>
                <input type='checkbox' class='cardCheckbox' data-id='{$id_produto}'>
            </div>
            <div class='cardColorido' style='background: linear-gradient(to right, {$corprincipal}, {$corhexdegrade1}, {$corhexdegrade2}, #FFFFFF 85%);'>
                <div class='cardImg' id='atalhoMaisDetalhes'>
                    <img src='{$imagemPath}' alt='".htmlspecialchars($nome, ENT_QUOTES)."'>
                </div>
                <div class='cardConteudo'>
                    <div class='precoinfo'>
                        <span class='cardPrecoArea'>
                            {$precoCarrinho}
                        </span>
                        <span class='cardInfo'>".htmlspecialchars($nome)." ".htmlspecialchars($marca)." ".htmlspecialchars($tamanhoCard)."</span>
                    </div>
                    <div class='areaFinal'>
                        <span class='cardDate'>Adicionado ".(!empty($dataAdicionado) ? date("d/m/Y", strtotime($dataAdicionado)) : "")."</span>
                        <div class='buttonsListaDesejos'>
                            <button class='buttonCarrinho icon-carrinho' data-id='{$id_produto}'>
                                <i class='fa-solid fa-cart-shopping'></i>
                            </button>
                            <button class='buttonLixeira icon-lixeira' data-id='{$id_produto}' data-nome='{$nome}'>
                                <i class='fa-solid fa-trash-can'></i>
                                
                            </button>
                            "   . PopUpConfirmar('removerLista','Deseja eliminar "<span id="nomeProdutoSelecionado">este produto</span>" da sua lista de desejos?',$btnExcluir,$btnCancelar,'500px','white','black') . " 
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    ";
}
?>
