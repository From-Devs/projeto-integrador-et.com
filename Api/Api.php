<?php 
// api.php (router)
require_once __DIR__ . "Router.php";
require_once __DIR__ . "Routes.php";

$router = new Router();
$router->dispatch();
?>
