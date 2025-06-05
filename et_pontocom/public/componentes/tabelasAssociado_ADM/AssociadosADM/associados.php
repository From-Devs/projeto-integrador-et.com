<?php

    function associadosTabela($nome){
        if($nome == 'associado'){
            return "<div id='lista'>
            <table id='tabelaVendas'>
                <thead id='barraCima'>
                    <tr>
                        <th id='th1' scope='col'>#</th>
                        <th id='th2' scope='col'>Nome</th>
                        <th id='th3' scope='col'>E-mail</th>
                        <th id='th4' scope='col'>Cidade</th>
                        <th id='th5' scope='col'>Telefone</th>
                    </tr>
                </thead>
            </table>
            <div class='tabela-body'>
                <table id='tabelaVendas'>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Eduardo Serafim</td>
                            <td>eduardoserafiim05@gmail.com</td>
                            <td>Campo Grande</td>
                            <td>+55 (67) 99191-2838</td>
                            <!-- provavelmente vai ter que ter um botão aqui -->
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Oliveira</td>
                            <td>maria.oliveira@gmail.com</td>
                            <td>São Paulo</td>
                            <td>+55 (11) 98765-4321</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>João Santos</td>
                            <td>joao.santos@email.com</td>
                            <td>Rio de Janeiro</td>
                            <td>+55 (21) 99876-5432</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ana Costa</td>
                            <td>ana.costa@hotmail.com</td>
                            <td>Belo Horizonte</td>
                            <td>+55 (31) 91234-5678</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lucas Pereira</td>
                            <td>lucaspereira@gmail.com</td>
                            <td>Curitiba</td>
                            <td>+55 (41) 99887-6543</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Fernanda Silva</td>
                            <td>fernanda.silva@outlook.com</td>
                            <td>Porto Alegre</td>
                            <td>+55 (51) 99765-4321</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Carlos Souza</td>
                            <td>carlos.souza@gmail.com</td>
                            <td>Recife</td>
                            <td>+55 (81) 96543-2109</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Patrícia Rocha</td>
                            <td>patricia.rocha@yahoo.com</td>
                            <td>Salvador</td>
                            <td>+55 (71) 98877-6655</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Felipe Almeida</td>
                            <td>felipe.almeida@gmail.com</td>
                            <td>Fortaleza</td>
                            <td>+55 (85) 94567-4321</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Mariana Martins</td>
                            <td>mariana.martins@outlook.com</td>
                            <td>Brasília</td>
                            <td>+55 (61) 96123-4587</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Renato Lima</td>
                            <td>renato.lima@gmail.com</td>
                            <td>Manaus</td>
                            <td>+55 (92) 99456-7890</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Carla Martins</td>
                            <td>carla.martins@yahoo.com</td>
                            <td>Belém</td>
                            <td>+55 (91) 96345-9087</td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Gabriel Costa</td>
                            <td>gabriel.costa@gmail.com</td>
                            <td>Florianópolis</td>
                            <td>+55 (48) 99876-1234</td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Juliana Pereira</td>
                            <td>juliana.pereira@outlook.com</td>
                            <td>Vitória</td>
                            <td>+55 (27) 99123-6547</td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Ricardo Oliveira</td>
                            <td>ricardo.oliveira@email.com</td>
                            <td>Natal</td>
                            <td>+55 (84) 93456-7891</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Juliana Souza</td>
                            <td>juliana.souza@gmail.com</td>
                            <td>São Luís</td>
                            <td>+55 (98) 95567-2345</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Vitor Costa</td>
                            <td>vitor.costa@gmail.com</td>
                            <td>Campinas</td>
                            <td>+55 (19) 99111-2233</td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Simone Almeida</td>
                            <td>simone.almeida@outlook.com</td>
                            <td>Joinville</td>
                            <td>+55 (47) 99788-6655</td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Felipe Rocha</td>
                            <td>felipe.rocha@gmail.com</td>
                            <td>Aracaju</td>
                            <td>+55 (79) 99222-4455</td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Isabela Pereira</td>
                            <td>isabela.pereira@email.com</td>
                            <td>São José dos Campos</td>
                            <td>+55 (12) 98844-2211</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>";
        }elseif($nome == 'solicitacao'){
            return "<div id='lista'>
            <table id='tabelaVendas'>
                <thead id='barraCima'>
                    <tr>
                        <th id='th1' scope='col'>#</th>
                        <th id='th2' scope='col'>Nome</th>
                        <th id='th3' scope='col'>E-mail</th>
                        <th id='th4' scope='col'>Cidade</th>
                        <th id='th5' scope='col'>Validar</th>
                    </tr>
                </thead>
            </table>
            <div class='tabela-body'>
                <table id='tabelaVendas'>
                    <tbody>
                            <tr>
                            <td>1</td>
                            <td>Eduardo Serafim</td>
                            <td>eduardoserafiim05@gmail.com</td>
                            <td>Campo Grande</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Oliveira</td>
                            <td>maria.oliveira@gmail.com</td>
                            <td>São Paulo</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>João Santos</td>
                            <td>joao.santos@email.com</td>
                            <td>Rio de Janeiro</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ana Costa</td>
                            <td>ana.costa@hotmail.com</td>
                            <td>Belo Horizonte</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Lucas Pereira</td>
                            <td>lucaspereira@gmail.com</td>
                            <td>Curitiba</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Fernanda Silva</td>
                            <td>fernanda.silva@outlook.com</td>
                            <td>Porto Alegre</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Carlos Souza</td>
                            <td>carlos.souza@gmail.com</td>
                            <td>Recife</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Patrícia Rocha</td>
                            <td>patricia.rocha@yahoo.com</td>
                            <td>Salvador</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Felipe Almeida</td>
                            <td>felipe.almeida@gmail.com</td>
                            <td>Fortaleza</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Mariana Martins</td>
                            <td>mariana.martins@outlook.com</td>
                            <td>Brasília</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Renato Lima</td>
                            <td>renato.lima@gmail.com</td>
                            <td>Manaus</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Carla Martins</td>
                            <td>carla.martins@yahoo.com</td>
                            <td>Belém</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Gabriel Costa</td>
                            <td>gabriel.costa@gmail.com</td>
                            <td>Florianópolis</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Juliana Pereira</td>
                            <td>juliana.pereira@outlook.com</td>
                            <td>Vitória</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Ricardo Oliveira</td>
                            <td>ricardo.oliveira@email.com</td>
                            <td>Natal</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Juliana Souza</td>
                            <td>juliana.souza@gmail.com</td>
                            <td>São Luís</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Vitor Costa</td>
                            <td>vitor.costa@gmail.com</td>
                            <td>Campinas</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td>Simone Almeida</td>
                            <td>simone.almeida@outlook.com</td>
                            <td>Joinville</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>Felipe Rocha</td>
                            <td>felipe.rocha@gmail.com</td>
                            <td>Aracaju</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>Isabela Pereira</td>
                            <td>isabela.pereira@email.com</td>
                            <td>São José dos Campos</td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton'><img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'></button>
                                <button class='cancelarButton'><img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'></button>
                            </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>";
    }else{
        echo "Você precisa informar a função qual é o tipo de tabela.";
    }
}

?>