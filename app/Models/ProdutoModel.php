<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/CoresModel.php'; // para associar cores

class ProdutoModel {
    protected PDO $conn;
    protected string $table;
    protected string $primaryKey;
    protected CoresModel $coresModel;

    public function __construct(string $table = 'produto', string $primaryKey = 'id_produto') {
        $this->table = $table;
        $this->primaryKey = $primaryKey;
        $db = new Database();
        $this->conn = $db->Connect();
        $this->coresModel = new CoresModel();
    }

    /** Retorna todos os produtos */
    public function getAll(): array {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Retorna produto por ID ou null */
    public function getById(int $id): ?array {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /** Verifica se produto existe */
    public function exists(int $id): bool {
        $stmt = $this->conn->prepare("SELECT 1 FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return (bool) $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criarProduto(array $data, array $files): bool {
        try {
            $this->conn->beginTransaction();
    
            // --- 1. Criar cores se necessário ---
            $sqlCores = "INSERT INTO cores (corPrincipal, hexDegrade1, hexDegrade2) 
                         VALUES (:corPrincipal, :hex1, :hex2)";
            $stmtCores = $this->conn->prepare($sqlCores);
            $stmtCores->bindParam(':corPrincipal', $data['corPrincipal']);
            $stmtCores->bindParam(':hex1', $data['hex1']);
            $stmtCores->bindParam(':hex2', $data['hex2']);
            $stmtCores->execute();
            $idCores = $this->conn->lastInsertId();
    
            // --- 2. Salvar imagens ---
            $imagem1 = $this->salvarImagem('img1', $files) ?? 'uploads/default.jpg';
            $imagem2 = $this->salvarImagem('img2', $files) ?? null;
            $imagem3 = $this->salvarImagem('img3', $files) ?? null;
    
            // --- 3. Inserir produto ---
            $sqlProduto = "INSERT INTO produto 
                (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, fgPromocao, qtdEstoque, 
                 img1, img2, img3, id_subCategoria, id_cores, id_associado)
                VALUES 
                (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :fgPromocao, :qtdEstoque,
                 :img1, :img2, :img3, :id_subCategoria, :id_cores, :id_associado)";
            
            $stmtProduto = $this->conn->prepare($sqlProduto);
            $stmtProduto->bindParam(':nome', $data['nome']);
            $stmtProduto->bindParam(':marca', $data['marca']);
            $stmtProduto->bindParam(':descricaoBreve', $data['descricaoBreve']);
            $stmtProduto->bindParam(':descricaoTotal', $data['descricaoTotal']);
            $stmtProduto->bindParam(':preco', $data['preco']);
            $stmtProduto->bindParam(':precoPromo', $data['precoPromo']);
            $stmtProduto->bindParam(':fgPromocao', $data['fgPromocao'], PDO::PARAM_INT);
            $stmtProduto->bindParam(':qtdEstoque', $data['qtdEstoque'], PDO::PARAM_INT);
            $stmtProduto->bindParam(':img1', $imagem1);
            $stmtProduto->bindParam(':img2', $imagem2);
            $stmtProduto->bindParam(':img3', $imagem3);
            $stmtProduto->bindParam(':id_subCategoria', $data['id_subCategoria']);
            $stmtProduto->bindParam(':id_cores', $idCores);
            $stmtProduto->bindValue(':id_associado', $data['id_associado'] ?? null);
    
            $resposta = $stmtProduto->execute();
    
            if ($resposta) {
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                return false;
            }
    
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            error_log("Erro ao criar produto: " . $th->getMessage());
            return false;
        }
    }
    
    /**
     * Salva imagens com validação e nomes únicos
     */
    private function salvarImagem(string $inputName, array $files, string $diretorio = 'public/uploads'): ?string {
        if (!isset($files[$inputName]) || $files[$inputName]['error'] !== UPLOAD_ERR_OK) return null;

        $arquivo = $files[$inputName];
        $extensoesValidas = ['jpg','jpeg','png','gif'];
        $ext = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $extensoesValidas)) return null;

        $nomeArquivo = time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
        $caminhoDestino = __DIR__ . '/../../' . $diretorio . '/' . $nomeArquivo;

        if (!is_dir(dirname($caminhoDestino))) mkdir(dirname($caminhoDestino), 0777, true);
        if (!move_uploaded_file($arquivo['tmp_name'], $caminhoDestino)) return null;

        return $diretorio . '/' . $nomeArquivo;
    }
}
