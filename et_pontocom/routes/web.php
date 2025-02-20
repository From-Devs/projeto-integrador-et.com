<?php
$url = $_GET['url'] ?? 'home';

switch ($url) {
    case 'login':
        // Define o caminho completo para a view de login
        $view = BASE_PATH . '/et_pontocom/app/views/auth/login.php';
        break;
    
    default:

        $view = BASE_PATH . '/et_pontocom/app/views/404.php';
        break;
}

return $view;
?>