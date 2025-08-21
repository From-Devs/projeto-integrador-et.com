const checkboxes = document.querySelectorAll('.cardCheckbox');
const acoesCheckbox = document.getElementById('acoesSelecionados');
const selecionarTodos = document.getElementById('selecionarTodos');
const btnAdicionarcarrinho = document.getElementById('adicionarCarrinho');
const btnExcluirSelecionados = document.getElementById('excluirSelecionados');

function atualizarBarra(){
    const boxSelecionado = Array.from(checkboxes).some(cb => cb.checked);
    if (boxSelecionado){
        acoesCheckbox.classList.add("ativo");
    } else{
        acoesCheckbox.classList.remove("ativo");
    }
    
    acoesCheckbox.style.display = boxSelecionado ? 'flex' : 'none';

    const todosSelecionados = Array.from(checkboxes).every(cb => cb.checked);
    selecionarTodos.checked = todosSelecionados;
}

checkboxes.forEach(cb=> {
    cb.addEventListener('change', atualizarBarra);
});

selecionarTodos.addEventListener('change', () => {
    checkboxes.forEach(cb => cb.checked = selecionarTodos.checked);
    atualizarBarra();
});

btnAdicionarcarrinho.addEventListener('click', () => {
        const idSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id);
        console.log("Adicionar ao Carrinho o produto",idSelecionados);

        //enviar para POST para back-end (mexer com isso depois)
    });

    btnExcluirSelecionados.addEventListener('click', () => {
        const idSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id);
        console.log("Remover da Lista de Desejos o produto", idSelecionados);

        //fazer o mesmo como no acima
    })