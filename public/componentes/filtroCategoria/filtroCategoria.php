<?php
// =====================================
// LISTA DE CATEGORIAS ESTÁTICAS (Fallback caso o principal não defina)
// =====================================
global $categoriasPorTela, $telaAtual, $subSelecionados, $slugCategoria;

// =====================================
// FUNÇÃO: RENDERIZA CATEGORIAS PRINCIPAIS (usada só em "ofertas")
// =====================================
function renderCategoriasPrincipais($categoriasPorTela, $selecionadas = [])
{
    if (empty($categoriasPorTela)) {
        echo "<p>Nenhuma categoria disponível.</p>";
        return;
    }

    foreach ($categoriasPorTela as $categoria => $grupos) {
        $checked = in_array($categoria, $selecionadas, true) ? 'checked' : '';

        echo '
            <div class="item-filtro">
                <label class="categoriaLabel">
                    <input type="checkbox"
                           name="cat[]"
                           value="' . htmlspecialchars($categoria) . '"
                           ' . $checked . '
                           onchange="this.form.submit()">
                    <span class="checkmark"></span>
                    ' . htmlspecialchars($categoria) . '
                </label>
            </div>
        ';
    }
}

// =====================================
// FUNÇÃO: RENDERIZA SUBCATEGORIAS NORMAIS
// =====================================
function renderSomenteSubcategorias($categoriasPorTela, $telaAtual, $subSelecionados = [])
{
    if (!isset($categoriasPorTela[$telaAtual])) {
        echo "<p>Nenhum filtro disponível para essa tela.</p>";
        return;
    }

    $categorias = $categoriasPorTela[$telaAtual];

    foreach ($categorias as $subcategorias) {
        foreach ($subcategorias as $sub) {
            $checked = in_array($sub, $subSelecionados, true) ? 'checked' : '';

            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox"
                               name="sub[]"
                               value="' . htmlspecialchars($sub) . '"
                               ' . $checked . '
                               onchange="this.form.submit()">
                        <span class="checkmark"></span>
                        ' . htmlspecialchars($sub) . '
                    </label>
                </div>
            ';
        }
    }
}

// =====================================
// FUNÇÃO: RENDERIZA CHECKBOXES DO BANCO
// =====================================
if (!function_exists('renderSomenteSubcategoriasDB')) {
    function renderSomenteSubcategoriasDB($id_categoria, $subSelecionados = [])
    {
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
            // Se for a tela de OFERTAS → mostra as categorias principais
            if (in_array($slugCategoria, ['ofertas', 'mais_vendidos'], true)) {
                renderCategoriasPrincipais($categoriasPorTela, $_GET['cat'] ?? []);
            } else {
                renderFiltros($filtros_disponiveis, $subSelecionados, $filtros_sao_categorias);
            }
        ?>
    </div>
</form>

<?php
// Debug opcional (pode remover se quiser)
if (!empty($subSelecionados)) {
    echo "";
}
?>
