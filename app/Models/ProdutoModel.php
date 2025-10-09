<?php
// models/ProdutoModel.php

require_once __DIR__ . '/../../config/database.php';

// Definir constantes para upload
if (!defined('ALLOWED_EXTENSIONS')) {
    define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif']);
}
if (!defined('UPLOAD_DIR')) {
    define('UPLOAD_DIR', __DIR__ . '/../../public/uploads/');
}
if (!defined('MAX_FILE_SIZE')) {
    define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
}

/**
 * Classe ProdutoModel
 * Gerencia operações CRUD para produtos, incluindo cores e imagens, com suporte a transações PDO.
 */
class ProdutoModel
{
    private PDO $conn;

    /**
     * Construtor da classe ProdutoModel
     * Inicializa a conexão com o banco de dados usando PDO.
     */
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->Connect();
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Cria um novo produto, suas cores e salva imagens em uma transação.
     * @param array $data Dados do produto (nome, marca, preco, etc.).
     * @param array $files Array $_FILES com imagens.
     * @return array Retorna ['success' => bool, 'message' => string, 'id' => ?int]
     * @throws Exception Em caso de erro na transação ou validação.
     */
    public function create(array $data, array $files = []): array
    {
        try {
            // Validação básica
            $requiredFields = ['nome', 'marca', 'preco', 'qtdEstoque', 'id_subCategoria', 'corPrincipal'];
            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    throw new Exception("O campo '$field' é obrigatório.");
                }
            }
            if ($data['preco'] < 0) {
                throw new Exception('O preço deve ser um número positivo.');
            }
            if ($data['qtdEstoque'] < 0) {
                throw new Exception('O estoque deve ser um número não negativo.');
            }

            $this->conn->beginTransaction();

            // Inserir cores
            $stmtCores = $this->conn->prepare(
                "INSERT INTO cores (corPrincipal, hexDegrade1, hexDegrade2) 
                VALUES (:corPrincipal, :hex1, :hex2)"
            );
            $stmtCores->execute([
                ':corPrincipal' => $data['corPrincipal'],
                ':hex1' => $data['hex1'] ?? null,
                ':hex2' => $data['hex2'] ?? null
            ]);
            $idCores = $this->conn->lastInsertId();

            // Salvar imagens
            $img1 = $this->salvarImagem('img1', $files) ?? null;
            $img2 = $this->salvarImagem('img2', $files) ?? null;
            $img3 = $this->salvarImagem('img3', $files) ?? null;

            // Inserir produto
            $stmtProduto = $this->conn->prepare(
                "INSERT INTO produto 
                (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, fgPromocao, 
                 qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado) 
                VALUES 
                (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :fgPromocao, 
                 :qtdEstoque, :img1, :img2, :img3, :id_subCategoria, :id_cores, :id_associado)"
            );

            $params = [
                ':nome' => $data['nome'],
                ':marca' => $data['marca'],
                ':descricaoBreve' => $data['descricaoBreve'] ?? null,
                ':descricaoTotal' => $data['descricaoTotal'] ?? null,
                ':preco' => $data['preco'],
                ':precoPromo' => $data['precoPromo'] ?? 0,
                ':fgPromocao' => isset($data['fgPromocao']) ? (int)$data['fgPromocao'] : 0,
                ':qtdEstoque' => (int)$data['qtdEstoque'],
                ':img1' => $img1,
                ':img2' => $img2,
                ':img3' => $img3,
                ':id_subCategoria' => (int)$data['id_subCategoria'],
                ':id_cores' => $idCores,
                ':id_associado' => isset($data['id_associado']) ? (int)$data['id_associado'] : null
            ];

            if ($stmtProduto->execute($params)) {
                $idProduto = $this->conn->lastInsertId();
                $this->conn->commit();
                return [
                    'success' => true,
                    'message' => 'Produto criado com sucesso.',
                    'id' => $idProduto
                ];
            }

