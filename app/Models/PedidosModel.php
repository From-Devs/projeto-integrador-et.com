<?php
require_once __DIR__ . '/../../config/database.php';

class PedidosModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect(); // Certifique-se que o método na Database é "Connect()"
    }

    /**
     * Lista todos os pedidos de um usuário, com produtos e status
     */
    public function listarPorUsuario($idUsuario) {
        try {
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
                    pp.quantidade
                FROM Pedido p
                INNER JOIN Status s ON p.id_status = s.id_status
                INNER JOIN ProdutoPedido pp ON pp.id_pedido = p.id_pedido
                INNER JOIN Produto pr ON pp.id_produto = pr.id_produto
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
                    'imagem' => $row['img1'] ?? ''
                ];
            }

            return array_values($pedidos);

        } catch (PDOException $e) {
            echo "Erro ao buscar pedidos: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Retorna os produtos de um pedido específico
     */
    public function buscarProdutosDoPedido($idPedido) {
        try {
            $sql = "
                SELECT 
                    pp.id_produto,
                    p.nome AS produto_nome,
                    p.preco,
                    p.precoPromo,
                    p.img1,
                    pp.quantidade
                FROM ProdutoPedido pp
                INNER JOIN Produto p ON pp.id_produto = p.id_produto
                WHERE pp.id_pedido = :idPedido
            ";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":idPedido", $idPedido, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo "Erro ao buscar produtos do pedido: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Método futuro: buscar info de pagamentos
     */
    public function buscarInfoPagamentos($idPedido) {
        // Aqui você pode implementar a lógica para trazer dados de pagamento
        return [];
    }
}
?>
