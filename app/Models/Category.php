<?php 
require_once __DIR__ . '/../../config/database.php';

class Category {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }
    
    // Criar categoria
    public function createCategoria($nome) {
        try {
            $sql = "INSERT INTO categoria (nome) VALUES (:nome)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            if ($stmt->execute()) {
                return ["success" => true, "message" => "Categoria criada com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no INSERT: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro de conexão ou query: " . $e->getMessage()];
        }
    }

    // Listar todas as categorias
    public function getAllCategorias() {
        try {
            $stmt = $this->conn->query("SELECT * FROM categoria");
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Buscar categoria por ID
    public function getCategoriaById($id_categoria) {
        try {
            $sql = "SELECT * FROM categoria WHERE id_categoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_categoria);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Atualizar categoria
    public function updateCategoria($id_categoria, $nome) {
        try {
            $sql = "UPDATE categoria SET nome = :nome WHERE id_categoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_categoria);
            $stmt->bindParam(':nome', $nome);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Categoria atualizada com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no UPDATE: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Excluir categoria
    public function deleteCategoria($id_categoria) {
        try {
            $sql = "DELETE FROM categoria WHERE id_categoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_categoria);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Categoria deletada com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no DELETE: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
}
?>
