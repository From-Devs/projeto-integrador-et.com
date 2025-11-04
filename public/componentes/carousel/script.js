document.addEventListener("DOMContentLoaded", function(){
  // const detalhes = this.documentElement.querySelector('.detalheProdutoCarousel')

    const items = document.querySelectorAll('.carousel-item');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    const Bolas = document.querySelectorAll('.Bola');
    const carousel = document.getElementById('carousel');
    const background = document.getElementById('carouselBackground');
    const bubbleBackground = document.getElementById('bubble-background');

    // NOVA CAPTURA
  const detalhesPaineis = document.querySelectorAll('.detalheProdutoCarousel');

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
    const activeDetalhe = detalhesPaineis[index];
    if (!activeDetalhe) return;

    // Pega cores dos data attributes
    const corPrincipal = activeDetalhe.dataset.corPrincipal;
    const cor1 = activeDetalhe.dataset.corDegrade1;
    const cor2 = activeDetalhe.dataset.corDegrade2;
    const cor3 = activeDetalhe.dataset.corDegrade3;

    // Troca classes de fundo
    carousel.style.background = `linear-gradient(to bottom, ${cor1}, ${cor2}, ${cor3 || cor2})`;
    const detalhesCor = activeDetalhe.querySelector('.frameImagemCarousel');
    if (detalhesCor) {
      detalhesCor.style.background = `linear-gradient(to bottom, ${cor1}, ${cor2}, ${cor3 || cor2})`;
    }

    // Fundo de todo o carrossel
    background.style.animation = 'CarouselDegrade 0.8s ease';
    setTimeout(() => {
      if (cor1 && cor2) {
        background.style.background = `linear-gradient(to bottom, ${cor1}, ${cor2}, ${cor3 || cor2})`;
      } else if (corPrincipal) {
        background.style.background = corPrincipal;
      }
      background.style.animation = '';
    }, 800);
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
      detalhesPaineis.forEach((detalhe, index) =>{
        detalhe.classList.remove('open', 'active-detail');
            if (index === current) {
                detalhe.classList.add('active-detail');
            }
      })
      Bolas.forEach((Bola, index) => {
        Bola.classList.toggle('active-Bola', index === current);
        // console.log(Bola.classList); // debugging mostra a list class
        // retorna a cor patrão definido pelo usuario
        Bola.style.background = '#fff';
        // compara os index 
        if (index === current) {
          const corAtiva = detalhesPaineis[current].dataset.corPrincipal 
            || detalhesPaineis[current].dataset.corDegrade1 
            || "#ffffff"; // fallback
          Bola.style.background = corAtiva;
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
    const activeDetalhe = document.querySelector('.detalheProdutoCarousel.active-detail');
    if (!activeDetalhe) return;
    activeDetalhe.classList.add("open");
    isPopupOpen = true;
    stopAutoSlide();
  }

	function closePopup(){
    const openDetalhe = document.querySelector('.detalheProdutoCarousel.open');
    if (openDetalhe) {
        openDetalhe.classList.remove("open");
    }
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
      const openDetalhe = document.querySelector('.detalheProdutoCarousel.open');
      if (openDetalhe && !openDetalhe.contains(event.target)){
        closePopup();
      }
    })
    createBubbles()
});