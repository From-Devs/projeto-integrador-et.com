<?php 

function creatCardProdutoListaDese($image = "", $preco = "", $info = "", $date = "Adicionado 00/00/00", $imgBot1 = "", $imgBot2 = ""){
    return"
        <div class='cardDesejos card01'>
            <div class='cardImg'>
                <img src=' $image ' alt="">
            </div>

            <div class='cardPreco'>
                <p><strong> $preco </strong></p>
            </div>

            <div class='cardInfo'>
                <p> $info </p>
            </div>

            <div class='cardDate'>
                <p><strong> $date </strong></p>
            </div>

            <div class='cardButtons'>
                <button class='buttonDesejos' id='buttonDetalhes' onclick='redirecionarDetalhesDoProduto()'>
                    <img src=' $imgBot1 ' alt="">
                </button>
                <button class='buttonDesejos' id='buttonLixeira'>
                    <img src=' $imgBot2 ' alt="">
                </button>
            </div>
        </div>
    ";
}

?>