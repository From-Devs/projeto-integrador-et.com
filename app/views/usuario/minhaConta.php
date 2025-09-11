<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";

    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
    // $tipoUsuario = $_SESSION['tipoUsuario'] ?? 'Cliente';
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Associado";
    $login = $_SESSION['login'] ?? false; // Estado de login do usuário (false = deslogado / true = logado)
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">

    <link rel="stylesheet" href="../../../public/css/minhaConta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <title>Minha Conta</title>
</head>
<!-- botaoPersonalizadoRedirect("Sim","btn-red", "app/views/usuario/paginaPrincipal.php","90px","40px","20px"); -->
<body>
    <?php
    $botao1 = botaoPersonalizadoOnClick("Não","btn-white",'fecharPopUp("popUpDeleteProfileConfirm")',"90px","40px","20px");
    $botao2 =   '<button type="submit" form="formApagarConta" class="btn btn-red" style="width: 90px; height:40px; font-size: 20px;">
                        <img src="/projeto-integrador-et.com/public/imagens/popUp_Botoes/img-cancelar.png" alt="img-cancelar" class="img-cancelar">Sim
                </button>';
    echo createHeader($login,$tipoUsuario); // função que cria o header
    echo PopUpConfirmar("popUpDeleteProfileConfirm","Tem certeza que quer apagar sua conta?",$botao1,$botao2,"500px");
    ?>

    <main>
        <h1 class="tituloMinhaConta">MINHA CONTA</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <div class="profile-card">
                <?php
                // Caminho salvo no banco, ex: "public/uploads/1756329425_nome.jpg"
                $avatarPath = !empty($user['foto']) 
                    ? "/projeto-integrador-et.com/" . $user['foto'] 
                    : "/projeto-integrador-et.com/public/imagens/user-icon.png";
                ?>
                <img src="<?= $avatarPath ?>" alt="Avatar" class="profile-pic">

            
                <div class="dadosUsuario">
                <form>
                    <div class="dadosUsuarioContainer">
                        <div class="dadosText" id="content-nameUser">
                            <p><strong>Nome Completo:</strong></p>
                            <span id="username"><?= htmlspecialchars($user['nome'] ?? "Não logado"); ?></span>
                        </div>
                        <div class="dadosText" id="content-email">
                            <p><strong>Email:</strong></p>
                            <span id="email"><?= htmlspecialchars($user['email'] ?? ""); ?></span>
                        </div>
                        <div class="dadosText" id="content-nasc">
                            <p><strong>Data de nascimento:</strong></p>
                            <span id='nascSpan'><?= htmlspecialchars($user['data_nascimento'] ?? ""); ?></span>
                        </div>
                        <div class="dadosText" id="content-cpf">
                            <p><strong>CPF:</strong></p>
                            <span><?= htmlspecialchars($user['cpf'] ?? ""); ?></span>
                        </div>
                        <div class="dadosText" id="content-phone">
                            <p><strong>Telefone:</strong></p>
                            <span><?= htmlspecialchars($user['telefone'] ?? ""); ?></span>
                        </div>
                        <div class="dadosText" id="content-type">
                            <p><strong>Tipo de conta:</strong></p>
                            <span><?= htmlspecialchars($user['tipo'] ?? ""); ?></span>
                        </div>
                    </div>
                </form>
                <div class="dadosAcoesContainer">
                    <form action="../../../router/UserRoutes.php?acao=delete" method="POST" id="formApagarConta">
                    <input type="hidden" name="delete_id" value="<?= htmlspecialchars($user['id_usuario'] ?? ''); ?>">    
                        <button class="delete-profile-button btn-red" type="button" onclick='abrirPopUp("popUpDeleteProfileConfirm")'>
                            <p id="edit-profile-text">Apagar conta</p>
                            <i class='bx bx-trash'></i>
                        </button>
                    </form>    

                        <button class="edit-profile-button btn-black" id="botaoEdit">
                            <p id="edit-profile-text">Editar dados</p>
                            <i class='bx bx-edit'></i>
                        </button>
                    
                    </div>
                </div>
            </div>

            <div class="opcoes-conta">
                <!-- <a href="/projeto-integrador-et.com/app/views/usuario/dadosCadastrais.php">
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
                </div> -->

                <a href="/projeto-integrador-et.com/app/views/usuario/meusPedidos.php">
                    <div class="option-card">
                        <div class="optionCardDesc">
                            <div class="icon">
                                <i class='bx bx-package' ></i>
                            </div>
                            <div class="opcoes-content">
                                <strong>Meus Pedidos</strong> 
                                <p>Exibe pedidos em andamento e comprados anteriormente</p>
                            </div>
                        </div>

                        <i class='bx bx-chevron-right iconeSeta'></i> 
                        
                    </div>
                </a>

            </div>
        </section>
    </main>

    <script>
        const nascSpan = document.getElementById("nascSpan");
        const valor = nascSpan.textContent;

        if (valor && valor.includes("-")) {
            const [ano, mes, dia] = valor.split("-");
            nascSpan.textContent = `${dia}/${mes}/${ano}`;
        }

        const botaoEdit = document.getElementById("botaoEdit").addEventListener('click', function(){
            window.location.href = 'editarPerfil.php';
        });
    </script>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
</body>
</html>
