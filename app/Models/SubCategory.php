<?php 
require_once __DIR__ . '/../../config/database.php';

class SubCategory {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function createSubCategoria($nome, $id_categoria) {
        try {
            $sql = "INSERT INTO subcategoria (nome, id_categoria) VALUES (:nome, :id_categoria)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':id_categoria', $id_categoria);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Subcategoria criada com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no INSERT: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => "Erro de conexão ou query: " . $e->getMessage()];
        }
    }

    public function getAllSubCategorias() {
        try {
            $sql = "SELECT s.id_subcategoria, s.nome, c.nome AS categoria 
                    FROM subcategoria s
                    INNER JOIN categoria c ON s.id_categoria = c.id_categoria";
            $stmt = $this->conn->query($sql);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function getSubCategoriaById($id_subcategoria) {
        try {
            $sql = "SELECT * FROM subcategoria WHERE id_subcategoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_subcategoria);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function updateSubCategoria($id_subcategoria, $nome, $id_categoria) {
        try {
            $sql = "UPDATE subcategoria SET nome = :nome, id_categoria = :id_categoria WHERE id_subcategoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_subcategoria);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':id_categoria', $id_categoria);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Subcategoria atualizada com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no UPDATE: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function deleteSubCategoria($id_subcategoria) {
        try {
            $sql = "DELETE FROM subcategoria WHERE id_subcategoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id_subcategoria);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Subcategoria deletada com sucesso!"];
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
