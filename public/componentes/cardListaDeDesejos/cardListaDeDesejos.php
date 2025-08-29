<?php  
    function createCardListaDeDesejos( $id_produto,$imagemProd = "", $preco = 00.00, $marca = "", $nome = "", $dataAdicionado = "", $corprincipal = "#919191", $corhexdegrade1 = "#919191", $corhexdegrade2 = "#919191", $corhexdegrade3 = "#919191"){
        return "
            <div class='cardDesejos' data-id='$id_produto'>
                <div class='checkboxes'>
                    <input type='checkbox' class='cardCheckbox' data-id='$id_produto'>
                </div>
                <div class='cardColorido'  style='background: linear-gradient(to right, $corprincipal, $corhexdegrade1, $corhexdegrade2, $corhexdegrade3,#FFFFFF);'>
                    <div class='cardImg'>
                        <img src='/projeto-integrador-et.com/public/imagens/produtos/$imagemProd/fotoSemFundo.png' alt='$nome'>
                    </div>
                    <span class='cardPreco'>R$ ".number_format($preco, 2, ',', '.')."</span>
                    <span class='cardInfo'>$nome $marca</span>
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
        ";
    }

?>