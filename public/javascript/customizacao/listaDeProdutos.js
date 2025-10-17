document.querySelectorAll('.itemLista').forEach(item => {
    item.addEventListener('click', () => {
        const idProduto = item.getAttribute('data-id');

        console.log(idProduto, " foi clicado")
        // fetch(`getProduto.php?id=${idProduto}`)
        //     .then(res => res.json())
        //     .then(data => {
        //         // Preenche os campos do modal de edição
        //         document.querySelector('#nomeProduto').value = data.nome;
        //         document.querySelector('#corDestaque').value = data.cor_destaque;
        //         document.querySelector('#cor1').value = data.cor1;
        //         document.querySelector('#cor2').value = data.cor2;
        //         document.querySelector('#cor3').value = data.cor3;
        //         document.querySelector('#imgProduto').src = data.imagem_url;
        //     })
        //     .catch(err => console.error('Erro ao carregar produto:', err));
    });
});