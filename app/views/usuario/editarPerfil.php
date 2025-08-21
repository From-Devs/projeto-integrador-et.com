<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";

    // session_start();
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebar/styles.css">

    <link rel="stylesheet" href="../../../public/css/editarPerfil.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Dados</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header 
    ?>

    <main>
        <h1 class="tituloEditarConta">EDITAR DADOS</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <form class="profile-card">

                <div class="profileIconEditContainer">
                    <h1>Alterar foto de perfil</h1>

                    <div class="profileIconWrapper">
                        <img src="../../../public/imagens/user-icon.png" alt="User Profile" class="profile-pic" id="avatarPreview">
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" onchange="previewFile()"/>
                        <label for="avatar"><i class='bx bx-image-alt'></i></label>
                    </div>
                </div>
                
                <div class="dadosUsuarioForm">
                    <div class="dadosUsuarioFormInputs">
                        <div class="formControl">
                            <input type="text" name="username" class="formInput" id="username" value="ET.COM_LOJA_COSMETICOS">
                            <label for="username">Nome Completo:</label>
                        </div>
                        <div class="formControl">
                            <input type="email" name="email" class="formInput" id="email" value="ET_COM_LOJA@GMAIL.COM">
                            <label for="email">Email:</label>
                        </div>
                        <div class="formControl">
                            <input type="date" name="date" class="formInput" id="date" value="2000-01-01">
                            <label for="date">Data de nascimento:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" name="cpf" class="formInput" id="cpf" value="123.456.789-10">
                            <label for="cpf">CPF:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" name="phone" class="formInput" id="phone" value="+55 91234-5678">
                            <label for="phone">Telefone:</label>
                        </div>
                    </div>

                    <div class="dadosAcoesContainer">
                        <a href="/projeto-integrador-et.com/app/views/usuario/minhaConta.php">
                            <button type="button" class="cancelEditButton btn-red">
                                <p class="editButtonText">Cancelar</p>
                                <i class='bx bx-trash'></i>
                            </button>
                        </a>
        
                        <button type="submit" class="saveButton btn-black">
                            <p class="editButtonText">Salvar alterações</p>
                            <i class='bx bx-edit'></i>
                        </button>
                    </div>
                </div>
            </form>

        </section>
    </main>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/editarDados.js"></script>


</body>
</html>
