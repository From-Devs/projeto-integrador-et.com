<?php
// app/controllers/produtoController.php
require_once __DIR__ . '/../config/database.php';

class ProdutoController {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Lista produtos com paginação e filtros simples
    public function listar($page = 1, $limit = 12, $q = null, $sub = null) {
        $offset = max(0, ($page - 1) * $limit);
        $where = [];
        $params = [];

        if (!empty($q)) {
            $where[] = "(p.nome LIKE :q OR p.marca LIKE :q OR p.descricaoBreve LIKE :q)";
            $params[':q'] = "%{$q}%";
        }
        if (!empty($sub)) {
            $where[] = "p.id_subCategoria = :sub";
            $params[':sub'] = (int)$sub;
        }

        $whereSql = $where ? "WHERE " . implode(" AND ", $where) : "";
        $sql = "
            SELECT 
                p.id_produto, p.nome, p.marca, p.descricaoBreve, p.preco, p.precoPromo,
                p.qtdEstoque, p.img1, p.img2, p.img3,
                s.nome AS subcategoria, c.corPrincipal
            FROM produto p
            LEFT JOIN subcategoria s ON s.id_subCategoria = p.id_subCategoria
            LEFT JOIN cores c ON c.id_cores = p.id_cores
            $whereSql
            ORDER BY p.id_produto DESC
            LIMIT :limit OFFSET :offset
        ";
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $k => $v) {
            $stmt->bindValue($k, $v);
        }
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll();

        // total
        $countSql = "SELECT COUNT(*) AS total FROM produto p " . $whereSql;
        $stmt2 = $this->conn->prepare($countSql);
        foreach ($params as $k => $v) {
            $stmt2->bindValue($k, $v);
        }
        $stmt2->execute();
        $total = (int) $stmt2->fetchColumn();

