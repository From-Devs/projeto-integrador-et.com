<?php
    require_once __DIR__ . "/../../../public/componentes/CampoInput/camp.php";

    require_once __DIR__ . "/../../Controllers/UserController.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CadastroUsuario</title>
    <link rel="stylesheet" href="../../../public/css/CadastroUsuario.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container"> 
        <div class="parteBranca">
            
            <!--Logo-->
            <img src="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png" alt="logo" class="logo">
        
            <button id="voltarSair" onclick="history.back()">
                <i class='fas fa-chevron-left'></i>
                <p id="voltar" href="./paginaPrincipal.php">Voltar</p>          
            </button> 
            <!--Campos-->    
            <form method="POST" action="../../../router/UserRoutes.php?acao=create">
                <div class="containerForm">
                    <h1>Informe seus dados</h1>
                    <div class= "p">
                        <p class = "p1">*</p>
                        <p class= "p2">PREENCHIMENTO OBRIGATÓRIO</p>
                    </div>
                    <div class="id">
                        <?php echo Camp("Nome Completo", "text", "nome") ?>
                        <?php echo Camp("Email", "email", "email") ?>
                        <?php echo Camp("Data de Nascimento", "date", "data_nascimento") ?>
                        <?php echo Camp("Telefone", "text", "telefone") ?>
                        <?php echo Camp("Senha", "password", "senha") ?>
                        <?php echo Camp("CPF", "text", "cpf") ?>
                        <?php echo Camp("Confirmar Senha", "password", "confirmar_senha") ?>
                    </div>

                    <!--Termos de uso e botões-->
            
                    <div class="low">
                            
                        <div class="checkbox">
                            <input type="checkbox" name="termos" id="termos"> 
                            <label class="termos" for="termos"> Concordo com os <a href="./TermoDeUso.php">Termos de Uso e Privacidade</a></label>
                        </div>
                            
                        <button class="botaoConfirmar" type="submit" >Confirmar</button>
                                    
                    </div>
                </div>
            </form>
        </div>

        <!--Ondas-->
        <section>
            <div class="wave wave1"></div>
        </section>
    </div>

<script> 
    function redirecionar() {
        window.location.href = "Login.php";
    }
</script> 

</body>
</html>