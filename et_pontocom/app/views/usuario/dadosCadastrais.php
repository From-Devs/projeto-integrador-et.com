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

    <link rel="stylesheet" href="../../../public/css/dadosCadastrais.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dados Cadastrais</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    ?>
    <header>
        <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/minhaConta.php" class="back-button"><i class="fas fa-arrow-left"></i></a>
        <h1 class="dadosCadastraisTitulo">DADOS CADASTRAIS</h1>
    </header>
    
    <div class="line-out">
        <div class="line"></div>
    </div>
    
    <section class="conta-container">
        <div class="profile-card">
            <div class="Foto_e_edicao">
                <img src="../../../public/imagens/user-icon.png" alt="User Profile" class="profile-pic">
            </div>

            <div class="edit-profile">
                <a id="edit-profile" href="../layouts/editarPerfil.php">Editar perfil</a>
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

        <div class="form-container">
            <div class="form-group">
                <label>Nome Completo</label>
                <input class="inputDadosCadastrais" type="text">
            </div>
            <div class="form-group">
                <label>Data de Nascimento</label>
                <input class="inputDadosCadastrais" type="date">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="inputDadosCadastrais" type="email">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input class="inputDadosCadastrais" type="number">
            </div>
            <div class="form-group">
                <label>Telefone</label>
                <div class="tel">
                <select>
                    <option>(11)</option>
                    <option>(12)</option>
                    <option>(13)</option>
                    <option>(14)</option>
                    <option>(15)</option>
                    <option>(16)</option>
                    <option>(17)</option>
                    <option>(18)</option>
                    <option>(19)</option>
                    <option>(21)</option>
                    <option>(22)</option>
                    <option>(24)</option>
                    <option>(27)</option>
                    <option>(28)</option>
                    <option>(31)</option>
                    <option>(32)</option>
                    <option>(33)</option>
                    <option>(34)</option>
                    <option>(35)</option>
                    <option>(37)</option>
                    <option>(38)</option>
                    <option>(41)</option>
                    <option>(42)</option>
                    <option>(43)</option>
                    <option>(44)</option>
                    <option>(45)</option>
                    <option>(46)</option>
                    <option>(47)</option>
                    <option>(48)</option>
                    <option>(49)</option>
                    <option>(51)</option>
                    <option>(53)</option>
                    <option>(54)</option>
                    <option>(55)</option>
                    <option>(61)</option>
                    <option>(62)</option>
                    <option>(63)</option>
                    <option>(64)</option>
                    <option>(65)</option>
                    <option>(66)</option>
                    <option>(67)</option>
                    <option>(68)</option>
                    <option>(69)</option>
                    <option>(71)</option>
                    <option>(73)</option>
                    <option>(74)</option>
                    <option>(75)</option>
                    <option>(77)</option>
                    <option>(79)</option>
                    <option>(81)</option>
                    <option>(82)</option>
                    <option>(83)</option>
                    <option>(84)</option>
                    <option>(85)</option>
                    <option>(86)</option>
                    <option>(87)</option>
                    <option>(88)</option>
                    <option>(89)</option>
                    <option>(91)</option>
                    <option>(92)</option>
                    <option>(93)</option>
                    <option>(94)</option>
                    <option>(95)</option>
                    <option>(96)</option>
                    <option>(97)</option>
                    <option>(98)</option>
                    <option>(99)</option>
                </select>
                <input class="inputDadosCadastrais" type="tel">
            </div>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input class="inputDadosCadastrais" type="password">
            </div>
            <div class="form-group">
                <label>Nome Social</label>
                <input class="inputDadosCadastrais" type="text">
            </div>
        </div>
    </section>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/rodape/script.js"></script>
</body>
</html>