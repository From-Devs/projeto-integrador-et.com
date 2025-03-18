<?php require __DIR__ . "/padraoContent.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">

</head>
<body>
    <div id="aviso">
        <img id="pointerAviso" src="./../public/pointer.png" alt="pointer">
        <h1 id="avisoH1">Passe o mouse por cima das fotos</h1>
    </div>
    <div class="container">
        <!-- ordem da função fotoDev 1° - imagem / 2° - linkGitHub / 3° - linkInstagram / 4° - linkLinkedin / 5° - nome -->
        <?php echo fotoDev("./../public/fotoNossas/eduardo.png","https://github.com/thenewgrau","https://www.instagram.com/eduardoserafiim_/","https://www.linkedin.com/in/eduardo-serafim-821649305/", "Eduardo Serafim") ?>
        <?php echo fotoDev("./../public/fotoNossas/daniel.png","","","","Daniel Prospero") ?>
        <?php echo fotoDev("./../public/fotoNossas/duda.png","https://github.com/RainhaStealth","https://www.instagram.com/dudaa.txz","https://www.linkedin.com/in/maria-eduarda-moreira-6475752a8/ ","Maria Eduarda") ?>
        <?php echo fotoDev("./../public/fotoNossas/eliel.png","","","","Eliel Murbach") ?>
        <?php echo fotoDev("./../public/fotoNossas/evandro.png","","","https://www.linkedin.com/in/evandrocmarques/","Evandro Marques") ?>
        <?php echo fotoDev("./../public/fotoNossas/guilherme.png","","","","Guilherme Bergamo") ?>
        <?php echo fotoDev("./../public/fotoNossas/kerolin.png","","","","Kerolin Dos Santos") ?>
        <?php echo fotoDev("./../public/fotoNossas/mateus.png","","","","Mateus Storti") ?>
        <?php echo fotoDev("./../public/fotoNossas/nicolas.png","https://github.com/nicolasmleloy","https://www.instagram.com/nicolas_eloy10","","Nicolas Eloy") ?>
        <?php echo fotoDev("./../public/fotoNossas/nicolle.png","","","","Nicolle Zaleski") ?>
        <?php echo fotoDev("./../public/fotoNossas/vinicius.png","","","","Vinicius Elionai") ?>
        <?php echo fotoDev("./../public/fotoNossas/robert.png","","","","Robert Fernandes") ?>
        <?php echo fotoDev("./../public/fotoNossas/marcos.png","","","","Marcos Paulo") ?>
    </div>
</body>
</html>

