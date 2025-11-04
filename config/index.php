<?php
// teste Database.php
require_once "Database-1.php";
// remover duplicação 
$conn = Database::getInstance()->getConnection()
// $db = new Database();
// $conn = $db->Connect();

if ($conn) {
    echo "Conexão realizada com sucesso!";
} else {
    echo "Falha na conexão.";
}
?>
