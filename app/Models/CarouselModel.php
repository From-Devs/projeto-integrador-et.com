<?php
require_once __DIR__ . '/../../config/Database-1.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
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
        $stmt = $this->conn->query("SELECT c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao, cs.corEspecial, cs.hexDegrade1, cs.hexDegrade2, cs.hexDegrade3 FROM carousel c JOIN produto p ON p.id_produto = c.id_produto JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs ORDER BY c.posicao ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 CREATE/UPDATE - Criar novo model do Carousel por ID
    public function create(array $data): array {
        // 1️⃣ Conta quantos já existem
        $sqlCount = "SELECT COUNT(*) as total FROM Carousel";
        $stmt = $this->conn->query($sqlCount);
        $total = (int) $stmt->fetch()['total'];
    
        // 2️⃣ Verifica limite máximo
        if ($total >= 3) {
            return ['error' => 'Limite máximo de 3 carrosseis atingido.'];
        }
    
        // 3️⃣ Define a nova posição automaticamente
        $posicao = $total + 1; 
    
        // 4️⃣ Prepara e insere
        $sql = "INSERT INTO Carousel (id_produto, id_coresSubs, posicao)
                VALUES (:id_produto, :id_coresSubs, :posicao)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_produto' => $data['id_produto'],   
            ':id_coresSubs' => $data['id_coresSubs'],
            ':posicao' => $posicao
        ]);
    
        return ['success' => true];
    }
    
 
    // // 🔹 DELETE - remover registro
    // public function remove(int $id): bool {
    //     $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
    //     return $stmt->execute([":id" => $id]);
    // }

    // // 🔹 READ - buscar por ID
    // public function getElementById(int $id): array|false {
    //     $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
    //     $stmt->execute([":id" => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

}
?>
