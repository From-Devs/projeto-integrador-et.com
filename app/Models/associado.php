<?php
require_once __DIR__ . '/../../config/database.php';

class Associado {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function cpfExists($cpf) {
        $sql = "SELECT COUNT(*) FROM usuario WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function getAllAssociados() {
        $stmt = $this->conn->prepare("SELECT * FROM Usuario WHERE tipo = 'Associado'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sendAssociadoRequest($id, $data) {
        public function sendAssociadoRequest($id, $data) {
            try {
                $this->conn->beginTransaction();
        
                $sql = "UPDATE Usuario
                        SET nome = :nome,
                            email = :email,
                            telefone = :telefone,
                            cpf = :cpf,
                            data_nascimento = :data_nascimento,
                            foto = :foto
                        WHERE id_usuario = :id";
        
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':nome', $data['nome']);
                $stmt->bindParam(':email', $data['email']);
                $stmt->bindParam(':telefone', $data['telefone']);
                $stmt->bindParam(':cpf', $data['cpf']);
                $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
                $stmt->bindParam(':foto', $data['foto']);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
        
                $sql2 = "INSERT INTO SolicitacaoDeAssociado (id_usuario, sobreProdutos)
                         VALUES (:id, :sobreProdutos)
                         ON DUPLICATE KEY UPDATE
                            sobreProdutos = VALUES(sobreProdutos)";
                
                $stmt2 = $this->conn->prepare($sql2);
                $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt2->bindParam(':sobreProdutos', $data['sobreProdutos']);
                $stmt2->execute();
        
                $this->conn->commit();
                return ["success" => true, "message" => "Dados e solicitação enviados com sucesso!"];
            } catch (Exception $e) {
                $this->conn->rollBack();
                return ["success" => false, "error" => $e->getMessage()];
            }
        }
    }

}