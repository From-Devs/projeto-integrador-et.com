let contador = 1;
const maxValor = 1000;
const minValor = 1;
 
const quantidadeInput = document.getElementById('quantidadeInput');
 
// Atualiza o input com o valor do contador
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
 
// Permitir digitar diretamente no input
quantidadeInput.addEventListener('input', () => {
    // Permite campo vazio para digitar novo número
    if (quantidadeInput.value === '') return;
 
    // Só aceita números válidos
    let val = parseInt(quantidadeInput.value.replace(/\D/g, '')) || '';
    if (val !== '') {
        if (val > maxValor) val = maxValor;
        if (val < minValor) val = minValor;
        contador = val;
    }
});
 
// Valida quando o input perde o foco
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
 
// Inicializa valor correto
atualizarValor();
 
// AJAX para adicionar ao carrinho
document.getElementById('formCarrinho').addEventListener('submit', function(e){
    e.preventDefault();
 
    const formData = new FormData(this);
    formData.set('quantidade', contador); // garante que a quantidade seja enviada
 
    fetch('/projeto-integrador-et.com/config/produtoRouter.php?action=adicionarCarrinho', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.ok) {
            alert(`Produto adicionado ao carrinho! Quantidade: ${contador}`);
        } else {
            alert('Erro ao adicionar ao carrinho: ' + (data.msg || 'Tente novamente.'));
        }
    })
    .catch(err => console.error(err));
});
document.getElementById('ordenar').addEventListener('change', function() {
    const valor = this.value;
    const container = document.querySelector('.container-avaliacoes');
    const avaliacoes = Array.from(container.querySelectorAll('.avaliacao'));

    avaliacoes.sort((a, b) => {
        const dataA = new Date(a.querySelector('.data-avaliacao span').textContent.split('/').reverse().join('-'));
        const dataB = new Date(b.querySelector('.data-avaliacao span').textContent.split('/').reverse().join('-'));

        if (valor === 'maisRecentes') {
            return dataB - dataA; // do mais recente para o mais antigo
        } else if (valor === 'maisAntigas') {
            return dataA - dataB; // do mais antigo para o mais recente
        }
        return 0;
    });

    // Remove avaliações do container e adiciona na nova ordem
    container.innerHTML = '';
    avaliacoes.forEach(a => container.appendChild(a));
});

 