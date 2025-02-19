<?php
function createHeader(){
    return '
    <header>
        <div class="esquerdo">
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <img src="../../../public/imagens/LogoBranca2.png" alt="logo">
        </div>

        <div class="pesquisa" id="pesquisaHeader">
            <input type="text"></input>
            <button><i class="bx bx-search" id="lupa"></i></button>
        </div>

        <div class="direito">
            <div class="botoes">
                <i class="bx bx-search" id="lupa"></i>
                <i class="bx bx-heart" id="coracao"></i>
                <i class="bx bx-cart" id="carrinho"></i>
                <i class="bx bx-user-circle" id="perfil"></i>
            </div>
        </div>
    </header>

    <script src="../../../public/javascript/header.js"></script>
    ';
}
?>


