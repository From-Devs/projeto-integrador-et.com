<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../public/css/HistoricoDeVendasAssociado.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <div class="sidebar_adm">
        <nav class="nav_adm">
            <div class="logo">
                <img src="../../../public/imagens/ET/LogoBranca1.png" alt="">
            </div>
            <div class="linhaGradiente"></div>
            <div class="buttons_geral">
                <div class="botoesMenu">
                    <ul>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="fa fa-house-chimney" ></span>
                                <span class="button_name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class='bx bxs-package'></span>
                                <span class="button_name">Produtos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class='bx bx-money-withdraw' ></span>
                                <span class="button_name">Pedidos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="fa fa-clock"></span>
                                <span class="button_name">Histórico de Vendas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="#" class="nav-link">
                                <span class='bx bxs-receipt'></span>
                                <span class="button_name">Relatórios</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="area_Sair">
                    <a href="#"  class="button_sair" style="margin-top: 342px;">
                        <span class="fa fa-arrow-right-from-bracket"></span>
                        <span class="button_name">Voltar à tela inicial</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="container">    
        <div id="pesquisar">
                <form action="">
                    <input id="inputPesquisar" type="text" placeholder="Pesquisar Produto... ">
                </form> 
        </div>
        <div id="vendasmais">
            <h1>Vendas mais recentes</h1>
        </div>
        <div id="lista">
            <table id="tabelaVendas">
                <thead id="barraCima">
                    <tr>
                        <th id="bordaEsquerda" scope='col'>ID</th>
                        <th id="th2" scope='col'>Nome Produto</th>
                        <th id="th3" scope='col'>Data De Venda</th>
                        <th id="th4" scope='col'>Preço</th>
                        <th id="th5" scope='col'>Qtde.</th>
                    </tr>
                </thead>
            </table>

        <div class="tabela-body">
            <table id="tabelaVendas">
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Puro Voodoo</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc" >R$66,666</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Base Wepink</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc" >R$55,555</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Body Splash Wepink</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$11,444</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Perfume da Barbie</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$33,333</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Perfume Carros Katchau</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$22,222</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Perfume do Ben 10</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$21,444</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$99,999</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

    
<script src="script.js"></script>
</body>
</html>