<?php
    require __DIR__ . "/carousel.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: gray;
        }
        .carousel{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .produtosCarousel{
            display: flex;
            align-items: center;
        }
        .carousel img{
            height: 300px;
        }
        .carousel .itemPrincipal{
            height: 400px;
        }
        .sessoesCarousel{
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .carousel .pages{
            display: flex;
            gap: 15px;
        }
        .carousel .pagina{
            width: 33px;
            height: 33px;
            border-radius: 100px;
            background-color: white;
        }
        .carousel .paginaSelecionada{
            background-color: black;
        }
        .setaCarousel{
            font-size: 25px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="carousel" id="carousel">
        <div class="produtosCarousel">
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/leite.png" alt="">
            <img class="itemPrincipal" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
            <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/bocarosa.png" alt="">
        </div>
        <div class="sessoesCarousel">
            <i class="fa-solid fa-chevron-left setaCarousel setaEsquerda" id="esquerda"></i>
            <div class="pages">
                <div class="pagina paginaSelecionada"></div>
                <div class="pagina"></div>
                <div class="pagina"></div>
            </div>
            <i class="fa-solid fa-chevron-right setaCarousel setaDireita" id="direita"></i>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
   
            const carousel = document.getElementById("carousel");
            const setas = carousel.querySelectorAll(".setaCarousel");
            console.log(setas);

        });
    </script>
</body>
</html>