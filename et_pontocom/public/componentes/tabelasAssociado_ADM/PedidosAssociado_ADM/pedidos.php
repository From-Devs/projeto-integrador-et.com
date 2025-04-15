<?php

    function tabelaPedidos(){
        return "<div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>#</th>
                    <th id='th2' scope='col'>Nome Cliente</th>
                    <th id='th3' scope='col'>Nome Produto</th>
                    <th id='th4' scope='col'>Preço</th>
                    <th id='th5' scope='col'>Data</th>
                    <th id='bordaDireita' scope='col'>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Guilherme Nantes</td>
                    <td>Hidratante Natura +8</td>
                    <td>R$ 44,99</td>
                    <td>20/06/2024</td>
                    <td><div id='statusPago'>Pago</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
                <tr>
                    <td>2</td>
                    <td>Joao Pedro</td>
                    <td>Base Liquída</td>
                    <td>R$ 666,99</td>
                    <td>30/03/2024</td>
                    <td><div id='statusPago'> Pago</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
                <tr>
                    <td>3</td>
                    <td>Daniel Fagundes</td>
                    <td>Body Splash</td>
                    <td>R$ 42,91</td>
                    <td>19/08/2024</td>
                    <td><div id='statusPago'> Pago</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
                <tr>
                    <td>4</td>
                    <td>Henrico Queiroz</td>
                    <td>Colônia Coffe Woman</td>
                    <td>R$ 39,99</td>
                    <td>17/08/2024</td>
                    <td><div id='statusPendente'> Pendente</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
                <tr>
                    <td>5</td>
                    <td>Cecíliano Ferraz</td>
                    <td>Skincare</td>
                    <td>R$ 30,00</td>
                    <td>22/01/2024</td>
                    <td><div id='statusPendente'> Pendente</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
                <tr>
                    <td>6</td>
                    <td>Felipe Sales</td>
                    <td>Césio Liquído</td>
                    <td>R$ 23,50</td>
                    <td>12/08/2024</td>
                    <td><div id='statusPago'> Pago</div></td>
                    <!-- provavelmente vai ter que ter um botão aqui -->
                </tr>
            </tbody>
        </table>
    </div>
    ";
    
    }

?>