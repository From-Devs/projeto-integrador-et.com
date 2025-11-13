document.addEventListener("DOMContentLoaded", () => {

    const cardContainer = document.getElementById('cardContainer');
    const acoesCheckbox = document.getElementById('acoesSelecionados');
    const selecionarTodos = document.getElementById('selecionarTodos');
    const btnAdicionarCarrinho = document.getElementById('adicionarCarrinho');
    const btnExcluirSelecionados = document.getElementById('excluirSelecionados');
    const usuarioId = document.body.dataset.usuarioId;

    // ==========================
    // ===== FUNÇÕES CHECKBOX ===
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
        formData.append('action', action);

        let endpoint = '';
        if (action === 'adicionarCarrinho' || action === 'removerSelecionados') {
            endpoint = '/projeto-integrador-et.com/router/CarrinhoRouter.php';
        } else {
            endpoint = '/projeto-integrador-et.com/router/ListaDesejosRouter.php';
        }

        try {
            const res = await fetch(endpoint, {
                method: 'POST',
                body: formData
            });

            const text = await res.text();
            let data;

            try {
                data = JSON.parse(text);
            } catch (e) {
                console.error("Resposta do servidor não é JSON:", text);
                alert("Erro no servidor. Verifique o console.");
                return;
            }

            if (!data.ok) {
                alert(data.msg || "Erro ao processar a ação");
            } else {
                // REMOVER FAVORITO
                if (action === 'removerFavorito') {
                    idsProdutos.forEach(id => {
                        const card = document.querySelector(`.card[data-id="${id}"]`);
                        if (card) card.remove();
                    });
                    atualizarBarra();
                }

                // ADICIONAR AO CARRINHO
                if (action === 'adicionarCarrinho') {
                    alert("Produto(s) adicionados ao carrinho!");
                }

                // ADICIONAR FAVORITO
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

    if (selecionarTodos) {
        selecionarTodos.addEventListener('change', () => {
            getCheckboxes().forEach(cb => cb.checked = selecionarTodos.checked);
            atualizarBarra();
        });
    }

    // ==========================
    // ===== BOTÕES PRINCIPAIS ==
    // ==========================
    if (btnAdicionarCarrinho) {
        btnAdicionarCarrinho.addEventListener('click', () => {
            enviarFormulario('adicionarCarrinho', getSelecionados());
        });
    }

    if (btnExcluirSelecionados) {
        btnExcluirSelecionados.addEventListener('click', () => {
            const selecionados = getSelecionados();
            if (!selecionados.length) {
                alert("Nenhum produto selecionado!");
                return;
            }
            window.produtoParaExcluir = selecionados;
            abrirPopUp("removerSelecionados");
        });
    }

    // ==========================
    // ===== BOTOES DENTRO CARD ==
    // ==========================
    if (cardContainer) {
        cardContainer.addEventListener('click', (e) => {

            const carrinhoBtn = e.target.closest('.icon-carrinho');
            if (carrinhoBtn) {
                const idProduto = carrinhoBtn.dataset.id || carrinhoBtn.value;
                enviarFormulario('adicionarCarrinho', [idProduto]);
            }

            const lixeiraBtn = e.target.closest('.icon-lixeira');
            if (lixeiraBtn) {
                const idProduto = lixeiraBtn.dataset.id || lixeiraBtn.value;
                const nomeProd = lixeiraBtn.dataset.nome;

                const spanNome = document.getElementById('nomeProdutoSelecionado');
                if (spanNome) spanNome.textContent = nomeProd;

                window.produtoParaExcluir = [idProduto];
                abrirPopUp("removerLista");
            }

            const favoritoBtn = e.target.closest('.imgCoracao');
            if (favoritoBtn) {
                e.preventDefault();
                const form = favoritoBtn.closest('form');
                const idProd = form.querySelector('input[name="id_produto"]').value;
                enviarFormulario('adicionarFavorito', [idProd]);
            }
        });
    }

    // ==========================
    // ===== DETALHES PRODUTO ===
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

    document.querySelectorAll('.prod').forEach(card => {
        const cores =[
            ["#FAD0C4", "#FFD1FF"],  
            ["#A1C4FD", "#C2E9FB"],  
            ["#FFDEE9", "#B5FFFC"],  
            ["#FEE9B2", "#FBC2EB"],  
            ["#C9FFBF", "#FFAFBD"],  
            ["#D4FC79", "#96E6A1"],  
            ["#FBC2EB", "#A6C1EE"],  
            ["#FFD3A5", "#FD6585"],  
            ["#E0C3FC", "#8EC5FC"],  
            ["#FFF1EB", "#ACE0F9"],  
            ["#FBD3E9", "#BB377D"],  
            ["#C2FFD8", "#465EFB"],  
            ["#F6D365", "#FDA085"],  
            ["#E8CBC0", "#636FA4"],  
            ["#FEE140", "#FA709A"]
        ];

        const [cor1, cor2] = cores[Math.floor(Math.random() * cores.length)];

        const cardCarrinhoColorido = card.querySelector('.cor1');
        if(cardCarrinhoColorido){
            cardCarrinhoColorido.style.background = `linear-gradient(135deg, ${cor1}, ${cor2})`;
        }
    });

});
