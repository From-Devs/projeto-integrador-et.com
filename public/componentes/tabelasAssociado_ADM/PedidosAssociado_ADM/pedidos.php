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
    $subtotal = 0;
    foreach ($detalhesPedidos as $item) {
        $subtotal += floatval($item['preco']) * intval($item['quantidade']);
    }

    $frete = 0;
    $total = $subtotal + $frete;
    ?>
    <div class="resumo-final" style="margin-top: 1em;">
        <table>
            <tbody>
                <tr>
                    <td style="text-align: center;"><strong>Subtotal:</strong></td>
                    <td style="text-align: center;">R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <td style="text-align: center;"><strong>Frete:</strong></td>
                    <td style="text-align: center;">R$ <?= number_format($frete, 2, ',', '.') ?></td>
                </tr>
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
        if(isset($pedido['tipoStatus']) && $pedido['tipoStatus'] != ""){
            $statusClass = $pedido['tipoStatus'] === 'Pago' ? 'statusPago' : 'statusPendente';
        }
        ?>
        <tr>
            <td><?= $pedido['id_pedido'] ?></td>
            <td><?= htmlspecialchars($pedido['nome']) ?></td>
            <td>R$ <?= number_format($pedido['precoTotal'], 2, ',', '.') ?></td>
            <td><?= date("d/m/Y - H:i", strtotime($pedido['dataPedido'])) ?></td>
            <td>
                <button id="<?= $statusClass?>" class="btnStatus" onclick="mudarStatus(this, <?= $pedido['id_pedido'] ?>)">
                    <p><?= $pedido['tipoStatus'] ?></p>
                </button>
            </td>
            <td>
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
    $tabela = "<div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th3' scope='col'>Preço</th>
                    <th id='th4' scope='col'>Data</th>
                    <th id='bordaDireita' scope='col'>Status Pagamento</th>
                    <th id='bordaDireita' scope='col'>Status Entrega</th>
                </tr>
            </thead>
        </table>

        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>";

    foreach ($pedidos as $pedido) {
        if(isset($pedido['tipoStatus']) && $pedido['tipoStatus'] != ""){
            $statusClass = $pedido['tipoStatus'] === 'Pago' ? 'statusPago' : 'statusPendente';
        }

        $data = date("d/m/Y - H:i", strtotime($pedido['dataPedido']));

        $tabela .= "<tr>
                    <td>{$pedido['id_pedido']}</td>
                    <td>{$pedido['nome']}</td>
                    <td>R$ " . number_format($pedido['precoTotal'], 2, ',', '.') . "</td>
                    <td>{$data}</td>
                    <td><div id='{$statusClass}'><p>{$pedido['tipoStatus']}</p></div></td>
                    <td>
                        <select name='statusEntrega' id='statusEntrega'>
                            <option value='pendente'>Pendente</option>
                            <option value='pendente'>Pendente</option>
                            <option value='pendente'>Pendente</option>
                        </select>
                    </td>
                </tr>";
    }

    $tabela .= "    </tbody>
            </table>
        </div>
    </div>";

    return $tabela;
}

/*function tabelaPedidosADM($pedidos) {
    $tabela = "<div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th4' scope='col'>Preço</th>
                    <th id='th5' scope='col'>Data</th>
                    <th id='bordaDireita' scope='col'>Status</th>
                    <th id='bordaDireita' scope='col'></th>
                </tr>
            </thead>
        </table>

        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>";

    $contador = 1;
    foreach ($pedidos as $pedido) {
        ?>
        <!--Tive que colocar o modal dentro do forEach para conseguir pegar os dados (data) específicos para cada pedido identificado-->
        <dialog id="modalDetalhesDoPedido<?= $contador ?>" class="modalDetalhesDoPedido">
            <div class="containerHeader">
                <div class="containerFechar">
                    <button class="btn-fechar" onclick='fecharPopUp("modalDetalhesDoPedido<?= $contador?>")'>
                        <img class="img-fechar" src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png" alt="img-fechar">
                    </button>
                </div>
                <div class="headerDetalhes">
                    <h1>Detalhes do Pedido</h1>
                    <div class="dadosHeader">
                        <h3>Data do Pedido: <?php
                        echo $pedido['data']?></h3>
                        <h3>Pedidos Totais: <?php echo count($pedido['detalhesPedido'])?></h3>
                    </div>
                </div>
            </div>
            <div id="componenteTabelaProdutos">
                <?php 
                // $resultado = paginar($pedido['detalhesPedido'], 1, 'pageProdutos'.$contador);
                // echo detalhesPedidos($resultado['dados']);
                // renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas'], 'pageProdutos'.$contador);
                ?>
            </div>

            
            <div class="containerBaixo">
                <div id="componenteTotaisAssociados">
                    <h3>Total a pagar:</h3>
                    <?php 
                    // $resultado = paginar($pedido['infoPagamentos'], 5, 'pagePagamentos'.$contador);
                    // echo tabelaTotaisAssociado($resultado['dados']);
                    // renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas'], 'pagePagamentos'.$contador);
                    ?>
                </div>
                <div id="componenteResumoFinal">
                    <?php 
                    // echo resumoFinal($pedido['detalhesPedido']); 
                    ?>
                </div>
            </div>
        </dialog>
        <?php
        $statusClass = $pedido['status'] === 'Pago' ? 'statusPago' : 'statusPendente';

        echo popUpCurto("popUpStatus", "Status alterado com sucesso!", "green", "white");
        
        if(isset($pedido['tipoStatus']) && $pedido['tipoStatus'] != ""){
            $statusClass = $pedido['tipoStatus'] === 'Pago' ? 'statusPago' : 'statusPendente';
        }
        
        $tabela .= "<tr>
                    <td>{$contador}</td>
                    <td>{$pedido['nomeCliente']}</td>
                    <td>R$ " . number_format($pedido['preco'], 2, ',', '.') . "</td>
                    <td>{$pedido['data']}</td>
                    <td>
                        <button id='{$statusClass}' class='btnStatus' 
                            onclick='mudarStatus(this, {$pedido["id_pedido"]})'>
                            <p>{$pedido['tipoStatus']}</p>
                        </button>
                    </td>
                    <td>
                        <button class='tresPontos' onclick='abrirPopUp(\"modalDetalhesDoPedido{$contador}\")'><img src='/projeto-integrador-et.com/public/imagens/imagensADM/tresPontos.png' alt='img-tresPontos'></button>
                    </td>
                </tr>";
        $contador++;
    }

    $tabela .= "    </tbody>
            </table>
        </div>
    </div>";

    return $tabela;
}*/