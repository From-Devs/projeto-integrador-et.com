<?php
require_once __DIR__ . '/../../config/database.php';

class BaseModel {
    protected $conn;
    protected $table;

    public function __construct($table) {
        $db = new Database();
        $this->conn = $db->Connect();
        $this->table = $table;
    }

    // Buscar todos
    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar por ID
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Criar
    public function create($dados) {
        $colunas = implode(", ", array_keys($dados));
        $valores = ":" . implode(", :", array_keys($dados));

        $sql = "INSERT INTO {$this->table} ($colunas) VALUES ($valores)";
        $stmt = $this->conn->prepare($sql);

        foreach ($dados as $coluna => $valor) {
            $stmt->bindValue(":$coluna", $valor);
        }

        return $stmt->execute();
    }

    // Atualizar
    public function update($id, $dados) {
        $set = [];
        foreach ($dados as $coluna => $valor) {
            $set[] = "$coluna = :$coluna";
        }
        $set = implode(", ", $set);

        $sql = "UPDATE {$this->table} SET $set WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        foreach ($dados as $coluna => $valor) {
            $stmt->bindValue(":$coluna", $valor);
        }
        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }

    // Deletar
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Teste de conexão
    public function testConntx() {
        try {
            $stmt = $this->conn->query("SELECT 1");
            return $stmt ? "✅ Conexão com o banco de dados funcionando!" : "❌ Falha no teste.";
        } catch (PDOException $e) {
            return "❌ Erro de conexão: " . $e->getMessage();
        }
    }
}
