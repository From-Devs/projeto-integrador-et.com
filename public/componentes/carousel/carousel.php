<?php
session_start();
$dados = $_SESSION['dados_carrossel'] ?? [];
$carousels = $dados['carousels'] ?? [];

// echo '<img src="../../../' . htmlspecialchars($carousels[0]['img1']) . '" />';
require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";
function createCarousel($carousels){
 $html = '<div class="carousel">
    <div class="carousel-track" id="MoverCarrousel">'
    . createCarouselPopUp();
foreach ($carousels as $cs) {
    if (!is_array($cs)) continue; // evita erro se vier algo quebrado
    $img = $cs['img1'] ?? 'public/uploads/padrao.jpg';
    $html .= '
        <div class="carousel-item">
            <img src="/' . htmlspecialchars($img) . '" alt="">
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

