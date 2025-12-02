<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

date_default_timezone_set("America/Sao_Paulo");

# Autoload
include_once "classes/autoload.class.php";
new Autoload();

# Rotas
$rota = new Rotas();

// A ÚNICA ROTA!
$rota->add('GET', '/teste', 'Custom::ping', false);
// getAll carousel, lancamento e destaque
$rota->add('GET', '/carousels', 'Custom::listcarousels', false);
$rota->add('GET', '/lancamentos', 'Custom::listlancamentos', false);
$rota->add('GET', '/destaques', 'Custom::listdestaques', false);

// 🔥 NOVO: Rota para buscar um produto por ID (usada no JS)
$rota->add('GET', '/BuscarProduto', 'Custom::buscarProduto', false); 
// NOVO: Rota para salvar a nova ordem
$rota->add('POST', '/reorder_c', 'Custom::reordercarousels', false);
// create
$rota->add('POST', '/store_c', 'Custom::storecarousels', false);
$rota->add('POST', '/store_d', 'Custom::storedestaques', false);
$rota->add('POST', '/store_l', 'Custom::storelancamentos', false);

$rota->ir($_GET['path'] ?? '');