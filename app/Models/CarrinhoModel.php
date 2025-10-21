<?php
require_once __DIR__ . '/../../config/database.php';

class Carrinho {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // Busca produtos do carrinho de um usuário
    public function getCarrinhoByUsuario($id_usuario) {
        try {
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
                    pc.qntProduto AS quantidade,
                    c.data_criacao,
                    c.data_atualizacao
                FROM ProdutoCarrinho pc
                JOIN Carrinho c ON c.id_carrinho = pc.id_carrinho
                JOIN Produto p ON p.id_produto = pc.id_produto
                WHERE c.id_usuario = :id_usuario
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_usuario' => $id_usuario]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erro ao carregar carrinho: " . $e->getMessage());
        }
    }

    // Atualiza a quantidade de um produto no carrinho
    public function atualizarQuantidade($id_prodCarrinho, $novaQtd) {
        $sql = "UPDATE ProdutoCarrinho SET qntProduto = :qtd WHERE id_prodCarrinho = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':qtd' => $novaQtd,
            ':id' => $id_prodCarrinho
        ]);
    }

    public function removerItem($id_prodCarrinho, $id_usuario) {
        $sql = "DELETE FROM Carrinho WHERE id_prodCarrinho = :id_prodCarrinho AND id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id_prodCarrinho' => $id_prodCarrinho,
            ':id_usuario' => $id_usuario
        ]);
    }

    public function criarPedido($id_usuario, $produtos) {
        // Cria o pedido
        $sqlPedido = "INSERT INTO Pedido (id_usuario, data_pedido, status) VALUES (:id_usuario, NOW(), 'Em processamento')";
        $stmtPedido = $this->conn->prepare($sqlPedido);
        $stmtPedido->execute([':id_usuario' => $id_usuario]);

        $id_pedido = $this->conn->lastInsertId();

        // Adiciona os itens ao pedido
        $sqlItem = "INSERT INTO PedidoItem (id_pedido, id_produto, quantidade, precoUnitario) 
                    VALUES (:id_pedido, :id_produto, :quantidade, :preco)";
        $stmtItem = $this->conn->prepare($sqlItem);

        foreach ($produtos as $p) {
            $stmtItem->execute([
                ':id_pedido' => $id_pedido,
                ':id_produto' => $p['id_produto'],
                ':quantidade' => $p['quantidade'],
                ':preco' => $p['precoCalculado']
            ]);
        }

        return $id_pedido;
    }


}