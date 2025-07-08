document.addEventListener("DOMContentLoaded", function(){

    const items = document.querySelectorAll('.carousel-item');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const Bolas = document.querySelectorAll('.Bola');
   const carousel = document.getElementById('carousel');
    const background = document.getElementById('carouselBackground');
    const detalhes = this.documentElement.querySelector('.detalheProdutoCarousel')

    let detalhesTitulo = detalhes.childNodes[1].childNodes[1].childNodes[1];
    let detalhesMarca = detalhes.childNodes[1].childNodes[1].childNodes[3];
    let detalhesCor = detalhes.childNodes[3];

    let current = 0;
    let Animacao = false;
    let animacaoInterval = null;

    // let inputTimer = 0;
    // let becomingInactive = false;

    // function inactiveCarousel(){
    //   becomingInactive = true;
    //   let incativeInterval = setInterval(function(){
    //     inputTimer+=1;
    //     console.log(inputTimer);
    //     if (inputTimer==8 && !detalhes.classList.contains("open")){
    //       becomingInactive = false
    //       clearInterval(incativeInterval)
    //       console.log("parou")
    //     }
    //   }, 1000);
    // }

    // setInterval(() => {
    //   if (inputTimer == 0 && becomingInactive == false){
    //     inactiveCarousel();
    //   }
    // },1100);

  //   function executarAnimacao() {
  //     if (Animacao || detalhes.classList.contains("open")) return;
  //     Animacao = true;
  //     animacaoInterval = setInterval(() => {
  //       if (detalhes.classList.contains("open")) {
  //         clearInterval(animacaoInterval);
  //         Animacao = false;
  //         return;
  //       }

  //       if (current >= 2) {
  //         clearInterval(animacaoInterval);
  //         current = 0;
  //         AtualizarCarousel(); 
  //         Animacao = false;
  //         return;
  //       }
    
  //       console.log("Índice atual:", current);
  //       AtualizarCarousel();
  //       current += 1;
    
  //     }, 4000);
  //   }
    
  // setInterval(() => {
  //   executarAnimacao();
  // }, 10);


    function mudarCorDeFundo(index) {
      carousel.className = `carouselContainer cor-${index}`;
      detalhesCor.className = `frameImagemCarousel cor-${index}`;
      background.style.animation = 'CarouselDegrade 0.8s ease'
      setTimeout(() => {background.className = `carouselBackground cor-${index}`},799)
      setTimeout(() => {background.style.animation = ''},800)
    }

    function AtualizarCarousel() {
      inputTimer = 0;

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
              Bola.style.background = '#651629'; 
              detalhesTitulo.innerHTML = "BATOM LÍQUIDO MATTIFY DAZZLE";
              detalhesMarca.innerHTML = "HINODE";
            } else if (current === 1) {
              // retorna a cor 2
              Bola.style.background = '#AE703F';
              detalhesTitulo.innerHTML = "BASE MATE BOCA ROSA";
              detalhesMarca.innerHTML = "PAYOT";
            } else {
              // retorna a cor 3
              Bola.style.background = '#AE665E';
              detalhesTitulo.innerHTML = "BODY SPLASH CUIDE-SE BEM DELEITE";
              detalhesMarca.innerHTML = "O BOTICÁRIO";
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
      item.addEventListener('click', function(event){
        if (item.classList.contains("active")) {
          event.stopPropagation();
          
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