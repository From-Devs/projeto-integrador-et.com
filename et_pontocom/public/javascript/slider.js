document.addEventListener("DOMContentLoaded", function(){

    const frame = document.querySelector('.frameProdutos');
    const icones = document.querySelectorAll('.frameLancamentos i')

    icones.forEach(function(icone){
        icone.addEventListener('click',function(){
            frame.scrollLeft += (icone.id === "esquerda" ? -600 : 600);
        })
    })

    let isDragging = false;

    const dragging = (e) => {
        if (!isDragging) return;
        frame.scrollLeft -= e.movementX;
        frame.classList.add('dragging');
    };

    const dragStop = () => {
        isDragging = false;
        frame.classList.remove('dragging');
    };

    frame.addEventListener('mousemove', dragging);
    frame.addEventListener('mousedown', () => isDragging = true);
    frame.addEventListener('mouseup', dragStop);
    frame.addEventListener('mouseleave', dragStop);

});