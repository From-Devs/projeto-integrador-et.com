<?php

require_once __DIR__ . "/../../../app/Models/products.php";
$products = new Products();

$subCategorias = $products->getAllSubcategorias();

function filtro($tipo = "", $opcoesSelect = []) {
    if ($tipo == "associado") {
        $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <div class="divTextInput">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                    <button><i class="bx bx-search lupaPesquisarInput"></i></button>
                </div>
            </div>
            <div id="botoesAssociados">
                <div id="filtro">
                        <select id="botaoOrdenar">
                            <option value="" selected disabled hidden>Ordenar</option>';
            foreach ($opcoesSelect as $opcao) {
                $html .= '<option value="' . htmlspecialchars($opcao) . '">' . htmlspecialchars($opcao) . '</option>';
            }

            $html .= '
                        </select>
                    </div>
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
    elseif ($tipo == "produto") {
        $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <div class="divTextInput">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                    <button><i class="bx bx-search lupaPesquisarInput"></i></button>
                </div>
            </div>
            <div id="botoesProdutos">
                <div id="filtro">
                    <select id="botaoOrdenar">
                        <option value="" selected disabled hidden>Ordenar</option>';
        
        foreach ($opcoesSelect as $opcao) {
            $html .= '<option value="' . htmlspecialchars($opcao) . '">' . htmlspecialchars($opcao) . '</option>';
        }

        $html .= '
                    </select>
                </div>
                <div id="Escolher">
                    <button id="botaoAssociados" onclick="abrirPopUp(\'dialog-cadastrar\')">
                        <p>Cadastrar Produto</p>
                    </button>
                </div>
            </div>
        </div>';

        return $html;
    } 
    else {
        $html = '
        <div id="divPesquisarEFiltro">
            <div id="pesquisar">
                <div class="divTextInput">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto...">
                    <button><i class="bx bx-search lupaPesquisarInput"></i></button>
                </div>
            </div>
            <div id="filtro">
                <select id="botaoOrdenar">
                    <option value="" selected disabled hidden>Ordenar</option>';

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
    echo PopUpComImagemETitulo("popUpCadastro","popUp_Botoes/img-confirmar.png","120px","Cadastro realizado com sucesso!");
    echo PopUpComImagemETitulo("popUpEdicao","popUp_Botoes/img-confirmar.png","120px","Edição realizada com sucesso!");
    echo PopUpComImagemETitulo("popUpRemocao","popUp_Botoes/img-confirmar.png","120px","Produto removido com sucesso!");
    echo PopUpConfirmar("popUpErro", "Preencha todos os campos!");
?>



<dialog class="dialog-cadastrar">
    <div class="header-cadastrar">
        <h1>Cadastrar produto</h1>
        <button class="btn-fechar" onclick='fecharPopUp("dialog-cadastrar")'>
            <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
        </button>
    </div>
    <form class="campos-cadastrar" enctype="multipart/form-data">
        <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>">
        <div>
            <div class="campo">
                <label for="nomeCadastro">Nome: *</label>
                <input type="text" name="nome" id="nomeCadastro">
            </div>
            <div class="campo">
                <label for="marcaCadastro">Marca: *</label>
                <input type="text" name="marca" id="marcaCadastro">
            </div>
            <div class="campo">
                <label for="ddlCategoria">Subcategoria: *</label>
                <select id="ddlCategoria" name="subCategoria">
                    <option value="" disabled selected>Selecione uma subcategoria</option>
                    <?php
                        foreach ($subCategorias as $sc) {
                            ?>
                            <option value="<?php echo htmlspecialchars($sc['id_subCategoria']); ?>">
                                <?php echo htmlspecialchars($sc['nome']); ?>
                            </option>
                            <?php
                        }
                        ?>
                </select>
            </div>
        </div>
        <div class="campo campo-large">
            <label for="breveDescricaoCadastro">Breve descrição: *</label>
            <textarea cols="30" rows="10" name="breveDescricao" id="breveDescricaoCadastro"></textarea>
        </div>
        <div class="divisao-esquerda">
            <div class="campos-esquerda">
                <div class="campo campo-small">
                    <label for="qtdEstoqueCadastro">Quantidade no estoque: *</label>
                    <input type="number" name="qtdEstoque" id="qtdEstoqueCadastro">
                </div>
                <div class="container-tamanho">
                    <div class="campo campo-small campo-valor-tamanho">
                        <label for="valorTamanho">Tamanho:</label>
                        <input type="number" name="valorTamanho" id="valorTamanho">
                    </div>
                    <div class="campo campo-tipo-tamanho">
                        <select name="tipoTamanho" id="tipoTamanho">
                            <option value="ml">ml</option>
                            <option value="cm">cm</option>
                            <option value="g">g</option>
                        </select>
                    </div>
                </div>
                <div class="campo campo-small">
                    <label for="precoCadastro">Preço: *</label>
                    <input type="number" step="0.01" name="preco" id="precoCadastro">
                </div>
                <div class="campo-small chkPromocao">
                    <label for="fgPromocaoCadastro">Em promoção:</label>
                    <input type="checkbox" name="fgPromocao" id="fgPromocaoCadastro" onchange="mudarFgPromo(this)">
                </div>
                <div class="campo campo-small">
                    <label for="precoPromocionalCadastro">Preço Promocional: *</label>
                    <input type="number" step="0.01" name="precoPromocional" id="precoPromocionalCadastro" disabled="true">
                </div>
            </div>
            <div class="campos-direita">
                <div class="galeria-produtos">
                    <div class="container-item-produto">
                        <div class="item-produto">
                            <div class="imagem-produto-container">
                                <div class="container-img">
                                    <img src=""
                                        alt="Produto" class="imagem-produto" id="img-produto1" onerror="this.style.display='none';" name="img1">
                                </div>
                                <label for="upload-produto1" class="icone-cadastrar-label">
                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                        alt="Editar Produto" class="icone-cadastrar">
                                </label>
                                <input type="file" id="upload-produto1" name="img1" class="input-file" data-img-id="img-produto1" accept="image/*">
                            </div>
                        </div>
                        <div class="lgd-img">
                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Aqui vai a IMAGEM SEM FUNDO">
                        </div>
                    </div>

                    <div class="container-item-produto">
                        <div class="item-produto">
                            <div class="imagem-produto-container">
                                <div class="container-img">
                                    <img src=""
                                        alt="Produto" class="imagem-produto" id="img-produto2" onerror="this.style.display='none';" name="img2">
                                </div>
                                <label for="upload-produto2" class="icone-cadastrar-label">
                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                        alt="Editar Produto" class="icone-cadastrar">
                                </label>
                                <input type="file" id="upload-produto2" name="img2" class="input-file" data-img-id="img-produto2" accept="image/*">
                            </div>
                        </div>
                        <div class="lgd-img">
                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Aqui vai a IMAGEM DE LANÇAMENTO">
                        </div>
                    </div> 

                    <div class="container-item-produto">
                        <div class="item-produto">
                            <div class="imagem-produto-container">
                                <div class="container-img">
                                    <img src=""
                                        alt="Produto" class="imagem-produto" id="img-produto3" onerror="this.style.display='none';" name="img3">
                                </div>
                                <label for="upload-produto3" class="icone-cadastrar-label">
                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                        alt="Editar Produto" class="icone-cadastrar">
                                </label>
                                <input type="file" id="upload-produto3" name="img3" class="input-file" data-img-id="img-produto3" accept="image/*">
                            </div>
                        </div>
                        <div class="lgd-img">
                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Aqui vai a IMAGEM EXTRA (OPCIONAL)">
                        </div>
                    </div>
                </div>

                <div class="cores-produto">
                    <div>
                        <input type="color" class="cor" name="corPrincipal">
                        <span class="span-cor">Cor principal *</span>
                    </div>
                    <div>
                        <input type="color" class="cor" name="deg1">
                        <span class="span-cor">Deg. 1 *</span>
                    </div>
                    <div>
                        <input type="color" class="cor" name="deg2">
                        <span class="span-cor">Deg. 2 *</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-campos-large">
            <div class="campo campo-large">
                <label for="caracteristicasCompletaCadastro">Características Completa: *</label>
                <textarea cols="30" rows="10" name="caracteristicasCompleta" id="caracteristicasCompletaCadastro"></textarea>
            </div>
            <div class="div-btn">
                <button class="btn-concluir-cadastro" type="submit">Cadastrar Produto</button>
            </div>
        </div>
    </form>
</dialog>