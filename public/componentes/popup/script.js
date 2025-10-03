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

  setTimeout(() => fecharPopUp(id, true), tempoAtivo);
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
}

document.querySelectorAll('.input-file').forEach(input => {
    input.addEventListener('change', function (event) {
      const file = event.target.files[0];
      const imgId = input.getAttribute('data-img-id');
      const img = document.getElementById(imgId);

      if (img) {
        if (file) {
          const url = URL.createObjectURL(file);
          img.src = url;
          img.style.display = 'block';
        } else {
          img.src = '';
          img.style.display = 'none';
        }
      }
    });
  });