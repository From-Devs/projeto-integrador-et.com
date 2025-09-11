<?php  
    function createCardListaDeDesejos( $id_produto,$imagemProd = "", $preco = 00.00, $marca = "", $nome = "", $dataAdicionado = "", $corprincipal = "#919191", $corhexdegrade1 = "#919191", $corhexdegrade2 = "#919191", $precoPromo=null){

        if (!empty($precoPromo) && $precoPromo < $preco){
            $precoCarrinho = "
            <span class='precoAntigo'>R$ ".number_format($preco, 2, ',', '.')."</span>
            <span class='precoNovo'>R$ ".number_format($precoPromo, 2, ',', '.')."</span>
            ";
        } else{
            $precoCarrinho = "
                <span class='cardPreco'>R$ ".number_format($preco, 2, ',', '.')."</span>
            ";
        }
        return "
            <div class='cardDesejos' data-id='$id_produto'>
                <div class='checkboxes'>
                    <input type='checkbox' class='cardCheckbox' data-id='$id_produto'>
                </div>
                <div class='cardColorido'  style='background: linear-gradient(to right, $corprincipal, $corhexdegrade1, $corhexdegrade2,#FFFFFF);'>
                    <div class='cardImg'>
                        <img src='/projeto-integrador-et.com/public/imagens/produtos/$imagemProd/fotoSemFundo.png' alt='$nome'>
                    </div>
                    <div class='cardConteudo'>
                        <div class='precoinfo'>
                            <span class='cardPrecoArea'>
                                {$precoCarrinho}
                            </span>
                            <span class='cardInfo'>$nome $marca</span>
                        </div>
                        <div class='areaFinal'>
                            <span class='cardDate'>Adicionado $dataAdicionado</span>
                            <div class='buttonsListaDesejos'>
                                <button class='buttonCarrinho' id='buttonCarrinho' onclick='adicionarAoCarrinho($id_produto)'>
                                    <i class='fa-solid fa-cart-shopping'></i>
                                </button>
                                <button class='buttonLixeira' id='buttonLixeira' onclick='removerDosFavoritos($id_produto)'>
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