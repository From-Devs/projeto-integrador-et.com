<?php
    require __DIR__ . "\carousel.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Carrossel com Bolinhas Maiores</title>
    <link rel="stylesheet" href="./styles.css">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .carouselContainer{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.6s ease;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body >

    <div class="carouselContainer cor-0" id="carousel">
        <?php
        echo createCarousel()
        ?>
    </div>
    

    <script src="./script.js"></script>
</body>
</html>
