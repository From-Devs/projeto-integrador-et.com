<?php
// config/pedidoController.php
require_once __DIR__ . "/database.php";

class PedidoController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->Connect(); // aqui deve retornar um PDO
    }

    public function ListarPedidosAgrupados($id_usuario) {
        $sql = "
            SELECT 
                p.id_pedido, p.dataPedido, COALESCE(s.tipoStatus, 'Sem status') AS tipoStatus,
                pr.id_produto, pr.nome, pr.imagem, pr.preco, pr.descricaoBreve,
                pc.qntProduto
            FROM pedido p
            INNER JOIN carrinho c       ON c.id_carrinho = p.id_carrinho
            INNER JOIN produtocarrinho pc ON pc.id_carrinho = c.id_carrinho
            INNER JOIN produto pr       ON pr.id_produto = pc.id_produto
            LEFT JOIN status s          ON s.id_status  = p.id_status
            WHERE p.id_usuario = :id_usuario
            ORDER BY p.dataPedido DESC, p.id_pedido DESC
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();

        $pedidosAgrupados = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pid = $row['id_pedido'];
            if (!isset($pedidosAgrupados[$pid])) {
                $pedidosAgrupados[$pid] = [
                    'id_pedido'  => $pid,
                    'dataPedido' => $row['dataPedido'],
                    'tipoStatus' => $row['tipoStatus'],
                    'itens'      => [],
                    'total'      => 0.0
                ];
            }
            $row['subtotal'] = $row['preco'] * (int)$row['qntProduto'];
            $pedidosAgrupados[$pid]['itens'][] = $row;
            $pedidosAgrupados[$pid]['total']  += $row['subtotal'];
        }
        return array_values($pedidosAgrupados);
    }
}
