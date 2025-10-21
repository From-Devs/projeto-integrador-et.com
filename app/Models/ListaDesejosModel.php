<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/Products.php'; // Import correto da sua classe de produtos

class ListaDeDesejos {
    private $conn;
    private $produtoModel;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
        $this->produtoModel = new Products(); // Instancia correta
    }

    public function listarDesejos($idUsuario) {
        $idUsuario = (int)$idUsuario;
        if (!$idUsuario) return [];

        $sql = "
            SELECT 
                p.id_produto,
                p.nome,
                p.marca,
                p.preco,
                p.precoPromo,
                p.img1,
                p.tamanho,
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
        $stmt->execute([':u' => $idUsuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarDesejo($idUsuario, $idProduto) {
        $idUsuario = (int)$idUsuario;
        if (!$idUsuario) return ['ok' => false, 'msg' => 'Usuário inválido'];

        $produtos = is_array($idProduto) ? $idProduto : [$idProduto];
        $adicionados = 0;

        foreach ($produtos as $p) {
            $p = (int)$p;
            if ($p <= 0) continue;

            // Verifica se o produto existe usando o Products.php
            if (!$this->produtoModel->buscarProdutoPeloId($p)) continue;

            // Verifica se já está na lista
            $sel = $this->conn->prepare("SELECT 1 FROM listadesejos WHERE id_usuario = ? AND id_produto = ?");
            $sel->execute([$idUsuario, $p]);
            if ($sel->fetch()) continue;

            // Insere na lista de desejos
            $ins = $this->conn->prepare("INSERT INTO listadesejos (id_usuario, id_produto, dataAdd) VALUES (?, ?, CURDATE())");
            if ($ins->execute([$idUsuario, $p])) $adicionados++;
        }

        return [
            'ok' => true,
            'msg' => $adicionados > 0 ? "$adicionados produto(s) adicionado(s) à lista de desejos" : "Nenhum produto foi adicionado"
        ];
    }

    public function removerDesejo($idUsuario, $idProduto) {
        $idUsuario = (int)$idUsuario;
        if (!$idUsuario) return ['ok' => false, 'msg' => 'Usuário inválido'];

        if (is_array($idProduto)) {
            $produtos = array_map('intval', $idProduto);
            if (empty($produtos)) return ['ok' => false, 'msg' => 'Nenhum produto selecionado'];
            $placeholders = implode(',', array_fill(0, count($produtos), '?'));
            $stmt = $this->conn->prepare("DELETE FROM listadesejos WHERE id_usuario = ? AND id_produto IN ($placeholders)");
            $stmt->execute(array_merge([$idUsuario], $produtos));
        } else {
            $idProduto = (int)$idProduto;
            if ($idProduto <= 0) return ['ok' => false, 'msg' => 'ID do produto inválido'];
            $stmt = $this->conn->prepare("DELETE FROM listadesejos WHERE id_usuario = ? AND id_produto = ?");
            $stmt->execute([$idUsuario, $idProduto]);
        }

        return ['ok' => true, 'msg' => 'Produto(s) removido(s) da lista de desejos'];
    }
}
?>
