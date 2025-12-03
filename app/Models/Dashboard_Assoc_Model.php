<?php
require_once __DIR__ . '/../../config/database.php';

class Dashboard_Assoc_Model {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getLucroTotalPorAssociado($idAssociado)
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
            WHERE p.id_associado = :idAssociado
            AND ped.id_status = 4
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idAssociado', $idAssociado);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getItensVendidosPorAssociado($idAssociado)
    {
        $sql = "SELECT 
                pp.quantidade,
                c.nome AS categoria,

                p.preco,
                p.precoPromo,
                p.fgPromocao,

                CASE 
                    WHEN p.fgPromocao = 1 AND p.precoPromo IS NOT NULL 
                        THEN p.precoPromo
                    ELSE p.preco
                END AS precoUnitario

            FROM produtopedido pp
            JOIN produto p ON p.id_produto = pp.id_produto
            JOIN subcategoria sc ON sc.id_subCategoria = p.id_subCategoria
            JOIN categoria c ON c.id_categoria = sc.id_categoria
            JOIN pedido ped ON ped.id_pedido = pp.id_pedido
            WHERE ped.id_status = 4
            AND p.id_associado = :idAssociado";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idAssociado', $idAssociado);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalVendasPorAssociado($idAssociado)
    {
        $sql = "
            SELECT 
                COALESCE(SUM(pp.quantidade), 0) AS total_vendas
            FROM produtopedido pp
            JOIN produto p ON p.id_produto = pp.id_produto
            JOIN pedido ped ON ped.id_pedido = pp.id_pedido
            WHERE p.id_associado = :idAssociado
            AND ped.id_status = 4
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idAssociado', $idAssociado);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTopProdutosVendidos($idAssociado)
    {
        $sql = "SELECT 
                    p.id_produto,
                    p.nome,
                    SUM(pp.quantidade) AS total_vendido
                FROM produtopedido pp
                JOIN produto p ON p.id_produto = pp.id_produto
                JOIN pedido ped ON ped.id_pedido = pp.id_pedido
                WHERE ped.id_status = 4
                AND p.id_associado = :idAssociado
                GROUP BY p.id_produto, p.nome
                ORDER BY total_vendido DESC
                LIMIT 5";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idAssociado', $idAssociado);
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