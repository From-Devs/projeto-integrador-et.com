<?php 

function fotoDev($foto, $git, $insta, $linke, $nome){
    return "
    
    <div class='image-container'>
    <img id='frontImage' src='$foto' alt='imagem'>
        <div class='overlay'>
            <div id='nomeDev'> 
                <h1 id='nomeDevUser'>
                    $nome
                </h1>
            </div>
            <div id='divisaoLinkagem' target='_blank'>
                <img id='logo' src='./../public/logo/gitLogo.png' alt='GitHubImageOFF' 
                <a href='$git' target='_blank'>
                    <button class='botao GitHub'>Git Hub</button>
                </a>
            </div>
            <div id='divisaoLinkagem'>
                <img id='logo' src='./../public/logo/instaLogo.png' alt='InstagramImageOFF'>
                <a href='$insta' target='_blank'>
                    <button class='botao Instagram'>Instagram</button>
                </a>
            </div>
            <div id='divisaoLinkagem'>
                <img id='logo' src='./../public/logo/linkeLogo.png' alt='LinkedinImageOFF'>
                <a href='$linke' target='_blank'>
                    <button class='botao Linkedin'>Linkedin</button>
                </a>
            </div>
        </div>
    </div>
    ";
    
}
    
?>

<div id="divisaoLinkagem"></div>
