document.addEventListener("DOMContentLoaded", function(){

    const items = document.querySelectorAll('.carousel-item');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const Bolas = document.querySelectorAll('.Bola');
    const carousel = document.getElementById('carousel');
    const background = document.getElementById('carouselBackground');
    const detalhes = this.documentElement.querySelector('.detalheProdutoCarousel')
    const bubbleBackground = document.getElementById('bubble-background');

    let detalhesTitulo = detalhes.childNodes[1].childNodes[1].childNodes[1];
    let detalhesMarca = detalhes.childNodes[1].childNodes[1].childNodes[3];
    let detalhesCor = detalhes.childNodes[3];

    let current = 0;
    let Animacao = false;

	const inactivityTimeout = 8000; // 8 segundos (tempo q o usuario precisa ficar inativo)
	const autoSlideInterval = 6000; // 6 segundos (slide de um produto pro outro)
	let autoSlideTimer = null;
	let inactivityTimer = null;
	let isPopupOpen = false;

	startAutoSlide();
	resetInactivityTimer();
	AtualizarCarousel();

  function createBubbles() {
    for (let i = 0; i < 18; i++) {
      const bubble = document.createElement('div');
      bubble.classList.add('bubble');
      const size = Math.random() * 120 + 60; // Tamanho entre 20px e 40px
      bubble.style.width = `${size}px`;
      bubble.style.height = `${size}px`;
      bubble.style.left = `${Math.random() * 100}%`;
      bubble.style.animationDuration = `${Math.random() * 15 + 8}s`; // Duração entre 5s e 13s
      bubble.style.animationDelay = `${Math.random() * 5}s`; // Atraso na animação
      const randomBlur = Math.random() * 8 + 2;
      bubble.style.filter = `blur(${randomBlur}px)`;
      const randomSideShift = Math.random() * 130 + 20; // Movimento aleatório entre -20px e 20px
      bubble.style.setProperty('--bubble-x-shift', `${randomSideShift}px`);
      bubbleBackground.appendChild(bubble);
    }
  }

	// Controle de tempo
	function resetTimers() {
		clearTimeout(inactivityTimer);
		clearInterval(autoSlideTimer);
		
		if (!isPopupOpen) {
			startAutoSlide();
			resetInactivityTimer();
		}
	}
	
	// Temporizador de inatividade
	function resetInactivityTimer() {
		inactivityTimer = setTimeout(() => {
			startAutoSlide();
		}, inactivityTimeout);
	}
	
	// Iniciar slide automático
	function startAutoSlide() {
		if (autoSlideTimer) clearInterval(autoSlideTimer);
		autoSlideTimer = setInterval(() => {
			if (!isPopupOpen && !Animacao) {
				Direcao('next');
			}
		}, autoSlideInterval);
	}
	
	// Parar slide automático
	function stopAutoSlide() {
		clearInterval(autoSlideTimer);
		autoSlideTimer = null;
		clearTimeout(inactivityTimer);
		inactivityTimer = null;
	}

    function mudarCorDeFundo(index) {
      carousel.className = `carouselContainer cor-${index}`;
      detalhesCor.className = `frameImagemCarousel cor-${index}`;
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
              Bola.style.background = '#651629'; 
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
      if (Animacao || isPopupOpen) return;
      Animacao = true;

      if (direction === 'prev') {
        current = (current - 1 + items.length) % items.length;
      } else {
        current = (current + 1) % items.length;
      }

      AtualizarCarousel();
	  resetTimers();

      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

    function Deslizar(index) {
      if (Animacao || index === current || isPopupOpen) return;
      Animacao = true;
      current = index;
      AtualizarCarousel();
	  resetTimers();
      setTimeout(() => {
        Animacao = false;
      }, 800);
    }

	function openPopup(){
		if (Animacao) return;

		if (current === 0) {
			detalhesTitulo.innerHTML = "BATOM LÍQUIDO MATTIFY DAZZLE";
			detalhesMarca.innerHTML = "HINODE";
		} else if (current === 1) {
			detalhesTitulo.innerHTML = "BASE MATE BOCA ROSA";
			detalhesMarca.innerHTML = "PAYOT";
		} else {
			detalhesTitulo.innerHTML = "BODY SPLASH CUIDE-SE BEM DELEITE";
			detalhesMarca.innerHTML = "O BOTICÁRIO";
		}

		detalhes.classList.add("open")
		isPopupOpen = true;
		stopAutoSlide();
	}

	function closePopup(){
		detalhes.classList.remove("open")
		isPopupOpen = false;
		resetTimers();
	}

    prev.addEventListener('click', () => {
		Direcao('prev');
		resetTimers();
	});
    next.addEventListener('click', () => {
		Direcao('next');
		resetTimers();
	});

    Bolas.forEach((Bola, index) => {
      Bola.addEventListener('click', () => {
		Deslizar(index);
		resetTimers();
	  });
    });

    items.forEach((item) => {
      item.addEventListener('click', function(event){
        if (item.classList.contains("active")) {
        	event.stopPropagation();
        	if (!isPopupOpen){
            openPopup();
          }else{
            closePopup();
          }
        };
      });
    });
    document.addEventListener('click', function(event){
      if (detalhes.classList.contains("open") && !detalhes.contains(event.target)){
        closePopup();
      }
    })
    createBubbles()
});