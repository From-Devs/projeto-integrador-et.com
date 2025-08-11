<?php
require_once __DIR__ . '/../../config/database.php';


class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }
    
    public function getAll(){
        $sql = "SELECT * FROM Usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cpfExists($cpf) {
        $sql = "SELECT COUNT(*) FROM Usuario WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }    
    
    public function create($data) {
        if ($this->cpfExists($data['cpf'])) {
            return false;
        }
    
        $sql = "INSERT INTO Usuario (nome, nome_social, email, telefone, cpf, data_nascimento, senha, tipo, foto, id_endereco)
                VALUES (:nome, :nome_social, :email, :telefone, :cpf, :data_nascimento, :senha, :tipo, :foto, :id_endereco)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':nome_social', $data['nome_social']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':telefone', $data['telefone']);
        $stmt->bindParam(':cpf', $data['cpf']);
        $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
        $stmt->bindParam(':senha', $data['senha']);
        $stmt->bindParam(':tipo', $data['tipo']);
        $stmt->bindParam(':foto', $data['foto']);
        $stmt->bindParam(':id_endereco', $data['id_endereco']);
        return $stmt->execute();
    }
    
}
?>
   
<!-- basico do codigo
$sql ="codigo de mysql";
$stmt->bindParam(':do codigo', $data['nome'])
$stmt = $this->conn->prepare($sql);
return $stmt->execute(); -->