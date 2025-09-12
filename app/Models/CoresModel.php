<?php
require_once __DIR__ . '/../../config/database.php';

class CoresModel {
    protected $conn;
    protected $table = 'cores';
    protected $primaryKey = 'id_cores';

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // Listar todas as cores
    public function getCores(): array {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar cor pelo ID
    public function getCorById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $cor = $stmt->fetch(PDO::FETCH_ASSOC);
        return $cor ?: null;
    }

    // Criar nova cor
    public function criarCor(string $corPrincipal, string $hex1, string $hex2): bool {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (corPrincipal, hexDegrade1, hexDegrade2) VALUES (:corPrincipal, :hex1, :hex2)");
        $stmt->bindParam(':corPrincipal', $corPrincipal);
        $stmt->bindParam(':hex1', $hex1);
        $stmt->bindParam(':hex2', $hex2);
        return $stmt->execute();
    }

    // Atualizar cor
    public function atualizarCor(int $id, string $corPrincipal, string $hex1, string $hex2): bool {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET corPrincipal = :corPrincipal, hexDegrade1 = :hex1, hexDegrade2 = :hex2 WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':corPrincipal', $corPrincipal);
        $stmt->bindParam(':hex1', $hex1);
        $stmt->bindParam(':hex2', $hex2);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Deletar cor
    public function deletarCor(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Verificar se cor existe
    public function existe(int $id): bool {
        return (bool) $this->getCorById($id);
    }
}
?>
