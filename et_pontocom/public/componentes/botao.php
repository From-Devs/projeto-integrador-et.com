<?php

//Tem possibilidade de adicionar posteriormente parametros como: "name", "type"... para desenvolvimento do back-end.

//Seguir a sequência correta dos parâmetros!
//Tipos: btn-black, btn-white, btn-green, btn-red 
function botaoPersonalizadoPadrao($texto, $tipo="btn-black", $largura="150px", $altura="50px", $tamanhoFonte="1rem"){

    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/Testes-PI";
    $tipos = ["btn-black", "btn-white", "btn-green", "btn-red"];

    if(in_array($tipo, $tipos)){
        //É um botão de cancelar ou confirmar?
        if($tipo == "btn-red"){
            return "
            <button class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'><img src='$base_url/Imagens/img-cancelar.png' alt='img-cancelar' class='img-cancelar'>$texto</button>";
        }else if($tipo == "btn-green"){
            return "
            <button class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'>
            <img src='$base_url/Imagens/img-confirmar.png' alt='img-confirmar' class='img-confirmar'>$texto</button>";
        }else{
            return "<button class='btn $tipo' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'>$texto</button>";
        }
    }

    echo "<script>
        alert('Parametro $tipo inválido!')
    </script>";
    return;
}

// Possui URL pra direcionar para uma página especifica.
function botaoPersonalizadoRedirect($texto, $tipo="btn-black", $url=null, $largura="150px", $altura="50px", $tamanhoFonte="1rem"){

    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/Testes-PI";
    $tipos = ["btn-black", "btn-white", "btn-green", "btn-red"];

    if(in_array($tipo, $tipos)){
        //É um botão de cancelar ou confirmar?
        if($tipo == "btn-red"){
            return "
            <a href='$base_url/$url' class='btn $tipo btn-link' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'><img src='$base_url/Imagens/img-cancelar.png' alt='img-cancelar' class='img-cancelar'>$texto</a>";
        }else if($tipo == "btn-green"){
            return "
            <a href='$base_url/$url' class='btn $tipo btn-link' style='width: $largura; height:$altura; font-size: $tamanhoFonte;'><img src='$base_url/Imagens/img-confirmar.png' alt='img-confirmar' class='img-confirmar'>$texto</a>";
        }else{
            return "<a href='$base_url/$url' class='btn $tipo btn-link' style='width: $largura; height:$altura; font-size:$tamanhoFonte;'>$texto</a>";
        }
    }

    echo "<script>
        alert('Parametro $tipo inválido!');
    </script>";
    return;
}

?>