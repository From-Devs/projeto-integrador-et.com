const checkboxes = document.querySelectorAll('.cardCheckbox');
const acoesCheckbox = document.getElementById('acoesSelecionados');
const selecionarTodos = document.getElementById('selecionarTodos');
const btnAdicionarCarrinho = document.getElementById('adicionarCarrinho');
const btnExcluirSelecionados = document.getElementById('excluirSelecionados');
const usuarioId = document.body.dataset.usuarioId;

// Atualiza barra de ações
function atualizarBarra() {
    const algumSelecionado = Array.from(checkboxes).some(cb => cb.checked);
    acoesCheckbox.classList.toggle("ativo", algumSelecionado);
    acoesCheckbox.style.display = algumSelecionado ? 'flex' : 'none';
    selecionarTodos.checked = Array.from(checkboxes).every(cb => cb.checked);
}

checkboxes.forEach(cb => cb.addEventListener('change', atualizarBarra));

selecionarTodos.addEventListener('change', () => {
    checkboxes.forEach(cb => cb.checked = selecionarTodos.checked);
    atualizarBarra();
});

// Função genérica para enviar AJAX POST
async function enviarFormulario(action, idsProdutos) {
    if (!usuarioId) { 
        alert("Você precisa estar logado!"); 
        return; 
    }
    if (!idsProdutos.length) return;

    const formData = new FormData();
    formData.append('action', action);
    formData.append('id_usuario', usuarioId);
    idsProdutos.forEach(id => formData.append('id_produto[]', id));

    try {
        const res = await fetch('/projeto-integrador-et.com/config/produtoRouter.php', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        if (!data.ok) alert(data.msg || "Erro ao processar a ação");
        else {
            // Atualizar a página ou cards conforme necessário
            if (action === 'removerFavorito') {
                idsProdutos.forEach(id => {
                    const card = document.querySelector(`.card[data-id="${id}"]`);
                    if (card) card.remove();
                });
            }
            // Caso queira adicionar feedback de carrinho
            if (action === 'adicionarCarrinho') {
                alert("Produto(s) adicionados ao carrinho!");
            }
            atualizarBarra();
        }
    } catch (err) {
        console.error(err);
        alert("Erro ao conectar com o servidor.");
    }
}

// Botões principais
btnAdicionarCarrinho.addEventListener('click', () => {
    const idsSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id);
    enviarFormulario('adicionarCarrinho', idsSelecionados);
});

btnExcluirSelecionados.addEventListener('click', () => {
    const idsSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id);
});

// Event delegation para ícones
const cardContainer = document.querySelector('.card-container');

cardContainer.addEventListener('click', (e) => {
    const carrinhoBtn = e.target.closest('.icon-carrinho');
    const lixeiraBtn = e.target.closest('.icon-lixeira');

    if (carrinhoBtn) {
        const idProduto = carrinhoBtn.dataset.id;
        enviarFormulario('adicionarCarrinho', [idProduto]);
    }

    if (lixeiraBtn) {
        const idProduto = lixeiraBtn.dataset.id;
        enviarFormulario('removerFavorito', [idProduto]);
    }
});
