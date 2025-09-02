<?php

//  para configurar depois  para  

// if ($rota === 'usuarios') {
//     $controller = new UsuarioController();
//     $controller->listar(); 


// $url = $_GET['url'] ?? 'home';
// switch ($url) {
//     case 'login':
//         $view = __DIR__ . '/../app/views/auth/login.php';
//         break;
//     case 'register':
//         $view = __DIR__ . '/../app/views/auth/register.php';
//         break;
//     case 'perfil':
//         $view = __DIR__ . '/../app/views/usuario/perfil.php';
//         break;
//     case 'admin':
//         $view = __DIR__ . '/../app/views/adm/dashboard.php';
//         break;
//     case 'associado':
//         $view = __DIR__ . '/../app/views/associado/painel.php';
//         break;
//     default:
//         $view = __DIR__ . '/../app/views/404.php';
// }
// include __DIR__ . '/../app/views/layouts/main.php';

//ROTAS RELATORIOS ASSOCIADO
require_once __DIR__ . '/../Controllers/RelatorioAssociadoController.php';

if ($rota == '/relatorios/receitas') {
    $controller = new RelatorioAssociadoController();
    echo json_encode($controller->receitas($_GET['id']));
}

if ($rota == '/relatorios/produto') {
    $controller = new RelatorioAssociadoController();
    echo json_encode($controller->receitaProduto($_GET['id']));
}

if ($rota == '/relatorios/abandonadas') {
    $controller = new RelatorioAssociadoController();
    echo json_encode($controller->vendasAbandonadas($_GET['id']));
}

if ($rota == '/relatorios/saldo') {
    $controller = new RelatorioAssociadoController();
    echo json_encode($controller->saldoReceber($_GET['id']));
}

?>