<?php
require_once __DIR__ . '/../../config/database.php';

class ProdutoModel {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function criarProduto(array $dados, array $files): bool {
        try {
            $this->conn->beginTransaction();

            // 1. Criar cores
            $stmtCores = $this->conn->prepare(
                "INSERT INTO cores (corPrincipal, hexDegrade1, hexDegrade2)
                 VALUES (:corPrincipal, :hex1, :hex2)"
            );
            $stmtCores->execute([
                ':corPrincipal' => $dados['corPrincipal'],
                ':hex1' => $dados['hex1'],
                ':hex2' => $dados['hex2']
            ]);
            $idCores = $this->conn->lastInsertId();

            // 2. Salvar imagens
            $img1 = $this->salvarImagem('img1', $files);
            $img2 = $this->salvarImagem('img2', $files);
            $img3 = $this->salvarImagem('img3', $files);

            // 3. Inserir produto
            $stmtProduto = $this->conn->prepare(
                "INSERT INTO produto
                 (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, fgPromocao,
                  qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado)
                 VALUES
                 (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :fgPromocao,
                  :qtdEstoque, :img1, :img2, :img3, :id_subCategoria, :id_cores, :id_associado)"
            );

            $resposta = $stmtProduto->execute([
                ':nome' => $dados['nome'],
                ':marca' => $dados['marca'],
                ':descricaoBreve' => $dados['descricaoBreve'],
                ':descricaoTotal' => $dados['descricaoTotal'],
                ':preco' => $dados['preco'],
                ':precoPromo' => $dados['precoPromo'],
                ':fgPromocao' => $dados['fgPromocao'],
                ':qtdEstoque' => $dados['qtdEstoque'],
                ':img1' => $img1,
                ':img2' => $img2,
                ':img3' => $img3,
                ':id_subCategoria' => $dados['id_subCategoria'],
                ':id_cores' => $idCores,
                ':id_associado' => $dados['id_associado'] ?? null
            ]);

            if ($resposta) {
                $this->conn->commit();
                return true;
            }

            $this->conn->rollBack();
            return false;

        } catch (\Throwable $e) {
            $this->conn->rollBack();
            error_log("Erro ao criar produto: " . $e->getMessage());
            return false;
        }
    }

    public function editarProduto(int $id, array $dados, array $files = []): bool {
        try {
            $this->conn->beginTransaction();

            // Pega id_cores do produto
            $stmtGetCores = $this->conn->prepare("SELECT id_cores FROM produto WHERE id_produto = :id");
            $stmtGetCores->execute([':id' => $id]);
            $idCores = $stmtGetCores->fetchColumn();

            if ($idCores) {
                $stmtCores = $this->conn->prepare(
                    "UPDATE cores SET corPrincipal=:corPrincipal, hexDegrade1=:hex1, hexDegrade2=:hex2
                     WHERE id_cores=:idCores"
                );
                $stmtCores->execute([
                    ':corPrincipal' => $dados['corPrincipal'],
                    ':hex1' => $dados['hex1'],
                    ':hex2' => $dados['hex2'],
                    ':idCores' => $idCores
                ]);
            }

            $img1 = $this->salvarImagem('img1', $files) ?? $dados['img1'] ?? null;
            $img2 = $this->salvarImagem('img2', $files) ?? $dados['img2'] ?? null;
            $img3 = $this->salvarImagem('img3', $files) ?? $dados['img3'] ?? null;

            $stmtProduto = $this->conn->prepare(
                "UPDATE produto SET 
                    nome=:nome, marca=:marca, descricaoBreve=:descricaoBreve, descricaoTotal=:descricaoTotal,
                    preco=:preco, precoPromo=:precoPromo, fgPromocao=:fgPromocao, qtdEstoque=:qtdEstoque,
                    img1=:img1, img2=:img2, img3=:img3
                 WHERE id_produto=:id"
            );

            $resposta = $stmtProduto->execute([
                ':nome' => $dados['nome'],
                ':marca' => $dados['marca'],
                ':descricaoBreve' => $dados['descricaoBreve'],
                ':descricaoTotal' => $dados['descricaoTotal'],
                ':preco' => $dados['preco'],
                ':precoPromo' => $dados['precoPromo'],
                ':fgPromocao' => $dados['fgPromocao'],
                ':qtdEstoque' => $dados['qtdEstoque'],
                ':img1' => $img1,
                ':img2' => $img2,
                ':img3' => $img3,
                ':id' => $id
            ]);

            if ($resposta) {
                $this->conn->commit();
                return true;
            }

            $this->conn->rollBack();
            return false;

        } catch (\Throwable $e) {
            $this->conn->rollBack();
            error_log("Erro ao editar produto: " . $e->getMessage());
            return false;
        }
    }

    public function removerProduto(int $id): bool {
        try {
            $stmt = $this->conn->prepare("DELETE FROM produto WHERE id_produto = :id");
            return $stmt->execute([':id' => $id]);
        } catch (\Throwable $e) {
            error_log("Erro ao remover produto: " . $e->getMessage());
            return false;
        }
    }

    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare(
            "SELECT P.*, C.corPrincipal, C.hexDegrade1, C.hexDegrade2 
             FROM produto P
             JOIN cores C ON P.id_cores=C.id_cores
             WHERE P.id_produto=:id"
        );
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function getAll(): array {
        $stmt = $this->conn->query("SELECT * FROM produto");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function salvarImagem(string $inputName, array $files): ?string {
        if (!isset($files[$inputName]) || $files[$inputName]['error'] !== UPLOAD_ERR_OK) return null;
        $ext = strtolower(pathinfo($files[$inputName]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png','gif'])) return null;

        $nomeArquivo = time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
        $caminhoDestino = __DIR__ . '/../../public/uploads/' . $nomeArquivo;
        if (!is_dir(dirname($caminhoDestino))) mkdir(dirname($caminhoDestino), 0777, true);
        if (!move_uploaded_file($files[$inputName]['tmp_name'], $caminhoDestino)) return null;
        return 'public/uploads/' . $nomeArquivo;
        
    }
}
