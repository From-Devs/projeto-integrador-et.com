<?php
require_once __DIR__ . '/../config/database.php';
 
class PedidoController {
    private $conn;
 
    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect(); // certifique-se que é connect() (minúsculo)
    }
 
    /**
     * Lista pedidos por usuário (com produtos, status e datas)
     */
    public function listarPedidosPorUsuario($idUsuario) {
        $sql = "
            SELECT
                p.id_pedido,
                p.dataPedido,
                s.tipoStatus,
                pp.id_produto,
                pr.nome AS produto_nome,
                pr.preco,
                pr.precoPromo,
                pr.img1,
                pp.quantidade,
                c.nome AS categoria_nome
            FROM Pedido p
            INNER JOIN Status s ON p.id_status = s.id_status
            INNER JOIN ProdutoPedido pp ON pp.id_pedido = p.id_pedido
            INNER JOIN Produto pr ON pp.id_produto = pr.id_produto
            LEFT JOIN Subcategoria sc ON pr.id_subCategoria = sc.id_subCategoria
            LEFT JOIN Categoria c ON sc.id_categoria = c.id_categoria
            WHERE p.id_usuario = :idUsuario
            ORDER BY p.dataPedido DESC
        ";
 
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
                'preco' => $row['precoPromo'] ?? $row['preco'],
                'quantidade' => $row['quantidade'],
                'imagem' => $row['img1'] ?? '',
                'categoria' => $row['categoria_nome'] ?? ''
            ];
        }
 
        return array_values($pedidos);
    }
}