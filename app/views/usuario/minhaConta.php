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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/rodape/styles.css">

    <link rel="stylesheet" href="../../../public/css/minhaConta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <title>Minha Conta</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <main>
        <h1 class="tituloMinhaConta">MINHA CONTA</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <div class="profile-card">

                <img src="../../../public/imagens/user-icon.png" alt="User Profile" class="profile-pic">

                
                <div class="dadosUsuario">
                    <div class="dadosUsuarioContainer">
                        <div class="content-nameUser">
                            <p><strong>Nome de Usuário:</strong></p>
                            <span id="username">ET.COM_LOJA_COSMETICOS</span>
                        </div>
                        <div class="content-email">
                            <p><strong>Email:</strong></p>
                            <span id="email">ET_COM_LOJA@GMAIL.COM</span>
                        </div>
                        <div class="content-nasc">
                            <p><strong>Data de nascimento:</strong></p>
                            <span id="email">01/01/2000</span>
                        </div>
                        <div class="content-cpf">
                            <p><strong>CPF:</strong></p>
                            <span id="email">123.456.789-10</span>
                        </div>
                        <div class="content-phone">
                            <p><strong>Telefone:</strong></p>
                            <span id="email">+55 91234-5678</span>
                        </div>
                        <div class="content-type">
                            <p><strong>Tipo de conta:</strong></p>
                            <span id="email">Usuário</span>
                        </div>
                    </div>
                    <div class="dadosAcoesContainer">
                        <!-- <div class="content-excluirConta">
                            <a id="excluir-conta" href="#">Excluir conta</a>            
                        </div> -->

                        <button class="delete-profile-button btn-red">
                            <p id="edit-profile-text">Apagar perfil</p>
                            <i class='bx bx-trash'></i>
                        </button>

                        <a href="/projeto-integrador-et.com/app/views/usuario/editarPerfil.php" class="edit-profile-container">
                            <button class="edit-profile-button btn-black">
                                <p id="edit-profile-text">Editar perfil</p>
                                <i class='bx bx-edit-alt'></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="opcoes-conta">
                <a href="/projeto-integrador-et.com/app/views/usuario/dadosCadastrais.php">
                    <div class="option-card">
                        <div class="icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="opcoes-content">
                            <strong>Dados Cadastrais</strong> 
                            <p>Exibe todos os dados da conta</p>
                        </div>
                    </div>
                </a>

                <div class="option-card">
                    <div class="icon">
                        <i class='bx bxs-phone-call'></i>
                    </div>
                    <div class="opcoes-content">
                        <strong>Atendimento ao Cliente</strong> 
                        <p>Fale conosco</p>
                    </div>
                </div>

                <a href="/projeto-integrador-et.com/app/views/usuario/meusPedidos.php">
                    <div class="option-card">
                        <div class="icon">
                            <i class='bx bx-package' ></i>
                        </div>
                        <div class="opcoes-content">
                            <strong>Meus Pedidos</strong> 
                            <p>Exibe produtos já comprados anteriormente</p>
                        </div>
                    </div>
                </a>

            </div>
        </section>
    </main>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
</body>
</html>
