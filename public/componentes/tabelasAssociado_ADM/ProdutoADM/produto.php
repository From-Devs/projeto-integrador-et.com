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
                        <th id="th2" scope="col">Produto</th>
                        <th id="th3" scope="col">Associados</sth>
                        <th id="th4" scope="col">SKU</th>
                    </tr>
                </thead>
            </table>

            <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr style="height: 80px;">
                                <td><?= htmlspecialchars($produto['nome']) ?></td>
                                <td class="td-lista-associados">
                                    <button onclick="window.location.href = '/projeto-integrador-et.com/app/views/adm/Associados.php'" class="btn-lista-associados">
                                        <span>Ver Associados</span>
                                        <img width="30px" src="/projeto-integrador-et.com/public/imagens/imagensADM/img-lista.png" alt="img-lista-associados">
                                    </button>
                                </td>
                                <td><?= htmlspecialchars($produto['sku']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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
            <div class="header-editar">
                <h1>Editar produto</h1>
                <button class="btn-fechar" onclick='fecharPopUp("dialog-editar")'>
                    <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
                </button>
            </div>
            <form class="campos-editar" action="http://localhost/projeto-integrador-et.com/router/ProdutoRouter.php?acao=EditarProduto" method="post">
                <!-- conteúdo do formulário como no original -->
                <input type="hidden" name="id_produto">

                <div>
                    <div class="campo">
                        <label>Nome:</label>
                        <input type="text" name="nome">
                    </div>
                    <div class="campo">
                        <label>Marca:</label>
                        <input type="text" name="marca">
                    </div>
                    <div class="campo">
                        <label>Subcategoria:</label>
                        <select id="ddlCategoria" name="subCategoria">
                            
                        </select>
                    </div>
                </div>
                <div>
                    <div class="campo campo-large">
                        <label>Breve descrição:</label>
                        <textarea cols="30" rows="10" name="breveDescricao"></textarea>
                    </div>
                </div>
                <div class="divisao-esquerda">
                    <div class="campos-esquerda">
                        <div class="campo campo-small">
                            <label>Quantidade no estoque:</label>
                            <input type="text" name="qtdEstoque">
                        </div>
                        <div class="campo campo-small">
                            <label>Preço:</label>
                            <input type="text" name="preco">
                        </div>
                        <div class="campo-small chkPromocao">
                            <label>Em promoção:</label>
                            <input type="checkbox" name="fgPromocao" value="1" onchange="mudarFgPromo(this)">
                        </div>
                        <div class="campo campo-small">
                            <label>Preço Promocional:</label>
                            <input type="text" step="0.01" name="precoPromocional">
                        </div>
                    </div>
                    <div class="campos-direita">
                    <div class="galeria-produtos">
                    <div class="container-item-produto">
                        <div class="item-produto">
                            <div class="imagem-produto-container">
                                <div class="container-img">
                                    <img src=""
                                        alt="Produto" class="imagem-produto" id="img-produto-editar1" name="img1">
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
                                        alt="Produto" class="imagem-produto" id="img-produto-editar2" name="img2">
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
                                        alt="Produto" class="imagem-produto" id="img-produto-editar3" name="img3">
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
                        <label>Características Completa: *</label>
                        <textarea cols="30" rows="10" name="caracteristicasCompleta"></textarea>
                    </div>
                    <div class="div-btn">
                        <button class="btn-concluir-edicao" type="submit">Concluír edição</button>
                    </div>
                </div>
            </form>
        </dialog>
    </div>
    <?php
}



?>