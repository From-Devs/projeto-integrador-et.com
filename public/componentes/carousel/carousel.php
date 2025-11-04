<?php
session_start();

// 🔹 Pega os carrosséis da sessão no nível certo
$carousels = $_SESSION['carrossel']['carousels'] ?? [];

// 🔹 Depuração local — verifica se veio da controller
if (empty($carousels)) {
    echo "[ERRO] \$carousels não veio da controller<br>";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    // exit;
}

// 🔹 Inclui o componente do popup
require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";

// 🔹 Função para montar o HTML do carrossel
function createCarousel($carousel) {
    $html = '
    <div class="carousel">
        <div class="carousel-track" id="MoverCarrousel">
    ' . createCarouselPopUp($carousel);

    foreach ($carousel as $cs) {
        $html .= '
            <div class="carousel-item">
                <img src="../../../' . htmlspecialchars($cs["img1"]) . '" alt="">
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

// 🔹 Renderiza o carrossel
?>
