<?php
// app/controllers/produtoController.php
require_once __DIR__ . '/../config/database.php';

class ProdutoController {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // =======================
    // === Produtos ==========
    // =======================
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
                s.nome AS subcategoria, c.corPrincipal, c.hexDegrade1, c.hexDegrade2
            FROM produto p
            LEFT JOIN subcategoria s ON s.id_subCategoria = p.id_subCategoria
            LEFT JOIN cores c ON c.id_cores = p.id_cores
            $whereSql
            ORDER BY p.id_produto DESC
            LIMIT :limit OFFSET :offset
        ";
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $k => $v) $stmt->bindValue($k, $v);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $countSql = "SELECT COUNT(*) AS total FROM produto p " . $whereSql;
        $stmt2 = $this->conn->prepare($countSql);
        foreach ($params as $k => $v) $stmt2->bindValue($k, $v);
        $stmt2->execute();
        $total = (int)$stmt2->fetchColumn();

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
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function BuscarProdutoPorId($id) {
        $id = (int)$id;
        if ($id <= 0) return null;
    
        try {
            $sql = "
                SELECT 
                    p.*, 
                    s.nome AS subcategoria, 
                    c.corPrincipal, c.hexDegrade1, c.hexDegrade2
                FROM produto p
                LEFT JOIN subcategoria s ON p.id_subCategoria = s.id_subCategoria
                LEFT JOIN cores c ON p.id_cores = c.id_cores
                WHERE p.id_produto = :id
                LIMIT 1
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
            return $produto ?: null;
        } catch (PDOException $e) {
            return null;
        }
    }
    
    // =======================
    // === Favoritos =========
    // =======================
    public function ListarFavoritos($idUsuario) {
        $sql = "
            SELECT 
                l.id_listaDesejos,
                p.id_produto,
                p.nome,
                p.marca,
                p.preco,
                p.precoPromo,
                p.img1,
                c.corPrincipal,
                c.hexDegrade1,
                c.hexDegrade2,
                l.dataAdd
            FROM listadesejos l
            INNER JOIN produto p ON p.id_produto = l.id_produto
            LEFT JOIN cores c ON c.id_cores = p.id_cores
            WHERE l.id_usuario = :u
            ORDER BY l.dataAdd DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarFavorito($idUsuario, $idProduto) {
        $idProduto = (int)$idProduto;
        $idUsuario = (int)$idUsuario;

        if ($idProduto <= 0 || $idUsuario <= 0) {
            return ['ok' => false, 'msg' => 'IDs inválidos'];
        }

        if (!$this->BuscarProdutoPorId($idProduto)) {
            return ['ok' => false, 'msg' => 'Produto não encontrado'];
        }

        $sel = $this->conn->prepare("SELECT id_listaDesejos FROM listadesejos WHERE id_usuario = :u AND id_produto = :p");
        $sel->execute([':u' => $idUsuario, ':p' => $idProduto]);
        if ($sel->fetch()) {
            return ['ok' => false, 'msg' => 'Produto já está na lista de desejos'];
        }

        $ins = $this->conn->prepare("
            INSERT INTO listadesejos (dataAdd, id_usuario, id_produto)
            VALUES (CURDATE(), :u, :p)
        ");
        $ok = $ins->execute([':u' => $idUsuario, ':p' => $idProduto]);

        return ['ok' => $ok];
    }

    public function removerFavorito($idUsuario, $idProduto) {
        $idUsuario = (int)$idUsuario;
    
        if (!$idUsuario) {
            return ['ok' => false, 'msg' => 'ID do usuário inválido'];
        }
    
        if (is_array($idProduto)) {
            $idProduto = array_map('intval', $idProduto);
            if (empty($idProduto)) {
                return ['ok' => false, 'msg' => 'Nenhum produto selecionado'];
            }
            $placeholders = implode(',', array_fill(0, count($idProduto), '?'));
            $sql = "DELETE FROM listadesejos WHERE id_usuario = ? AND id_produto IN ($placeholders)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_merge([$idUsuario], $idProduto));
        } else {
            $idProduto = (int)$idProduto;
            if ($idProduto <= 0) {
                return ['ok' => false, 'msg' => 'ID do produto inválido'];
            }
            $sql = "DELETE FROM listadesejos WHERE id_usuario = ? AND id_produto = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$idUsuario, $idProduto]);
        }
    
        return ['ok' => true, 'msg' => 'Produto(s) removido(s) da lista de desejos'];
    }

    // =======================
    // === Carrinho ==========
    // =======================
    public function listarCarrinho($idUsuario) {
        $sql = "
            SELECT c.id_carrinho, c.id_produto, c.quantidade, c.data_adicionado,
                   p.nome, p.preco, p.precoPromo, p.img1
            FROM carrinho c
            INNER JOIN produto p ON p.id_produto = c.id_produto
            WHERE c.id_usuario = :u
            ORDER BY c.data_adicionado DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $total = 0.0;
        foreach ($items as $it) {
            $valor = $it['precoPromo'] !== null ? (float)$it['precoPromo'] : (float)$it['preco'];
            $total += $valor * (int)$it['quantidade'];
        }

        return ['items' => $items, 'total' => $total];
    }

    public function adicionarAoCarrinho($idUsuario, $idProduto, $qtd = 1) {
        $idUsuario = (int)$idUsuario;
    
        if (!$idUsuario) {
            return ['ok' => false, 'msg' => 'ID do usuário inválido'];
        }
    
        if (is_array($idProduto)) {
            $idProduto = array_map('intval', $idProduto);
            foreach ($idProduto as $p) {
                if (!$this->BuscarProdutoPorId($p)) continue;
    
                // Verifica se já está no carrinho
                $sel = $this->conn->prepare("SELECT id_carrinho, quantidade FROM carrinho WHERE id_usuario = ? AND id_produto = ?");
                $sel->execute([$idUsuario, $p]);
                $row = $sel->fetch(PDO::FETCH_ASSOC);
    
                if ($row) {
                    $novaQtd = (int)$row['quantidade'] + (int)$qtd;
                    $upd = $this->conn->prepare("UPDATE carrinho SET quantidade = ? WHERE id_carrinho = ?");
                    $upd->execute([$novaQtd, (int)$row['id_carrinho']]);
                } else {
                    $ins = $this->conn->prepare("INSERT INTO carrinho (id_usuario, id_produto, quantidade, data_adicionado) VALUES (?, ?, ?, NOW())");
                    $ins->execute([$idUsuario, $p, (int)$qtd]);
                }
            }
        } else {
            $idProduto = (int)$idProduto;
            if (!$this->BuscarProdutoPorId($idProduto)) {
                return ['ok' => false, 'msg' => 'Produto não encontrado'];
            }
    
            $sel = $this->conn->prepare("SELECT id_carrinho, quantidade FROM carrinho WHERE id_usuario = ? AND id_produto = ?");
            $sel->execute([$idUsuario, $idProduto]);
            $row = $sel->fetch(PDO::FETCH_ASSOC);
    
            if ($row) {
                $novaQtd = (int)$row['quantidade'] + (int)$qtd;
                $upd = $this->conn->prepare("UPDATE carrinho SET quantidade = ? WHERE id_carrinho = ?");
                $upd->execute([$novaQtd, (int)$row['id_carrinho']]);
            } else {
                $ins = $this->conn->prepare("INSERT INTO carrinho (id_usuario, id_produto, quantidade, data_adicionado) VALUES (?, ?, ?, NOW())");
                $ins->execute([$idUsuario, $idProduto, (int)$qtd]);
            }
        }
    
        return ['ok' => true, 'msg' => 'Produto(s) adicionado(s) ao carrinho'];
    }

    public function atualizarQuantidade($idUsuario, $idProduto, $qtd) {
        if ((int)$qtd <= 0) {
            $del = $this->conn->prepare("DELETE FROM carrinho WHERE id_usuario = :u AND id_produto = :p");
            $del->execute([':u' => (int)$idUsuario, ':p' => (int)$idProduto]);
        } else {
            $upd = $this->conn->prepare("UPDATE carrinho SET quantidade = :q WHERE id_usuario = :u AND id_produto = :p");
            $upd->execute([':q' => (int)$qtd, ':u' => (int)$idUsuario, ':p' => (int)$idProduto]);
        }
        return ['ok' => true];
    }

    public function removerDoCarrinho($idUsuario, $idProduto) {
        $del = $this->conn->prepare("DELETE FROM carrinho WHERE id_usuario = :u AND id_produto = :p");
        $del->execute([':u' => (int)$idUsuario, ':p' => (int)$idProduto]);
        return ['ok' => true];
    }

    // =======================
    // === Pedidos ===========
    // =======================
    public function criarPedido($idUsuario, $idStatus = 1) {
        $chk = $this->conn->prepare("SELECT COUNT(*) FROM carrinho WHERE id_usuario = :u");
        $chk->execute([':u' => (int)$idUsuario]);
        if ((int)$chk->fetchColumn() === 0) {
            return ['ok' => false, 'msg' => 'Carrinho vazio'];
        }

        $sql = "INSERT INTO pedido (id_usuario, id_status, dataPedido) VALUES (:u, :s, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario, ':s' => (int)$idStatus]);
        $idPedido = (int)$this->conn->lastInsertId();

        return ['ok' => true, 'id_pedido' => $idPedido];
    }

    public function listarPedidos($idUsuario) {
        $sql = "
            SELECT pe.id_pedido, pe.dataPedido, st.tipoStatus
            FROM pedido pe
            INNER JOIN status st ON st.id_status = pe.id_status
            WHERE pe.id_usuario = :u
            ORDER BY pe.dataPedido DESC, pe.id_pedido DESC
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':u' => (int)$idUsuario]);
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pedidos as &$p) {
            $it = $this->conn->prepare("
                SELECT p.id_produto, p.nome, p.img1, p.preco, p.precoPromo, c.quantidade
                FROM carrinho c
                INNER JOIN produto p ON p.id_produto = c.id_produto
                WHERE c.id_usuario = :u
            ");
            $it->execute([':u' => (int)$idUsuario]);
            $p['itens'] = $it->fetchAll(PDO::FETCH_ASSOC);
        }

        return $pedidos;
    }
}
?>
