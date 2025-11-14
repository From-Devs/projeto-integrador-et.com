document.addEventListener("DOMContentLoaded", function(){ // Após a página toda carregar, as funções irão funcionar

    // declaração de variáveis
    const header = document.querySelectorAll(".headerUsuario");
    const LoginVerific = document.getElementById('LoginVerific').innerHTML;
    const botaoSidebarMeusPedidos = document.getElementById('botaoSidebarMeusPedidos');

    header.forEach(item => {
        const pesquisa = item.childNodes[3];
        const input = item.childNodes[3].childNodes[1];
        // debounce helper to avoid firing requests on every keystroke
        function debounce(fn, delay){
            let timer;
            return function(...args){
                clearTimeout(timer);
                timer = setTimeout(() => fn.apply(this, args), delay);
            }
        }
        const lupa = item.childNodes[5].childNodes[1].childNodes[1];
        const favHeaderBotao = item.childNodes[5].childNodes[1].childNodes[3];
        const carrinhoBotaoHeader = item.childNodes[5].childNodes[1].childNodes[5];
        const perfil = item.childNodes[5].childNodes[1].childNodes[7];
        const menuConta = item.childNodes[5].childNodes[3];
        const botaoMenu = item.childNodes[1].childNodes[1];
        const botaoMenuMobile = document.getElementById('menu-toggle-mobile');
        const menu = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuConta.style.display = "none"; // tive que colocar isso no script pq no CSS não estava funcionando
    
        // Abrir a Sidebar
        botaoMenu.addEventListener('click', function (event) {
            event.stopPropagation();
            menu.classList.toggle('mostrar');
            overlay.classList.toggle('mostrar'); // Ativa/desativa o overlay
            menuConta.style.display = "none";
            pesquisa.className = "pesquisaHeader closed";
            item.className = "headerUsuario";
            input.value = "";
        });
    
        // Fechar Sidebar ao clicar fora dela
        document.addEventListener('click', function (event) {
            if (menu.classList.contains('mostrar') && !menu.contains(event.target)) {
                menu.classList.remove('mostrar');
                overlay.classList.remove('mostrar');
            }
        });
    
        // Mesma coisa de cima mas quando clicar no fundo
        overlay.addEventListener('click', function () {
            menu.classList.remove('mostrar');
            overlay.classList.remove('mostrar');
        });
    
        // Impedir fechamento da Sidebar ao clicar dentro da mesma
        menu.addEventListener('click', function (event) {
            event.stopPropagation();
        });
    
        // Abrir barra de pesquisa quando clicar na lupa
        lupa.addEventListener("click", function(event){
            if (pesquisa.className == "pesquisaHeader closed"){
                event.stopPropagation();
                pesquisa.className = "pesquisaHeader open";
                item.className = "headerUsuario pesquisaOpen";
                menuConta.style.display = "none";
            }
        })

        favHeaderBotao.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'listaDeDesejos.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })
        
        carrinhoBotaoHeader.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'Meu_Carrinho.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })

        botaoSidebarMeusPedidos.addEventListener("click", function(){
            if (LoginVerific == "true"){
                window.location.href = 'meusPedidos.php';
            }else{
                abrirPopUpCurto("popUpErroDelogado", 2000);
            }
        })
        
        // Abrir menu do perfil quando clicar no icone de perfil
        perfil.addEventListener("click", function(event){
            if (menuConta.style.display == "none"){
                event.stopPropagation();
                menuConta.style.display = "flex"
                pesquisa.className = "pesquisaHeader closed";
                item.className = "headerUsuario";
                input.value = "";
            }
        })
        
        // Fechar barra de pesquisa quando clicar fora dela
        document.addEventListener("click", function(event){
            if (pesquisa.className == "pesquisaHeader open" && !pesquisa.contains(event.target)){
                pesquisa.className = "pesquisaHeader closed";
                item.className = "headerUsuario";
                input.value = "";
            }
        })
        
        // fechar menu do perfil quando clicar fora dele
        document.addEventListener("click", function(event){
            if (menuConta.style.display == "flex" && !menuConta.contains(event.target)){
                menuConta.style.display = "none";
            }
        })

        botaoMenuMobile.addEventListener("click", function(event){
            event.stopPropagation();
            menu.classList.remove('mostrar');
            overlay.classList.remove('mostrar'); // Ativa/desativa o overlay
            menuConta.style.display = "none";
            pesquisa.className = "pesquisaHeader closed";
            item.className = "headerUsuario";
            input.value = "";
        })

        if (input) {
            input.addEventListener('input', debounce(function(e){
                ObterDadosProdutoHeader(e.target.value, e.target);
            }, 300));

            input.addEventListener('keydown', function(e){
                if (e.key === 'Enter') {
                    e.preventDefault();
                    ObterDadosProdutoHeader(e.target.value, e.target);
                }
            });
        }
    })

    // função utilitária para esconder sugestões
    function esconderSugestoes(){
        const div = document.getElementById('sugestoesHeader');
        if (div) {
            div.innerHTML = '';
            div.style.display = 'none';
        }
        // fechar visualmente a barra de pesquisa
        const pesquisaEls = document.querySelectorAll('.pesquisaHeader');
        pesquisaEls.forEach(el => {
            el.classList.remove('open');
            el.classList.add('closed');
        });
    }

    // fechar sugestões ao clicar fora da pesquisa e do dropdown
    document.addEventListener('click', function(event){
        const div = document.getElementById('sugestoesHeader');
        const clicouNaPesquisa = !!event.target.closest('.pesquisaHeader');
        const clicouNasSugestoes = div ? div.contains(event.target) : false;
        if (!clicouNaPesquisa && !clicouNasSugestoes){
            fecharSugestoesComAnimacao();
        }
    });

    // ESC fecha as sugestões
    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' || e.key === 'Esc') {
            fecharSugestoesComAnimacao();
        }
    });

    try {
        const body = document.body;
        const promoStart = body.getAttribute('data-tag-promo-start');
        const promoEnd = body.getAttribute('data-tag-promo-end');
        const novoStart = body.getAttribute('data-tag-novo-start');
        const novoEnd = body.getAttribute('data-tag-novo-end');
        if (promoStart) document.documentElement.style.setProperty('--tag-promo-start', promoStart);
        if (promoEnd) document.documentElement.style.setProperty('--tag-promo-end', promoEnd);
        if (novoStart) document.documentElement.style.setProperty('--tag-novo-start', novoStart);
        if (novoEnd) document.documentElement.style.setProperty('--tag-novo-end', novoEnd);
    } catch(e) {
        console.debug('Erro ao aplicar cores via data-attributes:', e);
    }
})