        return ['items' => $items, 'total' => $total, 'page' => (int)$page, 'limit' => (int)$limit];
    }

    public function detalhes($id) {
        $sql = "
            SELECT 
                p.*, s.nome AS subcategoria, c.corPrincipal, c.hexDegrade1, c.hexDegrade2
            FROM produto p
            LEFT JOIN subcategoria s ON s.id_subCategoria = p.id_subCategoria
            LEFT JOIN cores c ON c.id_cores = p.id_cores
            WHERE p.id_produto = :id
            LIMIT 1
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // === Carrinho ===
    private function getOrCreateCarrinhoId($idUsuario) {
        // Tenta achar carrinho
        $sel = $this->conn->prepare("SELECT id_carrinho FROM carrinho WHERE id_usuario = :u LIMIT 1");
        $sel->execute([':u' => (int)$idUsuario]);
        $idCarrinho = $sel->fetchColumn();
        if ($idCarrinho) return (int)$idCarrinho;

        // Se não existir, cria. Usa CEP vazio por padrão (ou pode vir do front)
        $ins = $this->conn->prepare("INSERT INTO carrinho (cep, id_usuario) VALUES (:cep, :u)");
        $ins->execute([':cep' => '00000000', ':u' => (int)$idUsuario]);
        return (int)$this->conn->lastInsertId();
    }

    public function adicionarAoCarrinho($idUsuario, $idProduto, $qtd = 1) {
        $idCarrinho = $this->getOrCreateCarrinhoId($idUsuario);

        // Já existe item?
        $sel = $this->conn->prepare("SELECT id_prodCarrinho, qntProduto FROM produtocarrinho WHERE id_carrinho = :c AND id_produto = :p");
        $sel->execute([':c' => $idCarrinho, ':p' => (int)$idProduto]);
        $row = $sel->fetch();

        if ($row) {
            $novaQtd = (int)$row['qntProduto'] + (int)$qtd;
            $upd = $this->conn->prepare("UPDATE produtocarrinho SET qntProduto = :q WHERE id_prodCarrinho = :id");
            $upd->execute([':q' => $novaQtd, ':id' => (int)$row['id_prodCarrinho']]);
        } else {
            $ins = $this->conn->prepare("INSERT INTO produtocarrinho (id_carrinho, id_produto, qntProduto) VALUES (:c, :p, :q)");
            $ins->execute([':c' => $idCarrinho, ':p' => (int)$idProduto, ':q' => (int)$qtd]);
        }
        return ['ok' => true, 'id_carrinho' => $idCarrinho];
    }

    public function atualizarQuantidade($idUsuario, $idProduto, $qtd) {
        $idCarrinho = $this->getOrCreateCarrinhoId($idUsuario);
        if ((int)$qtd <= 0) {
            $del = $this->conn->prepare("DELETE FROM produtocarrinho WHERE id_carrinho = :c AND id_produto = :p");
            $del->execute([':c' => $idCarrinho, ':p' => (int)$idProduto]);
        } else {
            $upd = $this->conn->prepare("UPDATE produtocarrinho SET qntProduto = :q WHERE id_carrinho = :c AND id_produto = :p");
            $upd->execute([':q' => (int)$qtd, ':c' => $idCarrinho, ':p' => (int)$idProduto]);
        }
        return ['ok' => true];
    }

    public function removerDoCarrinho($idUsuario, $idProduto) {
        $idCarrinho = $this->getOrCreateCarrinhoId($idUsuario);
        $del = $this->conn->prepare("DELETE FROM produtocarrinho WHERE id_carrinho = :c AND id_produto = :p");
        $del->execute([':c' => $idCarrinho, ':p' => (int)$idProduto]);
        return ['ok' => true];
    }

    public function listarCarrinho($idUsuario) {
        $idCarrinho = $this->getOrCreateCarrinhoId($idUsuario);
        $sql = "
            SELECT pc.id_prodCarrinho, pc.qntProduto,
                   p.id_produto, p.nome, p.preco, p.precoPromo, p.img1
            FROM produtocarrinho pc
            INNER JOIN produto p ON p.id_produto = pc.id_produto
            WHERE pc.id_carrinho = :c
            ORDER BY pc.id_prodCarrinho DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':c' => $idCarrinho]);
        $items = $stmt->fetchAll();

        $total = 0.0;
        foreach ($items as $it) {
            $valor = $it['precoPromo'] !== null ? (float)$it['precoPromo'] : (float)$it['preco'];
            $total += $valor * (int)$it['qntProduto'];
        }

        return ['id_carrinho' => $idCarrinho, 'items' => $items, 'total' => $total];
    }

    // === Pedidos ===
    public function criarPedido($idUsuario, $idStatus = 1) {
        $idCarrinho = $this->getOrCreateCarrinhoId($idUsuario);

        // Valida se tem itens
        $chk = $this->conn->prepare("SELECT COUNT(*) FROM produtocarrinho WHERE id_carrinho = :c");
        $chk->execute([':c' => $idCarrinho]);
        if ((int)$chk->fetchColumn() === 0) {
            return ['ok' => false, 'msg' => 'Carrinho vazio'];
        }

        $sql = "INSERT INTO pedido (id_usuario, id_carrinho, id_status, dataPedido) VALUES (:u, :c, :s, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario, ':c' => $idCarrinho, ':s' => (int)$idStatus]);
        $idPedido = (int)$this->conn->lastInsertId();

        return ['ok' => true, 'id_pedido' => $idPedido];
    }

    public function listarPedidos($idUsuario) {
        $sql = "
            SELECT pe.id_pedido, pe.dataPedido, st.tipoStatus, pe.id_carrinho
            FROM pedido pe
            INNER JOIN status st ON st.id_status = pe.id_status
            WHERE pe.id_usuario = :u
            ORDER BY pe.dataPedido DESC, pe.id_pedido DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario]);
        $pedidos = $stmt->fetchAll();

        // Anexa itens de cada pedido a partir do carrinho atrelado
        foreach ($pedidos as &$p) {
            $it = $this->conn->prepare("
                SELECT p.id_produto, p.nome, p.img1, p.preco, p.precoPromo, pc.qntProduto
                FROM produtocarrinho pc
                INNER JOIN produto p ON p.id_produto = pc.id_produto
                WHERE pc.id_carrinho = :c
            ");
            $it->execute([':c' => (int)$p['id_carrinho']]);
            $p['itens'] = $it->fetchAll();
        }

        return $pedidos;
    }

public function BuscarProdutoPorId($id) {
    try {
        $sql = "SELECT p.*, 
                       s.nome AS subcategoria, 
                       c.corPrincipal 
                FROM produto p
                LEFT JOIN subcategoria s ON p.id_subCategoria = s.id_subCategoria
                LEFT JOIN cores c ON p.id_cores = c.id_cores
                WHERE p.id_produto = :id
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}
}
?>