<?php
function createPesquisaHeader(){
    return "
    <div class='pesquisaHeader closed'>
        <input type='text' class='inputHeader' placeholder='Buscar produtos...' autocomplete='off'></input>
        <button type='button' onclick='ObterDadosProdutoHeader()'><i class='bx bx-search lupaHeaderInput'></i></button>


        <div id='sugestoesHeader'></div>
    </div>
    ";
}
?>

<script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>