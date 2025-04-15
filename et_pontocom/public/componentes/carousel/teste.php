<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <title>Carrossel com Bolinhas Maiores</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: sans-serif;
      flex-direction: column;
      transition: background-color 0.6s ease;
    }

    .carousel {
      position: relative;
      width: 800px;
      height: 400px;
      perspective: 1200px;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .carousel-track {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .carousel-item {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 200px;
      height: 300px;
      transform: translate(-50%, -50%) scale(0.8);
      opacity: 0;
      transition: all 0.8s ease;
      z-index: 0;
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    .carousel-item.active {
      transform: translate(-50%, -50%) scale(1.2);
      opacity: 1;
      z-index: 3;
    }

    .carousel-item.left {
      transform: translate(-200%, -50%) scale(0.9);
      opacity: 0.5;
      z-index: 2;
    }

    .carousel-item.right {
      transform: translate(100%, -50%) scale(0.9);
      opacity: 0.5;
      z-index: 2;
    }

    .bottom-controls {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .Seta-btn {
      font-size: 28px;
      color: white;
      background: transparent;
      border: none;
      cursor: pointer;
      transition: color 0.3s;
    }


    .Bolas {
      display: flex;
      gap: 15px;
      justify-content: center;
      align-items: center;
    }

    .Bola {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background-color: white;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.3s;
    }

    .Bola.active-Bola {
      background-color: black;
      transform: scale(1.3);
    }

    .cor-1 { background-color: #AE703F; }
    .cor-2 { background-color: #CC9F9D; }
    .cor-0 { background-color: #7A3241; }

    
  </style>
</head>
<body class="cor-0">
    
  <div class="carousel">
    <div class="carousel-track" id="MoverCarrousel">
      <div class="carousel-item">
        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/leite.png" />
      </div>
      <div class="carousel-item">
        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" />
      </div>
      <div class="carousel-item">
        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/bocarosa.png" />
      </div>
    </div>
  </div>

  <div class="bottom-controls">
    <button class="Seta-btn" id="prev"><i class="fas fa-chevron-left"></i></button>

    <div class="Bolas" id="BolasContainer">
      <div class="Bola" class="cor-0"></div>
      <div class="Bola" class="cor-0"></div>
      <div class="Bola" class="cor-0"></div>
    </div>

    <button class="Seta-btn" id="next"><i class="fas fa-chevron-right"></i></button>
  </div>

  <script>
    const items = document.querySelectorAll('.carousel-item');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const Bolas = document.querySelectorAll('.Bola');
    const body = document.body;

    let current = 0;
    let Animacao = false;

    function mudarCorDeFundo(index) {
      body.className = `cor-${index}`;
    }
    function mudarCorDaBola(index) {
      Bola.className = `cor-${index}`;
    }

    function AtualizarCarroseuç() {
      items.forEach((item, index) => {
        item.classList.remove('left', 'right', 'active');

        if (index === current) {
          item.classList.add('active');
        } else if (index === (current - 1 + items.length) % items.length) {
          item.classList.add('left');
        } else if (index === (current + 1) % items.length) {
          item.classList.add('right');
        }
      });

      Bolas.forEach((Bola, index) => {
        Bola.classList.toggle('active-Bola', index === current);
      });

      mudarCorDeFundo(current);
    }

    function Direcao(direction) {
      if (Animacao) return;
      Animacao = true;

      if (direction === 'prev') {
        current = (current - 1 + items.length) % items.length;
      } else {
        current = (current + 1) % items.length;
      }

      AtualizarCarroseuç();

      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

    function Deslizar(index) {
      if (Animacao || index === current) return;
      Animacao = true;
      current = index;
      AtualizarCarroseuç();
      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

    prev.addEventListener('click', () => Direcao('prev'));
    next.addEventListener('click', () => Direcao('next'));

    Bolas.forEach((Bola, index) => {
      Bola.addEventListener('click', () => Deslizar(index));
    });

    AtualizarCarroseuç();
  </script>
</body>
</html>
