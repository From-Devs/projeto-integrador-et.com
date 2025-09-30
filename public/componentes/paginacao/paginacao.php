<?php

function paginar($dados, $itensPorPagina = 10, $nomeParametro = 'page') {
    if (!is_array($dados)) {
        $dados = [];
    }
    $totalItens = count($dados);
    $totalPaginas = ceil($totalItens / $itensPorPagina);

    $paginaAtual = isset($_GET[$nomeParametro]) ? (int)$_GET[$nomeParametro] : 1;
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

function renderPaginacao($paginaAtual, $totalPaginas, $nomeParametro = 'page', $parametrosExtras = '') {
    echo '<div class="paginacao">';

    $queryStringExtra = !empty($parametrosExtras) ? '&' . $parametrosExtras : '';

    if ($paginaAtual > 1) {
        echo '<a href="?' . $nomeParametro . '=' . ($paginaAtual - 1) . $queryStringExtra . '" class="btn-pag">Anterior</a>';
    }

    for ($i = 1; $i <= $totalPaginas; $i++) {
        if ($i == $paginaAtual) {
            echo '<span class="pagina-ativa">' . $i . '</span>';
        } else {
            echo '<a href="?' . $nomeParametro . '=' . $i . $queryStringExtra . '" class="btn-pag">' . $i . '</a>';
        }
    }

    if ($paginaAtual < $totalPaginas) {
        echo '<a href="?' . $nomeParametro . '=' . ($paginaAtual + 1) . $queryStringExtra . '" class="btn-pag">Próximo</a>';
    }

    echo '</div>';
}


function paginarMaisDeUmaQueryString($dados, $itensPorPagina = 10) {
    if (!is_array($dados)) {
        $dados = [];
    }
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

function renderPaginacaoMaisDeUmaQueryString($paginaAtual, $totalPaginas, $parametrosExtras = "") {
    echo '<div class="paginacao">';

    $queryStringExtra = '';
    if (!empty($parametrosExtras)) {
        $queryStringExtra = '&' . $parametrosExtras;
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
