<?php

function listaProdutos($produtos){
    if (count($produtos) === 0) {
        return "<p>Nenhum produto encontrado.</p>";
    }

    $html = "<div class='grid-resultados'>";
    foreach ($produtos as $p) {
        $img = $p['img1'] ?: '../../public/imagens/Icones/semImagem.png';
        $html .= "
            <div class='produto'>
                <img src='{$img}' alt='{$p['nome']}'>
                <h3>{$p['nome']}</h3>
                <p>{$p['marca']}</p>
            </div>
        ";
    }
    $html .= "</div>";

    return $html;
}

?>