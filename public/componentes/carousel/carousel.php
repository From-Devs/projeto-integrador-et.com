<?php
session_start();
$dados = $_SESSION['dados_carrossel'] ?? [];
extract($dados , EXTR_SKIP);

require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";
function createCarousel($carrosel){
    // echo '<img src="../../../' . $itens['img1'] . '" />';
    return '<div class="carousel">

        <div class="carousel-track" id="MoverCarrousel">
            '. createCarouselPopUp();
            foreach ($carrosel as $cs) {
                '<div class="carousel-item">
                    <img src="../../../' . $cs['img1'] . '" />
                </div>'
            }; . '"
        </div>
        <div class="bottom-controls">
            <button class="Seta-btn" id="prev"><i class="fas fa-chevron-left"></i></button>
            <div class="Bolas" id="BolasContainer">
                <div class="Bola"></div>
                <div class="Bola"></div>
                <div class="Bola"></div>
            </div>
            <button class="Seta-btn" id="next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>';
    
}
echo createCarousel($carousels);
