<?php

function detalhesPedidos($detalhesPedidos) { 
    $resultado = paginar($detalhesPedidos, 5);
    ?>
    <div id="lista" style="width: 100%;">
        <table id="tabelaVendas">
            <thead id="barraCima">
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Associado</th>
                    <th>Preço</th>
                    <th>Qtde.</th>
                </tr>
            </thead>
        </table>
        <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                        <?php foreach ($resultado['dados'] as $item): ?>
                            <tr>
                                <td><?= $item['id_produto'] ?></td>
                                <td><?= htmlspecialchars($item['nomeProduto']) ?></td>
                                <td><?= htmlspecialchars($item['nomeUsuario']) ?></td>
                                <td style="color: green;">R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
                                <td><?= $item['quantidade'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
<?php
renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas']);
}


function tabelaTotaisAssociado($infoPagamentos) { ?>
    <div class="tabela-totais-associado">
        <table>
            <thead>
                <tr>
                    <th>Associado</th>
                    <th>Telefone</th>
                    <th>Valor</th>
                </tr>
            </thead>
        </table>
        <div class="scroll-tbody">
            <table>
                <tbody>
                    <?php foreach ($infoPagamentos as $pagamento): ?>
                        <tr>
                            <td><?= htmlspecialchars($pagamento['associado']) ?></td>
                            <td><?= htmlspecialchars($pagamento['telefone']) ?></td>
                            <td style="color: green;">R$ <?= number_format($pagamento['valor'], 2, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
}

function resumoFinal($detalhesPedidos) {
    $total = 0;
    foreach ($detalhesPedidos as $item) {
        $total += floatval($item['preco']) * intval($item['quantidade']);
    }

    ?>
    <div class="resumo-final" style="margin-top: 1em;">
        <table>
            <tbody>
                <tr>
                    <td style="text-align: center;"><strong>Total:</strong></td>
                    <td style="text-align: center;">R$ <?= number_format($total, 2, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}


function tabelaPedidosADM($pedidos) {
    ?>
    <div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th3' scope='col'>Total</th>
                    <th id='th4' scope='col'>Data</th>
                    <th id='bordaDireita' scope='col'>Status Pagamento</th>
                    <th id='bordaDireita' scope='col'></th>
                </tr>
            </thead>
        </table>

        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>

    <?php foreach ($pedidos as $pedido): 
        echo popUpCurto("popUpStatus", "Status alterado com sucesso!", "green", "white", "/popUp_Botoes/img-confirmar.png");
        if(isset($pedido['statusPagamento']) && $pedido['statusPagamento'] != ""){
            $statusClass = $pedido['statusPagamento'] === 'Pago' ? 'statusPago' : 'statusPendente';
        }
        ?>
        <tr>
            <td data-label="ID"><?= $pedido['id_pedido'] ?></td>
            <td data-label="Nome"><?= htmlspecialchars($pedido['nome']) ?></td>
            <td data-label="Preço">R$ <?= number_format($pedido['precoTotal'], 2, ',', '.') ?></td>
            <td data-label="Data Pedido"><?= date("d/m/Y - H:i", strtotime($pedido['dataPedido'])) ?></td>
            <td data-label="Status Pagamento">
                <button id="<?= $statusClass?>" class="btnStatus" onclick="mudarStatus(this, <?= $pedido['id_pedido'] ?>)">
                    <p><?= $pedido['statusPagamento'] ?></p>
                </button>
            </td>
            <td data-label="Mais Detalhes">
                <button class="tresPontos" onclick="abrirPopUpRedireciona('modalDetalhesDoPedido<?= $pedido['id_pedido'] ?>')">
                    <img src="/projeto-integrador-et.com/public/imagens/imagensADM/tresPontos.png" alt="Abrir Detalhes">
                </button>
            </td>
        </tr>
        
    <?php endforeach; ?>
        </tbody>
        </table>
    
    <?php foreach ($pedidos as $pedido): ?>
        <!-- MODAL DE DETALHES -->
        <dialog id="modalDetalhesDoPedido<?= $pedido['id_pedido'] ?>" class="modalDetalhesDoPedido">
            <div class="containerHeader">
                <div class="containerFechar">
                    <button class="btn-fechar" onclick="fecharPopUp('modalDetalhesDoPedido<?= $pedido['id_pedido'] ?>')">
                        <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="Fechar">
                    </button>
                </div>
                <div class="headerDetalhes">
                    <h1>Detalhes do Pedido</h1>
                    <div class="dadosHeader">
                        <h3>Data do Pedido: <?= date("d/m/Y", strtotime($pedido['dataPedido'])) ?></h3>
                        <h3>Produtos: <?= count($pedido['detalhesPedido']) ?></h3>
                    </div>
                </div>
            </div>
        
            <div id="componenteTabelaProdutos">
                <?php detalhesPedidos($pedido['detalhesPedido']); ?>
            </div>
    
            <div class="containerBaixo">
                <div id="componenteResumoFinal">
                    <?php resumoFinal($pedido['detalhesPedido']); ?>
                </div>
            </div>
        </dialog>
    <?php endforeach; ?>
</div>
</div>
<?php
}


function tabelaPedidosAssociado($pedidos) { 
    echo popUpCurto("popUpStatusEntrega", "Status de entrega alterado com sucesso!", "green", "white", "/popUp_Botoes/img-confirmar.png");
    ?>
    <div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th2' scope='col'>Nome Produto</th>
                    <th id='th3' scope='col'>Preço</th>
                    <th id='th4' scope='col'>Data</th>
                    <th id='bordaDireita' scope='col'>Status Pagamento</th>
                    <th id='bordaDireita' scope='col'>Status Entrega</th>
                </tr>
            </thead>
        </table>

        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>
                    <?php foreach ($pedidos as $pedido):
                        if(isset($pedido['statusPagamento']) && $pedido['statusPagamento'] != ""){
                            $statusClass = $pedido['statusPagamento'] === 'Pago' ? 'statusPago' : 'statusPendente';
                        } else {
                            $statusClass = 'statusPendente';
                        }

                        $data = date("d/m/Y - H:i", strtotime($pedido['dataPedido']));
                    ?>
                        <tr>
                            <td data-label="ID"><?= $pedido['id_pedido'] ?></td>
                            <td data-label="Cliente"><?= htmlspecialchars($pedido['nome']) ?></td>
                            <td data-label="Produto"><?= htmlspecialchars($pedido['nomeProduto']) ?></td>
                            <td data-label="Preço">R$ <?= number_format($pedido['preco'], 2, ',', '.') ?></td>
                            <td data-label="Data"><?= $data ?></td>
                            <td data-label="Pagamento"><div id='<?= $statusClass ?>'><p><?= $pedido['statusPagamento'] ?></p></div></td>
                            <td>
                                <?php
                                $valorStatusEntrega = isset($pedido['statusEntrega']) ? $pedido['statusEntrega'] : '';
                                $selectId = 'statusEntrega_' . $pedido['id_pedido'];
                                $opcoes = [
                                    'Aguardando Confirmação',
                                    'Em Andamento',
                                    'Enviado',
                                    'Concluído',
                                    'Cancelado',
                                    'Devolvido'
                                ];
                                ?>
                                <select class='selectStatusEntrega' name='statusEntrega' id='<?= $selectId ?>' onchange="atualizarStatusEntrega(this, <?= $pedido['id_pedido'] ?>)">
                                    <?php foreach ($opcoes as $op): ?>
                                        <option value='<?= $op ?>' <?= ($op === $valorStatusEntrega) ? 'selected' : '' ?>><?= $op ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }