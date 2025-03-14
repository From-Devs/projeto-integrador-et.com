<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/cardLancamento/produtoLancamento.php"; // import do card

    session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente';
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado";
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/minhaConta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../../public/componentes/header/style.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
    <title>Minha Conta</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>
    <main>
        <h1 class="tituloMinhaConta" style="margin-top: 0;">MINHA CONTA</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <div class="profile-card">
                <div class="Foto_e_edicao">
                    <img src="../../../public/imagens/user-icon.png" alt="User Profile" class="profile-pic">
                </div>

                <div class="edit-profile">
                    <a id="edit-profile" href="../layouts/editarPerfil.html">Editar perfil</a>
                    <i class='bx bx-edit-alt'></i>
                </div>

                <div class="content">
                    <div class="content-nameUser">
                        <p><strong>Nome de Usuário:</strong></p>
                        <span id="username">ET.COM_LOJA_COSMETICOS</span>
                    </div>
                    <div class="content-email">
                        <p><strong>Email:</strong></p>
                        <span id="email">ET_COM_LOJA@GMAIL.COM</span>
                    </div>
                    <div class="content-excluirConta">
                        <a id="excluir-conta" href="#">Excluir conta</a>            
                    </div>
                </div>
            </div>

            <div class="opcoes-conta">
                <a href="../layouts/dadosCadastrais.html">
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

                <div class="option-card">
                    <div class="icon">
                        <i class='bx bx-package' ></i>
                    </div>
                    <div class="opcoes-content">
                        <strong>Meus Pedidos</strong> 
                        <p>Exibe produtos já comprados anteriormente</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/sidebar/script.js"></script>
</body>
</html>
