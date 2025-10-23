<?php
require_once __DIR__ . '/../../config/database.php';

class Carrinho {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getCarrinhoByUsuario($id_usuario) {
        $sql = "
            SELECT 
                pc.id_prodCarrinho,
                c.id_carrinho,
                p.id_produto,
                p.nome,
                p.marca,
                p.preco,
                p.precoPromo,
                p.img1,
                p.tamanho,
                pc.qntProduto AS quantidade
            FROM ProdutoCarrinho pc
            JOIN Carrinho c ON c.id_carrinho = pc.id_carrinho
            JOIN Produto p ON p.id_produto = pc.id_produto
            WHERE c.id_usuario = :id_usuario
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_usuario' => $id_usuario]);
        $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Calcula preço e subtotal
        foreach ($carrinho as $i => $item) {
            $preco = ($item['precoPromo'] && $item['precoPromo'] > 0) ? $item['precoPromo'] : $item['preco'];
            $carrinho[$i]['precoCalculado'] = $preco;
            $carrinho[$i]['subtotal'] = $preco * $item['quantidade'];
        }

        return $carrinho;
    }

    public function removerItem($id_prodCarrinho) {
        $sql = "DELETE FROM ProdutoCarrinho WHERE id_prodCarrinho = :id_prodCarrinho";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_prodCarrinho' => $id_prodCarrinho]);
    }

    public function criarPedido($id_usuario, $produtos) {
        $sqlPedido = "INSERT INTO Pedido (id_usuario, id_status, dataPedido, precoTotal)
                      VALUES (:id_usuario, 1, NOW(), :precoTotal)";
        $precoTotal = array_sum(array_column($produtos, 'subtotal'));
        $stmtPedido = $this->conn->prepare($sqlPedido);
        $stmtPedido->execute([':id_usuario' => $id_usuario, ':precoTotal' => $precoTotal]);
        $id_pedido = $this->conn->lastInsertId();

        $sqlItem = "INSERT INTO ProdutoPedido (id_pedido, id_produto, quantidade, precoUnitario)
                    VALUES (:id_pedido, :id_produto, :quantidade, :preco)";
        $stmtItem = $this->conn->prepare($sqlItem);

        foreach ($produtos as $item) {
            $stmtItem->execute([
                ':id_pedido' => $id_pedido,
                ':id_produto' => $item['id_produto'],
                ':quantidade' => $item['quantidade'],
                ':preco' => $item['precoCalculado']
            ]);

            // Remove do carrinho
            $this->removerItem($item['id_prodCarrinho']);
        }

        return $id_pedido;
    }
}
