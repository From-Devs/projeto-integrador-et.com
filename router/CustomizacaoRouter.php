<?php
// public/index.php

// 1. Habilita erros (bom para testar)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. Carrega automaticamente classes
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/../app/';
    $paths = [
        'Controllers/' . $class . '.php',
        'Models/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        $file = $baseDir . $path;
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// 3. Pega a URL requisitada
$uri = $_GET['url'] ?? 'home'; // ex: index.php?url=produtos/listar
$uriParts = explode('/', trim($uri, '/'));

// 4. Define controller e método padrão
$controllerName = ucfirst($uriParts[0]) . 'Controller'; // produtos → ProdutosController
$method = $uriParts[1] ?? 'index';
$param = $uriParts[2] ?? null;

// 5. Verifica se o controller existe
$controllerPath = __DIR__ . '/../app/Controllers/' . $controllerName . '.php';
if (!file_exists($controllerPath)) {
    http_response_code(404);
    echo "Erro 404 - Controller não encontrado.";
    exit;
}

require_once $controllerPath;

// 6. Cria o controller
$controller = new $controllerName();

// 7. Chama o método (função)
if (method_exists($controller, $method)) {
    if ($param) {
        $controller->$method($param);
    } else {
        $controller->$method();
    }
} else {
    http_response_code(404);
    echo "Erro 404 - Método não encontrado.";
}
