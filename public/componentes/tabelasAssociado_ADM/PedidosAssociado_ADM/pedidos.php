<?php

function detalhesPedidos($detalhesPedidos) {
    $html = '<div class="tabela-produtos">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Produto</th>
                    <th>Associado</th>
                    <th>Preço</th>
                    <th>Qtde.</th>
                </tr>
            </thead>
        </table>
        <div class="scroll-tbody">
            <table>
                <tbody>';
    
    foreach ($detalhesPedidos as $item) {
        $html .= '<tr>
            <td>' . $item['idProduto'] . '</td>
            <td>' . $item['nomeProduto'] . '</td>
            <td>' . $item['associado'] . '</td>
            <td style="color: green;">R$ ' . number_format($item['preco'], 2, ',', '.') . '</td>
            <td>' . $item['quantidade'] . '</td>
        </tr>';
    }

    $html .= '</tbody>
            </table>
        </div>
    </div>';

    return $html;
}


function tabelaTotaisAssociado($infoPagamentos) {
    $html = '<div class="tabela-totais-associado">
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
                <tbody>';

    foreach ($infoPagamentos as $pagamento) {
        $html .= '<tr>
            <td>' . $pagamento['associado'] . '</td>
            <td>' . $pagamento['telefone'] . '</td>
            <td style="color: green;">R$ ' . number_format($pagamento['valor'], 2, ',', '.') . '</td>
        </tr>';
    }

    $html .= '</tbody>
            </table>
        </div>
    </div>';

    return $html;
}

function resumoFinal($detalhesPedidos) {
    $subtotal = array_sum(array_column($detalhesPedidos, 'preco'));

    $html = '<div class="resumo-final" style="margin-top: 1em;">
        <table>
            <tbody>
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td style="text-align: right;">R$ ' . number_format($subtotal, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td><strong>Frete:</strong></td>
                    <td style="text-align: right;">R$ ' . number_format(0, 2, ',', '.') . '</td>
                </tr>
                <tr>
                    <td><strong>Total:</strong></td>
                    <td style="text-align: right;">R$ ' . number_format($subtotal, 2, ',', '.') . '</td>
                </tr>
            </tbody>
        </table>
    </div>';

    return $html;
}


function tabelaPedidosADM($pedidos) {
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
                $resultado = paginar($pedido['detalhesPedido'], 1, 'pageProdutos'.$contador);
                echo detalhesPedidos($resultado['dados']);
                renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas'], 'pageProdutos'.$contador);
                ?>
            </div>

            
            <div class="containerBaixo">
                <div id="componenteTotaisAssociados">
                    <h3>Total a pagar:</h3>
                    <?php 
                    $resultado = paginar($pedido['infoPagamentos'], 5, 'pagePagamentos'.$contador);
                    echo tabelaTotaisAssociado($resultado['dados']);
                    renderPaginacao($resultado['paginaAtual'], $resultado['totalPaginas'], 'pagePagamentos'.$contador);
                    ?>
                </div>
                <div id="componenteResumoFinal">
                    <?php echo resumoFinal($pedido['detalhesPedido']); ?>
                </div>
            </div>
        </dialog>
        <?php
        $statusClass = $pedido['status'] === 'Pago' ? 'statusPago' : 'statusPendente';

        $tabela .= "<tr>
                    <td>{$contador}</td>
                    <td>{$pedido['nomeCliente']}</td>
                    <td>R$ " . number_format($pedido['preco'], 2, ',', '.') . "</td>
                    <td>{$pedido['data']}</td>
                    <td><div id='{$statusClass}'>{$pedido['status']}</div></td>
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
                    <th id='bordaDireita' scope='col'>Status</th>
                </tr>
            </thead>
        </table>

        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>";

    $contador = 1;
    foreach ($pedidos as $pedido) {
        $statusClass = $pedido['status'] === 'Pago' ? 'statusPago' : 'statusPendente';

        $tabela .= "<tr>
                    <td>{$contador}</td>
                    <td>{$pedido['nomeCliente']}</td>
                    <td>R$ " . number_format($pedido['preco'], 2, ',', '.') . "</td>
                    <td>{$pedido['data']}</td>
                    <td><div id='{$statusClass}'><p>{$pedido['status']}<p></div></td>
                </tr>";
        $contador++;
    }

    $tabela .= "    </tbody>
            </table>
        </div>
    </div>";

    return $tabela;
}

?>

<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>