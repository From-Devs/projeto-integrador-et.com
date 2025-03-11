<?php

//Tipos: alerta, pergunta
function PopUpConfirmar($id, $texto, $botao1 = "", $botao2 = "", $largura="auto", $corFundo="white", $corFonte="black", $tamanhoFonte="1.5rem"){
    return "
    <dialog class='$id popUpDialog'>
    <div class='popUp' style='width: $largura; background-color: $corFundo;'>
            <div class='fecharPopUp'>
                <img class='icone-fechar' src='/projeto-integrador-et.com/et_pontocom/public/imagens/icone-fechar.png' alt='img-fechar-popUp'>
            </div>
            <div>
                <p class='texto-popUp' style='font-size: $tamanhoFonte; color: $corFonte'>$texto</p>
            </div>
            <div class='botoes-popUp'>
                $botao1
                $botao2
            </div>
        </div>
    </dialog>
        ";
}

function PopUpComImagemETitulo($id, $caminhoImagem, $tamanhoImagem, $titulo, $subtitulo = "", $botao1 = "", $botao2 = "", $largura="auto", $corFundo="white", $corFonte="black", $tamanhoTitulo="1.5rem", $tamanhoSubtitulo="1rem") {
    return "
    <dialog class='$id popUpDialog'>
        <div class='popUp' style='width: $largura; background-color: $corFundo;'>
            <div class='fecharPopUp'>
                <img class='icone-fechar' src='/projeto-integrador-et.com/et_pontocom/public/imagens/icone-fechar.png' alt='img-fechar-popUp'>
            </div>
            <div class='img-popUp' style='width: $tamanhoImagem'>
                <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/$caminhoImagem' alt='img-popUp'>
            </div>
            <div>
                <h2 style='font-size: $tamanhoTitulo; color: $corFonte; text-align: center;'>$titulo</h2>
                <h3 style='font-size: $tamanhoSubtitulo; color: gray; text-align: center;'>$subtitulo</h3>
            </div>
            <div class='botoes-popUp'>
                $botao1
                $botao2
            </div>
        </div>
    </dialog>
    ";
}


?>