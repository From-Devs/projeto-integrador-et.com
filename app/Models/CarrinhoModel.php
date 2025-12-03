<?php
require_once __DIR__ . '/../../config/database.php';

class Carrinho {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    /**
     * Retorna todos os produtos do carrinho de um usuário
     */
    public function getCarrinhoByUsuario(int $id_usuario): array {
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
            FROM produtocarrinho pc
            JOIN carrinho c ON c.id_carrinho = pc.id_carrinho
            JOIN produto p ON p.id_produto = pc.id_produto
            WHERE c.id_usuario = :id_usuario
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_usuario' => $id_usuario]);
        $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($carrinho as $i => $item) {
            $preco = ($item['precoPromo'] && $item['precoPromo'] > 0)
                ? $item['precoPromo']
                : $item['preco'];
            $carrinho[$i]['precoCalculado'] = $preco;
            $carrinho[$i]['subtotal'] = $preco * $item['quantidade'];
        }

        return $carrinho;
    }

    /**
     * Adiciona um ou mais produtos ao carrinho do usuário
     */
    public function adicionarAoCarrinho(int $id_usuario, array $ids_produtos, int $quantidade = 1): array {
        $resultados = [];

        // Garante que o usuário tenha um carrinho
        $stmtCarrinho = $this->conn->prepare("SELECT id_carrinho FROM Carrinho WHERE id_usuario = :id_usuario");
        $stmtCarrinho->execute([':id_usuario' => $id_usuario]);
        $carrinho = $stmtCarrinho->fetch(PDO::FETCH_ASSOC);

        if (!$carrinho) {
            $this->conn->prepare("INSERT INTO Carrinho (id_usuario) VALUES (:id_usuario)")
                       ->execute([':id_usuario' => $id_usuario]);
            $id_carrinho = $this->conn->lastInsertId();
        } else {
            $id_carrinho = $carrinho['id_carrinho'];
        }

        foreach ($ids_produtos as $id_produto) {
            // Verifica se o produto já está no carrinho
            $stmtCheck = $this->conn->prepare("
                SELECT id_prodCarrinho 
                FROM ProdutoCarrinho 
                WHERE id_carrinho = :id_carrinho AND id_produto = :id_produto
            ");
            $stmtCheck->execute([
                ':id_carrinho' => $id_carrinho,
                ':id_produto' => $id_produto
            ]);
            $existe = $stmtCheck->fetch(PDO::FETCH_ASSOC);

            if ($existe) {
                // Atualiza quantidade
                $stmtUpdate = $this->conn->prepare("
                    UPDATE ProdutoCarrinho 
                    SET qntProduto = qntProduto + :qtd 
                    WHERE id_prodCarrinho = :id
                ");
                $stmtUpdate->execute([
                    ':qtd' => $quantidade,
                    ':id' => $existe['id_prodCarrinho']
                ]);
                $resultados[] = "Produto $id_produto atualizado no carrinho";
            } else {
                // Insere novo produto
                $stmtInsert = $this->conn->prepare("
                    INSERT INTO ProdutoCarrinho (id_carrinho, id_produto, qntProduto)
                    VALUES (:id_carrinho, :id_produto, :qtd)
                ");
                $stmtInsert->execute([
                    ':id_carrinho' => $id_carrinho,
                    ':id_produto' => $id_produto,
                    ':qtd' => $quantidade
                ]);
                $resultados[] = "Produto $id_produto adicionado ao carrinho";
            }
        }

        return $resultados;
    }

    /**
     * Remove item do carrinho
     */
    public function removerItem(int $id_prodCarrinho): void {
        $stmt = $this->conn->prepare("DELETE FROM ProdutoCarrinho WHERE id_prodCarrinho = :id_prodCarrinho");
        $stmt->execute([':id_prodCarrinho' => $id_prodCarrinho]);
    }

    /**
     * Cria um pedido com base no carrinho
     */
    public function criarPedido(int $id_usuario, array $produtos): int {
        $precoTotal = array_sum(array_column($produtos, 'subtotal'));

        $stmtPedido = $this->conn->prepare("
            INSERT INTO Pedido (id_usuario, id_status, dataPedido, precoTotal, id_status_pagamento)
            VALUES (:id_usuario, 1, NOW(), :precoTotal, 1)
        ");
        $stmtPedido->execute([
            ':id_usuario' => $id_usuario,
            ':precoTotal' => $precoTotal
        ]);
        $id_pedido = $this->conn->lastInsertId();

        $stmtItem = $this->conn->prepare("
            INSERT INTO ProdutoPedido (id_pedido, id_produto, quantidade, precoUnitario)
            VALUES (:id_pedido, :id_produto, :quantidade, :preco)
        ");

        foreach ($produtos as $item) {
            $stmtItem->execute([
                ':id_pedido' => $id_pedido,
                ':id_produto' => $item['id_produto'],
                ':quantidade' => $item['quantidade'],
                ':preco' => $item['precoCalculado']
            ]);

            // Remove item do carrinho após criar pedido
            $this->removerItem($item['id_prodCarrinho']);
        }

        return $id_pedido;
    }
}
