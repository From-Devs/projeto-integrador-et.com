<?php
// model/CarouselModel.php
require_once __DIR__ . '/../../config/Database-1.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // 🔹 CREATE - criar novo registro
    public function create(array $data): bool {
        $stmt = $this->conn->prepare("
            INSERT INTO carousel (id_carousel, id_produto, id_coresSubs)
            VALUES (:id_carousel, :id_produto, :id_coresSubs)
        ");

        return $stmt->execute([
            ":id_carousel" => $data['id_carousel'],
            ":id_produto" => $data['id_produto'],
            ":id_coresSubs" => $data['id_coresSubs']
        ]);
    }

    // 🔹 UPDATE - atualizar registro por ID
    public function update(int $id, array $data): bool {
        $stmt = $this->conn->prepare("
            UPDATE carousel
            SET id_produto = :id_produto, id_coresSubs = :id_coresSubs
            WHERE id_carousel = :id
        ");

        return $stmt->execute([
            ":id" => $id,
            ":id_produto" => $data['id_produto'],
            ":id_coresSubs" => $data['id_coresSubs']
        ]);
    }
 
    // 🔹 DELETE - remover registro
    public function remove(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
        return $stmt->execute([":id" => $id]);
    }

    // 🔹 READ - buscar por ID
    public function getElementById(int $id): array|false {
        $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 READ - buscar todos
    public function getAll(): array {
        $stmt = $this->conn->query("SELECT * FROM carousel");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
