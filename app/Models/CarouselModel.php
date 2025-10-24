<?php
require_once __DIR__ . '/../../config/Database-1.php';

class CarouselModel {
    private PDO $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }
    // 🔹 READ - buscar todos
    public function getAll(): array {
        $stmt = $this->conn->query("SELECT 
        c.id_carousel, p.id_produto, p.nome, p.marca, p.preco, p.precoPromo, p.img1, p.img2, p.img3, p.fgPromocao, cs.corespecial, cs.hexdegrade1, cs.hexdegrade2, cs.hexdegrade3 
        FROM carousel c 
        JOIN produto p ON p.id_produto = c.id_produto 
        JOIN coressubs cs ON cs.id_coressubs = c.id_coressubs 
        ORDER BY c.posicao ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 CREATE/UPDATE - Criar novo model do Carousel por ID
    public function create(array $data): array {
        $sqlCount = "SELECT COUNT(*) as total FROM carousel";
        $stmt = $this->conn->query($sqlCount);
        $total = (int) $stmt->fetch()['total'];
        
        if ($total >= 3) { return ['error' => 'Limite máximo de 3 carrosseis atingido.']; }
        
        $posicao = $total + 1;
        
        $sql = "INSERT INTO carousel (id_produto, id_coresSubs, posicao)
                VALUES (:id_produto, :id_coresSubs, :posicao)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_produto' => $data['id_produto'],   
            ':id_coresSubs' => $data['id_coresSubs'],
            ':posicao' => $posicao
        ]);
        
        return ['success' => true];
    }
 
    // 🔹 DELETE - remover registro
    public function remove(int $id): bool {
        $stmt = $this->conn->prepare("DELETE FROM carousel WHERE id_carousel = :id");
        $stmt->execute([":id" => $id]);
        return ['success' => true];
    }

    // // 🔹 READ - buscar por ID
    // public function getElementById(int $id): array|false {
    //     $stmt = $this->conn->prepare("SELECT * FROM carousel WHERE id_carousel = :id");
    //     $stmt->execute([":id" => $id]);
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

}
?>
