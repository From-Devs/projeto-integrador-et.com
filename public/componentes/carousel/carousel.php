<?php
require __DIR__ . "/../../../public/componentes/carouselPopUp/carouselPopUp.php";

function createCarousel(array $dados){
    $img = '';
    if (!empty($dados['carousels'][0]['id_produto'])) {
        $idProduto = $dados['carousels'][0]['id_produto'];
        $img = "public/imagens/produto/produto_$idProduto.png";
    }

    return '
    <div class="carousel">
        <div class="carousel-track" id="MoverCarrousel">
            '. createCarouselPopUp() .'
            <div class="carousel-item">
                <img src="/projeto-integrador-et.com/' . $img . '" />
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
                <div class="Bola"></div>
                <div class="Bola"></div>
                <div class="Bola"></div>
            </div>
            <button class="Seta-btn" id="next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>';
}
?>
