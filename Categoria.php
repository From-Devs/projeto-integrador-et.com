<?php 
require_once __DIR__ . '/../../config/database.php';

class Categoria {
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

    // Criar subcategoria
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

    // Listar subcategorias de uma categoria
    public function getSubCategorias($id_categoria) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM subcategoria WHERE id_categoria = :id_categoria");
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
}
?>