            throw new Exception('Falha ao inserir produto no banco de dados.');
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erro ao criar produto: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erro ao criar produto: ' . $e->getMessage(),
                'id' => null
            ];
        }
    }

    /**
     * Edita um produto existente, atualizando cores e imagens.
     * Remove imagens antigas se novas forem enviadas.
     * @param int $id ID do produto.
     * @param array $data Dados do produto.
     * @param array $files Array $_FILES com imagens.
     * @return array Retorna ['success' => bool, 'message' => string]
     * @throws Exception Em caso de erro na transação ou validação.
     */
    public function editarProduto(int $id, array $data, array $files = []): array
    {
        try {
            // Validação básica
            $requiredFields = ['nome', 'marca', 'preco', 'qtdEstoque', 'id_subCategoria', 'corPrincipal'];
            foreach ($requiredFields as $field) {
                if (empty($data[$field])) {
                    throw new Exception("O campo '$field' é obrigatório.");
                }
            }
            if ($data['preco'] < 0) {
                throw new Exception('O preço deve ser um número positivo.');
            }
            if ($data['qtdEstoque'] < 0) {
                throw new Exception('O estoque deve ser um número não negativo.');
            }

            $this->conn->beginTransaction();

            // Buscar produto para obter imagens antigas
            $produtoAtual = $this->getById($id);
            if (!$produtoAtual) {
                throw new Exception('Produto não encontrado.');
            }

            // Buscar ID de cores associado
            $idCores = $produtoAtual['id_cores'];
            if (!$idCores) {
                throw new Exception('Produto sem cores associadas.');
            }

            // Atualizar cores
            $stmtCores = $this->conn->prepare(
                "UPDATE cores 
                SET corPrincipal = :corPrincipal, hexDegrade1 = :hex1, hexDegrade2 = :hex2 
                WHERE id_cores = :idCores"
            );
            $stmtCores->execute([
                ':corPrincipal' => $data['corPrincipal'],
                ':hex1' => $data['hex1'] ?? null,
                ':hex2' => $data['hex2'] ?? null,
                ':idCores' => $idCores
            ]);

            // Atualizar imagens, removendo as antigas se novas forem enviadas
            $img1 = $this->salvarImagem('img1', $files);
            if ($img1 && !empty($produtoAtual['img1'])) {
                $this->deletarImagem($produtoAtual['img1']);
            }
            $img1 = $img1 ?? $produtoAtual['img1'] ?? null;

            $img2 = $this->salvarImagem('img2', $files);
            if ($img2 && !empty($produtoAtual['img2'])) {
                $this->deletarImagem($produtoAtual['img2']);
            }
            $img2 = $img2 ?? $produtoAtual['img2'] ?? null;

            $img3 = $this->salvarImagem('img3', $files);
            if ($img3 && !empty($produtoAtual['img3'])) {
                $this->deletarImagem($produtoAtual['img3']);
            }
            $img3 = $img3 ?? $produtoAtual['img3'] ?? null;

            // Atualizar produto
            $stmtProduto = $this->conn->prepare(
                "UPDATE produto 
                SET nome = :nome, marca = :marca, descricaoBreve = :descricaoBreve, 
                    descricaoTotal = :descricaoTotal, preco = :preco, precoPromo = :precoPromo, 
                    fgPromocao = :fgPromocao, qtdEstoque = :qtdEstoque, 
                    img1 = :img1, img2 = :img2, img3 = :img3, 
                    id_subCategoria = :id_subCategoria, id_associado = :id_associado 
                WHERE id_produto = :id"
            );

            $params = [
                ':nome' => $data['nome'],
                ':marca' => $data['marca'],
                ':descricaoBreve' => $data['descricaoBreve'] ?? null,
                ':descricaoTotal' => $data['descricaoTotal'] ?? null,
                ':preco' => $data['preco'],
                ':precoPromo' => $data['precoPromo'] ?? 0,
                ':fgPromocao' => isset($data['fgPromocao']) ? (int)$data['fgPromocao'] : 0,
                ':qtdEstoque' => (int)$data['qtdEstoque'],
                ':img1' => $img1,
                ':img2' => $img2,
                ':img3' => $img3,
                ':id_subCategoria' => (int)$data['id_subCategoria'],
                ':id_associado' => isset($data['id_associado']) ? (int)$data['id_associado'] : null,
                ':id' => $id
            ];

            if ($stmtProduto->execute($params)) {
                $this->conn->commit();
                return [
                    'success' => true,
                    'message' => 'Produto atualizado com sucesso.'
                ];
            }

            throw new Exception('Falha ao atualizar produto no banco de dados.');
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erro ao editar produto ID $id: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erro ao editar produto: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Remove um produto pelo ID e suas imagens associadas.
     * @param int $id ID do produto.
     * @return array Retorna ['success' => bool, 'message' => string]
     * @throws Exception Em caso de erro na exclusão.
     */
    public function remove(int $id): array
    {
        try {
            $this->conn->beginTransaction();

            // Buscar imagens do produto
            $produto = $this->getById($id);
            if (!$produto) {
                throw new Exception('Produto não encontrado.');
            }

            // Deletar imagens do sistema de arquivos
            foreach (['img1', 'img2', 'img3'] as $imgField) {
                if (!empty($produto[$imgField])) {
                    $this->deletarImagem($produto[$imgField]);
                }
            }

            // Deletar produto
            $stmt = $this->conn->prepare("DELETE FROM produto WHERE id_produto = :id");
            $success = $stmt->execute([':id' => $id]);

            if ($success && $stmt->rowCount() > 0) {
                $this->conn->commit();
                return [
                    'success' => true,
                    'message' => 'Produto e imagens removidos com sucesso.'
                ];
            }

            throw new Exception('Produto não encontrado ou já removido.');
        } catch (Exception $e) {
            $this->conn->rollBack();
            error_log("Erro ao remover produto ID $id: " . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Erro ao remover produto: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Busca um produto pelo ID, incluindo cores e subcategoria.
     * @param int $id ID do produto.
     * @return array|null Produto encontrado ou null.
     */
    public function getById(int $id): ?array
    {
        try {
            $stmt = $this->conn->prepare(
                "SELECT 
                    P.*, 
                    C.corPrincipal, C.hexDegrade1 AS hex1, C.hexDegrade2 AS hex2, 
                    SC.nome AS nome_subCategoria 
                FROM produto P 
                JOIN cores C ON P.id_cores = C.id_cores 
                LEFT JOIN subcategoria SC ON P.id_subCategoria = SC.id_subCategoria 
                WHERE P.id_produto = :id"
            );
            $stmt->execute([':id' => $id]);
            return $stmt->fetch() ?: null;
        } catch (Exception $e) {
            error_log("Erro ao buscar produto ID $id: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Retorna todos os produtos, com filtros opcionais de pesquisa e ordenação.
     * @param string $ordem Campo para ordenar (nome, preco, estoque).
     * @param string $pesquisa Texto para filtro por nome ou marca.
     * @return array Lista de produtos.
     */
    public function getAll(string $ordem = '', string $pesquisa = ''): array
    {
        try {
            $sql = "SELECT P.*, C.corPrincipal 
                    FROM produto P 
                    JOIN cores C ON P.id_cores = C.id_cores";
            $params = [];
            $where = [];

            if (!empty($pesquisa)) {
                $where[] = "(P.nome LIKE :pesquisa OR P.marca LIKE :pesquisa)";
                $params[':pesquisa'] = '%' . $pesquisa . '%';
            }

            if (!empty($where)) {
                $sql .= ' WHERE ' . implode(' AND ', $where);
            }

            if (!empty($ordem)) {
                $allowedOrders = [
                    'preco' => 'P.preco',
                    'nome' => 'P.nome',
                    'estoque' => 'P.qtdEstoque'
                ];
                $orderField = $allowedOrders[strtolower($ordem)] ?? 'P.id_produto';
                $sql .= " ORDER BY $orderField";
            } else {
                $sql .= ' ORDER BY P.id_produto DESC';
            }

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Erro ao buscar produtos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Retorna todas as subcategorias disponíveis.
     * @return array Lista de subcategorias.
     */
    public function getAllSubcategorias(): array
    {
        try {
            $stmt = $this->conn->prepare("SELECT id_subCategoria, nome FROM subcategoria");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Erro ao buscar subcategorias: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Salva uma imagem no servidor e retorna o caminho relativo.
     * @param string $inputName Nome do input do arquivo ($_FILES).
     * @param array $files Array $_FILES.
     * @return string|null Caminho da imagem ou null se não enviada.
     * @throws Exception Se a extensão não for permitida ou falhar o upload.
     */
    private function salvarImagem(string $inputName, array $files): ?string
    {
        if (!isset($files[$inputName]) || $files[$inputName]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $files[$inputName];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif'];

        // Validar tamanho e tipo MIME
        if ($file['size'] > MAX_FILE_SIZE) {
            throw new Exception("Arquivo '$inputName' excede o tamanho máximo de " . (MAX_FILE_SIZE / 1024 / 1024) . "MB.");
        }
        if (!in_array($file['type'], $allowedMimes) || !in_array($ext, ALLOWED_EXTENSIONS)) {
            throw new Exception("Extensão ou tipo de arquivo '$ext' não permitido para '$inputName'.");
        }

        $nomeArquivo = time() . '_' . bin2hex(random_bytes(5)) . '.' . $ext;
        $caminhoDestino = UPLOAD_DIR . $nomeArquivo;

        if (!is_dir(UPLOAD_DIR)) {
            mkdir(UPLOAD_DIR, 0777, true);
        }

        if (!move_uploaded_file($file['tmp_name'], $caminhoDestino)) {
            throw new Exception("Falha ao salvar a imagem '$inputName'.");
        }

        return 'public/uploads/' . $nomeArquivo;
    }

    /**
     * Remove uma imagem do sistema de arquivos.
     * @param string $caminhoRelativo Caminho relativo da imagem (ex.: 'public/uploads/nome.jpg').
     * @return bool Indica se a imagem foi removida com sucesso.
     */
    private function deletarImagem(string $caminhoRelativo): bool
    {
        // Garantir que o caminho está dentro do diretório de uploads
        if (strpos($caminhoRelativo, 'public/uploads/') !== 0) {
            error_log("Tentativa de deletar imagem fora do diretório permitido: $caminhoRelativo");
            return false;
        }

        $caminhoAbsoluto = UPLOAD_DIR . basename($caminhoRelativo);
        if (file_exists($caminhoAbsoluto) && is_file($caminhoAbsoluto)) {
            return unlink($caminhoAbsoluto);
        }
        return false;
    }
}
?>