<?php 
// Database.php — versão corrigida e compatível com seu projeto MVC
class Database {
  // 🔹 Mantém o padrão Singleton
  private static $instance = null; 
  private $conn;

  private static $host = "192.168.22.9";
  private static $username = "etcom_user";
  private static $password = "etcom_user123"; 
  private static $dbName = "et_com";
  private function __construct() {
    try {
      $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbName . ";charset=utf8mb4";

      $this->conn = new PDO($dsn, self::$username, self::$password);

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) { 
      die("Erro de conexão: " . $e->getMessage());
    }
  }

  public static function getInstance() {
    if (self::$instance === null) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

  public function getConnection() {
    return $this->conn;
  }
}
?>
