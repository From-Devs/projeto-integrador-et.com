<?php
function createHeader(){
    return '
    <header class="headerUsuario" id="headerUsuario">
        <div class="esquerdo">
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <img src="../../../public/imagens/LogoBranca2.png" alt="logo">
        </div>

        <div class="pesquisa closed" id="pesquisaHeader">
            <input type="text" id="inputHeader"></input>
            <button><i class="bx bx-search" id="lupa"></i></button>
        </div>

        <div class="direito">
            <div class="botoes">
                <i class="bx bx-search" id="lupa2"></i>
                <i class="bx bx-heart" id="coracao"></i>
                <i class="bx bx-cart" id="carrinho"></i>
                <i class="bx bx-user-circle" id="perfil"></i>
            </div>
        </div>
    </header>
    ';
}
?>


