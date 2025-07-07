<?php

function filtro($tipo = "", $opcoesSelect = []){
    if ($tipo == "associado"){
        $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <form action="" class="divTextInput">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                    <button><i class="bx bx-search lupaPesquisarInput"></i></button>
                </form>
            </div>
            <div id="botoesAssociados">
                <div id="Solicitações">
                    <a href="?tipo=solicitacao">
                        <button id="botaoSolicitacao">
                            <p>Solicitações</p>
                        </button>
                    </a>
                </div>
                <div id="Escolher">
                    <a href="?tipo=associado">
                        <button id="botaoAssociados">
                            <p>Associados</p>
                        </button>
                    </a>
                </div>
            </div>
        </div>';
    
        return $html;
    }
    else{
        $html = '
            <div id="divPesquisarEFiltro">
                <div id="pesquisar">
                    <form action="" class="divTextInput">
                        <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                        <button><i class="bx bx-search lupaPesquisarInput"></i></button>
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
}
?>
