function abrirPopUp(id){
    console.log("Abriu: ", id);
    const dialogClass = document.getElementsByClassName(id)[0];
    const dialogId = document.getElementById(id);
    if (dialogClass) {
        dialogClass.showModal();
    }

    if(dialogId){
      dialogId.showModal();
    }
}

function abrirPopUpRedireciona(id){
    console.log("Abriu: ", id);

    const dialogClass = document.getElementsByClassName(id)[0];
    const dialogId = document.getElementById(id);

    if (dialogClass) dialogClass.showModal();
    if (dialogId) dialogId.showModal();

    localStorage.setItem('modalAberto', id);

    const url = new URL(window.location);
    url.searchParams.set('modal', id);
    history.replaceState(null, '', url);
}

function abrirPopUpCurto(id, tempoAtivo = 3000) {
  const dialog = document.getElementsByClassName(id)[0] || document.getElementById(id);
  if (!dialog) return;

  dialog.classList.remove("fadeOut");
  void dialog.offsetWidth;
  dialog.showModal();

  const barra = dialog.querySelector(".barra-tempo");
  if(barra){
      barra.style.transition = 'none';
      barra.style.transform = 'scaleX(1)';
      void barra.offsetWidth;

      barra.style.transition = `transform ${tempoAtivo}ms linear`;
      barra.style.transform = 'scaleX(0)';
  }

  const idTimeout = setTimeout(() => fecharPopUp(id, true), tempoAtivo);

  //Fechar ao clicar fora do popUpp
  const fecharAoClicar = () => {
    clearTimeout(idTimeout);
    fecharPopUp(id, true);
  };

  const timerAdicionaClique = setTimeout(() => {
    document.addEventListener('click', fecharAoClicar, { once: true });
  }, 50);

  dialog.addEventListener('close', () => {
    clearTimeout(idTimeout);
    clearTimeout(timerAdicionaClique);
    document.removeEventListener('click', fecharAoClicar);
  }, { once: true });
}



document.querySelectorAll(".icone-fechar").forEach(botao => {
    botao.addEventListener("click", () => {
        const dialog = botao.closest("dialog");
        if (dialog) {
            dialog.close();
        }
    });
});

function fecharPopUp(id, curto=false){
  const dialog = document.getElementsByClassName(id)[0] || document.getElementById(id);
  if (!dialog) return;
  
  if(curto){
    dialog.classList.add("fadeOut");
    
    dialog.addEventListener("animationend", () => {
      dialog.close();
      dialog.classList.remove("fadeOut");
    }, { once: true });
  }else{
    dialog.close();
  }

  localStorage.removeItem('modalAberto');
}

//Alteração da pré-visualização de imagens modal edição de produto
document.addEventListener('change', function (event) {
  const input = event.target;
  if (!input || !input.classList || !input.classList.contains('input-file')) return;

  const file = input.files && input.files[0];
  const imgId = input.getAttribute('data-img-id');
  const img = document.getElementById(imgId);

  if (!img) return;

  if (file) {
    if (img._previewUrl) {
      URL.revokeObjectURL(img._previewUrl);
    }
    const url = URL.createObjectURL(file);
    img._previewUrl = url;
    img.src = url;
    img.style.display = 'block';
  } else {
    if (img._previewUrl) {
      URL.revokeObjectURL(img._previewUrl);
      delete img._previewUrl;
    }
    img.src = '';
    img.style.display = 'none';
  }
});