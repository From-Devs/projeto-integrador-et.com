<?php 
function dadosInfor($nomeDiv,$icone, $titulo, $valor, $alt=''){
    $html = "
    <div id='$nomeDiv'>
        <div id='textoInformacao'>
        <h1 id='textoTituloInform'>$titulo</h1>
        <h1 id='valorInform'>$valor</h1>
        </div>
        <div id='controleImagemInform'>    
            <div id='imagemInformaEstilizacao'>
                <img id='imagemInforma' src='$icone' alt='$alt'>
            </div>
        </div>
    </div>
    ";

    echo $html;
}

function dadosInforRelatorios($nomeDiv,$icone, $titulo, $nomePopUp, $alt=''){

    $html = "
    <div class='cardRelatorio' id='$nomeDiv' onclick=" . "abrirPopUp('$nomePopUp')" . ">

        <h2 class='textCard'>$titulo</h1>
 
        <div class='iconCard'>
            <img src='$icone' alt='$alt'>
        </div>

    </div>
    ";

    echo $html;
}

function pizzas($nomeDiv){
    $html = "
    <div id='$nomeDiv'>
        <div id='ajusteSelecionador'>
            
        </div>
    </div>
    ";

    echo $html;
}

function listagemProdutos($nomeProduto, $botaoAssociado, $SKU){
    $html = "
        <p id='nome'>$nomeProduto</p>
        <button id='associado'>$botaoAssociado</button>
        <p id='sku'>$SKU</p>

    ";

    echo $html;

}

?>