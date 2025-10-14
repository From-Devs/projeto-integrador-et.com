<?php 
// Database.php
class Database {
  private static $instance = null; // precisa ser private static
  private $conn;

  private $host = "localhost";
  private $username = "root";
  private $password = ""; // sem espaço
  private $dbname = "et_com"; 
  
  private function __construct() {
    try {
      $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) { // tratamento de Erro
      die("Erro de conexão: " . $e->getMessage());
    }
  }

  // método: getInstance() 
  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnection() {
    return $this->conn; // conexao
  }
}
?>
