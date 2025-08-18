<?php
    require_once __DIR__."/../../popup/popUp.php";
    require_once __DIR__."/../../botao/botao.php";
    require_once __DIR__."/../../popup/popUp.php";

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

if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
    if(isset($_GET['acao']) && $_GET['acao'] === 'CadastrarProduto'){
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                abrirPopUp('popUpCadastro');
                // Remove ?status=sucesso da URL
                if (window.history.replaceState) {
                    const urlSemParametro = window.location.origin + window.location.pathname;
                    window.history.replaceState({}, document.title, urlSemParametro);
                }
            });
        </script>";    
    }else{
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                abrirPopUp('popUpSalvar');
                // Remove ?status=sucesso da URL
                if (window.history.replaceState) {
                    const urlSemParametro = window.location.origin + window.location.pathname;
                    window.history.replaceState({}, document.title, urlSemParametro);
                }
            });
        </script>";
    }
}else if(isset($_GET['status']) && $_GET['status'] === 'erro'){
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            abrirPopUp('popUpErro');
            // Remove ?status=sucesso da URL
            if (window.history.replaceState) {
                const urlSemParametro = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, urlSemParametro);
            }
        });
    </script>";
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
                    <th id="th3" scope="col">Estoque</th>
                    <th id="th4" scope="col">Custo</th>
                    <th id="th5" scope="col">Preço</th>
                    <th id="th6" scope="col">Pedidos</th>
                    <th id="th7" scope="col">SKU</th>
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
                            <td><?= $produto['estoque'] ?></td>
                            <td>R$ <?= number_format($produto['custo'], 2, ',', '.') ?></td>
                            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
                            <td><?= $produto['pedidos'] ?></td>
                            <td><?= htmlspecialchars($produto['sku']) ?></td>
                            <td>
                                <div class="acoes-tabela">
                                    <?php
                                    $btnSim = botaoPersonalizadoOnClick("Sim", "btn-black", "", "100px");
                                    $btnNao = botaoPersonalizadoOnClick("Não", "btn-white", "", "100px");
                                    echo PopUpConfirmar("popUpExcluir", "Deseja excluir o produto selecionado?", $btnSim, $btnNao, "400px"); ?>
                                    <div class="excluir" onclick="abrirPopUp('popUpExcluir')">
                                        <img src="/projeto-integrador-et.com/public/imagens/associado/img-excluir.png" alt="img-excluir">
                                    </div>
                                    <div class="editar" onclick="abrirPopUp('dialog-editar')">
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
                    <button class="btn-concluir-edicao" type="submit">Concluír edição</button>
                </div>
            </form>
        </dialog>
    </div>
    <?php
}



?>