<?php
require_once "database.php";

$db = new Database();
$conn = $db->Connect();

if ($conn) {
    echo "Conexão realizada com sucesso!";
} else {
    echo "Falha na conexão.";
}
?>
