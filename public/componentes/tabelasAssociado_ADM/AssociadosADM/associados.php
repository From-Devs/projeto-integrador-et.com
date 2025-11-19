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
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Telefone</th>
                    </tr>
                </thead>
            </table>
            <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                        <?php foreach ($listaAssociados as $associado): ?>
                            <tr>
                                <td><?= $associado['id_usuario'] ?></td>
                                <td><?= $associado['nome'] ?></td>
                                <td><?= $associado['email'] ?></td>
                                <td><?= "{$associado['cidade']} - {$associado['estado']}" ?></td>
                                <td><?= $associado['telefone'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    } elseif($nome == 'solicitacao'){
        ?>
        <div id="lista">
            <table id="tabelaVendas">
                <thead id="barraCima">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Validar</th>
                        <th class="motivo-header" style="display: none;">Motivo</th>
                    </tr>
                </thead>
            </table>
            <div class="tabela-body">
                <table id="tabelaVendas">
                    <tbody>
                        <?php 
                        echo PopUpComImagemETitulo("popUpValidou","popUp_Botoes/img-confirmar.png","120px","Associado validado com sucesso!");
                        echo PopUpComImagemETitulo("popUpRecusou","popUp_Botoes/img-cancelar.png","120px","Associado recusado com sucesso!");
                        foreach ($listaAssociados as $associado):
                            $userId = $associado['id_usuario'];
                            echo "<!-- UserId: $userId -->\n";

                            // Botões
                            $btnSimValidar = botaoPersonalizadoOnClick(
                                "Sim",
                                "btn-black",
                                "ValidarAssociado($userId)",
                                "100px",
                                "35px"
                            );
                            $btnNao = botaoPersonalizadoOnClick(
                                "Cancelar",
                                "btn-white",
                                "fecharPopUp()",
                                "100px",
                                "35px"
                            );
                            $btnSimCancelar = botaoPersonalizadoOnClick(
                                "Confirmar",
                                "btn-black",
                                "recusarAssociado($userId)",
                                "100px",
                                "35px"
                            );

                            // PopUps únicos por usuário
                            echo PopUpConfirmar("popUpConfirmar_$userId", "Deseja realmente VALIDAR esse associado?", $btnSimValidar, $btnNao);
                            echo PopUpConfirmar("popUpSobreProduto_$userId", $associado['nome']." - ".$associado['cidade']."/".$associado['estado'].":\n\n\"".$associado['sobreProdutos']."\"");
                            echo PopUpConfirmar("motivoRecuso_$userId", $associado['motivoDoRecuso'], null, null, "300px");
                            echo PopUpComInput("popUpCancelar_$userId", "Deseja realmente RECUSAR esse associado?", "Motivo...", $btnSimCancelar, $btnNao);
                        ?>
                        <tr>
                            <td data-label="ID"><?= $userId ?></td>
                            <td data-label="Nome"><?= $associado['nome'] ?></td>
                            <td data-label="E-mail"><?= $associado['email'] ?></td>
                            <td data-label="Cidade"><?= "{$associado['cidade']} - {$associado['estado']}" ?></td>
                            <td data-label="Ações">
                                <div class='verticalizacao'>
                                    <button 
                                        style="display: <?= !empty($associado['motivoDoRecuso']) ? 'none' : 'block' ?>"
                                        class='validarButton' onclick="botaoClicado = this; abrirPopUp('popUpConfirmar_<?= $userId ?>')">
                                        <img src='./../../../public/imagens/ET/aprovado.png' alt='aprovadoImage' title="Aprovar">
                                    </button>
                                    <button 
                                        style="display: <?= !empty($associado['motivoDoRecuso']) ? 'none' : 'block' ?>"
                                        class='cancelarButton' onclick="botaoClicado = this; abrirPopUp('popUpCancelar_<?= $userId ?>')">
                                        <img src='./../../../public/imagens/ET/cancelar.png' alt='cancelarImage' title="Recusar">
                                    </button>
                                    <button class='btnSobreProduto' onclick="botaoClicado = this; abrirPopUp('popUpSobreProduto_<?= $userId ?>')">
                                        <img src='/projeto-integrador-et.com/public/imagens/associado/chat-icone.png' alt='img-chat' title="Visualizar mensagem do associado">
                                    </button>
                                    <button 
                                        class='btnMotivoRecuso' 
                                        style="display: <?= !empty($associado['motivoDoRecuso']) ? 'block' : 'none' ?>" 
                                        onclick="botaoClicado = this; abrirPopUp('motivoRecuso_<?= $userId ?>')">
                                        <img src='/projeto-integrador-et.com/public/imagens/associado/chat-icone.png' alt='img-chat' title="Visualizar motivo do recuso">
                                    </button>
                                </div>
                            </td>
                            <td class="motivo_<?= $userId ?>" style="display: none;" data-motivo="">
                                <button onclick="abrirMotivo(this)">
                                    <img src="/projeto-integrador-et.com/public/imagens/associado/chat-icone.png" alt="chat-icone">
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    } else {
        echo "Você precisa informar a função qual é o tipo de tabela.";
    }
}
?>
