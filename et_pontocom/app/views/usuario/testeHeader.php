<?php
    require __DIR__ . "/../../../public/componentes/header/header.php"; // import do header

    session_start();
    // $tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Cliente'; // Descomente essa parte para tipo do usuario = Usuário
    $tipo_usuario = $_SESSION['tipo_usuario'] ?? "Associado"; // Descomente essa parte para tipo do usuario = Associado
    $login = false; // Estado de login do usuário (false = deslogado / true = logado)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Et.com</title>
    <link rel="stylesheet" href="../../../public/componentes/header/style.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebar/style.css">
    <link rel="stylesheet" href="../../../public/css/teste.css">
    <link rel="stylesheet" href="../../../public/componentes/cardLancamento/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php
    echo createHeader($login,$tipo_usuario); // função que cria o header
    ?>

    <script src="../../../public/componentes/header/script.js"></script>
    <script src="../../../public/componentes/sidebar/script.js"></script>
</body>
</html>
