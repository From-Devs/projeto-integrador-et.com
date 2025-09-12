<?php
require_once __DIR__ . '/../config/database.php';

class PedidoController {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect(); // certifique-se que é connect() (minúsculo)
    }

    /**
     * Lista pedidos por usuário (com produtos, status e datas)
     */
    public function listarPedidosPorUsuario($idUsuario) {
        $sql = "SELECT 
                    p.id_pedido,
                    p.dataPedido,
                    s.tipoStatus,
                    c.id_produto,
                    pr.nome AS produto_nome,
                    pr.preco,
                    pr.img1,
                    c.quantidade
                FROM pedido p
                INNER JOIN status s ON p.id_status = s.id_status
                INNER JOIN carrinho c ON p.id_usuario = c.id_usuario
                INNER JOIN produto pr ON c.id_produto = pr.id_produto
                WHERE p.id_usuario = :idUsuario
                ORDER BY p.dataPedido DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $idPedido = $row['id_pedido'];

            if (!isset($pedidos[$idPedido])) {
                $pedidos[$idPedido] = [
                    'id_pedido' => $row['id_pedido'],
                    'dataPedido' => $row['dataPedido'],
                    'tipoStatus' => $row['tipoStatus'],
                    'itens' => []
                ];
            }

            $pedidos[$idPedido]['itens'][] = [
                'id_produto' => $row['id_produto'],
                'nome' => $row['produto_nome'],
                'preco' => $row['preco'],
                'quantidade' => $row['quantidade'],
                'imagem' => $row['img1'] ?? ''
            ];
        }

        return array_values($pedidos);
    }
}
