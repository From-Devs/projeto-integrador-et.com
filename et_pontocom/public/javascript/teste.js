const frame = document.querySelector('.frameProdutos');
const icones = document.querySelectorAll('.frameLancamentos i')

icones.forEach(function(icone){
    icone.addEventListener('click',function(){
        console.log()
        frame.scrollLeft += icone.id === "esquerda" ? -350 : 350
    })
})

let isDragging = false;

const dragging = (e) => {
    if (!isDragging) return;
    frame.scrollLeft -= e.movementX;
    frame.classList.add('dragging');
    console.log(e.movementX);
};

const dragStop = () => {
    isDragging = false;
    frame.classList.remove('dragging');
};

frame.addEventListener('mousemove', dragging);
frame.addEventListener('mousedown', () => isDragging = true);
frame.addEventListener('mouseup', dragStop);
frame.addEventListener('mouseleave', dragStop);