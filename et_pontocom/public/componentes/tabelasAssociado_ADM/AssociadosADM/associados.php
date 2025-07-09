<?php
    require_once __DIR__."/../../popup/popUp.php";
    require_once __DIR__."/../../botao/botao.php";

    function associadosTabela($nome, $listaAssociados){
        if($nome == 'associado'){
            ?>
            <div id="lista">
                <table id="tabelaVendas">
                    <thead id="barraCima">
                        <tr>
                            <th id="th1" scope="col">ID</th>
                            <th id="th2" scope="col">Nome</th>
                            <th id="th3" scope="col">E-mail</th>
                            <th id="th4" scope="col">Cidade</th>
                            <th id="th5" scope="col">Telefone</th>
                        </tr>
                    </thead>
                </table>
                <div class="tabela-body">
                    <table id="tabelaVendas">
                        <tbody>
                            <?php foreach ($listaAssociados as $associado): ?>
                                <tr>
                                    <td><?php echo $associado['id']; ?></td>
                                    <td><?php echo $associado['nome']; ?></td>
                                    <td><?php echo $associado['email']; ?></td>
                                    <td><?php echo $associado['cidade']; ?></td>
                                    <td><?php echo $associado['telefone']; ?></td>
                                    <!-- Adicione aqui botões ou ações se quiser -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        }elseif($nome == 'solicitacao'){
            echo PopUpConfirmar("popUpMotivo", "", null, null, null, "white", "red", "1.2rem");
            ?>
            <div id="lista">
            <table id="tabelaVendas">
                <thead id="barraCima">
                    <tr>
                        <th id="th1" scope="col">ID</th>
                        <th id="th2" scope="col">Nome</th>
                        <th id="th3" scope="col">E-mail</th>
                        <th id="th4" scope="col">Cidade</th>
                        <th id="th5" scope="col">Validar</th>
                        <th class="motivo-header" style="display: none;"></th>
                    </tr>
                </thead>
            </table>
            <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                    <?php foreach ($listaAssociados as $associado): 
                        $btnSimValidar = botaoPersonalizadoOnClick("Sim", "btn-black", "preencheValidar()", "100px", "35px");

                        $btnNao = botaoPersonalizadoOnClick("Cancelar", "btn-white", "fecharPopUp()", "100px", "35px");

                        echo PopUpConfirmar("popUpConfirmar", "Deseja realmente VALIDAR esse associado?", $btnSimValidar, $btnNao);

                        
                        $btnSimCancelar = botaoPersonalizadoOnClick(
                            "Confirmar",
                            "btn-black",
                            'preencheCancelar()',
                            "100px",
                            "35px"
                        );
                        echo PopUpComInput("popUpCancelar", "Deseja realmente NÃO VALIDAR esse associado?", "Motivo...", $btnSimCancelar, $btnNao);
                        ?> 
                        <tr>
                            <td><?php echo $associado['id']?></td>
                            <td><?php echo $associado['nome']?></td>
                            <td><?php echo $associado['email']?></td>
                            <td><?php echo $associado['cidade']?></td>
                            <td>
                            <div class='verticalizacao'>
                                <button class='validarButton' onclick="botaoClicado = this; abrirPopUp('popUpConfirmar')">
                                <img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage'>
                                </button>
                                <button class='cancelarButton' onclick="botaoClicado = this; abrirPopUp('popUpCancelar')">
                                    <img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage'>
                                </button>
                            </div>
                            </td>
                            <td class="motivo" style="display: none;" data-motivo="">
                                <button onclick="abrirMotivo(this)">
                                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/associado/chat-icone.png" alt="chat-icone">
                                </button>
                            </td>

                        </tr>
                    <?php endforeach?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }else{
        echo "Você precisa informar a função qual é o tipo de tabela.";
    }
}

?>