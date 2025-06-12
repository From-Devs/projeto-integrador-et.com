<?php

function filtro($opcoesSelect){
    $html = '
    <div class="container-filtroEIcon">
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <p id="textUser">ADM ET</p>
            </div>
        </div>
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <form action="">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                </form>
            </div>
            <div id="filtro">
                <select id="botaoFiltragem">';
                
    foreach ($opcoesSelect as $opcao) {
        $html .= '<option value="' . htmlspecialchars($opcao) . '">' . htmlspecialchars($opcao) . '</option>';
    }

    $html .= '
                </select>
            </div>
        </div>
    </div>';

    return $html;
}
?>
