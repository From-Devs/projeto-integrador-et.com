<?php
require_once __DIR__ . '/../../config/Database-1.php';

class CoresSubModel {
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // 🔹 Buscar todos
    public function getAll(): array {
        $stmt = $this->conn->prepare("SELECT * FROM coressubs");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Buscar por ID
    public function getElementById(int $id): array|false {
        $stmt = $this->conn->prepare("SELECT * FROM coressubs WHERE id_coresSubs = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Atualizar
    public function update(int $id, array $data): bool {
        $stmt = $this->conn->prepare("
            UPDATE coressubs
            SET corEspecial = :corEspecial,
                hexDegrade1 = :hexDegrade1,
                hexDegrade2 = :hexDegrade2,
                hexDegrade3 = :hexDegrade3
            WHERE id_coresSubs = :id
        ");
        return $stmt->execute([
            ":id"          => $id,
            ":corEspecial" => $data["corEspecial"],
            ":hexDegrade1" => $data["hexDegrade1"],
            ":hexDegrade2" => $data["hexDegrade2"],
            ":hexDegrade3" => $data["hexDegrade3"]
        ]);
    }

    // 🔹 Remover
    public function remove(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM coressubs WHERE id_coresSubs = :id");
        return $stmt->execute([":id" => $id]);
    }
}
?>
