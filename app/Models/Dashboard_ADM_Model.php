<?php
require_once __DIR__ . '/../../config/database.php';

class Dashboard_ADM_Model {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

public function getLucroTotal()
{
    $sql = "
        SELECT 
            SUM(
                pp.quantidade * 
                CASE 
                    WHEN p.fgPromocao = 1 AND p.precoPromo IS NOT NULL 
                        THEN p.precoPromo
                    ELSE p.preco
                END
            ) AS lucro_total
        FROM produtopedido pp
        JOIN produto p ON p.id_produto = pp.id_produto
        JOIN pedido ped ON ped.id_pedido = pp.id_pedido
        WHERE ped.id_status = 4
    ";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // fetch (não fetchAll) porque é só 1 linha
}
}