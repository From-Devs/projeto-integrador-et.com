document.addEventListener("DOMContentLoaded", function(){

    const frame = document.querySelectorAll('.frameProdutos');
    
    frame.forEach(item => {
        console.log(item)
        const icones = document.querySelectorAll('.frameLancamentos i')
        
        icones.forEach(function(icone){
            icone.addEventListener('click',function(){
                item.scrollLeft += (icone.id === "esquerda" ? -600 : 600);
            })
        })
    
        let isDragging = false;
    
        const dragging = (e) => {
            if (!isDragging) return;
            item.scrollLeft -= e.movementX;
            item.classList.add('dragging');
        };
    
        const dragStop = () => {
            isDragging = false;
            item.classList.remove('dragging');
        };
    
        item.addEventListener('mousemove', dragging);
        item.addEventListener('mousedown', () => isDragging = true);
        item.addEventListener('mouseup', dragStop);
        item.addEventListener('mouseleave', dragStop);

    })


});