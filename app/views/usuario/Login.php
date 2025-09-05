<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ET</title>
    <link rel="stylesheet" href="../../../public/css/LoginUsuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div id="container">
        <div id="parteBranca">
            <h1 id="bemVindo">BEM-VINDO!</h1>

            <form class="formContainer" id="formContainer" method="POST" action="../../../router/UserRoutes.php?acao=login">
                <div class="email-input">
                    <input type="text" name="email" class="input" id="email" required>
                    <label for="EmailCPF">Email</label>
                </div>
                <div class="senha-input">
                    <input type="password" name="senha" class="input" id="senha" required>
                    <label for="Senha">Senha</label>
                </div>
                <a id='esqueciSenha' href="">Esqueceu a senha?</a>
            </form>
            <button id="botaoEntrar" type="submit" form="formContainer">Entrar</button>
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
                <source media="(max-width: 870px)" srcset="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png">
                <img id="fotoET" src="/projeto-integrador-et.com/public/imagens/ET/LogoBranca1.png" alt="">
            </picture>
        </section>
    </div>

<script> 
</script>
</body>
</html>


<!-- os links não possuem endereçamento pois ainda não foram criadas as outras telas, se quando forem executar o html e perceberem que não muda a tela  -->
<!-- não se esquecam de indexar os endereçamentos. -->
<!-- Observações: 
    O arquivo ainda não possui responsividade,
    Os inputs não são salvos em lugar nenhum,
    Lembre-se que no projeto final o arquivo precisa estar no formato PhP e não HTML. -->