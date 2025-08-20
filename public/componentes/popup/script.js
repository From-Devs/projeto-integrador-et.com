const closeButton = document.getElementsByClassName("icone-fechar")[0];


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

document.querySelectorAll(".icone-fechar").forEach(botao => {
    botao.addEventListener("click", () => {
        const dialog = botao.closest("dialog");
        if (dialog) {
            dialog.close();
        }
    });
});

function fecharPopUp(id){
    const dialogClass = document.getElementsByClassName(id)[0];
    const dialogId = document.getElementById(id);


    if(dialogClass)
      dialogClass.close();

    if(dialogId)
      dialogId.close();
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