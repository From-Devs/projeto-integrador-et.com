<?php
session_start();
$dados = $_SESSION['dados_carrossel'] ?? [];
$carousel = $dados['carousels'] ?? [];

require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";

function createCarousel($carousel) { 
    $html = '<div class="carousel">
        <div class="carousel-track" id="MoverCarrousel">'
        . createCarouselPopUp($carousel); 

    // Garante até 3 itens, mesmo se tiver menos
    foreach ($carousel as $cs) {
        $html .= '
            <div class="carousel-item">
                <img src="../../../' . $cs["img1"] . '" alt="">
            </div>';
    }
    $html .= '
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

    return $html;
}

