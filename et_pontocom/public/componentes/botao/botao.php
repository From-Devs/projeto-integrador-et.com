<?php

//Tem possibilidade de adicionar posteriormente parametros como: "name", "type"... para desenvolvimento do back-end.

//Seguir a sequência correta dos parâmetros!
//Tipos: btn-black, btn-white, btn-green, btn-red 

// OnClick para funções js ==> Ex: abrirPopUp(\"nomeDaFuncaoJs\"); BARRA E ASPAS DUPLA É OBRIGATORIO!


function botaoPersonalizadoOnClick($texto, $tipo="btn-black", $onClick, $largura="auto", $altura="auto", $tamanhoFonte="1rem"){ 
    $tipos = ["btn-black", "btn-white", "btn-green", "btn-red"];

    if(in_array($tipo, $tipos)){
        //É um botão de cancelar ou confirmar?
        if($tipo == "btn-red"){
            return "
            <button id='botaoPadrao' class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;' onclick='$onClick'><img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-cancelar.png' alt='img-cancelar' class='img-cancelar'>$texto</button>";
        }else if($tipo == "btn-green"){
            return "
            <button id='botaoPadrao' class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;' onclick='$onClick'>
            <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-confirmar.png' alt='img-confirmar' class='img-confirmar'>$texto</button>";
        }else{
            return "<button id='botaoPadrao' class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte; 'onclick='$onClick'>$texto</button>";
        }
    }else{
        return "<script>
            alert('Parametro $tipo inválido!');
        </script>";
        return;
    }
}

// Possui URL pra direcionar para uma página especifica.
function botaoPersonalizadoRedirect($texto, $tipo="btn-black", $url=null, $largura="auto", $altura="auto", $tamanhoFonte="1rem"){

    $tipos = ["btn-black", "btn-white", "btn-green", "btn-red"];

    if(in_array($tipo, $tipos)){
        //É um botão de cancelar ou confirmar?
        if($tipo == "btn-red"){
            return "
            <button class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'>
                <a class='btn-link' href='/projeto-integrador-et.com/et_pontocom/$url'>
                    <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-cancelar.png' alt='img-cancelar' class='img-cancelar'>$texto
                </a>
            </button>";
        }else if($tipo == "btn-green"){
            return "
            <button class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'>
                <a class='btn-link' href='/projeto-integrador-et.com/et_pontocom/$url'>
                    <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/popUp_Botoes/img-confirmar.png' alt='img-confirmar' class='img-confirmar'>$texto
                </a>
            </button>";
        }else{
            return "<button class='btn $tipo' style='width:$largura; height:$altura;font-size:$tamanhoFonte;'><a href='/projeto-integrador-et.com/$url' class='btn-link'>$texto</a></button>";
        }
    }else{
        return "<script>
            alert('Parametro $tipo inválido!');
        </script>";
        return;
    }

}

?>