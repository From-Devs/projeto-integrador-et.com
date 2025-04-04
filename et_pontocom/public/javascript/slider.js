document.addEventListener("DOMContentLoaded", function(){

    const frame = document.querySelectorAll('.frameSlider');
    
    frame.forEach(item => {
        const icones = item.querySelectorAll('.setaSlider')
        const slider = item.querySelector('.frameProdutos')
        
        icones.forEach(function(icone){
            icone.addEventListener('click',function(){
                slider.scrollLeft += (icone.id === "esquerda" ? -600 : 600);
            })
        })
    
        let isDragging = false;
    
        const dragging = (e) => {
            if (!isDragging) return;
            slider.scrollLeft -= e.movementX;
            slider.classList.add('dragging');
        };
    
        const dragStop = () => {
            isDragging = false;
            slider.classList.remove('dragging');
        };
    
        slider.addEventListener('mousemove', dragging);
        slider.addEventListener('mousedown', () => isDragging = true);
        slider.addEventListener('mouseup', dragStop);
        slider.addEventListener('mouseleave', dragStop);

    })


});