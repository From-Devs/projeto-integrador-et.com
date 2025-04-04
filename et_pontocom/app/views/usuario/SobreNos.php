<?php require __DIR__ . "/../../../public/componentes/SobreNos/fotoFuncSobreNos.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="./../../../public/css/SobreNos.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+KR:wght@100..900&family=Oswald:wght@200..700&family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Slab&display=swap" rel="stylesheet">

</head>
<body>
    <div id="aviso">
        <img id="pointerAviso" src="../../../public/imagens/logosSobreNos/pointer.png" alt="pointer">
        <h1 id="avisoH1">Passe o mouse por cima das fotos</h1>
    </div>
    <div class="container">
        <!-- ordem da função fotoDev 1° - imagem / 2° - linkGitHub / 3° - linkInstagram / 4° - linkLinkedin / 5° - nome -->
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/eduardo.png","https://github.com/thenewgrau","https://www.instagram.com/eduardoserafiim_","https://www.linkedin.com/in/eduardo-serafim-821649305/", "Eduardo Serafim") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/daniel.png","https://github.com/DanielPydev","https://www.instagram.com/dan_niel_008?igsh=aXE3bmxIMjEyejIt","https://www.linkedin.com/in/daniel-pr%C3%B3spero-de-figueiredo-47284a358/","Daniel Prospero") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/duda.png","https://github.com/Duda-Moreira","https://www.instagram.com/dudaa.txz","https://www.linkedin.com/in/maria-eduarda-moreira-6475752a8/","Maria Eduarda") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/eliel.png","","","","Eliel Murbach") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/evandro.png","https://github.com/evandroocm","https://www.instagram.com/evandroocm/","https://www.linkedin.com/in/evandrocmarques/","Evandro Marques") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/guilherme.png","","","","Guilherme Bergamo") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/kerolin.png","","","","Kerolin Dos Santos") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/mateus.png","","","","Mateus Storti") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/nicolas.png","https://github.com/nicolasmleloy","https://www.instagram.com/nicolas_eloy10","https://www.linkedin.com/in/nícolas-marcelo-lima-eloy-51a394280","Nicolas Eloy") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/nicolle.png","https://github.com/NicolleZaleski","https://www.instagram.com/nicolle.zaleski?igsh=ajB1dTJoZnI4azFj","https://www.linkedin.com/in/nicolle-zaleski-290578333/","Nicolle Zaleski") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/vinicius.png","https://github.com/Vini909","https://www.instagram.com/viniciuselionai?igsh=bzF4MmJtdmJ2NTdk","","Vinicius Elionai") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/robert.png","","","","Robert Fernandes") ?>
        <?php echo fotoDev("./../../../public/imagens/fotoNossas/marcos.png","","","","Marcos Paulo") ?>
    </div>
</body>
</html>

