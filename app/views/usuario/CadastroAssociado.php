<?php require __DIR__."../../../../public/componentes/cadastassociado/InputsCadastrAssoc.php";
    require_once __DIR__."../../../../public/componentes/botao/botao.php";
    require_once __DIR__."../../../../public/componentes/popup/popUp.php"; 
    require __DIR__."/../../../public/componentes/CampoInput/camp.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";

    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/css/CadastroAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/cadastassociado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Cadastro Associado</title>
</head>
<body>
    <div class="pagina">
    <div class="Decoracao">
        <!-- Área preta -->
        <section>
            <button id="voltarSair" onclick="history.back()">
                <i class='fas fa-chevron-left'></i>
                <p id="voltar" href="./paginaPrincipal.php">Voltar</p>          
            </button> 
            <div class="wave wave1"></div>
        </section>

        <img src="/projeto-integrador-et.com/public/imagens/ET/LogoBranca1.png" alt="logo" class="logo">
    </div>
    <div class="Cadastro">
        <!-- Área branca -->
    <form class="formAssociado" action="" method="POST" id="form">
        <h1>Edite seus dados (Opicional)</h1>
        <div class= "p">
            <p class = "p1">*</p>
            <p class= "p2">PREENCHIMENTO OBRIGATÓRIO</p>
        </div>
        <div class="editDadosAssociado">
            <div class="profileIconEditContainer">
                <h1>Alterar foto de perfil</h1>
    
                <div class="profileIconWrapper">
                    <?php
                    // Se existir imagem no banco, mostra ela, senão mostra o ícone padrão
                    $avatarPath = !empty($user['foto']) 
                        ? "/projeto-integrador-et.com/" . $user['foto'] 
                        : "/projeto-integrador-et.com/public/imagens/user-icon.png";
                    ?>
                    
                    <img src="<?= htmlspecialchars($avatarPath) ?>" 
                        alt="User Profile" 
                        class="profile-pic" 
                        id="avatarPreview">

                    <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" onchange="previewFile()"/>
                    <label for="avatar"><i class='bx bx-image-alt'></i></label>
                </div>
            </div>

            <div class="dadosWrapper">
                <div class="dados">
                    <!-- Área com todos os campos (pra mudar algum input, vai pra campos.php) -->
                    <?php echo Camp("Nome Completo:", "text", "nome", "campo", $user["nome"] ?? "") ?>
                    <?php echo Camp("Email:", "email", "email", "campo", $user["email"] ?? "") ?>
                    <?php echo Camp("Data de Nascimento:", "date", "data_nascimento", "campo", $user["data_nascimento"] ?? "") ?>
                    <?php echo Camp("Telefone:", "text", "telefone", "campo", $user["telefone"] ?? "") ?>
                    <?php echo Camp("CPF:", "text", "cpf", "campo", $user["cpf"] ?? "") ?>
                </div>
            </div>
            
        </div>
        <h1 class="textAreaTitle">Escreva sobre seus produtos</h1>

        <div class="embaixo">
            <textarea class="caixa_texto" name="sobreProdutos" id="" cols="30" rows="10"></textarea>
            <div class="botoes">
                <div class="checkbox">
                    <input type="checkbox" name="termos" id="termos"> 
                    <label class="termos" for="termos"> Concordo com os <a href="./TermoDeUso.php">Termos de Uso e Privacidade</a></label>
                </div>
                
                <button class="botaoConfirmar" type="button" onclick="abrirPopUp('popup')"><b>Confirmar</b></button>
            </div>
        </div>
    </form>
    
    </div>
    </div>
    <?php $btt = botaoPersonalizadoRedirect("Voltar à Tela de início","btn-white","app/views/usuario/paginaPrincipal.php");
    echo PopUpComImagemETitulo("popup","popUp_Botoes/img-pessoa.png","100px","Cadastro Enviado para Validação","Entraremos em contato via WhatsApp após validar",$btt);
    ?>
    <script src="../../../public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/editarDados.js"></script>
</body>
</html>
