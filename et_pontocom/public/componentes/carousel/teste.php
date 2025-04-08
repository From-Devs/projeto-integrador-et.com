<?php
    require __DIR__ . "/carousel.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/661f108459.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>Carrossel com Animação</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: gray;
    }
    .carousel {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .produtosCarousel {
      display: flex;
      align-items: center;
      overflow-x: auto;
      scroll-behavior: smooth;
      gap: 20px;
      padding: 10px;
    }
    .produtosCarousel::-webkit-scrollbar {
      display: none;
    }
    .carousel img {
      height: 300px;
      flex-shrink: 0;
      border-radius: 15px;
    }
    .carousel .itemPrincipal {
      height: 400px;
    }
    .sessoesCarousel {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-top: 20px;
    }
    .carousel .pages {
      display: flex;
      gap: 15px;
    }
    .carousel .pagina {
      width: 33px;
      height: 33px;
      border-radius: 100px;
      background-color: white;
    }
    .carousel .paginaSelecionada {
      background-color: black;
    }
    .setaCarousel {
      font-size: 25px;
      color: white;
    }

    @keyframes scale-up-center {
      0% {
        transform: scale(0.5);
        opacity: 0.5;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes scale-down-center {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(0.7);
        opacity: 0.5;
      }
    }

    .anim-scale-up {
      animation: scale-up-center 0.4s ease forwards;
    }

    .anim-scale-down {
      animation: scale-down-center 0.4s ease forwards;
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
    document.addEventListener("DOMContentLoaded", function () {
      const carousel = document.getElementById("carousel");
      const produtosCarousel = carousel.querySelector(".produtosCarousel");
      const imagens = produtosCarousel.querySelectorAll("img");
      const pagina = carousel.querySelectorAll(".pagina");
      const setas = carousel.querySelectorAll(".setaCarousel");

      let indix = 1;

      setas.forEach(function (seta) {
        seta.addEventListener("click", function () {
          // Remover destaque da imagem atual
          imagens[indix].classList.remove("itemPrincipal", "anim-scale-up");
          imagens[indix].classList.add("anim-scale-down");
          pagina[indix].classList.remove("paginaSelecionada");

          // Atualizar índice
          if (seta.id === "esquerda") {
            indix = (indix === 0) ? imagens.length - 1 : indix - 1;
          } else {
            indix = (indix === imagens.length - 1) ? 0 : indix + 1;
          }


          imagens[indix].classList.remove("anim-scale-down");
          imagens[indix].classList.add("itemPrincipal", "anim-scale-up");
          pagina[indix].classList.add("paginaSelecionada");


          imagens[indix].scrollIntoView({
            behavior: "smooth",
            inline: "center",
            block: "nearest"
          });
        });
      });
    });
  </script>
</body>
</html>
