<?php
// =====================================
// LISTA DE CATEGORIAS ESTÁTICAS (Fallback caso o principal não defina)
// =====================================
// NOTA: No seu código, estas variáveis já estão no escopo do arquivo principal,
// então não precisa re-defini-las aqui, mas é bom ter a definição para contexto.

// Para garantir que as variáveis do arquivo principal sejam acessíveis,
// você deve usar 'global' (melhor, mas nem sempre necessário com 'require') ou
// garantir que as funções de renderização leiam os dados.

// Definir as variáveis globais para a função usar o que veio do arquivo principal
global $categoriasPorTela, $telaAtual, $subSelecionados, $slugCategoria;

// =====================================
// FUNÇÃO: RENDERIZA CHECKBOXES ESTÁTICOS
// =====================================
function renderSomenteSubcategorias($categoriasPorTela, $telaAtual, $subSelecionados = []) {
    if (!isset($categoriasPorTela[$telaAtual])) {
        echo "<p>Nenhum filtro disponível para essa tela.</p>";
        return;
    }

    $categorias = $categoriasPorTela[$telaAtual];

    // Isso aqui garante que a URL funcione e o checkbox seja marcado
    foreach ($categorias as $subcategorias) {
        foreach ($subcategorias as $sub) {
            // Se já estiver selecionado (presente no array $subSelecionados), checkbox marcado
            $checked = in_array($sub, $subSelecionados, true) ? 'checked' : '';

            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox" 
                               name="sub[]" 
                               value="' . htmlspecialchars($sub) . '" 
                               ' . $checked . ' 
                               onchange="this.form.submit()"> <span class="checkmark"></span>
                        ' . htmlspecialchars($sub) . '
                    </label>
                </div>
            ';
        }
    }
}


// =====================================
// FUNÇÃO: RENDERIZA CHECKBOXES DO BANCO (Adaptada para usar o array)
// =====================================
if (!function_exists('renderSomenteSubcategoriasDB')) {
    function renderSomenteSubcategoriasDB($id_categoria, $subSelecionados = []) {
        // Se a função já foi definida no arquivo principal, não a redefine.
        // Se ela ainda não existe, precisamos do CategoriaModel.
        if (!class_exists('CategoriaModel')) {
             require_once __DIR__ . "/../../Models/categoria.php";
        }
        $subcategorias = CategoriaModel::getSubcategorias($id_categoria);

        if (!$subcategorias) {
            echo "<p>Nenhum filtro disponível para essa categoria.</p>";
            return;
        }

        foreach ($subcategorias as $sub) {
            $nomeSub = $sub["nome"];
            $checked = in_array($nomeSub, $subSelecionados, true) ? 'checked' : '';

            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox" 
                               name="sub[]" 
                               value="' . htmlspecialchars($nomeSub) . '" 
                               ' . $checked . ' 
                               onchange="this.form.submit()"> 
                        <span class="checkmark"></span>
                        ' . htmlspecialchars($nomeSub) . '
                    </label>
                </div>
            ';
        }
    }
}


// =====================================
// FORMULÁRIO DE FILTRO
// =====================================
?>
<form method="get" action="">
    <div class="form">
        <input type="hidden" name="tela" value="<?php echo htmlspecialchars($slugCategoria); ?>">

        <?php
            // Exemplo: renderizar filtros estáticos
            // A variável $subSelecionados garante que os filtros já aplicados fiquem marcados
            renderSomenteSubcategorias($categoriasPorTela, $telaAtual, $subSelecionados);

            // Se quiser usar do banco, troque pela função abaixo:
            // if (isset($id_categoria)) {
            //     renderSomenteSubcategoriasDB($id_categoria, $subSelecionados);
            // }
        ?>
    </div>
</form>

<?php
// O bloco de debug (opcional)
if (!empty($subSelecionados)) {
    echo "";
}
?>