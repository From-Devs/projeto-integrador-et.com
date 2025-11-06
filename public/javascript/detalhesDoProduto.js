// ================================
// === CONTROLE DE QUANTIDADE ====
// ================================
let contador = 1;
const maxValor = 1000;
const minValor = 1;

const quantidadeInput = document.getElementById('quantidadeInput');

function atualizarValor() {
    quantidadeInput.value = contador;
}

// Botão +
document.getElementById('aumentar').addEventListener('click', () => {
    if (contador < maxValor) {
        contador++;
        atualizarValor();
    }
});

// Botão -
document.getElementById('diminuir').addEventListener('click', () => {
    if (contador > minValor) {
        contador--;
        atualizarValor();
    }
});

// Input manual
quantidadeInput.addEventListener('input', () => {
    if (quantidadeInput.value === '') return;
    let val = parseInt(quantidadeInput.value.replace(/\D/g, '')) || '';
    if (val !== '') {
        if (val > maxValor) val = maxValor;
        if (val < minValor) val = minValor;
        contador = val;
    }
});

quantidadeInput.addEventListener('blur', () => {
    if (quantidadeInput.value === '' || parseInt(quantidadeInput.value) < minValor) {
        contador = minValor;
    } else if (parseInt(quantidadeInput.value) > maxValor) {
        contador = maxValor;
    } else {
        contador = parseInt(quantidadeInput.value);
    }
    atualizarValor();
});

atualizarValor();

// ================================
// === ADICIONAR AO CARRINHO ======
// ================================
const formCarrinho = document.getElementById('formCarrinho');
formCarrinho.addEventListener('submit', function(e){
    e.preventDefault();

    const idProduto = this.querySelector('input[name="id_produto"]').value;

    fetch('/projeto-integrador-et.com/router/CarrinhoRouter.php?action=adicionarCarrinho', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ id_produto: idProduto, quantidade: null })
    })
    .then(res => res.json())
    .then(data => {
        if (data.ok) {
            if (window.abrirPopUp) window.abrirPopUp("popUpCarrinho"); 
        } else {
            if (window.abrirPopUp) window.abrirPopUp("popUpErro"); 
        }
    })
    .catch(err => {
        console.error(err);
        if (window.abrirPopUp) window.abrirPopUp("popUpErro");
    });
});

// ================================
// === LISTA DE DESEJOS ===========
// ================================
const formFavorito = document.getElementById('formFavorito');
formFavorito.addEventListener('submit', function(e){
    e.preventDefault();
    const idProduto = this.querySelector('input[name="id_produto"]').value;

    fetch('/projeto-integrador-et.com/router/ListaDesejosRouter.php?action=adicionarFavorito', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ id_produto: idProduto })
    })
    .then(res => res.json())
    .then(data => {
        if (data.ok) {
            if (window.abrirPopUp) window.abrirPopUp("popUpFavorito"); 
        } else {
            if (window.abrirPopUp) window.abrirPopUp("popUpErroFavorito"); 
        }
    })
    .catch(err => {
        console.error(err);
        if (window.abrirPopUp) window.abrirPopUp("popUpErroFavorito");
    });
});

// ================================
// === ORDENAR AVALIAÇÕES =========
// ================================
document.getElementById('ordenar').addEventListener('change', function() {
    const valor = this.value;
    const container = document.querySelector('.container-avaliacoes');
    const avaliacoes = Array.from(container.querySelectorAll('.avaliacao'));

    avaliacoes.sort((a, b) => {
        const dataA = new Date(a.querySelector('.data-avaliacao span').textContent.split('/').reverse().join('-'));
        const dataB = new Date(b.querySelector('.data-avaliacao span').textContent.split('/').reverse().join('-'));

        if (valor === 'maisRecentes') return dataB - dataA;
        if (valor === 'maisAntigas') return dataA - dataB;
        return 0;
    });

    container.innerHTML = '';
    avaliacoes.forEach(a => container.appendChild(a));
});

// ================================
// === ALTERAR IMAGEM PRINCIPAL ===
// ================================
const imgPrinc = document.getElementById('img-principal');
const imgLater = document.querySelectorAll('.imagens-lateral img');
imgLater.forEach(img => img.addEventListener('click', () => imgPrinc.src = img.src));
