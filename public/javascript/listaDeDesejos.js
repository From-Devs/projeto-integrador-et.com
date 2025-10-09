// ==========================
// ===== VARIÁVEIS =========
// ==========================
const cardContainer = document.getElementById('cardContainer');
const acoesCheckbox = document.getElementById('acoesSelecionados');
const selecionarTodos = document.getElementById('selecionarTodos');
const btnAdicionarCarrinho = document.getElementById('adicionarCarrinho');
const btnExcluirSelecionados = document.getElementById('excluirSelecionados');
const usuarioId = document.body.dataset.usuarioId;

// ==========================
// ===== FUNÇÕES GERAIS =====
// ==========================
function getCheckboxes() {
    return document.querySelectorAll('.cardCheckbox');
}

function atualizarBarra() {
    const checkboxes = getCheckboxes();
    const algumSelecionado = Array.from(checkboxes).some(cb => cb.checked);

    acoesCheckbox.classList.toggle("ativo", algumSelecionado);
    acoesCheckbox.style.display = algumSelecionado ? 'flex' : 'none';

    selecionarTodos.checked = algumSelecionado && Array.from(checkboxes).every(cb => cb.checked);
}

function getSelecionados() {
    return Array.from(getCheckboxes())
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id || cb.value)
        .filter(id => id);
}

// ==========================
// ===== AJAX GENÉRICO =====
// ==========================
async function enviarFormulario(action, idsProdutos) {
    if (!usuarioId) { 
        alert("Você precisa estar logado!"); 
        return; 
    }
    if (!idsProdutos.length) {
        alert("Nenhum produto selecionado!");
        return;
    }

    const formData = new FormData();
    formData.append('id_usuario', usuarioId);
    idsProdutos.forEach(id => formData.append('id_produto[]', id));

    try {
        // Aqui enviamos a action via GET para o PHP
        const res = await fetch(`/projeto-integrador-et.com/config/produtoRouter.php?action=${action}`, {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (!data.ok) {
            alert(data.msg || "Erro ao processar a ação");
        } else {
            // =======================
            // REMOVER FAVORITO
            // =======================
            if (action === 'removerFavorito') {
                idsProdutos.forEach(id => {
                    const card = document.querySelector(`.card[data-id="${id}"]`);
                    if (card) card.remove();
                });
                atualizarBarra();
            }

            // =======================
            // ADICIONAR AO CARRINHO
            // =======================
            if (action === 'adicionarCarrinho') {
                alert("Produto(s) adicionados ao carrinho!");
            }

            // =======================
            // ADICIONAR FAVORITO
            // =======================
            if (action === 'adicionarFavorito') {
                alert("Produto adicionado à Lista de Desejos!");
            }
        }
    } catch (err) {
        console.error(err);
        alert("Erro ao conectar com o servidor.");
    }
}

// ==========================
// ===== CHECKBOXES =========
// ==========================
document.addEventListener("change", (e) => {
    if (e.target.classList.contains("cardCheckbox")) {
        atualizarBarra();
    }
});

selecionarTodos.addEventListener('change', () => {
    getCheckboxes().forEach(cb => cb.checked = selecionarTodos.checked);
    atualizarBarra();
});

// ==========================
// ===== BOTÕES PRINCIPAIS ===
// ==========================
btnAdicionarCarrinho.addEventListener('click', () => {
    enviarFormulario('adicionarCarrinho', getSelecionados());
});

btnExcluirSelecionados.addEventListener('click', () => {
    const selecionados = getSelecionados();
    const qnt = selecionados.length;

    if (qnt === 0) {
        alert("Nenhum produto selecionado!");
        return;
    }

    const spanQnt = document.getElementById('idProdutosSelecionados');
    if (spanQnt) spanQnt.textContent = qnt;

    abrirPopUp("removerSelecionados");
});

// ==========================
// ===== BOTOES DENTRO DO CARD =====
// ==========================
cardContainer.addEventListener('click', (e) => {
    // Adicionar ao carrinho individual
    const carrinhoBtn = e.target.closest('.icon-carrinho');
    if (carrinhoBtn) {
        const idProduto = carrinhoBtn.dataset.id || carrinhoBtn.value;
        enviarFormulario('adicionarCarrinho', [idProduto]);
    }

    // Remover favorito individual
    const lixeiraBtn = e.target.closest('.icon-lixeira');
    if (lixeiraBtn) {
        const idProduto = lixeiraBtn.dataset.id || lixeiraBtn.value;
        const nomeProd = lixeiraBtn.dataset.nome;

        const spanNome = document.getElementById('nomeProdutoSelecionado');
        if (spanNome) spanNome.textContent = nomeProd;

        window.produtoParaExcluir = idProduto;
        abrirPopUp("removerLista");
    }

    // Favorito no detalhe do produto
    const favoritoBtn = e.target.closest('.imgCoracao');
    if (favoritoBtn) {
        e.preventDefault();
        const form = favoritoBtn.closest('form');
        const idProd = form.querySelector('input[name="id_produto"]').value;
        enviarFormulario('adicionarFavorito', [idProd]);
    }
});

// ==========================
// ===== DETALHES PRODUTO =====
// ==========================
const cards = document.querySelectorAll(".cardDesejos");
cards.forEach(item => {
    const atalhoMaisDetalhes = item.querySelector('.atalhoMaisDetalhes');
    if (!atalhoMaisDetalhes) return;
    const idProd = item.getAttribute('data-id');

    atalhoMaisDetalhes.addEventListener('click', () => {
        window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${idProd}`;
    });
});
