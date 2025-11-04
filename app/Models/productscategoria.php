<?php 

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/categoria.php'; 

class Products {
    
    // CORREÇÃO: Resolve o "Undefined property"
    private $conn;
    private $categoriaModel; 

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
        $this->categoriaModel = new Categoria(); 
    }
    
    /**
     * Busca produtos filtrados pelo slug da Categoria (incluindo categorias especiais)
     * e array de nomes de Subcategorias.
     */
    public function getProdutosFiltrados(string $slugCategoria, array $nomesSubcategorias = []) {
        try {
            
            // ----------------------------------------------------
            // 1. Definição da lógica de filtro primária
            // ----------------------------------------------------
            $filtro_especial = false;
            $order_by = "p.nome ASC"; // Ordem padrão
            $where_especial = "";

            $slug_formatado = strtolower(str_replace('-', '_', $slugCategoria));
            
            // Trata slugs de categorias especiais
            if ($slug_formatado == 'ofertas') {
                $filtro_especial = true;
                $where_especial = " AND p.fgPromocao = 1"; // Filtra apenas produtos em promoção
                $order_by = "p.precoPromo ASC";
            } elseif ($slug_formatado == 'mais_vendidos') {
                $filtro_especial = true;
                $order_by = "p.qtdVendida DESC";
            }
            
            // 2. Query Base
            $sql = "SELECT p.*, c.corPrincipal, c.hexDegrade1, c.hexDegrade2 
                    FROM produto p
                    LEFT JOIN cores c ON p.id_cores = c.id_cores
                    WHERE 1=1"; 
            
            $params = [];
            
            // ----------------------------------------------------
            // 3. Aplicação do filtro da Categoria (Geral ou Especial)
            // ----------------------------------------------------

            if ($filtro_especial) {
                $sql .= $where_especial;

                // Importa o agrupamento usado nas telas normais
                global $categoriasPorTela;

                if (!empty($nomesSubcategorias)) {
                    $ids_subcategorias_filtradas = [];

                    foreach ($nomesSubcategorias as $categoriaSelecionada) {
                        // Exemplo: "Maquiagem" -> ["Olhos", "Sombrancelhas", "Boca", "Pele"]
                        if (isset($categoriasPorTela[$categoriaSelecionada])) {
                            $grupos = $categoriasPorTela[$categoriaSelecionada];

                            // Pega todas as subcategorias dentro dessa categoria
                            foreach ($grupos as $subcats) {
                                $ids = $this->categoriaModel->getIdsSubcategoriasByNomes($subcats);
                                $ids_subcategorias_filtradas = array_merge($ids_subcategorias_filtradas, $ids);
                            }
                        }
                    }

                    if (!empty($ids_subcategorias_filtradas)) {
                        $placeholders_in = implode(',', array_fill(0, count($ids_subcategorias_filtradas), '?'));
                        $sql .= " AND p.id_subCategoria IN ($placeholders_in)";
                        $params = array_merge($params, $ids_subcategorias_filtradas);
                    }
                }

                
            } else {
                // Lógica para CATEGORIAS NORMAIS (Maquiagem, Eletrônicos, etc.)
                
                $id_categoria = $this->categoriaModel->getIdBySlug($slugCategoria);
                
                if (!$id_categoria) {
                    return []; 
                }

                // Aplicação de filtros de Subcategoria (se houver seleção)
                if (!empty($nomesSubcategorias)) {
                    
                    $ids_subcategorias = $this->categoriaModel->getIdsSubcategoriasByNomes($nomesSubcategorias);
                    
                    if (empty($ids_subcategorias)) {
                        return []; 
                    }

                    $placeholders_in = implode(',', array_fill(0, count($ids_subcategorias), '?'));
                    $sql .= " AND p.id_subCategoria IN ({$placeholders_in})";
                    $params = array_merge($params, $ids_subcategorias);
                    
                } else {
                     // Mostrar todos os produtos da Categoria principal (sem filtros de subcategoria)
                     $subcategorias_categoria = $this->categoriaModel->getSubcategoriasBySlug($slugCategoria);
                     
                     $ids_sub_categoria_principal = array_column($subcategorias_categoria, 'id_subCategoria');

                     if (empty($ids_sub_categoria_principal)) {
                        return []; 
                     }
                     
                     $placeholders_cat = implode(',', array_fill(0, count($ids_sub_categoria_principal), '?'));
                     $sql .= " AND p.id_subCategoria IN ({$placeholders_cat})";
                     $params = array_merge($params, $ids_sub_categoria_principal);
                }
            }
            
            // 4. Aplicar Ordem de Busca
            $sql .= " ORDER BY " . $order_by;

            // 5. Preparar e Executar
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            error_log("Erro fatal ao buscar produtos filtrados: " . $th->getMessage());
            return false;
        }
    }
}