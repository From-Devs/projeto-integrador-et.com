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
$rota->add('GET', '/teste/conn', 'Teste::conexao', false);

$rota->ir($_GET['path'] ?? '');