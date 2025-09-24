let contador = 1;
const maxValor = 1000;
const minValor = 1;

const valorDisplay = document.getElementById('valor');
const quantidadeInput = document.getElementById('quantidadeInput');

function atualizarValor() {
    valorDisplay.textContent = contador;
    quantidadeInput.value = contador; // atualiza o hidden
}

document.getElementById('aumentar').addEventListener('click', () => {
    if (contador < maxValor) {
        contador++;
        atualizarValor();
    }
});

document.getElementById('diminuir').addEventListener('click', () => {
    if (contador > minValor) {
        contador--;
        atualizarValor();
    }
});

// inicializa valor correto
atualizarValor();

// AJAX para adicionar ao carrinho sem pop-up
document.getElementById('formCarrinho').addEventListener('submit', function(e){
    e.preventDefault();

    const formData = new FormData(this);

    fetch('/projeto-integrador-et.com/config/produtoRouter.php?action=adicionarCarrinho', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // o router deve retornar JSON {"ok":true}
    .then(data => {
        if (!data.ok) {
            alert('Erro ao adicionar ao carrinho: ' + (data.msg || 'Tente novamente.'));
        }
        // Se quiser, você pode atualizar o contador ou a interface do carrinho aqui
    })
    .catch(err => console.error(err));
});
