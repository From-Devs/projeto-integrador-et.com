<?php 

require_once __DIR__ . '/../../config/database.php';

class Categoria {
    private $conn;

    public function __construct() {
        // Assume que a classe Database e seu método Connect() estão definidos.
        $db = new Database();
        $this->conn = $db->Connect();
    }
    
    public function getCategoriaAll(){
        $sql = "SELECT * FROM categoria";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByidCategoria($id){
        $stmt = $this->conn->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function delCategoria($id){
        $stmt = $this->conn->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $stmt->execute([$id]);
        // Retorna se alguma linha foi afetada
        return $stmt->rowCount() > 0;
    }

    /**
     * Retorna o ID da Categoria a partir do slug (nome).
     * @param string $slugCategoria
     * @return int|null O ID da categoria ou null se não for encontrada.
     */
    public function getIdBySlug(string $slugCategoria) {
        try {
            // Usamos REPLACE(LOWER(nome), ' ', '_') para simular a criação de um slug
            $sql = "SELECT id_categoria FROM categoria WHERE REPLACE(LOWER(nome), ' ', '_') = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$slugCategoria]);
            $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

            return $categoria ? $categoria['id_categoria'] : null;

        } catch (\Throwable $th) {
            error_log("Erro ao buscar ID da categoria: " . $th->getMessage());
            return false;
        }
    }
    
    /**
     * Busca subcategorias ligadas a uma Categoria principal pelo slug.
     * @param string $slugCategoria
     * @return array|bool Array de subcategorias ou false em caso de erro.
     */
    /**
 * Busca subcategorias ligadas a uma Categoria principal pelo slug.
 * Se o slug for 'ofertas' ou 'mais_vendidos', retorna TODAS as subcategorias.
 */
public function getSubcategoriasBySlug($slugCategoria) {
    
    // 1. Formata o slug para comparação
    $slug_formatado = strtolower(str_replace('-', '_', $slugCategoria));
    
    // 2. Lógica para CATEGORIAS ESPECIAIS (Ofertas, Mais Vendidos)
    if ($slug_formatado == 'ofertas' || $slug_formatado == 'mais_vendidos') {
        // Retorna TODAS as subcategorias ativas para que o painel de filtro apareça
        $sql_all = "SELECT id_subCategoria, nome FROM subcategoria";
        try {
            $stmt_all = $this->conn->prepare($sql_all);
            $stmt_all->execute();
            return $stmt_all->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            error_log("Erro ao buscar TODAS as subcategorias: " . $th->getMessage());
            return [];
        }
    }
    
    // 3. Lógica para CATEGORIAS NORMAIS (Maquiagem, Skincare, etc.)
    try {
        $id_categoria = $this->getIdBySlug($slugCategoria); // Assumindo que este método existe
        
        if (!$id_categoria) {
            return []; // Categoria principal não encontrada
        }

        $sql_subcategorias = "SELECT id_subCategoria, nome FROM subcategoria WHERE id_categoria = ?";
        $stmt_subcategorias = $this->conn->prepare($sql_subcategorias);
        $stmt_subcategorias->execute([$id_categoria]);

        return $stmt_subcategorias->fetchAll(PDO::FETCH_ASSOC);

    } catch (\Throwable $th) {
        error_log("Erro ao buscar subcategorias normais: " . $th->getMessage());
        return [];
    }
}


    public function getIdsSubcategoriasByNomes(array $nomesSubcategorias) {
        if (empty($nomesSubcategorias)) {
            return [];
        }

        try {
            // 1. Criar a string de placeholders (?) para a cláusula IN
            $placeholders = implode(',', array_fill(0, count($nomesSubcategorias), '?'));

            // 2. Construir e preparar a query
            $sql = "SELECT id_subCategoria FROM subcategoria WHERE nome IN ({$placeholders})";
            $stmt = $this->conn->prepare($sql);

            // 3. Executar com o array de nomes
            $stmt->execute($nomesSubcategorias);

            // 4. Retornar um array simples de IDs (apenas a coluna 0)
            $ids = $stmt->fetchAll(PDO::FETCH_COLUMN, 0); 
            
            return $ids;

        } catch (\Throwable $th) {
            error_log("Erro ao buscar IDs das subcategorias: " . $th->getMessage());
            return false;
        }
    }

    
}