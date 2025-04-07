<?php
$categoriasPorTela = [ 
    "Maquiagem" => [
        "Olhos" => ["Cílios", "Lápis","Delineador","Sombras"],
        "Sombrancelha" => ["Lápis", "Gel","Cera"],
        "Lábios" => ["Batom", "Batom Líquido", "Lip Tint", "Lip Gloss"],
        "Pele" => ["Contorno", "Base","Blush","Corretivo","Pó","Paletas"],
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
    "Eletrônicos" => [
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
                    <label>
                        <input type="checkbox" name="subcategorias[]" value="' . htmlspecialchars($sub) . '"> 
                        ' . htmlspecialchars($sub) . '
                    </label>
                </div>
            ';
        }
    }
}

function createFiltroCategoria($categoriasPorTela, $telaAtual){
    if (!isset($categoriasPorTela[$telaAtual])) {
        echo "<p>Nenhum filtro disponível para essa tela.</p>";
        return;
    };

    $categorias = $categoriasPorTela[$telaAtual];

    return '
    <div class="filtro">
        <button class="filtro-botao" type="button" onclick="toggleFiltro()">
            <img src="/projeto-integrador-et.com/et_pontocom/public/componentes/filtroCategoria/filtroimg.png" alt="Ícone de filtro">Filtros
        </button>
    </div>
    
    <div id="form-filtro" class="filtro-box">
        <div class="form">
                '. renderSomenteSubcategorias($categoriasPorTela, $telaAtual) .'
        </div>
    </div>
    ';
};



?>
