<?php
require __DIR__ . "/testeSidebar.php";

function createHeader($login){
    if ($login == false){
        $botao1 = "Cadastrar-se";
        $botao2 = "Entrar";
    }else{
        $botao1 = "Minha Conta";
        $botao2 = "Sair";
    }
    return '
    <header class="headerUsuario" id="headerUsuario">
        <div class="esquerdo">
            '.createSidebar().'
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/LogoBranca2.png" alt="logo">
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
                <i class="bx bx-user-circle '.$login.'" id="perfil"></i>
            </div>
            <div id="menuConta" class="menuConta">
                <button class="menuButton">'.$botao1.'</button>
                <button class="menuButton">'.$botao2.'</button>
            </div>
        </div>
    </header>
    ';
}
?>


