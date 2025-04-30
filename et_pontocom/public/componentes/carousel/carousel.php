<?php
    function createCarousel(){
        return "
        <div class='carousel'>
            <div class='carousel-track' id='MoverCarrousel'>
                <div class='carousel-item'>
                    <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png' />
                </div>
                <div class='carousel-item'>
                    <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/bocarosa.png' />
                </div>
                <div class='carousel-item'>
                    <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/leite.png' />
                </div>
            </div>
        </div>

        <div class='bottom-controls'>
            <button class='Seta-btn' id='prev'><i class='fas fa-chevron-left'></i></button>

            <div class='Bolas' id='BolasContainer'>
                <div class='Bola' class=''></div>
                <div class='Bola' class=''></div>
                <div class='Bola' class=''></div>
            </div>

            <button class='Seta-btn' id='next'><i class='fas fa-chevron-right'></i></button>
        </div>
        ";
    }
?>