<?php
require __DIR__ . "/testeSidebar.php"; // Ele pega o componente do sidebar aqui, depois precisa trocar para a versão final do sidebar.

function createHeader($login){ // Sempre que reutilizar o header, só utilizar essa função nas páginas
    if ($login == false){ // Variaveis para o header (false = Deslogado / true = Logado)
        $botao1 = "Cadastrar-se"; // Serve para mudar o texto dos botões do menu do perfil
        $botao2 = "Entrar";
    }else{
        $botao1 = "Minha Conta";
        $botao2 = "Sair";
    }
    // Abaixo é o código do header que vai pro HTML, ele usa a função de criar a sidebar de outro componente.
    return '
    <header class="headerUsuario" id="headerUsuario">
        <div class="esquerdo">
            '.createSidebar().'
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/LogoBranca2.png" alt="logo" id="logoHeader">
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
            <div id="menuConta" class="menuConta">
                <button class="menuButton" id="botao1">'.$botao1.'</button>
                <button class="menuButton" id="botao2">'.$botao2.'</button>
            </div>
        </div>
    </header>
    ';
}
?>


