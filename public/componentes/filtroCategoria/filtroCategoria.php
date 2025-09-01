<?php
$categoriasPorTela = [ 
    "Maquiagem" => [
        "Tipos" => ["Olhos", "Sombrancelhas","Boca","Pele"],
    ],
    "Perfume" => [
        "Gênero" => ["Feminino", "Masculino", "Unissex"],
    ],
    "SkinCare" => [
        "Tipos" => ["Limpeza", "Esfoliação", "Hidratação", "Máscara", "Protetor Solar", "Especiais"],
    ],
    "Cabelos" => [
        "Tipos" => ["Dia-A-Dia", "Tratamentos", "Estilização", "Especiais", "Acessórios"],
    ],
    "Eletronicos" => [
        "Acessórios" => ["Cabelos", "Pincel", "Esponja"],
    ],
    "Corporal" => [
        "Produtos" => ["Body Splash", "Óleos", "Creme", "Protetor"],
    ],
];

function renderSomenteSubcategorias($categoriasPorTela, $telaAtual) {
    if (!isset($categoriasPorTela[$telaAtual])) {
        echo "<p>Nenhum filtro disponível para essa tela.</p>";
        return;
    }

    $categorias = $categoriasPorTela[$telaAtual];

    foreach ($categorias as $subcategorias) {
        foreach ($subcategorias as $sub) {
            echo '
                <div class="item-filtro">
                    <label class="categoriaLabel">
                        <input type="checkbox" name="subcategorias[]" value="' . htmlspecialchars($sub) . '"> 
                        <span class="checkmark"></span>
                        ' . htmlspecialchars($sub) . '
                    </label>
                </div>
            ';
        }
    }
}
?>
