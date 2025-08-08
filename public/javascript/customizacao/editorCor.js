const editor = document.querySelectorAll(".editCor");

editor.forEach(function(item){
    let colorInput = item.querySelector('.corShow');
    let hexInput = item.querySelector('.corHex');

    colorInput.addEventListener('input', function(){
        hexInput.value = colorInput.value
    })

    hexInput.addEventListener('input', function(){
        colorInput.value = hexInput.value
    })
})