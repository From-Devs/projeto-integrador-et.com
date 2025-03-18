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

function dadosInforRelatorios($nomeDiv,$icone, $titulo, $alt=''){
    $html = "
    <div id='$nomeDiv'>
        <div id='textoInformacao'>
        <h1 id='textoTituloInform'>$titulo</h1>
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

function pizzas($nomeDiv, $pos1='Vendedor 1', $pos2='Vendedor 2', $pos3='Vendedor 3', $pos4='Vendedor 4', $pos5='Vendedor 5'){
    $html = "
    <div id='$nomeDiv'>
        <div id='ajusteSelecionador'>
            
        </div>
    </div>
    ";

    echo $html;
}

?>