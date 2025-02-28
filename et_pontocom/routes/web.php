<?php
// Garante que BASE_PATH estar definideda
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
}

// Captura a URL 
$url = $_GET['url'] ?? 'home';

$viewPath = BASE_PATH . '/app/views/';

switch ($url) {
    case 'login':
        $view = $viewPath . 'auth/login.php';
        break;
    case 'register':
        $view = $viewPath . 'auth/register.php';
        break;
    case 'tela1':
        $view = $viewPath . 'layouts/test.php';
        break;
    case 'perfil':
        $view = $viewPath . 'usuario/perfil.php';
        break;
    case 'admin':
        $view = $viewPath . 'adm/dashboard.php';
        break;
    case 'associado':
        $view = $viewPath . 'associado/painel.php';
        break;
    default:
        $view = $viewPath . '404.php';
}
include $view
?>
