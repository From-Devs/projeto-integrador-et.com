<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header
    require __DIR__ . "/../../../public/componentes/botao/botao.php";
    require_once __DIR__ . "/../../../router/UserRoutes.php";
    require_once __DIR__ . "/../../Controllers/UserController.php";

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

    <link rel="stylesheet" href="../../../public/css/editarEndereco.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Editar Endereço</title>
</head>
<body>
    <?php
    echo createHeader($login,$tipoUsuario); // função que cria o header 
    ?>

    <main>
        <h1 class="tituloEditarConta">EDITAR ENDEREÇO</h1>
        <div class="line-out">
            <div class="line"></div>
        </div>
        <section class="conta-container">
            <form class="profile-card" method="POST" action="../../../router/UserRoutes.php?acao=save_adress" >

                <div class="dadosUsuarioForm">
                    <div class="dadosUsuarioFormInputs">
                    <input type="hidden" name="update_id" value="<?= htmlspecialchars($user['id_usuario'] ?? ''); ?>">
                        <div class="formControl">
                            <input type="text" class="formInput" name="tipoLogradouro" id="tipoLogradouro" value="<?= htmlspecialchars($user['tipoLogradouro'] ?? ""); ?>" required>
                            <label for="tipoLogradouro">Tipo do logradouro:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="estado" id="estado" value="<?= htmlspecialchars($user['estado'] ?? ""); ?>" required>
                            <label for="estado">Estado:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="cidade" id="cidade" value="<?= htmlspecialchars($user['cidade'] ?? ""); ?>" required>
                            <label for="cidade">Cidade:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="bairro" id="bairro" value="<?= htmlspecialchars($user['bairro'] ?? ""); ?>" required>
                            <label for="bairro">Bairro:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="rua" id="rua" value="<?= htmlspecialchars($user['rua'] ?? ""); ?>" required>
                            <label for="rua">Rua:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="numero" id="numero" value="<?= htmlspecialchars($user['numero'] ?? ""); ?>" required>
                            <label for="numero">Número:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="cep" id="cep" value="<?= htmlspecialchars($user['cep'] ?? ""); ?>" required>
                            <label for="cep">CEP:</label>
                        </div>
                        <div class="formControl">
                            <input type="text" class="formInput" name="complemento" id="complemento" value="<?= htmlspecialchars($user['complemento'] ?? ""); ?>">
                            <label for="complemento">Complemento (Opicional):</label>
                        </div>
                    </div>

                    <div class="dadosAcoesContainer">
                        
                        <button type="button" class="cancelEditButton btn-red" id='cancelEditButton'>
                            <p class="editButtonText">Cancelar</p>
                            <i class='bx bx-trash'></i>
                        </button>
                    
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

    <script>
        
        function voltarPaginaAnterior() {
            history.back();
        }
        
        const botaoCancelarEdicaoConta = document.getElementById('cancelEditButton').addEventListener('click', voltarPaginaAnterior);
        
    </script>


</body>
</html>
