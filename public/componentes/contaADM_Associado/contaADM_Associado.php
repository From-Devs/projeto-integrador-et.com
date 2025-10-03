<?php
function createContaAssociadoADM($tipo = "ADM",$user){
    $avatarPath = !empty($user['foto']) 
    ? "/projeto-integrador-et.com/" . $user['foto'] 
    : "/projeto-integrador-et.com/public/imagens/user-icon.png";

    if($tipo == "ADM"){
        return "
        <div class='componenteConta'>
            <div class='fotoUserWrapper'>
                <img id='fotoUser' src='/projeto-integrador-et.com/public/imagens/imagensADM/iconeComercial.png' alt='userIMG'>
            </div>
            <div class='textContaContainer'>
                <p id='textUser'>ADM ET</p>
            </div>
        </div>
        ";
    }else{
        return "
        <div class='componenteConta'>
            <div class='fotoUserWrapper'>
                <img id='fotoUser' src='". $avatarPath ."' alt='userIMG'>
            </div>
            <div class='textContaContainer'>
                <p id='textUser'>". ($user["nome"] ?? "usuário") ."</p>
                <p id='textCargo'>Associado ET</p>
            </div>
        </div>
        ";
    }
}
?>