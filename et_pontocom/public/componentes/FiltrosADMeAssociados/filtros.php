<?php

function filtro($opcoesSelect){
    $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <form action="">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                </form>
            </div>
            <div id="filtro">
                <select id="botaoOrdenar">
                <option value="" selected disabled hidden>Filtro</option>';
                
    foreach ($opcoesSelect as $opcao) {
        $html .= '<option value="' . htmlspecialchars($opcao) . '">' . htmlspecialchars($opcao) . '</option>';
    }

    $html .= '
                </select>
            </div>
        </div>';

    return $html;
}
?>
