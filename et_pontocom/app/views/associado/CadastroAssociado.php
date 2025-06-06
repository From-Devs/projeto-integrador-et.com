<?php require __DIR__."../../../../public/componentes/cadastassociado/InputsCadastrAssoc.php";
    require_once __DIR__."../../../../public/componentes/botao/botao.php";
    require_once __DIR__."../../../../public/componentes/popup/popUp.php"; 
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/CadastroAssociado.css">
    <link rel="stylesheet" href="../../../public/componentes/cadastassociado/styles.css">
    <link rel="stylesheet" href="../../../public/componentes/popup/styles.css">
    <link rel="stylesheet" href="../../../public/componentes/botao/styles.css">
    
    <title>Cadastro Associado</title>
</head>
<body>
    <div class="pagina">
    <div class="Decoracao">
        <!-- Área preta -->
        <section>
            <div class="Voltar">
                <a href="../usuario/sobreAssociado.php">
            <img src="../../../public/imagens/cadastassoc/BotaoVoltar.png" alt="">
            <p>voltar</p>
                </a>
            </div>
            <div class="wave wave1"></div>
        </section>
    </div>
    <div class="Cadastro">
        <!-- Área branca -->
    <form action="" method="post" id="form">
        <div class="Foto">
            <img src="../../../public/imagens/cadastassoc/AdicionarFotoCadstr.png" alt="Insira sua foto">
        </div>
        
            <div class="dados">
                <!-- Área com todos os campos (pra mudar algum input, vai pra campos.php) -->
                <?php echo Campos("Nome")?>
                <div class="organizacao">
                    <input type="date" name="DataNasc" class="campo" required placeholder="">
                    <label for="DataNasc" class="Nasc">Data de Nascimento</label>
                </div>
                <?php echo Campos("Nome Social")?>
                <?php echo Campos("CPF")?>
                <?php echo Campos("CEP")?>
                <?php echo Campos("Telefone")?>
                <?php echo Campos("E-Mail", "email")?>
                <?php echo Campos("Senha", "password")?>
                <?php echo Campos("Confirmar Senha", "password")?>
            </div>
            <div class="embaixo">
                <!-- input grande -->
                <input type="text" placeholder="Digite algo sobre seu produto :)" class="caixa_texto">
                <div class="botoes">
                    <div class="privacidade">
                        <!-- políticas de privacidade -->
                    <input type="checkbox" name="termos" class="checkbox">
                    <p><a href="">Termos de uso </a> e <a href="">política de privacidade</a></p>
                    </div>
                    
                    <button type="button" onclick="abrirPopUp('popup')"><b>Confirmar</b></button>
                </div>
            </div>
    </form>
    
    </div>
    </div>
    <?php $btt = botaoPersonalizadoRedirect("Voltar à Tela de início","btn-white","et_pontocom/app/views/usuario/paginaPrincipal.php");
    echo PopUpComImagemETitulo("popup","popUp_Botoes/img-pessoa.png","100px","Cadastro Enviado para Validação","Entraremos em contato via WhatsApp após validar",$btt);
    ?>
    <script src="../../../public/componentes/popup/script.js"></script>
</body>
</html>