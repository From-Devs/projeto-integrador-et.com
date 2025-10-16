<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";

    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
    $tipoUsuario = $_SESSION['tipoUsuario'] ?? "Não logado";
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">

    <link rel="stylesheet" href="../../../public/css/editarPerfil.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Dados</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header

    echo PopUpComImagemETitulo("popUpAtencao", "/popUp_Botoes/atencao.png", "160px", "Preencha Todos os Campos!", "", "", "", "352px");
    ?>

    <main>
        <h1 class="tituloEditarConta">EDITAR DADOS</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <form class="profile-card" method="POST" action="../../../router/UserRoutes.php?acao=update" enctype="multipart/form-data">

                <div class="profileIconEditContainer">
                    <h1>Alterar foto de perfil</h1>

                    <div class="profileIconWrapper">
                    <?php
                        // Caminho salvo no banco, ex: "public/uploads/1756329425_nome.jpg"
                        $avatarPath = !empty($user['foto']) 
                            ? "/projeto-integrador-et.com/" . $user['foto'] 
                            : "/projeto-integrador-et.com/public/imagens/user-icon.png";
                        ?>

                        <img src="<?= $avatarPath ?>" alt="User Profile" class="profile-pic" id="avatarPreview">
                        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" onchange="previewFile()"/>
                        <label for="avatar"><i class='bx bx-image-alt'></i></label>
                    </div>
                </div>

                <div class="dadosUsuarioForm">
                    <div class="dadosUsuarioFormInputs">
                    <input type="hidden" name="update_id" value="<?= htmlspecialchars($user['id_usuario'] ?? ''); ?>">
                        <div class="formControl">
                            <input type="text" class="formInput" name="nome" id="username" value="<?= htmlspecialchars($user['nome'] ?? ""); ?>" required>
                            <label for="username">Nome Completo:</label>
                        </div>
                        <div class="formControl">
                            <input type="email" class="formInput" name="email" id="email" value="<?= htmlspecialchars($user['email'] ?? ""); ?>" required>
                            <label for="email">Email:</label>
                        </div>
                        <div class="formControl">
                            <input type="date" class="formInput" name="data_nascimento" id="date" value="<?= htmlspecialchars($user['data_nascimento'] ?? ""); ?>" required>
                            <label for="date">Data de nascimento:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="cpf" id="cpf" value="<?= htmlspecialchars($user['cpf'] ?? ""); ?>" required>
                            <label for="cpf">CPF:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="telefone" id="phone" value="<?= htmlspecialchars($user['telefone'] ?? ""); ?>" required>
                            <label for="phone">Telefone:</label>
                        </div>
                    </div>

                    <div class="dadosAcoesContainer">
                        
                        <button type="button" class="cancelEditButton btn-red" id='cancelEditButton'>
                            <p class="editButtonText">Cancelar</p>
                            <i class='bx bx-trash'></i>
                        </button>
                    
                        <button type="submit" class="saveButton btn-black" onclick='validarCampos()'>
                            <p class="editButtonText">Salvar alterações </p>
                            <i class='bx bx-edit'></i>
                        </button>
                        
                    </div>
                    
                </div>
            </form>

            <div class="opcoes-conta">

                <div class="option-card" id="alterarSenhaCard">
                    <div class="optionCardDesc">
                        <div class="icon">
                            <i class='bx bx-lock' ></i>
                        </div>
                        <div class="opcoes-content">
                            <strong>Alterar senha</strong> 
                            <p>Mude a credencial de entrada da conta</p>
                        </div>
                    </div>

                    <i class='bx bx-chevron-right iconeSeta'></i> 

                </div>

                <div class="option-card" id="alterarEnderecoCard">
                    <div class="optionCardDesc">
                        <div class="icon">
                            <i class='bx bx-location-plus' ></i>
                        </div>
                        <div class="opcoes-content">
                            <strong>Editar endereço</strong> 
                            <p>Mude informações do seu endereço</p>
                        </div>
                    </div>

                    <i class='bx bx-chevron-right iconeSeta'></i> 

                </div>

            </div>
        </section>
    </main>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/editarDados.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>

    <script>
        
        function voltarPaginaAnterior() {
            history.back();
        }
        
        const botaoCancelarEdicaoConta = document.getElementById('cancelEditButton').addEventListener('click', voltarPaginaAnterior);
        const botaoAlterarEndereco = document.getElementById('alterarEnderecoCard').addEventListener('click', function(){
            window.location.href = 'editarEndereco.php';
        });
        const botaoAlterarSenha = document.getElementById('alterarSenhaCard').addEventListener('click', function(){
            window.location.href = 'alterarSenha.php';
        });

        function validarCampos(){
            let campos = document.querySelectorAll(".formInput");
            let vazio = false;

            campos.forEach(campo => {
                if(!campo.value.trim()){
                    vazio = true;
                }
            });

            if(vazio){
                abrirPopUp("popUpAtencao");
            }else{
                console.log("Certo")
            }
        }
        
    </script>


</body>
</html>
