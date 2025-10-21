<?php
require_once __DIR__ . '/../../config/database.php';

class Carrinho {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function listar($idUsuario) {
        $stmt = $this->conn->prepare("
            SELECT pc.id_prodCarrinho, pc.qntProduto, p.id_produto, p.nome, p.preco, p.precoPromo, p.img1
            FROM Carrinho c
            INNER JOIN ProdutoCarrinho pc ON pc.id_carrinho = c.id_carrinho
            INNER JOIN produto p ON p.id_produto = pc.id_produto
            WHERE c.id_usuario = ?
            ORDER BY pc.id_prodCarrinho DESC
        ");
        $stmt->execute([$idUsuario]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $total = 0.0;
        foreach ($items as $it) {
            $valor = $it['precoPromo'] !== null ? (float)$it['precoPromo'] : (float)$it['preco'];
            $total += $valor * (int)$it['qntProduto'];
        }

        return ['items' => $items, 'total' => $total];
    }

    public function adicionar($idUsuario, $idProduto, $qtd = 1) {
        $idUsuario = (int)$idUsuario;
        $qtd = max(1, (int)$qtd);

        if (!$idUsuario) return ['ok' => false, 'msg' => 'ID do usuário inválido'];

        $produtos = is_array($idProduto) ? $idProduto : [$idProduto];

        $stmt = $this->conn->prepare("SELECT id_carrinho FROM Carrinho WHERE id_usuario = ?");
        $stmt->execute([$idUsuario]);
        $carrinho = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$carrinho) {
            $insCarrinho = $this->conn->prepare("INSERT INTO Carrinho (id_usuario) VALUES (?)");
            $insCarrinho->execute([$idUsuario]);
            $idCarrinho = $this->conn->lastInsertId();
        } else {
            $idCarrinho = $carrinho['id_carrinho'];
        }

        foreach ($produtos as $p) {
            $p = (int)$p;
            $sel = $this->conn->prepare("SELECT id_prodCarrinho, qntProduto FROM ProdutoCarrinho WHERE id_carrinho = ? AND id_produto = ?");
            $sel->execute([$idCarrinho, $p]);
            $row = $sel->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $novaQtd = (int)$row['qntProduto'] + $qtd;
                $upd = $this->conn->prepare("UPDATE ProdutoCarrinho SET qntProduto = ? WHERE id_prodCarrinho = ?");
                $upd->execute([$novaQtd, (int)$row['id_prodCarrinho']]);
            } else {
                $ins = $this->conn->prepare("INSERT INTO ProdutoCarrinho (id_carrinho, id_produto, qntProduto) VALUES (?, ?, ?)");
                $ins->execute([$idCarrinho, $p, $qtd]);
            }
        }

        return ['ok' => true, 'msg' => 'Produto(s) adicionado(s) ao carrinho'];
    }

    public function atualizarQuantidade($idUsuario, $idProduto, $qtd) {
        $qtd = max(0, (int)$qtd);
        $stmt = $this->conn->prepare("SELECT id_carrinho FROM Carrinho WHERE id_usuario = ?");
        $stmt->execute([$idUsuario]);
        $carrinho = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$carrinho) return ['ok' => false, 'msg' => 'Carrinho não encontrado'];

        $idCarrinho = $carrinho['id_carrinho'];

        if ($qtd === 0) {
            $del = $this->conn->prepare("DELETE FROM ProdutoCarrinho WHERE id_carrinho = ? AND id_produto = ?");
            $del->execute([$idCarrinho, $idProduto]);
        } else {
            $upd = $this->conn->prepare("UPDATE ProdutoCarrinho SET qntProduto = ? WHERE id_carrinho = ? AND id_produto = ?");
            $upd->execute([$qtd, $idCarrinho, $idProduto]);
        }

        return ['ok' => true];
    }

    public function remover($idUsuario, $idProduto) {
        $stmt = $this->conn->prepare("SELECT id_carrinho FROM Carrinho WHERE id_usuario = ?");
        $stmt->execute([$idUsuario]);
        $carrinho = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$carrinho) return ['ok' => false, 'msg' => 'Carrinho não encontrado'];

        $idCarrinho = $carrinho['id_carrinho'];

        $del = $this->conn->prepare("DELETE FROM ProdutoCarrinho WHERE id_carrinho = ? AND id_produto = ?");
        $del->execute([$idCarrinho, $idProduto]);

        return ['ok' => true];
    }

    public function removerSelecionados($idUsuario, array $idsProduto) {
        if (empty($idsProduto)) return ['ok' => false, 'msg' => 'Nenhum produto selecionado'];
    
        $placeholders = implode(',', array_fill(0, count($idsProduto), '?'));
        $sql = "DELETE FROM ProdutoCarrinho WHERE id_carrinho = (SELECT id_carrinho FROM Carrinho WHERE id_usuario = ?) AND id_produto IN ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        $params = array_merge([(int)$idUsuario], array_map('intval', $idsProduto));
        $stmt->execute($params);
    
        return ['ok' => true, 'msg' => 'Produtos removidos do carrinho'];
    }
}
