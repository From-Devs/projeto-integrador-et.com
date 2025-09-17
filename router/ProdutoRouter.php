<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/CoresModel.php';

class ProdutoModel {
    protected PDO $conn;
    protected string $table;
    protected string $primaryKey;

    public function __construct(string $table = 'produto', string $primaryKey = 'id_produto') {
        $db = new Database();
        $this->conn = $db->Connect();
        $this->table = $table;
        $this->primaryKey = $primaryKey;
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
            $imagem1 = $this->salvarImagem('img1', $files) ?? 'uploads/default.jpg';
            $imagem2 = $this->salvarImagem('img2', $files);
            $imagem3 = $this->salvarImagem('img3', $files);

            // 3. Inserir produto
            $stmtProduto = $this->conn->prepare(
                "INSERT INTO produto 
                 (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, qtdEstoque,
                  img1, img2, img3, id_subCategoria, id_cores, id_associado, fgPromocao)
                 VALUES
                 (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :qtdEstoque,
                  :img1, :img2, :img3, :id_subCategoria, :id_cores, :id_associado, :fgPromocao)"
            );

            $resposta = $stmtProduto->execute([
                ':nome' => $dados['nome'],
                ':marca' => $dados['marca'],
                ':descricaoBreve' => $dados['descricaoBreve'],
                ':descricaoTotal' => $dados['descricaoTotal'],
                ':preco' => $dados['preco'],
                ':precoPromo' => $dados['precoPromo'],
                ':qtdEstoque' => $dados['qtdEstoque'],
                ':img1' => $imagem1,
                ':img2' => $imagem2,
                ':img3' => $imagem3,
                ':id_subCategoria' => $dados['id_subCategoria'],
                ':id_cores' => $idCores,
                ':id_associado' => $dados['id_associado'] ?? null,
                ':fgPromocao' => $dados['fgPromocao']
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

    private function salvarImagem(string $inputName, array $files, string $diretorio = 'public/uploads'): ?string {
        if (!isset($files[$inputName]) || $files[$inputName]['error'] !== UPLOAD_ERR_OK) return null;
        $arquivo = $files[$inputName];
        $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png','gif'])) return null;

        $nomeArquivo = time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
        $caminhoDestino = __DIR__ . '/../../' . $diretorio . '/' . $nomeArquivo;
        if (!is_dir(dirname($caminhoDestino))) mkdir(dirname($caminhoDestino), 0777, true);
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) return null;
        return $diretorio . '/' . $nomeArquivo;
    }

    public function getAllSubCategorias(): array {
        $stmt = $this->conn->query("SELECT * FROM subcategoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCategorias(): array {
        $stmt = $this->conn->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
