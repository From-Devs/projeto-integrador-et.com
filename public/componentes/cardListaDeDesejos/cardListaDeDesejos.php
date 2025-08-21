<?php  

    function createCardListaDeDesejos( $id_produto,$imagemProd = "", $preco = 00.00, $marca = "", $nome = "", $dataAdicionado = "", $cor1 = "#919191", $cor2 = "#919191", $cor3 = "#919191"){
        return "
            <div class='cardDesejos'>
                <div class='checkboxes'>
                    <input type='checkbox' class='cardCheckbox' data-id='$id_produto'>
                </div>
                <div class='cardColorido'  style='background: linear-gradient(to right, $cor1, $cor2, $cor3, #FFFFFF);'>
                    <div class='cardImg'>
                        <img src='/projeto-integrador-et.com/public/imagens/ProdutosMP/$imagemProd' alt='$nome'>
                    </div>
                    <span class='cardPreco'>R$ ".number_format($preco, 2, ',', '.')."</span>
                    <span class='cardInfo'>$nome $marca</span>
                    <span class='cardDate'>Adicionado $dataAdicionado</span>
                    <div class='buttonsListaDesejos'>
                        <button class='buttonCarrinho' id='buttonCarrinho' onclick='redirecionarCarrinho()'>
                            <i class='fa-solid fa-cart-shopping'></i>
                        </button>
                        <button class='buttonLixeira' id='buttonLixeira'>
                            <i class='fa-solid fa-trash-can'></i>
                        </button>
                    </div>
                </div>
            </div>
        ";
    }

?>