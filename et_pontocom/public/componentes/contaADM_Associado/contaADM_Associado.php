<?php
function createContaAssociadoADM($tipo = "ADM"){
    if($tipo == "ADM"){
        return "
        <div class='componenteConta'>
            <div class='fotoUserWrapper'>
                <img id='fotoUser' src='/projeto-integrador-et.com/et_pontocom/public/imagens/imagensADM/iconeComercial.png' alt='userIMG'>
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
                <img id='fotoUser' src='/projeto-integrador-et.com/et_pontocom/public/imagens/imagensADM/image.png' alt='userIMG'>
            </div>
            <div class='textContaContainer'>
                <p id='textUser'>Wellinton R.</p>
                <p id='textCargo'>Associado ET</p>
            </div>
        </div>
        ";
    }
}
?>