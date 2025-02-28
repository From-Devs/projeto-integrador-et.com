<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define a raiz do projeto
define('BASE_PATH', __DIR__);

require BASE_PATH . '/routes/web.php';
?>
