<?php
// model/carousel.php    
require_once __DIR__ . '/../../config/database.php';

class CarouselModel {
    private PDO $conn;

    // 🔹 Construtor
    public function __construct() {
        // Corrigido: precisa instanciar a classe Database
        $db = new Database();
        $this->conn = $db->connect(); //dase
    }

    // 🔹 Criar novo registro


    // 🔹 Editar registro existente
    public function editCarousel($id, $id_carousel, $id_produto, $id_coresSubs): bool {
        $stmt = $this->conn->prepare("
            UPDATE carousel 
            SET id_carousel = :id_carousel, id_produto = :id_produto, id_coresSubs = :id_coresSubs 
            WHERE id = :id
        ");

        return $stmt->execute([
            ":id" => $id,
            ":id_carousel" => $id_carousel,
            ":id_produto" => $id_produto,
            ":id_coresSubs" => $id_coresSubs
        ]);
    }

    // 🔹 Remover registro
    public function removeCarousel($id): bool {
        try {
            // Corrigido: DELETE não usa "*"
            $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
            return $stmt->execute([":id" => $id]);
        } catch (Throwable $th) {
            echo "Erro ao deletar: " . $th->getMessage();
            return false;
        }
    }

    // 🔹 Buscar por ID
    public function getElementById($id): array|bool {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
            $stmt->execute([":id" => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    // 🔹 Buscar todos
    public function getAll(): array {
        $stmt = $this->conn->query("SELECT * FROM carousel");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>