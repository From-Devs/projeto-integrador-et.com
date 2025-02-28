<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/onda.css">
</head>
<body>
    <div>seila</div>
    <?php
    $path = __DIR__ . '/../../../public/componentes/onda.php';

    if (file_exists($path)) {
        include $path;
    } else {
        echo "Arquivo não encontrado: " . $path;
    }
    ?>
</body>
</html>