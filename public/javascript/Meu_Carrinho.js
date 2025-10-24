document.addEventListener("DOMContentLoaded", () => {

    // ===============================
    // === ELEMENTOS PRINCIPAIS =====
    // ===============================
    const selecionarTodos = document.getElementById("selecionarTodos");
    const btnExcluirSelecionados = document.getElementById("btnExcluirSelecionados");

    // ===============================
    // === CHECKBOXES INDIVIDUAIS ===
    // ===============================
    const checkboxesIndividuais = document.querySelectorAll(".checkbox-individual");

    // Atualiza checkboxes individuais ao clicar em "Selecionar Todos"
    selecionarTodos.addEventListener("change", () => {
        checkboxesIndividuais.forEach(cb => cb.checked = selecionarTodos.checked);
    });

    // Atualiza "Selecionar Todos" quando algum individual é desmarcado
    checkboxesIndividuais.forEach(cb => {
        cb.addEventListener("change", () => {
            selecionarTodos.checked = Array.from(checkboxesIndividuais).every(cb => cb.checked);
        });
    });

    // ===============================
    // === EXCLUIR SELECIONADOS =====
    // ===============================
    btnExcluirSelecionados.addEventListener("click", async () => {
        const idsSelecionados = Array.from(checkboxesIndividuais)
            .filter(cb => cb.checked)
            .map(cb => cb.dataset.id);

        if (idsSelecionados.length === 0) {
            alert("Nenhum produto selecionado para exclusão.");
            return;
        }

        if (!confirm("Tem certeza que deseja excluir os produtos selecionados?")) return;

        try {
            const response = await fetch("/projeto-integrador-et.com/config/produtoRouter.php?action=excluirSelecionados", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ ids: idsSelecionados })
            });

            const data = await response.json();

            if (data.ok) {
                // Remove os produtos da tabela
                idsSelecionados.forEach(id => {
                    const linha = document.querySelector(`.linhaCarrinho[data-id='${id}']`);
                    if (linha) linha.remove();
                });
                atualizarTotal();
                alert("Produtos excluídos com sucesso!");
            } else {
                alert(data.msg || "Erro ao excluir produtos.");
            }

        } catch (err) {
            console.error(err);
            alert("Erro ao conectar ao servidor.");
        }
    });

    // ===============================
    // === ATUALIZAR TOTAL ===========
    // ===============================
    function atualizarTotal() {
        const precos = JSON.parse(document.getElementById("carrinhoBody").dataset.precos || "[]");
        let total = 0;
        document.querySelectorAll(".linhaCarrinho").forEach((linha, index) => {
            const qtd = parseInt(linha.querySelector('input[type="number"]').value) || 0;
            total += (precos[index] || 0) * qtd;
            // Atualiza subtotal do produto
            const subtotalElem = document.getElementById(`subtotal-item-${index}`);
            if (subtotalElem) subtotalElem.innerText = "R$ " + ((precos[index] || 0) * qtd).toFixed(2).replace(".", ",");
        });
        document.getElementById("total").innerText = "R$ " + total.toFixed(2).replace(".", ",");
    }

    // ===============================
    // === INCREMENTO / DECREMENTO ==
    // ===============================
    window.incrementarQuantidade = (index) => {
        const input = document.querySelector(`input[name='quantidade[${index}]']`);
        if (!input) return;
        input.value = parseInt(input.value) + 1;
        atualizarTotal();
    };

    window.decrementarQuantidade = (index) => {
        const input = document.querySelector(`input[name='quantidade[${index}]']`);
        if (!input) return;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
            atualizarTotal();
        }
    };

    // Atualiza total ao digitar manualmente
    document.querySelectorAll('input[name^="quantidade"]').forEach(input => {
        input.addEventListener("input", atualizarTotal);
    });

    // ===============================
    // === ADICIONAR PRODUTO =========
    // ===============================
    window.adicionarAoCarrinho = async (idProduto, quantidade = 1) => {
        try {
            const response = await fetch("/projeto-integrador-et.com/config/produtoRouter.php?action=adicionar", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id_produto: idProduto, quantidade })
            });
            const data = await response.json();
            if (data.ok) {
                alert("Produto adicionado ao carrinho!");
                location.reload();
            } else {
                alert(data.msg || "Erro ao adicionar produto.");
            }
        } catch (err) {
            console.error(err);
            alert("Erro ao conectar ao servidor.");
        }
    };
});
