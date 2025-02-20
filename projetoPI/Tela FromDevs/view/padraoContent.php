<?php 

function fotoDev($foto){
    return "
    <div class='image-container'>
    <img src='$foto' alt='imagem'>
        <div class='overlay'>
            <button class='btn'>Botão 1</button>
            <button class='btn'>Botão 2</button>
        </div>
    </div>
    ";
    
}
    
?>