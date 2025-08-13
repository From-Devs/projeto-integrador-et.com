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
    elseif ($tipo == "produto"){
        $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <form action="" class="divTextInput">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                    <button><i class="bx bx-search lupaPesquisarInput"></i></button>
                </form>
            </div>
            <div id="botoesProdutos">
                <div id="filtro">
                    <select id="botaoOrdenar">
                        <option value="" selected disabled hidden>Filtro</option>';
                        
            foreach ($opcoesSelect as $opcao) {
                $html .= '<option value="' . htmlspecialchars($opcao) . '">' . htmlspecialchars($opcao) . '</option>';
            }

            $html .= '
                    </select>
                </div>
                <div id="Escolher">
                    <a href="?tipo=associado">
                        <button id="botaoAssociados" onclick="abrirPopUp('dialog-cadastrar')">
                            <p>Cadastrar Produto</p>
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

<dialog class="dialog-cadastrar">
    <div class="header-editar">
        <h1>Cadastrar produto</h1>
        <button class="btn-fechar" onclick='fecharPopUp("dialog-editar")'>
            <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
        </button>
    </div>
    <form class="campos-editar" action="http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=EditarProduto" method="post">
        <!-- conteúdo do formulário como no original -->
        <div>
            <div class="campo">
                <label>Nome:</label>
                <input type="text">
            </div>
            <div class="campo">
                <label>Marca:</label>
                <input type="text">
            </div>
            <div class="campo">
                <label>Categoria:</label>
                <select id="ddlCategoria">
                    <option value="teste">Teste1</option>
                    <option value="teste">Teste2</option>
                    <option value="teste">Teste3</option>
                    <option value="teste">Teste4</option>
                </select>
            </div>
        </div>
        <div>
            <div class="campo campo-large">
                <label>Breve descrição:</label>
                <textarea cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="divisao-esquerda">
            <div class="campos-esquerda">
                <div class="campo campo-small">
                    <label>Código do Produto:</label>
                    <input type="text">
                </div>
                <div class="campo campo-small">
                    <label>Preço:</label>
                    <input type="text">
                </div>
                <div class="campo campo-small">
                    <label>Preço Promocional:</label>
                    <input type="text">
                </div>
                <div class="campo campo-small">
                    <label>Quantidade:</label>
                    <input type="text">
                </div>
            </div>
            <div class="campos-direita">
                <div class="galeria-produtos">
                    <div class="item-produto">
                        <div class="imagem-produto-container">
                            <div class="container-img">
                                <img src=""
                                    alt="Produto" class="imagem-produto" id="img-produto1" onerror="this.style.display='none';">
                            </div>

                            <label for="upload-produto1" class="icone-editar-label">
                                <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                    alt="Editar Produto" class="icone-editar">
                            </label>
                            <input type="file" id="upload-produto1" class="input-file" data-img-id="img-produto1" accept="image/*">
                        </div>
                    </div>

                    <div class="item-produto">
                        <div class="imagem-produto-container">
                            <div class="container-img">
                                <img src=""
                                    alt="Produto" class="imagem-produto" id="img-produto2" onerror="this.style.display='none';">
                            </div>

                            <label for="upload-produto2" class="icone-editar-label">
                                <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                    alt="Editar Produto" class="icone-editar">
                            </label>
                            <input type="file" id="upload-produto2" class="input-file" data-img-id="img-produto2" accept="image/*">
                        </div>
                    </div>

                    <div class="item-produto">
                        <div class="imagem-produto-container">
                            <div class="container-img">
                                <img src=""
                                    alt="Produto" class="imagem-produto" id="img-produto3" onerror="this.style.display='none';">
                            </div>

                            <label for="upload-produto3" class="icone-editar-label">
                                <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                    alt="Editar Produto" class="icone-editar">
                            </label>
                            <input type="file" id="upload-produto3" class="input-file" data-img-id="img-produto3" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="cores-produto">
                    <input type="color">
                </div>
            </div>
        </div>
        <div>
            <div class="campo campo-large">
                <label>Características Completa:</label>
                <textarea cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="div-btn">
            <button onclick="abrirPopUp('popUpSalvar')" class="btn-concluir-edicao" type="submit">Concluír edição</button>
        </div>
    </form>
</dialog>