async function ObterDadosProdutoHeader(textoPesquisa = null, inputElement = null){
    if (textoPesquisa === null){
        const el = document.getElementsByClassName("inputHeader")[0];
        textoPesquisa = el ? el.value : "";
    }
    console.log("Texto: ", textoPesquisa);
    // proteger/escapar o valor antes de enviar na query string
    const pesquisaParam = encodeURIComponent(textoPesquisa);

    try {
        const url = `/projeto-integrador-et.com/router/ProdutoRouter.php?acao=buscarTodosProdutos&pesquisa=${pesquisaParam}`;
        const resposta = await fetch(url, { method: 'GET' });

        if (!resposta.ok) {
            console.error('Erro na requisição:', resposta.status, resposta.statusText);
            return [];
        }

        const dados = await resposta.json();
        console.log('dados da busca:', dados);

        // deduplicar elementos com mesmo id se existirem
        const duplicates = document.querySelectorAll('#sugestoesHeader');
        if (duplicates.length > 1) {
            duplicates.forEach((el, idx) => { if (idx > 0) el.remove(); });
        }

        let divPesquisas = document.getElementById('sugestoesHeader');
        if (!divPesquisas) {
            console.warn('Container de sugestões não encontrado no DOM');
            // criar um container único no body como fallback
            divPesquisas = document.createElement('div');
            divPesquisas.id = 'sugestoesHeader';
            document.body.appendChild(divPesquisas);
        }

        // mover o container para o body se necessário (evita corte por overflow em elementos fixos)
        try {
            if (divPesquisas.parentElement !== document.body) {
                const originalParent = divPesquisas.parentElement;
                document.body.appendChild(divPesquisas);
                divPesquisas.style.position = 'fixed';
                divPesquisas.style.left = '50%';
                divPesquisas.style.transform = 'translateX(-50%)';
            }
        } catch (moveErr) {
            console.debug('Erro ao mover container de sugestões para body:', moveErr);
        }

        divPesquisas.innerHTML = '';

        // garantir que a barra de pesquisa esteja aberta para exibir o dropdown
        try {
            // preferir posicionar com base no input que disparou a busca
                let pesquisaEl = null;
                if (inputElement && inputElement.closest) {
                    pesquisaEl = inputElement.closest('.pesquisaHeader');
                }
                if (!pesquisaEl) pesquisaEl = document.querySelector('.pesquisaHeader');
                if (pesquisaEl) {
                    pesquisaEl.classList.remove('closed');
                    pesquisaEl.classList.add('open');
                }

                // posicionar o menu suspenso abaixo ou acima, dependendo do espaço e coisas de responsividade
                function posicionarDropdown(container, anchorEl) {
                    if (!anchorEl) return;
                    const rect = anchorEl.getBoundingClientRect();
                    const margin = 12;
                    const maxWidth = Math.min(620, window.innerWidth - 2 * margin);
                    let width = Math.max(Math.min(rect.width, maxWidth), 260);
                    if (window.innerWidth <= 768) {
                        width = Math.min(window.innerWidth - 32, width);
                    }
                    container.style.width = width + 'px';

                    const spaceBelow = window.innerHeight - rect.bottom;
                    const spaceAbove = rect.top;
                    let maxHeight = Math.min(360, Math.max(spaceBelow - 24, 120));
                    let placeAbove = false;
                    if (spaceBelow < 160 && spaceAbove > spaceBelow) {
                        placeAbove = true;
                        maxHeight = Math.min(360, Math.max(spaceAbove - 24, 120));
                    }

                    container.style.maxHeight = maxHeight + 'px';

                    if (!placeAbove) {
                        let left = rect.left + (rect.width / 2) - (width / 2);
                        left = Math.max(margin, Math.min(left, window.innerWidth - width - margin));
                        container.style.left = left + 'px';
                        container.style.top = (rect.bottom + 8) + 'px';
                        container.style.bottom = 'auto';
                    } else {
                        let left = rect.left + (rect.width / 2) - (width / 2);
                        left = Math.max(margin, Math.min(left, window.innerWidth - width - margin));
                        container.style.left = left + 'px';
                        container.style.top = Math.max(8, rect.top - maxHeight - 8) + 'px';
                        container.style.bottom = 'auto';
                    }

                    container.style.transform = 'none';
                }

                divPesquisas._currentAnchor = pesquisaEl;
                posicionarDropdown(divPesquisas, pesquisaEl);

                // reposicionar ao rolar/redimensionar enquanto estiver visível
                const repositionHandler = () => {
                    if (divPesquisas && divPesquisas.classList.contains('show')) {
                        const anchor = divPesquisas._currentAnchor || document.querySelector('.pesquisaHeader');
                        posicionarDropdown(divPesquisas, anchor);
                    }
                };
                window.addEventListener('resize', repositionHandler);
                window.addEventListener('scroll', repositionHandler, { passive: true });

                // remove os bgl quando fecha
                divPesquisas._cleanupReposition = () => {
                    window.removeEventListener('resize', repositionHandler);
                    window.removeEventListener('scroll', repositionHandler);
                };
        } catch(e) {
            console.debug('Não foi possível forçar abertura/posicionamento da pesquisa:', e);
        }

        if (!Array.isArray(dados) || dados.length === 0) {
            divPesquisas.innerHTML = '<div class="semResultados"> Nenhum resultado encontrado :( </div>';
            divPesquisas.style.display = 'block';
            return dados;
        }

        dados.forEach(produto => {
            const produtoDiv = document.createElement('div');
            produtoDiv.className = 'produtoSugestao';

            const thumb = document.createElement('div');
            thumb.className = 'thumb';

            const img = document.createElement('img');
            let imgSrc = produto.img1 || produto.img || produto.img1 || '';
            if (!imgSrc) imgSrc = '/projeto-integrador-et.com/public/imagens/header/perfil.png';
            if (!imgSrc.startsWith('http') && !imgSrc.startsWith('/')) imgSrc = `/projeto-integrador-et.com/${imgSrc}`;
            img.src = imgSrc;
            img.alt = produto.nome || 'Produto';
            thumb.appendChild(img);

            const info = document.createElement('div');
            info.className = 'info';

            const nomeEl = document.createElement('div');
            nomeEl.className = 'nome';
            nomeEl.textContent = produto.nome || produto.Nome || produto.nome_produto || '';

            const meta = document.createElement('div');
            meta.className = 'meta';

            const precoEl = document.createElement('div');
            precoEl.className = 'preco';
            precoEl.textContent = produto.preco || produto.precoPromocional || produto.precoPromo || '';
            meta.appendChild(precoEl);

            const desc = document.createElement('div');
            desc.className = 'descricaoBreve';
            desc.textContent = produto.descricaoBreve || produto.descricao || produto.descricaoTotal || '';

            info.appendChild(nomeEl);
            info.appendChild(meta);
            info.appendChild(desc);

            // badges: promoção / novo
            if (produto.fgPromocao || produto.fg_promocao || produto.fgPromocao === 1) {
                const tag = document.createElement('span');
                tag.className = 'tagPromo';
                tag.textContent = 'PROMO';
                meta.appendChild(tag);
            } else if (produto.novo || produto.isNew || produto.fgNovo) {
                const tag = document.createElement('span');
                tag.className = 'tagNovo';
                tag.textContent = 'NOVO';
                meta.appendChild(tag);
            }

            produtoDiv.appendChild(thumb);
            produtoDiv.appendChild(info);

            if (produto.id) {
                produtoDiv.style.cursor = 'pointer';
                produtoDiv.addEventListener('click', () => {
                    window.location.href = `/projeto-integrador-et.com/app/views/usuario/detalhesDoProduto.php?id=${produto.id}`;
                });
            }

            divPesquisas.appendChild(produtoDiv);
        });

        // mostrar o container depois de coisar com animação
        divPesquisas.classList.remove('closing');
        divPesquisas.classList.add('show');
        divPesquisas.style.display = 'block';
        return dados;
    } catch (err) {
        console.error('Erro ao obter dados da busca:', err);
        const divPesquisas = document.getElementById('sugestoesHeader');
        if (divPesquisas) divPesquisas.innerHTML = '<div class="semResultados">Erro ao carregar resultados</div>';
        return [];
    }
}

// função para fechar com animação
function fecharSugestoesComAnimacao(){
    const div = document.getElementById('sugestoesHeader');
    if (!div) return;
    try {
        if (div._cleanupReposition) div._cleanupReposition();
    } catch(e){}
    div._currentAnchor = null;
    div.classList.remove('show');
    div.classList.add('closing');
    setTimeout(() => {
        div.innerHTML = '';
        div.style.display = 'none';
        div.classList.remove('closing');
    }, 220); 
}