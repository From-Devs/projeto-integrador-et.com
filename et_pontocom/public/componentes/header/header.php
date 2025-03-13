<!-- 
 
Para usar o header é necessário colocar os seguintes itens no HTML:

head / styles:

<link rel="stylesheet" href="../../../public/componentes/header/style.css">
<link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


script (final do HTML):

<script src="../../../public/componentes/header/script.js"></script>
<script src="../../../public/componentes/sidebar/script.js"></script>

Pode ser necessário trocar o caminho dos styles e scripts dependendo de onde a página estiver

-->

<?php
require __DIR__ . "/../sidebar/sidebarHeader.php"; // import do componente da sidebar

function createHeader($login,$tipoUsuario){ // Sempre que reutilizar o header, só utilizar essa função nas páginas
    if ($login == false){                   // $login (sujeito a mudança): é o estado de login do usuário, true pra logado e false para deslogado
        $botao1 = "Cadastrar-se";           // $tipoUsuario (sujeito a mudança): é o tipo de conta, associado ou usuario (veja como funciona na teste.php)
        $botao2 = "Entrar";
    }else{
        $botao1 = "Minha Conta";
        $botao2 = "Sair";
    }
    // Abaixo é o código do header que vai pro HTML, ele usa a função de criar a sidebar de outro componente.
    return '
    <header class="headerUsuario" id="headerUsuario">
        '.createSidebar($tipoUsuario).'
        <div class="esquerdo">
            <div class="menu-toggle" id="menu-toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca2.png" alt="logo" id="logoHeader">
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


