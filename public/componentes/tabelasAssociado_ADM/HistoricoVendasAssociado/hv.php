<?php
function tabelaHistoricoVendas($vendas){
    ?>
    <div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Nome Produto</th>
                    <th id='th3' scope='col'>Data De Venda</th>
                    <th id='th4' scope='col'>Preço</th>
                    <th id='th5' scope='col'>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($vendas as $venda): 
                    $data = date("d/m/Y - H:i", strtotime($venda['dataVenda']));
                    ?>
                    <tr>
                        <td class='idProduto'><?= $venda['id_pedido_produto'] ?></td>
                        <td><?= $venda['nomeProduto'] ?></td>
                        <td><?= $data ?></td>
                        <td id='precoassoc'><?= $venda['preco'] ?></td>
                        <td><?= $venda['quantidade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php
}
?>