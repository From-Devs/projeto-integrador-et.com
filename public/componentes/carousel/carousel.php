<?php
    require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";

    function createCarousel(){
        return '
        <div class="carousel">
        
            <div class="carousel-track" id="MoverCarrousel">
                '. createCarouselPopUp() .'
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/hinode.png" />
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/bocarosa.png" />
                </div>
                <div class="carousel-item">
                    <img src="/projeto-integrador-et.com/public/imagens/produto/leite.png" />
                </div>
            </div>
            <div class="bottom-controls">
                <button class="Seta-btn" id="prev"><i class="fas fa-chevron-left"></i></button>
    
                <div class="Bolas" id="BolasContainer">
                    <div class="Bola" class=""></div>
                    <div class="Bola" class=""></div>
                    <div class="Bola" class=""></div>
                </div>
    
                <button class="Seta-btn" id="next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        ';
    }
?>