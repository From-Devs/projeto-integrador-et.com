<?php
    require_once __DIR__."/../../popup/popUp.php";
    require_once __DIR__."/../../botao/botao.php";
    require_once __DIR__ . "/../../../../app/Models/products.php";

    function tabelaProdutoAdm($produtos){
        ?>
        <div id="lista">
            <table id="tabelaVendas">
                <thead id="barraCima">
                    <tr>
                        <th id="th4" scope="col">ID</th>
                        <th id="th3" scope="col">Associados</sth>
                        <th id="th2" scope="col">Produto</th>
                    </tr>
                </thead>
            </table>

            <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr style="height: 80px;">
                                <td><?= htmlspecialchars($produto['id']) ?></td>
                                <td class="td-lista-associados">
                                    <button onclick="buscarAssociadoProdutos(<?= $produto['id']?>)" class="btn-lista-associados">
                                        <span>Ver Associados</span>
                                        <img width="30px" src="/projeto-integrador-et.com/public/imagens/imagensADM/img-lista.png" alt="img-lista-associados">
                                    </button>
                                </td>
                                <td><?= htmlspecialchars($produto['nome']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <dialog class="dialog-produto-associados">
                <div class="bodyEditar">
                    <div class="header-editar">
                        <h1 id='nomeProduto'></h1>
                        <button class="btn-fechar" onclick='fecharPopUp("dialog-produto-associados")'>
                            <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
                        </button>
                    </div>
                    <table id="tabelaVendas">
                        <thead id="barraCima">
                            <tr>
                                <th id="th1" scope="col">ID</th>
                                <th id="th2" scope="col">Nome</sth>
                                <th id="th3" scope="col">Telefone</th>
                                <th id="th4" scope="col">Cidade</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="tabela-body">
                        <table id="tabelaVendas">
                            <tbody>
                                <tr style="height: 80px;">
                                    <td class='idAssociado'>1 a</td>
                                    <td class='nomeAssociado'>2 aa</td>
                                    <td class='telefone'>3 aaa</td>
                                    <td class='cidade'>4 aaaa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </dialog>

        </div>
        <?php
    }
    
function tabelaProduto($produtos) {
    echo PopUpComImagemETitulo("popUpSalvar","popUp_Botoes/img-confirmar.png","120px","Edição salva com sucesso!");
    ?>
    <div id="lista">
        <table id="tabelaVendas">
            <thead id="barraCima">
                <tr>
                    <th id="bordaEsquerda" scope="col">ID</th>
                    <th id="th2" scope="col">Produto</th>
                    <th id="th5" scope="col">Preço</th>
                    <th id="th4" scope="col">Preço Promocional</th>
                    <th id="th4" scope="col">Qtd. Estoque</th>
                    <th id="th8" scope="col">Ações</th>
                </tr>
            </thead>
        </table>

        <div class="tabela-body">
            <table id="tabelaVendas">
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?= $produto['id'] ?></td>
                            <td><?= htmlspecialchars($produto['nome']) ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($produto['precoPromocional'], 2, ',', '.') ?></td>
                            <td><?= $produto['qtdEstoque']?></td>
                            <td>
                                <div class="acoes-tabela">
                                    <?php

                                    $popUpId = "popUpExcluir_".$produto['id'];
                                    $btnSim = botaoPersonalizadoOnClick("Sim", "btn-black", "removerProduto(".$produto['id'].")", "100px");
                                    $btnNao = botaoPersonalizadoOnClick("Não", "btn-white", "", "100px");
                                    echo PopUpConfirmar($popUpId, "Deseja excluir o produto selecionado?", $btnSim, $btnNao, "400px");?>

                                    <div class="excluir" onclick="abrirPopUp('<?= $popUpId ?>')">
                                        <img src="/projeto-integrador-et.com/public/imagens/associado/img-excluir.png" alt="img-excluir">
                                    </div>
                                    <div class="editar" onclick="buscarAtributosDoProduto(<?= $produto['id'] ?>)">
                                        <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png" alt="img-editar">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <dialog class="dialog-editar">
            <div class="bodyEditar">
                <div class="header-editar">
                    <h1>Editar produto</h1>
                    <button class="btn-fechar" onclick='fecharPopUp("dialog-editar")'>
                        <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
                    </button>
                </div>

                <form class="campos-editar formProduto" enctype="multipart/form-data">
                    <input type="hidden" name="id_produto">
                    <div class="editarWrapper">
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
                                    <h1 class='marca'></h1>
                                    <h1 class='nomeProduto'></h1>
                                    <h2 class='precoOriginal'>R$</h2>
                                    <h1 class='preco'>R$</h1>
                                    <button class='botaoComprarCardProduto' data-id='$idProduto'>Comprar</button>
                                    <button class='botaoEspectro' id='botaoEspectro'></button>
                                </div>
                            </div>
                        </div>

                        <div class="camposContainerWrapper">
                            <div class="camposContainer">
                                <h2>Dados:</h2>

                                <div class="campo">
                                    <label for="nomeEditar">Nome:</label>
                                    <input type="text" name="nome" id="nomeEditar">
                                </div>

                                <div class="campo">
                                    <label for="marcaEditar">Marca:</label>
                                    <input type="text" name="marca" id="marcaEditar">
                                </div>

                                <div class="campo">
                                    <label for="ddlCategoriaEditar">Categoria:</label>
                                    <select id="ddlCategoriaEditar" name="categoria">
                                        <option value="" disabled selected>Selecione uma categoria</option>
                                        <?php
                                            $productsModel = new Products();
                                            $cats = $productsModel->getAllCategorias();
                                            foreach($cats as $c){
                                                echo '<option value="'.htmlspecialchars($c['id_categoria']).'">'.htmlspecialchars($c['nome']).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="campo">
                                    <label for="ddlSubCategoriaEditar">Subcategoria:</label>
                                    <select id="ddlSubCategoriaEditar" name="subCategoria">
                                        <option value="" disabled selected>Selecione uma subcategoria</option>
                                    </select>
                                </div>
                          
                                <div class="campo">
                                    <label for="qtdEstoqueEditar">Quantidade no estoque:</label>
                                    <input type="text" name="qtdEstoque" id="qtdEstoqueEditar">
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
                                    <label for="precoEditar">Preço:</label>
                                    <input type="text" name="preco" id="precoEditar">
                                </div>

                                <div class="chkPromocao">
                                    <label for="fgPromocaoEditar">Em promoção:</label>
                                    <input type="checkbox" name="fgPromocao" id="fgPromocaoEditar" value="1" onchange="mudarFgPromo(this)">
                                </div>

                                <div class="campo">
                                    <label for="precoPromocionalEditar">Preço Promocional:</label>
                                    <input type="text" step="0.01" name="precoPromocional" id="precoPromocionalEditar">
                                </div>

                                <h2 class="inicioSessao">Imagens:</h2>
                        
                                <div class="galeria-produtos">
                                    <div class="container-item-produto">
                                        <div class="item-produto">
                                            <div class="imagem-produto-container">
                                                <div class="container-img">
                                                    <img src="" alt="Produto" class="imagem-produto" id="img-produto-editar1" name="img1">
                                                </div>
                                                <div class="lgd-img">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira a IMAGEM SEM FUNDO do produto">
                                                </div>
                                                <label for="upload-produto-editar1" class="icone-cadastrar-label">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png" alt="Editar Produto" class="icone-cadastrar">
                                                </label>
                                                <input type="file" id="upload-produto-editar1" name="img1" class="input-file" data-img-id="img-produto-editar1" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="container-item-produto">
                                        <div class="item-produto">
                                            <div class="imagem-produto-container">
                                                <div class="container-img">
                                                    <img src="" alt="Produto" class="imagem-produto" id="img-produto-editar2" name="img2">
                                                </div>
                                                <div class="lgd-img">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira a IMAGEM DE LANÇAMENTO do produto (Banner)">
                                                </div>
                                                <label for="upload-produto-editar2" class="icone-cadastrar-label">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png" alt="Editar Produto" class="icone-cadastrar">
                                                </label>
                                                <input type="file" id="upload-produto-editar2" name="img2" class="input-file" data-img-id="img-produto-editar2" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="container-item-produto">
                                        <div class="item-produto">
                                            <div class="imagem-produto-container">
                                                <div class="container-img">
                                                    <img src="" alt="Produto" class="imagem-produto" id="img-produto-editar3" name="img3">
                                                </div>
                                                <div class="lgd-img">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-ajuda.png" alt="img-ajuda" title="Insira uma IMAGEM EXTRA do produto (OPCIONAL)">
                                                </div>
                                                <label for="upload-produto-editar3" class="icone-cadastrar-label">
                                                    <img src="/projeto-integrador-et.com/public/imagens/associado/img-editar.png" alt="Editar Produto" class="icone-cadastrar">
                                                </label>
                                                <input type="file" id="upload-produto-editar3" name="img3" class="input-file" data-img-id="img-produto-editar3" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h2 class="inicioSessao">Cores:</h2>
            
                                <div class="cores-produto">
                                    <div>
                                        <span class="span-cor">Cor principal:</span>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor" id="corDegrade1">
                                                <input type="color" class="corShow" name="corPrincipal"></input>
                                                <input class="corHex" name="corPrincipalHEX" maxlength="7"></input>
                                            </div>
                                        </div>
                                        <!-- <input type="color" class="cor" name="corPrincipal"> -->
                                    </div>
                                    <div>
                                        <span class="span-cor">Degradê 1:</span>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor" id="corDegrade1">
                                                <input type="color" class="corShow" name="deg1"></input>
                                                <input class="corHex" name="deg1HEX" maxlength="7"></input>
                                            </div>
                                        </div>
                                        <!-- <input type="color" class="cor" name="deg1"> -->
                                    </div>
                                    <div>
                                        <span class="span-cor">Degradê 2:</span>
                                        <div class="corContainer">
                                            <p class="textHex">HEX</p>
                                            <div class="editCor" id="corDegrade1">
                                                <input type="color" class="corShow" name="deg2"></input>
                                                <input class="corHex" name="deg2HEX" maxlength="7"></input>
                                            </div>
                                        </div>
                                        <!-- <input type="color" class="cor" name="deg2"> -->
                                    </div>
                                </div>

                                <h2 class="inicioSessao">Descrição:</h2>

                                <div class="campo campo-large">
                                    <label for="breveDescricaoEditar">Descrição breve:</label>
                                    <textarea cols="30" rows="10" name="breveDescricao" id="breveDescricaoEditar"></textarea>
                                </div>

                                <div class="campo campo-large">
                                    <label for="caracteristicasCompletaEditar">Características Completa:</label>
                                    <textarea cols="30" rows="10" name="caracteristicasCompleta" id="caracteristicasCompletaEditar"></textarea>
                                </div>
                            </div>
                            <div class="div-btn">
                                <button class="btn-concluir-edicao" type="submit">Concluír edição</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </dialog>
    </div>
    <?php
}



?>