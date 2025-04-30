document.addEventListener("DOMContentLoaded", function(){

    const items = document.querySelectorAll('.carousel-item');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const Bolas = document.querySelectorAll('.Bola');
   const carousel = document.getElementById('carousel');
    const background = document.getElementById('carouselBackground');
    const detalhes = this.documentElement.querySelector('.detalheProdutoCarousel')

    let current = 0;
    let Animacao = false;

    function mudarCorDeFundo(index) {
      carousel.className = `carouselContainer cor-${index}`;
      background.style.animation = 'CarouselDegrade 0.8s ease'
      setTimeout(() => {background.className = `carouselBackground cor-${index}`},799)
      setTimeout(() => {background.style.animation = ''},800)
    }

    function AtualizarCarousel() {
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
        // console.log(Bola.classList); // debugging mostra a list class
        // retorna a cor patrão definido pelo usuario
        Bola.style.background = '#fff';
        // compara os index 
        if (index === current) {
          if (current === 0) {
              // retorna a cor 1
              Bola.style.background = '#7A3241'; 
            } else if (current === 1) {
              // retorna a cor 2
              Bola.style.background = '#AE703F';
            } else {
              // retorna a cor 3
                Bola.style.background = '#AE665E';
            }
        }
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

      AtualizarCarousel();

      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

    function Deslizar(index) {
      if (Animacao || index === current) return;
      Animacao = true;
      current = index;
      AtualizarCarousel();
      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

    prev.addEventListener('click', () => Direcao('prev'));
    next.addEventListener('click', () => Direcao('next'));

    Bolas.forEach((Bola, index) => {
      Bola.addEventListener('click', () => Deslizar(index));
    });

    AtualizarCarousel();

    items.forEach((item) => {
      item.addEventListener('click', function(){
        if (item.classList.contains("active")) {
          console.log("entroe")
          
            if (!detalhes.classList.contains("open")){
              detalhes.classList.add("open")
            }else{
              detalhes.classList.remove("open")
            }
        };
      });
    });
    document.addEventListener('click', function(event){
      if (detalhes.classList.contains("open") && !detalhes.contains(event.target)){
        detalhes.classList.remove("open")
      }
    })
});