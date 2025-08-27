document.querySelectorAll('.produtoMP').forEach(card => {
    const id = card.dataset.id; // se você colocar data-id="<?php echo $item['id_produto']; ?>"
    const hash = id.toString().split('').reduce((a,b)=>a+b.charCodeAt(0),0);
    const cor = `#${(hash*123456 % 0xFFFFFF).toString(16).padStart(6,'0')}`;
    card.style.borderColor = cor;
    card.style.backgroundColor = cor + '33'; // transparencia
});