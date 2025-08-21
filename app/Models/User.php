<?php
require_once __DIR__ . '/../../config/database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function testConntx() {
        try {
            $stmt = $this->conn->query("SELECT 1");
            if ($stmt) {
                return "✅ Conexão com o banco de dados funcionando!";
            } else {
                return "❌ Falha ao executar teste no banco.";
            }
        } catch (PDOException $e) {
            return "❌ Erro de conexão: " . $e->getMessage();
        }
    }    
    public function getAll(){
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cpfExists($cpf) {
        $sql = "SELECT COUNT(*) FROM usuario WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }    
    
    public function create($data) {
        try {
            // 1️⃣ Verifica se o CPF já existe
            if ($this->cpfExists($data['cpf'])) {
                return ["success" => false, "message" => "CPF já cadastrado"];
            }
    
            // 2️⃣ Garante que a senha seja hash
            if (!empty($data['senha'])) {
                $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
            } else {
                return ["success" => false, "message" => "Senha obrigatória"];
            }
    
            // 3️⃣ Garante valores padrão para campos opcionais
            $data['foto'] = $data['foto'] ?? '';
            $data['id_endereco'] = $data['id_endereco'] ?? null;
    
            // 4️⃣ Prepara a query
            $sql = "INSERT INTO usuario (nome, nome_social, email, telefone, cpf, data_nascimento, senha, tipo, foto, id_endereco)
                    VALUES (:nome, :nome_social, :email, :telefone, :cpf, :data_nascimento, :senha, :tipo, :foto, :id_endereco)";
            $stmt = $this->conn->prepare($sql);
    
            // 5️⃣ Faz o bind dos parâmetros
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
    
            // 6️⃣ Executa e retorna resultado
            if ($stmt->execute()) {
                return ["success" => true, "message" => "Usuário criado com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no INSERT: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro de conexão ou query: " . $e->getMessage()];
        }
    }
    

    public function deleteById($id){
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateUser($id, $data) {
        $sql = "UPDATE usuario 
                SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf, 
                    data_nascimento = :data_nascimento, senha = :senha, tipo = :tipo, 
                    foto = :foto, id_endereco = :id_endereco 
                WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':telefone', $data['telefone']);
        $stmt->bindValue(':cpf', $data['cpf']);
        $stmt->bindValue(':data_nascimento', $data['data_nascimento']);
        $stmt->bindValue(':senha', $data['senha']);
        $stmt->bindValue(':tipo', $data['tipo']);
    
        if ($data['foto'] === null) {
            $stmt->bindValue(':foto', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':foto', $data['foto']);
        }
    
        if ($data['id_endereco'] === null) {
            $stmt->bindValue(':id_endereco', null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(':id_endereco', $data['id_endereco']);
        }
    
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
            return false;
        }
    
        return true;
    }
}
?>

<!-- basico do codigo
$sql ="codigo de mysql";
$stmt = $this->conn->prepare($sql);
$stmt->bindParam(':do codigo', $data['nome'])
return $stmt->execute(); -->