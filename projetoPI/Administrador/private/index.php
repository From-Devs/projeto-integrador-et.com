<?php 

function botaoPadrao($icone, $nome, $alt=''){
    $html = "
    <button id='botaoPadrao'>
        <div id='iconeClique'>
            <img src='$icone' alt='$alt'>
        </div>
        <p>$nome</p>
    </button>
    ";

    echo $html;
}



?>