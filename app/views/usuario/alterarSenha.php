<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";

    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
    
    session_start();
    
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

    <link rel="stylesheet" href="../../../public/css/alterarSenha.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Alterar Senha</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    $botao1 = botaoPersonalizadoOnClick("Não","btn-white",'fecharPopUp("confirmacao")',"90px","40px","20px");
    $botao2 = botaoPersonalizadoRedirect("Sim","btn-green", "app/views/usuario/paginaPrincipal.php","90px","40px","20px");
    echo PopUpConfirmar("confirmacao", "Deseja Alterar Senha?", $botao1, $botao2, "300px", "white", "", "1.7rem");
    echo botaoPersonalizadoOnClick("Confirmar", "btn-green", "abrirPopUp(\"confirmacao\")");

    echo PopUpComImagemETitulo("popUpAtencao", "/popUp_Botoes/atencao.png", "160px", "Preencha Todos os Campos!", "", "", "", "352px");
    ?>

    <main>
        <h1 class="tituloEditarConta">ALTERAR SENHA</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <form class="profile-card" method="POST" action="../../../router/UserRoutes.php?acao=update_password" >

                <div class="dadosUsuarioForm">
                    <div class="dadosUsuarioFormInputs">
                    <input type="hidden" name="update_senha" value="<?= htmlspecialchars($user['id_usuario'] ?? ''); ?>">
                        <div class="formControl">
                            <input type="password" class="formInput" name="senhaAtual" id="senhaAtual" required>
                            <label for="senhaAtual">Senha Atual:</label>
                        </div>
                        <div class="formControl">
                            <input type="password" class="formInput" name="novaSenha" id="novaSenha" required>
                            <label for="novaSenha">Nova Senha:</label>
                        </div>
                        <div class="formControl">
                            <input type="password" class="formInput" name="confirmarSenha" id="confirmarSenha" required>
                            <label for="confirmarSenha">Confirmar Senha:</label>
                        </div>
                    </div>

                    <div class="dadosAcoesContainer">
                        
                        <button type="button" class="cancelEditButton btn-red" id='cancelEditButton'>
                            <p class="editButtonText">Cancelar</p>
                            <i class='bx bx-trash'></i>
                        </button>
                    
                        <button type="submit" class="saveButton btn-black" onclick='validarCampos()'>
                            <p class="editButtonText">Salvar</p>
                            <i class='bx bx-edit'></i>
                        </button>
                    </div>
                    
                </div>
            </form>

        </section>
    </main>

    <script src="/projeto-integrador-et.com/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/sidebar/script.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>

    <script>
        
        function voltarPaginaAnterior() {
            history.back();
        }
        
        const botaoCancelarEdicaoConta = document.getElementById('cancelEditButton').addEventListener('click', voltarPaginaAnterior);

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
                console.log("");
            }
        }
        
    </script>


</body>
</html>
