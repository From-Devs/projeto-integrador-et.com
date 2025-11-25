<?php
    session_start();
    require __DIR__ . "/../../../public/componentes/popup/popUp.php";
    require __DIR__ . "/../../Controllers/UserController.php";

    if(isset($_GET['erro']) && $_GET['erro'] === 'acesso_negado'){
        echo popUpCurto("popUpErro", "Acesso negado! Você precisa estar logado para acessar a página de associado.", "red", "white");
    }

$erro = $_GET["erro"] ?? '';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ET</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="../../../public/css/LoginUsuario.css">


    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <dialog class='popUpDialog popUpRecuperarSenha'>
        <div class='popUp' style=' padding: 33px; background-color: #F8F8F8;'>
            <div class='topoPopUp'>
                <h1 class="tituloPopUp">Recuperar minha senha</h1>
                <button  class='fecharPopUp' onclick="fecharPopUp('popUpRecuperarSenha')">
                    <img class='icone-fechar' src='/projeto-integrador-et.com/public/imagens/popUp_Botoes/icone-fechar.png' alt='img-fechar-popUp'>
                </button>
            </div>

            <form class="wrapperPopUp">
                <p>Informe o email cadastrado em sua conta para recuperar sua senha.</p>
                <div class="recoverPassword-input">
                    <input type="email" name="recoverPassword" class="input" id="recoverPassword" required>
                    <label for="recoverPassword">Email</label>
                </div>
                <button type="submit" class="recoverPasswordButton btn-black" id='recoverPasswordButton'>
                    <p class="recoverPasswordButtonText">Enviar</p>
                </button>
            </form>
        </div>
    </dialog>

    <div id="container">
        <div id="parteBranca">
            <img id="fotoETPreta" src="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png" alt="">
            <h1 id="bemVindo">BEM-VINDO!</h1>

            <form class="formContainer" id="formContainer" method="POST" action="../../../router/UserRoutes.php?acao=login">
                <div class="email-input">
                    <input type="text" name="email" class="input <?= !empty($erro) ? 'input-erro' :  '' ?>" id="email" required>
                    <label for="email" class="<?= !empty($erro) ? 'label-erro' :  '' ?>">Email</label>
                </div>
                <div class="senha-input">
                    <input type="password" name="senha" class="input <?= !empty($erro) ? 'input-erro' :  '' ?>" id="senha" required>
                    <label for="senha" class="<?= !empty($erro) ? 'label-erro' :  '' ?>">Senha</label>
                </div>
                <button type="button" id='esqueciSenha' onClick='abrirPopUp("popUpRecuperarSenha")'>Esqueceu a senha?</button>
            </form>

            <button id="botaoEntrar" type="submit" form="formContainer">Entrar</button>

            <p style="color: red; text-align: left; margin-top: 35px; font-size: 18px; font-weight: 450;">
                <?= htmlspecialchars($erro) ?>
            </p>

            <div id="cadastro">
                <p>Novo na ET?</p>
                <a id="cadastroClique" href="CadastroUsuario.php">Cadastre-se</a>
            </div>
            <button id="voltarSair" type="button" onclick="history.back()">
                <i class='fas fa-chevron-left'></i>
                <p id="voltar" href="./paginaPrincipal.php">Voltar</p>          
            </button> 
        </div>
        <section>
            <div class='wave solida'></div>
            <picture>
                <img id="fotoET" src="/projeto-integrador-et.com/public/imagens/ET/LogoBranca1.png" alt="">
            </picture>
        </section>
    </div>

    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script>
    if(window.location.href.indexOf('erro=acesso_negado') > -1){
        abrirPopUpCurto("popUpErro", 5000);
    }
</script>
</body>
</html>