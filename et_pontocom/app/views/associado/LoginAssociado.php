<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ET</title>
    <link rel="stylesheet" href="../../../public/css/loginAssociado.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">
</head>
<body id="bodyLogin">
    <div id="container">
        <div id="parteBranca">
            <h1 id="bemVindo">BEM-VINDO!</h1>
            <form>
                <div class="email-input">
                    <input type="text" class="input" id="email" required>
                    <label for="EmailCPF">Email</label>
                </div>
                <div class="senha-input">
                    <input type="password" class="input" id="senha" required>
                    <label for="Senha">Senha</label>
                </div>
            </form>
            <a id='esqueciSenha' href="">Esqueceu a senha?</a>
            <a href=""><button id="botaoEntrar">Entrar</button></a>
            <div id="cadastro">
                <p>Novo na ET?</p>
                <a id="cadastroClique" href="">Cadastre-se</a>
            </div>
            <div id="voltarSair">
                <img src="../../../public/imagens/LoginAssoc/voltarSetinha.png" alt="seta.png">
                <a id="voltar" href="">voltar</a>          
            </div>
        </div>
        <section>
            <div class="wave wave1"></div>
            <div>
                <img id="fotoET" src="../../../public/imagens/ET/LogoBranca1.png" alt="">
            </div>
        </section>
    </div>
    
    <script src="script.js"></script>
</body>
</html>


<!-- os links não possuem endereçamento pois ainda não foram criadas as outras telas, se quando forem executar o html e perceberem que não muda a tela  -->
<!-- não se esquecam de indexar os endereçamentos. -->
<!-- Observações: 
    O arquivo ainda não possui responsividade,
    Os inputs não são salvos em lugar nenhum,
    Lembre-se que no projeto final o arquivo precisa estar no formato PhP e não HTML. -->
