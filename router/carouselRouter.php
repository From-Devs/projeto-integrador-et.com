<?php
// carouselRouter.php

// Captura a rota da URL, ex: index.php?route=getAll
$route = $_GET['route'] ?? 'getAll'; // agora por padrão já retorna os carousels

// Inclui o controller
include __DIR__ . '/../app/Controllers/CarouselController.php';

// Instancia o controller
$controller = new CarouselController();

// Router simples com switch
switch($route) {

    case 'getAll':
        $data = $controller->getAll();
        print_r($data); // mostra o array completo
        break;

    case 'getById':
        $id = (int)($_GET['id'] ?? 0);
        $data = $controller->getById($id);
        print_r($data);
        break;

    case 'update':
        $id = (int)($_POST['id'] ?? 0);
        $data = $_POST['data'] ?? [];
        $result = $controller->update($id, $data);
        var_dump($result);
        break;

    case 'updateCores':
        $id = (int)($_POST['id'] ?? 0);
        $data = $_POST['data'] ?? [];
        $result = $controller->updateCores($id, $data);
        var_dump($result);
        break;

    case 'delete':
        $id = (int)($_POST['id'] ?? 0);
        $result = $controller->delete($id);
        var_dump($result);
        break;

    default:
        // Se quiser, mantém a mensagem de boas-vindas
        echo "Bem-vindo ao seu sistema!";
        break;
}
