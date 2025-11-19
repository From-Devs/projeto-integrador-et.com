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

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTotalAssociados()
    {
        $sql = "
            SELECT COUNT(*) AS total_associados
            FROM usuario
            WHERE tipo = 'Associado'
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getVendasRealizadas()
    {
        $sql = "
            SELECT COALESCE(SUM(pp.quantidade), 0) AS unidades_vendidas
            FROM produtopedido pp
            JOIN pedido ped ON ped.id_pedido = pp.id_pedido
            WHERE ped.id_status = 4
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTopVendedores()
    {
        $sql = "
            SELECT 
                u.nome AS vendedor,
                SUM(pp.quantidade) AS total_vendas
            FROM produtopedido pp
            JOIN produto p ON p.id_produto = pp.id_produto
            JOIN usuario u ON u.id_usuario = p.id_associado
            JOIN pedido ped ON ped.id_pedido = pp.id_pedido
            WHERE ped.id_status = 4
            GROUP BY u.id_usuario
            ORDER BY total_vendas DESC
            LIMIT 5
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopCategorias()
    {
        $sql = "
            SELECT 
                c.nome AS categoria,
                SUM(pp.quantidade) AS total_vendas
            FROM produtopedido pp
            JOIN produto p ON p.id_produto = pp.id_produto
            JOIN subcategoria sc ON sc.id_subCategoria = p.id_subCategoria
            JOIN categoria c ON c.id_categoria = sc.id_categoria
            JOIN pedido ped ON ped.id_pedido = pp.id_pedido
            WHERE ped.id_status = 4
            GROUP BY c.id_categoria
            ORDER BY total_vendas DESC
            LIMIT 5
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}