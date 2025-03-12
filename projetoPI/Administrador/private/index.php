<?php 

function botaoPadrao($icone, $nome, $alt=''){
    $html = "
    <button id='botaoPadrao'>
        <div id='iconeClique'>
            <img src='$icone' alt='$alt'>
        </div>
        <p id='textoBotao'>$nome</p>
    </button>
    ";

    echo $html;
}

function dadosInfor($nomeDiv,$icone, $titulo, $valor, $alt=''){
    $html = "
    <div id='$nomeDiv'>
        <div id='textoInformacao'>
        <h1 id='textoTituloInform'>$titulo</h1>
        <h1 id='valorInform'>$valor</h1>
        </div>
        <div id='imagemInformaEstilizacao'>
            <img id='imagemInforma' src='$icone' alt='$alt'>
        </div>
    </div>
    
    ";

    echo $html;
}

function pizzas($nomeDiv, $titulo, $pos1='vendedor 1', $pos2='vendedor 2', $pos3='vendedor 3', $pos4='vendedor 4', $pos5='vendedor 5'){
    $html = "
    <div id='$nomeDiv'>
        <h1 id='tituloPizza'>$titulo</h1>
        <div id='ajusteSelecionador'>
            <div id='selecionador'>
                <p id='vendedores'>$pos1</p>
                <p id='vendedores'>$pos2</p>
                <p id='vendedores'>$pos3</p>
                <p id='vendedores'>$pos4</p>
                <p id='vendedores'>$pos5</p>
            </div>
        </div>
    </div>
    ";

    echo $html;
}

?>