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
    echo createCardProduto("Nivea", "Hidratante Corporal Milk", "R$20,00", "imagem.png", true, "R$30,00", "#3E7FD9", "#133285", "#3F7FD9");
    echo createCardProduto("O Boticário", "Body Splash Biscoito ou Bolacha", "R$20,00", "imagem2.png", true, "R$30,00", "#31BADA", "#00728C", "#31BADA");
    echo createCardProduto("Vult", "Base Líquida Efeito Matte", "R$20,00", "imagem3.png", true, "R$30,00", "#DBA980", "#72543A", "#E4B186");
    echo createCardProduto("O Boticário", "Colonia Coffe Man", "R$30,00", "imagem4.png", true, "R$30,00", "#D2936A", "#6C4A34", "#D29065");
    ?>
    <script src="../../../public/componentes/cardProduto/script.js"></script>
</body>
</html>
