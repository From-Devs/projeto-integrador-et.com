<?php

function paginar($dados, $itensPorPagina = 10) {
    $totalItens = count($dados);
    $totalPaginas = ceil($totalItens / $itensPorPagina);

    $paginaAtual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($paginaAtual < 1) $paginaAtual = 1;
    if ($paginaAtual > $totalPaginas) $paginaAtual = $totalPaginas;

    $indiceInicial = ($paginaAtual - 1) * $itensPorPagina;
    $dadosPaginados = array_slice($dados, $indiceInicial, $itensPorPagina);

    return [
        'dados' => $dadosPaginados,
        'paginaAtual' => $paginaAtual,
        'totalPaginas' => $totalPaginas
    ];
}

function renderPaginacao($paginaAtual, $totalPaginas, $parametrosExtras = []) {
    echo '<div class="paginacao">';

    $queryStringExtra = '';
    if (!empty($parametrosExtras)) {
        $queryStringExtra = '&' . http_build_query($parametrosExtras);
    }

    if ($paginaAtual > 1) {
        echo '<a href="?page='.($paginaAtual - 1).$queryStringExtra.'" class="btn-pag">Anterior</a>';
    }

    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($i == $paginaAtual) {
            echo '<span class="pagina-ativa">'.$i.'</span>';
        } else {
            echo '<a href="?page='.$i.$queryStringExtra.'" class="btn-pag">'.$i.'</a>';
        }
    }

    if ($paginaAtual < $totalPaginas) {
        echo '<a href="?page='.($paginaAtual + 1).$queryStringExtra.'" class="btn-pag">Próximo</a>';
    }

    echo '</div>';
}
