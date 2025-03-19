<?php
require __DIR__ . "/../../../public/componentes/cardProduto/cardProduto.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto - Nivea Hidratante</title>
    <link rel="stylesheet" href="../../../public/componentes/cardProduto/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Germania+One&family=Montserrat:wght@100..900&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "imagem.png", true, "R$30,00");
    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "imagem4.png", true, "R$30,00");
    ?>
    <script src="../../../public/componentes/cardProduto/script.js"></script>
</body>
</html>
