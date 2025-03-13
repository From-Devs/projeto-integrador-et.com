<?php
require __DIR__ . "/../padraoCard/padrão/padrao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - Nivea Hidratante</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Germania+One&family=Montserrat:wght@100..900&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
</head>
<body>
            <?php echo Card("Nivea", "Hidratante Corporal Milk", "R$30,00", "../public/imagem.png"); ?>
    <script src="script.js"></script>
</body>
</html>
