<?php
// Define a raiz do projeto (pasta "et_pontocom")
define('BASE_PATH', dirname(__DIR__));

// Obtém a rota da URL
$url = $_GET['url'] ?? 'home';

// Define as rotas disponíveis
$rotas = [
    'login'     => BASE_PATH . '/app/views/auth/login.php',
    'register'  => BASE_PATH . '/app/views/auth/register.php',
    'perfil'    => BASE_PATH . '/app/views/usuario/perfil.php',
    'admin'     => BASE_PATH . '/app/views/adm/dashboard.php',
    'associado' => BASE_PATH . '/app/views/associado/painel.php',
];

// Verifica se a rota existe e carrega a view correspondente
if (array_key_exists($url, $rotas) && file_exists($rotas[$url])) {
    include $rotas[$url];
} else {
    include BASE_PATH . '/app/views/404.php';
}
?>