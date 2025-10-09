<?php
require_once __DIR__ . "/../app/Controllers/CustomizacaoController.php";

error_reporting(E_ALL);
ini_set('display_erros', 1);

spl_autoload_register(function($class) {
    $baseDir = __DIR__ . "/../app/views/adm/";
    $paths = [
        'Controllers/' . $class . '.php',
        'Models/' . $class . '.php',
    ];
})

$url = $_GET["url"] ?? "";

// require_once 'conexao.php'; // seu arquivo de conexão

// $id = $_GET['id'] ?? 0;

// $stmt = $pdo->prepare("SELECT nome, cor_destaque, cor1, cor2, cor3, imagem_url FROM produtos WHERE id_produto = ?");
// $stmt->execute([$id]);
// $produto = $stmt->fetch(PDO::FETCH_ASSOC);

// header('Content-Type: application/json');
// echo json_encode($produto);
?>