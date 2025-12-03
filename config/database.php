<?php
class Database
{   
    // config host
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    // private static $host = "192.168.22.9";
    // private static $username = "etcom_user";
    // private static $password = "etcom_user123"; 
    private static $dbName = "et_com";

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
<?php
// config/databese.php
// class Database {   
//     private static $pdo;
    
//     public static function getConnect(){
//         if(!self::$pdo){
//             self::$pdo = new PDO(
//             'mysql:host=localhost;dbname=loja;charset=utf8mb4',
//             'root', '',
//             [
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//                 PDO::ATTR_EMULATE_PREPARES => false 
//             ]
//         );
//         }
//         return self::$pdo;
//     }
// }
?>
