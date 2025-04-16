<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";


    session_start();
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico De Vendas-Associado</title>
    <link rel="stylesheet" href="../../../public/css/HistoricoDeVendasAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>
    
    <div id="container">   
        <div id="controleIcon">
            <div id="iconUsuario">
                <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                <div id="texts">
                    <p id="textUser">Wellinton R.</p>
                    <p id="textUser2">Vendedor ET</p>
                </div>
            </div>
        </div> 
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
                        <td class="idProduto">1</td>
                        <td>Puro Voodoo</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc" >R$66,666</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">2</td>
                        <td>Base Wepink</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc" >R$55,555</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">3</td>
                        <td>Body Splash Wepink</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$11,444</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">4</td>
                        <td>Perfume da Barbie</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$33,333</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">5</td>
                        <td>Perfume Carros Katchau</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$22,222</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">6</td>
                        <td>Perfume do Ben 10</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$21,444</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">7</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$99,999</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">8</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">9</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">10</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">11</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">12</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">13</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">14</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">15</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">16</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">17</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">18</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">19</td>
                        <td>Perfume do Skibidi Toilet</td>
                        <td>19/08/24 14:50</td>
                        <td id="precoassoc">R$666,66</td>
                        <td>666</td>
                        <!-- provavelmente vai ter que ter um botão aqui -->
                    </tr>
                    <tr>
                        <td class="idProduto">20</td>
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
<script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
<script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
</body>
</html>