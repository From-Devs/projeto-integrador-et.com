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
        <a class='componenteConta' href='/projeto-integrador-et.com/et_pontocom/app/views/associado/MeusDadosAssociado.php'>
            <div class='fotoUserWrapper'>
                <img id='fotoUser' src='https://preview.redd.it/which-meme-image-of-joker-is-going-to-be-turned-into-a-v0-qgt2ljdpsbzc1.jpg?width=640&crop=smart&auto=webp&s=58b0fbeed2d91a608cf2507d5575f7dd8ea65e19' alt='userIMG'>
            </div>
            <div class='textContaContainer'>
                <p id='textUser'>Wellinton R.</p>
                <p id='textCargo'>Associado ET</p>
            </div>
        </a>
        ";
    }
}
?>