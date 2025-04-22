<?php

    function tabelaProduto(){
        return "<div id='lista'>
        <table id='tabelaVendas'>
            <thead id='barraCima'>
                <tr>
                    <th id='bordaEsquerda' scope='col'>ID</th>
                    <th id='th2' scope='col'>Produto</th>
                    <th id='th3' scope='col'>Estoque</th>
                    <th id='th4' scope='col'>Custo</th>
                    <th id='th5' scope='col'>Preço</th>
                    <th id='th6' scope='col'>Pedidos</th>
                    <th id='th7' scope='col'>SKU</th>
                </tr>
            </thead>
        </table>
    
        <div class='tabela-body'>
            <table id='tabelaVendas'>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Hidratante</td>
                        <td>26</td>
                        <td>R$ 12.00</td>
                        <td>R$ 29.90</td>
                        <td>1243</td>
                        <td>S5D56GE</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Base Liquída</td>
                        <td>32</td>
                        <td>R$ 14.00</td>
                        <td>R$ 27.90</td>
                        <td>543</td>
                        <td>FA9DSF56</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Body Splash</td>
                        <td>105</td>
                        <td>R$ 13.00</td>
                        <td>R$ 34.90</td>
                        <td>432</td>
                        <td>UJ47R8S</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Colônia Coffe Man</td>
                        <td>64</td>
                        <td>R$ 9.00</td>
                        <td>R$ 18.90</td>
                        <td>368</td>
                        <td>FDAS94A</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Skincare</td>
                        <td>82</td>
                        <td>R$ 5.00</td>
                        <td>R$ 16.90</td>
                        <td>321</td>
                        <td>9WE8FWS</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Césio Luquído</td>
                        <td>22</td>
                        <td>R$ 12.00</td>
                        <td>R$ 39.90</td>
                        <td>302</td>
                        <td>F99W2C9</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Americio de Limpeza</td>
                        <td>14</td>
                        <td>R$ 8.00</td>
                        <td>R$ 22.90</td>
                        <td>298</td>
                        <td>98DF5AFE8</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Gel de Limpeza Facial</td>
                        <td>35</td>
                        <td>R$ 4.00</td>
                        <td>R$ 19.90</td>
                        <td>256</td>
                        <td>V3D9S5FW8</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Kit Essenciais</td>
                        <td>40</td>
                        <td>R$ 16.00</td>
                        <td>R$ 54.90</td>
                        <td>234</td>
                        <td>GER9S8DF9</td>
                    </tr>
                    
                    <tr>
                        <td>10</td>
                        <td>Hidratante</td>
                        <td>26</td>
                        <td>R$ 12.00</td>
                        <td>R$ 29.90</td>
                        <td>1243</td>
                        <td>S5D56GE</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Base Liquída</td>
                        <td>32</td>
                        <td>R$ 14.00</td>
                        <td>R$ 27.90</td>
                        <td>543</td>
                        <td>FA9DSF56</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Body Splash</td>
                        <td>105</td>
                        <td>R$ 13.00</td>
                        <td>R$ 34.90</td>
                        <td>432</td>
                        <td>UJ47R8S</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Colônia Coffe Man</td>
                        <td>64</td>
                        <td>R$ 9.00</td>
                        <td>R$ 18.90</td>
                        <td>368</td>
                        <td>FDAS94A</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Skincare</td>
                        <td>82</td>
                        <td>R$ 5.00</td>
                        <td>R$ 16.90</td>
                        <td>321</td>
                        <td>9WE8FWS</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Césio Luquído</td>
                        <td>22</td>
                        <td>R$ 12.00</td>
                        <td>R$ 39.90</td>
                        <td>302</td>
                        <td>F99W2C9</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Americio de Limpeza</td>
                        <td>14</td>
                        <td>R$ 8.00</td>
                        <td>R$ 22.90</td>
                        <td>298</td>
                        <td>98DF5AFE8</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Gel de Limpeza Facial</td>
                        <td>35</td>
                        <td>R$ 4.00</td>
                        <td>R$ 19.90</td>
                        <td>256</td>
                        <td>V3D9S5FW8</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Kit Essenciais</td>
                        <td>40</td>
                        <td>R$ 16.00</td>
                        <td>R$ 54.90</td>
                        <td>234</td>
                        <td>GER9S8DF9</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    ";

}

echo tabelaProduto();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="produto.css">
</head>
<body>
    
</body>
</html>

<!-- falta fazer a parte dos botoes (lixeira e editar) -->