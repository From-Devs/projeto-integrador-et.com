<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";

    session_start();
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/styles.css">

    <link rel="stylesheet" href="../../../public/css/editarPerfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Perfil</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header 
    ?>
    <header>
        <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/minhaConta.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <h1 class="editarPerfilTitulo">EDITAR PERFIL</h1>
    </header>

    <div class="line-out">
        <div class="line"></div>
    </div>

    <section class="container">
        <div class="profile-section">
            <div id="agua">
                
                <div class="profile-img">
                    <img src="../../../public/imagens/user-icon.png" alt="user profile" class="profile-pic">
                <span class="camera-icon"><i class='bx bxs-camera-plus'></i></span>
            </div>
            <div class="content">
                <div class="content-nameUser">
                    <p><strong>Nome de Usuário:</strong></p>
                    <span id="username">ET.COM_LOJA_COSMETICOS</span>
                </div>
            </div>
                
                <div class="content-email">
                    <p><strong>Email:</strong></p>
                    <span id="email">ET_COM_LOJA@GMAIL.COM</span>
                </div>
            </div>
            <div class="options">
                <h3>OPÇÕES</h3>
                <label for="username">Mudar nome de usuário</label>
                <input type="text" id="username" name="username" placeholder="Digite aqui">
                <label for="email">Mudar email de cadastro</label>
                <input type="email" id="email" name="email" placeholder="Digite aqui">
            </div>
        </div>
    </section>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>

</body>
</html>
