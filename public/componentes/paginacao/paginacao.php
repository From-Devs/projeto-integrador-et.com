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

function renderPaginacao($paginaAtual, $totalPaginas, $nomeParametro = 'page', $parametrosExtras = '', $maxVisiveis = 5) {
    // modo de paginação compacta: primeiro, elipses, janela em torno da página atual, elipses, último
    echo '<div class="paginacao" role="navigation" aria-label="Páginas">';

    $queryStringExtra = !empty($parametrosExtras) ? '&' . $parametrosExtras : '';

    // botão Anterior
    if ($paginaAtual > 1) {
        echo '<a href="?' . $nomeParametro . '=' . ($paginaAtual - 1) . $queryStringExtra . '" class="btn-pag">Anterior</a>';
    }

    // definições de janela
    // $maxVisiveis: número máximo de botões visíveis (inclui primeiro e último)
    // padrão é 5 para uma paginação mais curta: 1 ... n-1 n n+1 ... last
    $lado = floor(($maxVisiveis - 3) / 2); // espaço ao redor da página atual

    // se poucas páginas, mostra todas
    if ($totalPaginas <= $maxVisiveis) {
        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaAtual) echo '<span class="pagina-ativa">' . $i . '</span>';
            else echo '<a href="?' . $nomeParametro . '=' . $i . $queryStringExtra . '" class="btn-pag">' . $i . '</a>';
        }
    } else {
        // sempre mostrar primeira
        if (1 == $paginaAtual) echo '<span class="pagina-ativa">1</span>';
        else echo '<a href="?' . $nomeParametro . '=1' . $queryStringExtra . '" class="btn-pag">1</a>';

        $start = max(2, $paginaAtual - $lado);
        $end = min($totalPaginas - 1, $paginaAtual + $lado);

        // Ajustes se a janela tocou as bordas para garantir que tenhamos até $maxVisiveis elementos visíveis
        $visiveisNoMeio = $end - $start + 1;
        if ($visiveisNoMeio < ($maxVisiveis - 2)) {
            $faltam = ($maxVisiveis - 2) - $visiveisNoMeio;
            // tentar expandir para a esquerda ou direita
            $novoStart = max(2, $start - $faltam);
            $novoEnd = min($totalPaginas - 1, $end + $faltam);
            $start = $novoStart;
            $end = $novoEnd;
        }

        if ($start > 2) echo '<span class="elipse">&hellip;</span>';

        for ($i = $start; $i <= $end; $i++) {
            if ($i == $paginaAtual) echo '<span class="pagina-ativa">' . $i . '</span>';
            else echo '<a href="?' . $nomeParametro . '=' . $i . $queryStringExtra . '" class="btn-pag">' . $i . '</a>';
        }

        if ($end < $totalPaginas - 1) echo '<span class="elipse">&hellip;</span>';

        // sempre mostrar último
        if ($totalPaginas == $paginaAtual) echo '<span class="pagina-ativa">' . $totalPaginas . '</span>';
        else echo '<a href="?' . $nomeParametro . '=' . $totalPaginas . $queryStringExtra . '" class="btn-pag">' . $totalPaginas . '</a>';
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

/**
 * Helper compatível para chamadas que esperam renderPaginacaoCompacta
 */
function renderPaginacaoCompacta($paginaAtual, $totalPaginas, $nomeParametro = 'page', $parametrosExtras = '', $maxVisiveis = 5){
    // atualmente renderPaginacao já gera versão compacta; expõe $maxVisiveis como parâmetro
    renderPaginacao($paginaAtual, $totalPaginas, $nomeParametro, $parametrosExtras, $maxVisiveis);
}

/**
 * Versão ainda mais curta: mostra apenas 1,2,3 ... last e botões Anterior/Próximo
 * Uso: renderPaginacaoMinimal($paginaAtual, $totalPaginas);
 */
function renderPaginacaoMinimal($paginaAtual, $totalPaginas, $nomeParametro = 'page', $parametrosExtras = ''){
    echo '<div class="paginacao" role="navigation" aria-label="Páginas">';

    $queryStringExtra = !empty($parametrosExtras) ? '&' . $parametrosExtras : '';

    if ($paginaAtual > 1) {
        echo '<a href="?' . $nomeParametro . '=' . ($paginaAtual - 1) . $queryStringExtra . '" class="btn-pag">Anterior</a>';
    }

    $mostrar = min(3, $totalPaginas);
    for ($i = 1; $i <= $mostrar; $i++){
        if ($i == $paginaAtual) echo '<span class="pagina-ativa">' . $i . '</span>';
        else echo '<a href="?' . $nomeParametro . '=' . $i . $queryStringExtra . '" class="btn-pag">' . $i . '</a>';
    }

    if ($totalPaginas > 3){
        if ($totalPaginas > 4) echo '<span class="elipse">&hellip;</span>';
        // sempre mostra última
        if ($totalPaginas == $paginaAtual) echo '<span class="pagina-ativa">' . $totalPaginas . '</span>';
        else echo '<a href="?' . $nomeParametro . '=' . $totalPaginas . $queryStringExtra . '" class="btn-pag">' . $totalPaginas . '</a>';
    }

    if ($paginaAtual < $totalPaginas) {
        echo '<a href="?' . $nomeParametro . '=' . ($paginaAtual + 1) . $queryStringExtra . '" class="btn-pag">Próximo</a>';
    }

    echo '</div>';
}
