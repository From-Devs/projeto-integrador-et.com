<?php  require __DIR__."/Componentes/camp.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroUsuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Logo-->
    <div class="top">
        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoPreta1.png" alt="logo" class="logo">
    </div>   
    <!--Campos-->    
    <div class="container">
        <h1>Informe seus dados</h1>
        <form action="" method="">
            <div class = "id">
                <?php echo Camp("Nome Completo:") ?>
                <?php echo Camp("Nome Social:") ?>
                <?php echo Camp("Email:") ?>
                <?php echo Camp("Data de Nascimento:","date") ?>
                <?php echo Camp("Telefone:") ?>
                <?php echo Camp("CPF:") ?>
                <?php echo Camp("Senha:", "password") ?>
                <div class="none"></div>
                <?php echo Camp("Confirmar Senha:", "password") ?>
            </div>

        </form>
    <!--Termos de uso e botões-->
            <div class= "p">
                    <p class = "p1">*</p>
                    <p class= "p2">PREENCHIMENTO OBRIGATÓRIO</p>
                </div>

            <div class="low">
                
                <div class="checkbox">
                    <input type="checkbox" name="termos"> 
                    <label class="termos"> Concordo com os <a href="../../../Et/TermosDeUsoPrivacidade/index.php">Termos de Uso e Privacidade</a></label>
                    </div>
                <div class="button">
                    <button><a id = "confirmar" href="../LoginUsuario/index.php">Confirmar</a></button>
                </div>

                <div class= voltarSair>
                    <img src="./Imagem/voltar.png">
                    <a id="voltar" href = "./../LoginUsuario/index.php">Voltar</a>
                </div>
            </div>
    </div>

   
    <!--Ondas-->
    <section>
        <div class="wave wave1"></div>
    </section>

</body>
</html>