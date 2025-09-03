<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";
    require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";

    $controller = new UserController(); 
    $user = $controller->getLoggedUser();
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">

    <link rel="stylesheet" href="../../../public/css/editarEndereco.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Endereço</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header
    $botao1 = botaoPersonalizadoOnClick("Não","btn-white",'fecharPopUp("confirmacao")',"90px","40px","20px");
    $botao2 = botaoPersonalizadoRedirect("Sim","btn-green", "app/views/usuario/paginaPrincipal.php","90px","40px","20px");
    echo PopUpConfirmar("confirmacao", "Deseja Salvar Endereço?", $botao1, $botao2, "300px", "white", "", "1.7rem");
    echo botaoPersonalizadoOnClick("Confirmar", "btn-green", "abrirPopUp(\"confirmacao\")");

    echo PopUpComImagemETitulo("popUpAtencao", "/popUp_Botoes/atencao.png", "160px", "Preencha Todos os Campos!", "", "", "", "352px");
    ?>

    <main>
        <h1 class="tituloEditarConta">EDITAR ENDEREÇO</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <form class="profile-card" method="POST" action="" >

                <div class="dadosUsuarioForm">
                    <div class="dadosUsuarioFormInputs">
                    <input type="hidden" name="update_id" value="<?= htmlspecialchars($user['id_usuario'] ?? ''); ?>">
                        <div class="formControl">
                            <input type="text" class="formInput" name="tipoLogradouro" id="tipoLogradouro" required>
                            <label for="tipoLogradouro">Tipo do logradouro:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="estado" id="estado" required>
                            <label for="estado">Estado:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="cidade" id="cidade" required>
                            <label for="cidade">Cidade:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="bairro" id="bairro" required>
                            <label for="bairro">Bairro:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="rua" id="rua" required>
                            <label for="rua">Rua:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="numero" id="numero" required>
                            <label for="numero">Número:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="cep" id="cep" required>
                            <label for="cep">CEP:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="complemento" id="complemento">
                            <label for="complemento">Complemento (Opicional):</label>
                        </div>
                    </div>

                    <div class="dadosAcoesContainer">
                        
                        <button type="button" class="cancelEditButton btn-red" id='cancelEditButton'>
                            <p class="editButtonText">Cancelar</p>
                            <i class='bx bx-trash'></i>
                        </button>
                    
                        <button type="submit" class="saveButton btn-black" onclick='validarCampos()'>
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
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>

    <script>
        
        function voltarPaginaAnterior() {
            history.back();
        }
        
        const botaoCancelarEdicaoConta = document.getElementById('cancelEditButton').addEventListener('click', voltarPaginaAnterior);

        function validarCampos(){
            let campos = document.querySelectorAll(".formInput[required]");
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
