<?php
    require_once __DIR__."/../../popup/popUp.php";
    require_once __DIR__."/../../botao/botao.php";
    
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
                                    <button onclick="window.location.href = '/projeto-integrador-et.com/et_pontocom/app/views/adm/Associados.php'" class="btn-lista-associados">
                                        <span>Ver Associados</span>
                                        <img width="30px" src="/projeto-integrador-et.com/et_pontocom/public/imagens/imagensADM/img-lista.png" alt="img-lista-associados">
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
    

            <!--Estrutura do popUp de editar produto (terminar)-->
            <dialog class="dialog-editar">
                <div class="header-editar">
                    <h1>Editar produto</h1>
                    <button class="btn-fechar" onclick='fecharPopUp("dialog-editar")'>
                        <img class="img-fechar" src="/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
                    </button>
                </div>
                <div class="campos-editar">
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
                                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/coffe.png" alt="Produto" class="imagem-produto">

                                    <label for="upload-produto" class="icone-editar-label">
                                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoAssociado/icone-edit.png" alt="Editar Produto" class="icone-editar">
                                    </label>
                                    <input type="file" id="upload-produto" class="input-file">
                                </div>
                                </div>
                                <div class="item-produto">
                                    <div class="imagem-produto-container">
                                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/coffe.png" alt="Produto" class="imagem-produto">
                                        <label for="upload-produto" class="icone-editar-label">
                                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoAssociado/icone-edit.png" alt="Editar Produto" class="icone-editar">
                                        </label>
                                        <input type="file" id="upload-produto" class="input-file">
                                    </div>
                                </div>
                                <div class="item-produto">
                                    <div class="imagem-produto-container">
                                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/coffe.png" alt="Produto" class="imagem-produto">
                                        <label for="upload-produto" class="icone-editar-label">
                                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produtoAssociado/icone-edit.png" alt="Editar Produto" class="icone-editar">
                                        </label>
                                        <input type="file" id="upload-produto" class="input-file">
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
                </div>
                <div class="div-btn">
                    <button class="btn-concluir-edicao">Concluír edição</button>
                </div>
            </dialog>

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
                                        echo PopUpConfirmar("popUpExcluir", "Deseja excluir o produto selecionado?", $btnSim, $btnNao, "400px");?>
    
                                        <div class="excluir" onclick="abrirPopUp('popUpExcluir')"><img src="/projeto-integrador-et.com/et_pontocom/public/imagens/associado/img-excluir.png" alt="img-editar"></div>
    
                                        <div class="editar" onclick="abrirPopUp('dialog-editar')"><img src="/projeto-integrador-et.com/et_pontocom/public/imagens/associado/img-editar.png" alt="img-editar"></div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
    // function tabelaProduto(){
    //     return "<div id='lista'>
    //     <table id='tabelaVendas'>
    //         <thead id='barraCima'>
    //             <tr>
    //                 <th id='bordaEsquerda' scope='col'>ID</th>
    //                 <th id='th2' scope='col'>Produto</th>
    //                 <th id='th3' scope='col'>Associado</th>
    //                 <th id='th4' scope='col'>SKU</th>
    //             </tr>
    //         </thead>
    //     </table>
    
    //     <div class='tabela-body'>   
    //         <table id='tabelaVendas'>
    //             <tbody>
    //                 <tr>
    //                     <td>1</td>
    //                     <td>Hidratante</td>
    //                     <td>Listar Associado</td>
    //                     <td>S5D56GE</td>
    //                     <!-- provavelmente vai ter que ter um botão aqui -->
    //                 </tr>
    //                 <tr>
    //                     <td>2</td>
    //                     <td>Base Liquída</td>
    //                     <td>Listar Associado</td>
    //                     <td>FA9DSF56</td>
    //                 </tr>
    //                 <tr>
    //                     <td>3</td>
    //                     <td>Body Splash</td>
    //                     <td>Listar Associado</td>
    //                     <td>UJ47R8S</td>
    //                 </tr>
    //                 <tr>
    //                     <td>4</td>
    //                     <td>Colônia Coffe Man</td>
    //                     <td>Listar Associado</td>
    //                     <td>FDAS94A</td>
    //                 </tr>
    //                 <tr>
    //                     <td>5</td>
    //                     <td>Skincare</td>
    //                     <td>Listar Associado</td>
    //                     <td>9WE8FWS</td>
    //                 </tr>
    //                 <tr>
    //                     <td>6</td>
    //                     <td>Césio Luquído</td>
    //                     <td>Listar Associado</td>
    //                     <td>F99W2C9</td>
    //                 </tr>
    //                 <tr>
    //                     <td>7</td>
    //                     <td>Americio de Limpeza</td>
    //                     <td>Listar Associado</td>
    //                     <td>98DF5AFE8</td>
    //                 </tr>
    //                 <tr>
    //                     <td>8</td>
    //                     <td>Gel de Limpeza Facial</td>
    //                     <td>Listar Associado</td>
    //                     <td>V3D9S5FW8</td>
    //                 </tr>
    //                 <tr>
    //                     <td>9</td>
    //                     <td>Kit Essenciais</td>
    //                     <td>Listar Associado</td>
    //                     <td>GER9S8DF9</td>
    //                 </tr>
    //                 <tr>
    //                     <td>10</td>
    //                     <td>Hidratante</td>
    //                     <td>Listar Associado</td>
    //                     <td>S5D56GE</td>
    //                     <!-- provavelmente vai ter que ter um botão aqui -->
    //                 </tr>
    //                 <tr>
    //                     <td>11</td>
    //                     <td>Base Liquída</td>
    //                     <td>Listar Associado</td>
    //                     <td>FA9DSF56</td>
    //                 </tr>
    //                 <tr>
    //                     <td>12</td>
    //                     <td>Body Splash</td>
    //                     <td>Listar Associado</td>
    //                     <td>UJ47R8S</td>
    //                 </tr>
    //                 <tr>
    //                     <td>13</td>
    //                     <td>Colônia Coffe Man</td>
    //                     <td>Listar Associado</td>
    //                     <td>FDAS94A</td>
    //                 </tr>
    //                 <tr>
    //                     <td>14</td>
    //                     <td>Skincare</td>
    //                     <td>Listar Associado</td>
    //                     <td>9WE8FWS</td>
    //                 </tr>
    //                 <tr>
    //                     <td>15</td>
    //                     <td>Césio Luquído</td>
    //                     <td>Listar Associado</td>
    //                     <td>F99W2C9</td>
    //                 </tr>
    //                 <tr>
    //                     <td>16</td>
    //                     <td>Americio de Limpeza</td>
    //                     <td>Listar Associado</td>
    //                     <td>98DF5AFE8</td>
    //                 </tr>
    //                 <tr>
    //                     <td>17</td>
    //                     <td>Gel de Limpeza Facial</td>
    //                     <td>Listar Associado</td>
    //                     <td>V3D9S5FW8</td>
    //                 </tr>
    //                 <tr>
    //                     <td>18</td>
    //                     <td>Kit Essenciais</td>
    //                     <td>Listar Associado</td>
    //                     <td>GER9S8DF9</td>
    //                 </tr>
    //             </tbody>
    //         </table>
    //     </div>
    // </div>
    // ";

    // }

?>

<script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>