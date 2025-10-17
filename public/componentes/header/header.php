<!-- 
 
Para usar o header é necessário colocar os seguintes itens no HTML:

head / styles:

<link rel='stylesheet' href='../../../public/componentes/header/style.css'>
<link rel='stylesheet' href='../../../public/componentes/sidebar/style.css'>
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' rel='stylesheet'>
<script src='https://kit.fontawesome.com/661f108459.js' crossorigin='anonymous'></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>


script (final do HTML):

<script src='../../../public/componentes/header/script.js'></script>
<script src='../../../public/componentes/sidebar/script.js'></script>

Pode ser necessário trocar o caminho dos styles e scripts dependendo de onde a página estiver

-->

<?php
require __DIR__ . '/../sidebar/sidebarHeader.php'; // import do componente da sidebar
require __DIR__ . '/../pesquisaHeader/pesquisaHeader.php'; // import do componente da sidebar
require __DIR__ . "/../../../app/Controllers/UserController.php";


function createHeader($login,$tipoUsuario,$tipo=0){ // Sempre que reutilizar o header, só utilizar essa função nas páginas
    $popUpCurtoLogin = popUpCurto("popUpErroDelogado", "Cadastre ou entre em uma conta para realizar essa ação.", "red", "white", "/popUp_Botoes/img-cancelar.png");
    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
    $userEstaLogado = $login ? "true" : "false";
    $a = !empty($user['foto']) 
    ? "/projeto-integrador-et.com/" . $user['foto'] 
    : "/projeto-integrador-et.com/public/imagens/header/perfil.png";
    // $login (sujeito a mudança): é o estado de login do usuário, true pra logado e false para deslogado
    if ($login == false){                   // $tipoUsuario (sujeito a mudança): é o tipo de conta, associado ou usuario (veja como funciona na teste.php)
        $botao1 = botaoPersonalizadoRedirect('Cadastrar-se', 'btn-white', 'app/views/usuario/CadastroUsuario.php', '155px', '44px', '16px');           
        $botao2 = botaoPersonalizadoRedirect('Entrar', 'btn-white', 'app/views/usuario/Login.php', '155px', '44px', '16px');
    }else{
        $botao1 = botaoPersonalizadoRedirect('Minha Conta', 'btn-white', 'app/views/usuario/minhaConta.php', '155px', '44px', '16px');
        $botao2 = '
        <form method="POST" action="../../../router/UserRoutes.php?acao=logout">
        <button type="submit" class="btn btn-white" style="width:155px; height:44px; font-size:16px;">
        Sair
        </button>
        </form>
        ';
    }

    if($tipo == 0){
        
        // Abaixo é o código do header que vai pro HTML, ele usa a função de criar a sidebar de outro componente.
        return "
        ".createSidebar($tipoUsuario, $login)."
        $popUpCurtoLogin
        <header class='headerUsuario' id='headerUsuario'>

            <div class='esquerdo'>
                <div class='menu-toggle' id='menu-toggle'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>
    
                <a href='/projeto-integrador-et.com/app/views/usuario/paginaPrincipal.php'>
                    <img src='/projeto-integrador-et.com/public/imagens/ET/LogoBranca2.png' alt='logo' id='logoHeader'>
                </a>
    
            </div>
    
            ".createPesquisaHeader()."
    
            <div class='direito'>
                <div class='botoes'>
                    <img class='lupaHeader' src='/projeto-integrador-et.com/public/imagens/header/lupa.png' alt=''>
                    <img class='favBotaoHeader' src='/projeto-integrador-et.com/public/imagens/header/coracao.png' alt=''>
                    <img class='carrinhoBotaoHeader' src='/projeto-integrador-et.com/public/imagens/header/carrinho.png' alt=''>
                    <img class='perfilHeader' src='$a' alt=''>
                </div>
                <div class='menuConta'>
                    $botao1
                    $botao2
                </div>
            </div>
            <div id='LoginVerific'>$userEstaLogado</div>
        </header>
        ";
    }else{
        return "
        <header class='headerUsuario' id='headerCarousel'>
            
            <div class='esquerdo'>
                <div class='menu-toggle' id='menu-toggle'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>

                <a href='/projeto-integrador-et.com/app/views/usuario/paginaPrincipal.php'>
                    <img src='/projeto-integrador-et.com/public/imagens/ET/LogoBranca2.png' alt='logo' id='logoHeader'>
                </a>
    
            </div>
    
            ".createPesquisaHeader()."
    
            <div class='direito'>
                <div class='botoes'>
                    <img class='lupaHeader' src='/projeto-integrador-et.com/public/imagens/header/lupa.png' alt=''>
                    <img src='/projeto-integrador-et.com/public/imagens/header/coracao.png' alt=''></a>
                    <img src='/projeto-integrador-et.com/public/imagens/header/carrinho.png' alt=''></a>
                    <img class='perfilHeader' src='$a' alt=''>
                </div>
                <div class='menuConta'>
                    $botao1
                    $botao2
                </div>
            </div>
        </header>
        ";
    }
}

function createHeaderCustomizacao($tipo){
    if($tipo == 0){
        return "
            <header class='headerUsuario' id='headerUsuario'>
                
                <div class='esquerdo'>
                    <a href='/projeto-integrador-et.com/app/views/adm/Customizacao.php' class='botaoVoltarHeaderCustomizacao'>
                        <i class='fas fa-chevron-left'></i>
                        <p>Voltar</p>
                    </a>
                </div>
            </header>
            ";
    }else{
        return "
            <header class='headerUsuario' id='headerCarousel'>
                
                <div class='esquerdo'>
                    <a href='/projeto-integrador-et.com/app/views/adm/Customizacao.php' class='botaoVoltarHeaderCustomizacao'>
                        <i class='fas fa-chevron-left'></i>
                        <p>Voltar</p>
                    </a>
                </div>
            </header>
            ";
    }
}
?>
