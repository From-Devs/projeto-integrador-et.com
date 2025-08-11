<?php
require_once __DIR__ . '/../../config/database.php';


class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }
    public function getUserById($id){
        $sql ="SELECT * FROM usuario WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
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
    public function deleteById($id){
        $sql ="DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function updateUser($id, $data) {
        $sql = "UPDATE Usuario SET nome = :nome,nome_social = :nome_social,email = :email,telefone = :telefone,cpf = :cpf,data_nascimento = :data_nascimento,senha = :senha,tipo = :tipo,foto = :foto,id_endereco = :id_endereco WHERE id_usuario = :id";
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
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
    
}
?>
   
<!-- basico do codigo
$sql ="codigo de mysql";
$stmt = $this->conn->prepare($sql);
$stmt->bindParam(':do codigo', $data['nome'])
return $stmt->execute(); -->