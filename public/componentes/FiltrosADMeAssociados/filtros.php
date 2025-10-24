<?php

require_once __DIR__ . "/../../../app/Models/products.php";
$products = new Products();

$categorias = $products->getAllCategorias();

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
    <div class="bodyCadastrar">
        <div class="header-cadastrar">
            <h1>Cadastrar produto</h1>
            <button class="btn-fechar" onclick='fecharPopUp("dialog-cadastrar")'>
                <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
            </button>
        </div>

        <form class="campos-cadastrar" enctype="multipart/form-data">
            <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($_SESSION['id_usuario']); ?>">
            <div class="cadastroWrapper">
                <div class="previsualizacaoProduto">
                    <div class='cardProduto'>
                        <div class='cores'>
                            <div class='corDestaque' style='color: $corPrincipal;'></div>
                            <div class='corDegrade1' style='color: $corDegrade1;'></div>
                            <div class='corDegrade2' style='color: $corDegrade2;'></div>
                        </div>

                        <span class='balaoDesejos'>Adicionar a Lista de desejos</span>
                        <i class='coracaoFofo'>
                            <img class='coracaoImg' src='/projeto-integrador-et.com/public/imagens/produtoCard/coracao.png' alt='Coração'>
                        </i>
    
                        <div class='ticketContainer'>
                            <img class='ticketDesconto' src='/projeto-integrador-et.com/public/imagens/produtoCard/ticket2.png' alt='ticket'>
                            <div class='descontoTextContainer'>
                                <p class='descontoPorcento'>%</p>
                                <p class='descontoOffText'>FF</p>
                            </div>
                        </div>

                        <i class='buraquinho'></i>

                        <div class='imagemCardProdutoComumContainer'>
                            <img class='imagemCardProdutoComum' src='/projeto-integrador-et.com/' alt=''>
                        </div>

                        <div class='contentDeBaixo'>
                            <hr class='linha'>
                            <h1 class='marca'>$marca</h1>
                            <h1 class='nomeProduto'>$nomeProduto</h1>";
                            <h2 class='precoOriginal'>R$$precoOriginal</h2>";
                            <h1 class='preco'>R$$preco</h1>
                            <button class='botaoComprarCardProduto' data-id='$idProduto'>Comprar</button>
                            <button class='botaoEspectro' id='botaoEspectro'></button>
                        </div>
                    </div>
                </div>
                <div class="camposContainerWrapper">

                    <div class="camposContainer">
                        <h2>Dados:</h2>
    
                        <div class="campo">
                            <label for="nomeCadastro">Nome: <span class="asteriscoObrigatorio">*</span></label>
                            <input type="text" name="nome" id="nomeCadastro">
                        </div>

                        <div class="campo">
                            <label for="marcaCadastro">Marca: <span class="asteriscoObrigatorio">*</span></label>
                            <input type="text" name="marca" id="marcaCadastro">
                        </div>

                        <div class="campo">
                            <label for="ddlCategoria">Categoria: <span class="asteriscoObrigatorio">*</span></label>
                            <select id="ddlCategoria" name="categoria" onChange="(function(e){ const subSelect = document.getElementById('ddlSubCategoria'); if(subSelect) carregarSubCategoriasPorCategoria(subSelect, e.target.value); })(event)">
                                <option value="" disabled selected>Selecione uma categoria</option>
                                <?php
                                    foreach ($categorias as $c) {
                                        ?>
                                        <option value="<?php echo htmlspecialchars($c['id_categoria']); ?>">
                                            <?php echo htmlspecialchars($c['nome']); ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="campo">
                            <label for="ddlSubCategoria">Subcategoria: <span class="asteriscoObrigatorio">*</span></label>
                            <select id="ddlSubCategoria" name="subCategoria">
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

                        <div class="campo">
                            <label for="qtdEstoqueCadastro">Quantidade no estoque: <span class="asteriscoObrigatorio">*</span></label>
                            <input type="number" name="qtdEstoque" id="qtdEstoqueCadastro">
                        </div>

                        <div class="container-tamanho">
                            <div class="campo campo-valor-tamanho">
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

                        <div class="campo">
                            <label for="precoCadastro">Preço: <span class="asteriscoObrigatorio">*</span></label>
                            <input type="number" step="0.01" name="preco" id="precoCadastro">
                        </div>

                        <div class="chkPromocao">
                            <label for="fgPromocaoCadastro">Em promoção:</label>
                            <input type="checkbox" name="fgPromocao" id="fgPromocaoCadastro" onchange="mudarFgPromo(this)">
                        </div>

                        <div class="campo">
                            <label for="precoPromocionalCadastro">Preço Promocional: <span class="asteriscoObrigatorio">*</span></label>
                            <input type="number" step="0.01" name="precoPromocional" id="precoPromocionalCadastro" disabled="true">
                        </div>

                        <h2 class="inicioSessao">Imagens:</h2>
                
                        <div class="galeria-produtos">
                            <div class="container-item-produto">
                                <div class="item-produto">
                                    <div class="imagem-produto-container">
                                        <div class="container-img">
                                            <img src="" alt="Produto" class="imagem-produto" id="img-produto1" onerror="this.style.display='none';" name="img1">
                                        </div>
                                            <div class="lgd-img">
                                                <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira a IMAGEM SEM FUNDO do produto">
                                            </div>
                                        <label for="upload-produto1" class="icone-cadastrar-label">
                                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                                alt="Editar Produto" class="icone-cadastrar">
                                        </label>
                                        <input type="file" id="upload-produto1" name="img1" class="input-file" data-img-id="img-produto1" accept="image/*">
                                    </div>
                                </div>
                            </div>
        
                            <div class="container-item-produto">
                                <div class="item-produto">
                                    <div class="imagem-produto-container">
                                        <div class="container-img">
                                            <img src="" alt="Produto" class="imagem-produto" id="img-produto2" onerror="this.style.display='none';" name="img2">
                                        </div>
                                        <div class="lgd-img">
                                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira a IMAGEM DE LANÇAMENTO do produto (Banner)">
                                        </div>
                                        <label for="upload-produto2" class="icone-cadastrar-label">
                                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                                alt="Editar Produto" class="icone-cadastrar">
                                        </label>
                                        <input type="file" id="upload-produto2" name="img2" class="input-file" data-img-id="img-produto2" accept="image/*">
                                    </div>
                                </div>
                            </div> 
        
                            <div class="container-item-produto">
                                <div class="item-produto">
                                    <div class="imagem-produto-container">
                                        <div class="container-img">
                                            <img src="" alt="Produto" class="imagem-produto" id="img-produto3" onerror="this.style.display='none';" name="img3">
                                        </div>
                                        <div class="lgd-img">
                                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira uma IMAGEM EXTRA do produto (OPCIONAL)">
                                        </div>
                                        <label for="upload-produto3" class="icone-cadastrar-label">
                                            <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png"
                                                alt="Editar Produto" class="icone-cadastrar">
                                        </label>
                                        <input type="file" id="upload-produto3" name="img3" class="input-file" data-img-id="img-produto3" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2 class="inicioSessao">Cores:</h2>
        
                        <div class="cores-produto">
                            <div>
                                <span class="span-cor">Cor principal <span class="asteriscoObrigatorio">*</span></span>
                                <div class="corContainer">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor" id="corDegrade1">
                                        <input type="color" class="corShow" name="corPrincipal"></input>
                                        <input class="corHex" maxlength="7"></input>
                                    </div>
                                </div>
                                <!-- <input type="color" class="cor" name="corPrincipal"> -->
                            </div>
                            <div>
                                <span class="span-cor">Degradê 1 <span class="asteriscoObrigatorio">*</span></span>
                                <div class="corContainer">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor" id="corDegrade1">
                                        <input type="color" class="corShow" name="deg1"></input>
                                        <input class="corHex" maxlength="7"></input>
                                    </div>
                                </div>
                                <!-- <input type="color" class="cor" name="deg1"> -->
                            </div>
                            <div>
                                <span class="span-cor">Degradê 2 <span class="asteriscoObrigatorio">*</span></span>
                                <div class="corContainer">
                                    <p class="textHex">HEX</p>
                                    <div class="editCor" id="corDegrade1">
                                        <input type="color" class="corShow" name="deg2"></input>
                                        <input class="corHex" maxlength="7"></input>
                                    </div>
                                </div>
                                <!-- <input type="color" class="cor" name="deg2"> -->
                            </div>
                        </div>

                        <h2 class="inicioSessao">Descrição:</h2>
                           
                        <div class="campo campo-large">
                            <label for="breveDescricaoCadastro">Descrição breve: <span class="asteriscoObrigatorio">*</span></label>
                            <textarea cols="30" rows="10" name="breveDescricao" id="breveDescricaoCadastro"></textarea>
                        </div>

                        <div class="campo campo-large">
                            <label for="caracteristicasCompletaCadastro">Características Completa: <span class="asteriscoObrigatorio">*</span></label>
                            <textarea cols="30" rows="10" name="caracteristicasCompleta" id="caracteristicasCompletaCadastro"></textarea>
                        </div>
                    </div>
                    <div class="div-btn">
                        <button class="btn-concluir-cadastro" type="submit">Cadastrar Produto</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</dialog>