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
        // console.log("Adicionar ao Carrinho o produto",idSelecionados);

        //enviar para POST para back-end 
        if (idSelecionados.length > 0){
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/projeto-integrador-et.com/config/produtoRouter.php';

            idSelecionados.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id_produto[]';
                input.value = id;
                form.appendChild(input);
            });

            const acaoInput = document.createElement('input');
            acaoInput.type = 'hidden';
            acaoInput.name = 'acao';
            acaoInput.value = 'carrinho';
            form.appendChild(acaoInput);

            document.body.appendChild(form);
            form.submit();
        }
    });

    btnExcluirSelecionados.addEventListener('click', () => {
        const idSelecionados = Array.from(checkboxes)
        .filter(cb => cb.checked)
        .map(cb => cb.dataset.id);
        // console.log("Remover da Lista de Desejos o produto", idSelecionados);

        //enviar para POST para o back
        if (idSelecionados.length > 0){
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/projeto-integrador-et.com/config/produtoRouter.php';

            idSelecionados.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'id_produto[]';
                input.value = id;
                form.appendChild(input);
            });

            const acaoInput = document.createElement('input');
            acaoInput.type = 'hidden';
            acaoInput.name = 'acao';
            acaoInput.value = 'remover_favorito';
            form.appendChild(acaoInput);

            document.body.appendChild(form);
            form.submit();
        }
    })

    function adicionarAListaDeDesejos(idProduto) {
        fetch('/projeto-integrador-et.com/app/config/listaDesejosRouter.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `acao=adicionar&id_produto=${idProduto}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'sucesso') {
                abrirPopUpFavorito(); 
            } else {
                alert(data.mensagem);
            }
        });
    }
    
    function removerDosFavoritos(idProduto) {
        fetch('/projeto-integrador-et.com/app/config/listaDesejosRouter.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `acao=remover&id_produto=${idProduto}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'sucesso') {
                location.reload(); 
            } else {
                alert(data.mensagem);
            }
        });
    }
    