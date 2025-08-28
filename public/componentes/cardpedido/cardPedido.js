document.querySelectorAll('.produtoMP').forEach(card => {
    const id = card.dataset.id;
    const hash = id.toString().split('').reduce((a,b)=>a+b.charCodeAt(0),0);
    const cor = `#${(hash*123456 % 0xFFFFFF).toString(16).padStart(6,'0')}`;

    const cardColorido = card.querySelector(".cardcoloridoCam");
    cardColorido.style.background = `linear-gradient(135deg, ${cor}33, ${cor}aa)`;
});
