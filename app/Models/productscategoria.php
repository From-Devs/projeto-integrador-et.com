<?php 

// Garante que o arquivo de configuração do banco e o modelo de Categoria sejam incluídos
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/categoria.php'; 

class Products {
    
    // **CORREÇÃO: ESTAS LINHAS SÃO OBRIGATÓRIAS PARA RESOLVER O ERRO DE PROPRIEDADE INDEFINIDA**
    private $conn;
    private $categoriaModel; 

    public function __construct() {
        // Inicializa a conexão com o banco de dados
        $db = new Database();
        $this->conn = $db->Connect();
        // Inicializa o modelo de Categoria
        $this->categoriaModel = new Categoria(); 
    }
    
    /**
     * Busca produtos filtrados pelo slug da Categoria e array de nomes de Subcategorias.
     * @param string $slugCategoria O slug da categoria principal.
     * @param array $nomesSubcategorias Array de nomes de subcategorias selecionadas (filtros).
     * @return array|bool Array de produtos (FETCH_ASSOC) ou false em caso de erro.
     */
// No arquivo Models/productscategoria.php, substitua o método getProdutosFiltrados()
// pelo código abaixo para garantir o escopo das variáveis.

public function getProdutosFiltrados(string $slugCategoria, array $nomesSubcategorias = []) {
    try {
        
        // 1. Obter o ID da Categoria principal
        $id_categoria = $this->categoriaModel->getIdBySlug($slugCategoria);
        

        if (!$id_categoria) {
            return []; 
        }

        // 2. Inicializar a query base e a lista de parâmetros ANTES DO IF/ELSE
        $sql = "SELECT p.*, c.corPrincipal, c.hexDegrade1, c.hexDegrade2 
                FROM produto p
                -- A tabela PRODUTO usa id_cores para linkar com a tabela CORES
                LEFT JOIN cores c ON p.id_cores = c.id_cores
                WHERE 1=1"; 
                
        $params = []; 
        
        $params = [];
        
        // 3. Aplicação dos Filtros (ADICIONA CONDIÇÃO E PARÂMETROS ÀS VARIÁVEIS JÁ EXISTENTES)
        if (!empty($nomesSubcategorias)) {
            
            $ids_subcategorias = $this->categoriaModel->getIdsSubcategoriasByNomes($nomesSubcategorias);

            if (empty($ids_subcategorias)) {
                return []; 
            }

            $placeholders_in = implode(',', array_fill(0, count($ids_subcategorias), '?'));

            $sql .= " AND p.id_subCategoria IN ({$placeholders_in})";
            $params = array_merge($params, $ids_subcategorias);
            
        } else {
             // 4. Mostrar todos os produtos da Categoria principal (sem filtros)
             
             $subcategorias_categoria = $this->categoriaModel->getSubcategoriasBySlug($slugCategoria);
             
             $ids_sub_categoria_principal = array_column($subcategorias_categoria, 'id_subCategoria');

             if (empty($ids_sub_categoria_principal)) {
                return []; 
             }
             
             $placeholders_cat = implode(',', array_fill(0, count($ids_sub_categoria_principal), '?'));
             
             // ADICIONA CONDIÇÃO E PARÂMETROS ÀS VARIÁVEIS JÁ EXISTENTES
             $sql .= " AND p.id_subCategoria IN ({$placeholders_cat})";
             $params = array_merge($params, $ids_sub_categoria_principal);
        }


        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (\Throwable $th) {
        // ... (Seu tratamento de erro)
        error_log("Erro fatal ao buscar produtos filtrados: " . $th->getMessage());
        return false;
    }
}
}