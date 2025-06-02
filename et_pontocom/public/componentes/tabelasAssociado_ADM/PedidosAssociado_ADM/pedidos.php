<?php

function tabelaPedidos($pedidos) {
    $tabela = "<div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>#</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th3' scope='col'>Nome Produto</th>
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
        $statusClass = $pedido['status'] === 'Pago' ? 'statusPago' : 'statusPendente';

        $tabela .= "<tr>
                    <td>{$contador}</td>
                    <td>{$pedido['nomeCliente']}</td>
                    <td>{$pedido['nomeProduto']}</td>
                    <td>R$ " . number_format($pedido['preco'], 2, ',', '.') . "</td>
                    <td>{$pedido['data']}</td>
                    <td><div id='{$statusClass}'>{$pedido['status']}</div></td>
                    <td>
                        <button>Teste</button>
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


?>