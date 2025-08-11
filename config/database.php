<?php
class Database
{   
    // config host
    private static $host = "localhost";
    private static $username = "root";
    private static $password = ""; // sem espaço
    private static $dbName = "et.com";

    // função para conectar o banco de dados
    public function Connect(){
        try{
            $conn = new PDO(
                'mysql:host=' . self::$host . ";dbname=" . self::$dbName,
                self::$username,
                self::$password
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;  
        } catch (\Exception $th) {
            echo $th->getMessage(); 
        }
    }
}
?>
