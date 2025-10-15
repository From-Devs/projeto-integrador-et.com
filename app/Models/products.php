<?php
require_once __DIR__ . '/../../config/database.php';

class Products {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function RemoverProduto($id){
        try {
            $sqlDelete = "DELETE FROM PRODUTO WHERE id_produto = :idProduto";

            $res = $this->conn->prepare($sqlDelete);
            $res->bindParam(":idProduto", $id);
            $res->execute();

            return true;
        } catch (\Throwable $th) {
            echo "Erro SQL: " . $th->getMessage();
            return false;
        }
    }

    public function EditarProduto(
        $id, 
        $nome, 
        $marca, 
        $breveDescricao, 
        $preco, 
        $precoPromocional, 
        $fgPromocao,
        $caracteristicasCompleta, 
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2
    ){
        try {
            $getCorId = $this->conn->prepare("
                SELECT id_cores 
                FROM PRODUTO 
                WHERE id_produto = :idProduto
            ");
            $getCorId->bindParam(":idProduto", $id, PDO::PARAM_INT);
            $getCorId->execute();
    
            $resCoresId = $getCorId->fetch(PDO::FETCH_ASSOC);
            $idCores = $resCoresId ? $resCoresId['id_cores'] : null;
    
            if ($idCores) {
                $updateCores = "UPDATE CORES 
                    SET corPrincipal = :corPrincipal, 
                        hexDegrade1 = :hexDegrade1, 
                        hexDegrade2 = :hexDegrade2
                    WHERE id_cores = :idCores";
    
                $resCores = $this->conn->prepare($updateCores);
                $resCores->bindParam(":corPrincipal", $corPrincipal);
                $resCores->bindParam(":hexDegrade1", $deg1);
                $resCores->bindParam(":hexDegrade2", $deg2);
                $resCores->bindParam(":idCores", $idCores, PDO::PARAM_INT);
                $resCores->execute();
            }
    
            $sql = "UPDATE PRODUTO 
                SET nome = :nome, 
                    marca = :marca, 
                    descricaoBreve = :descricaoBreve, 
                    descricaoTotal = :descricaoTotal,
                    preco = :preco,
                    precoPromo = :precoPromo,
                    fgPromocao = :fgPromocao,
                    qtdEstoque = :qtdEstoque,
                    id_cores = :idCores
                WHERE id_produto = :idProduto";
    
            $res = $this->conn->prepare($sql);
            $res->bindParam(":nome", $nome);
            $res->bindParam(":marca", $marca);
            $res->bindParam(":descricaoBreve", $breveDescricao);
            $res->bindParam(":descricaoTotal", $caracteristicasCompleta);
            $res->bindParam(":preco", $preco);
            $res->bindParam(":precoPromo", $precoPromocional);
            $res->bindParam(":fgPromocao", $fgPromocao);
            $res->bindParam(":qtdEstoque", $qtdEstoque, PDO::PARAM_INT);
            $res->bindParam(":idCores", $idCores, PDO::PARAM_INT);
            $res->bindParam(":idProduto", $id, PDO::PARAM_INT);
    
            $res->execute();
            return true;
    
        } catch (\Throwable $th) {
            echo "Erro SQL: " . $th->getMessage();
            return false;
        }
    }    

    public function buscarProdutoPeloId($id){
        try {
            $sqlProduto = "SELECT P.nome, 
            marca, 
            descricaoBreve, 
            descricaoTotal, 
            preco, 
            precoPromo, 
            fgPromocao,
            qtdEstoque, 
            img1, 
            img2, 
            img3, 
            SC.id_subCategoria,
            SC.nome AS subcategoria, 
            C.corPrincipal, 
            C.hexDegrade1 AS hex1, 
            C.hexDegrade2 AS hex2
            FROM produto P
                JOIN subcategoria SC
            ON P.id_subCategoria = SC.id_subCategoria
                JOIN cores C
            ON P.id_cores = C.id_cores
                WHERE P.id_produto = :id";

            $db = $this->conn->prepare($sqlProduto);
            $db->bindParam(":id", $id);
            $db->execute();
            $res = $db->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function buscarTodosProdutos($ordem="", $pesquisa=""){
        try {    
            $sqlProdutos = "SELECT 
                id_produto as id, 
                nome, 
                marca, 
                descricaoBreve, 
                descricaoTotal, 
                preco, 
                precoPromo as precoPromocional, 
                fgPromocao, 
                qtdEstoque, 
                img1, 
                img2, 
                img3, 
                id_subCategoria, 
                id_cores, 
                id_associado 
            FROM produto";
    
            $params = [];
    
            //Para concatenar a pesquisa
            if (!empty($pesquisa)) {
                $sqlProdutos .= " WHERE nome LIKE :pesquisa";
                $params[':pesquisa'] = "$pesquisa%";
            }
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID':
                        $ordemSql = "id_produto";
                        break;
                    case 'Preço':
                        $ordemSql = "preco";
                        break;
                    case 'Qtd. Estoque':
                        $ordemSql = "qtdEstoque";
                        break;
                    default:
                        $ordemSql = "id_produto";
                }
                $sqlProdutos .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlProdutos);
    
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val, PDO::PARAM_STR);
            }
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
    
    
    public function getAllProdutos(){
        $sql = "SELECT * FROM Produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrarProduto(
        $nome, 
        $marca, 
        $breveDescricao, 
        $preco, 
        $precoPromocional, 
        $fgPromocao,
        $caracteristicasCompleta, 
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2, 
        $files
    ) {
        try {
            $this->conn->beginTransaction();

            $sqlCores = "INSERT INTO cores(corPrincipal, hexDegrade1, hexDegrade2)
                         VALUES(:corPrincipal, :hex1, :hex2)";
            $db = $this->conn->prepare($sqlCores);
            $db->bindParam(":corPrincipal", $corPrincipal);
            $db->bindParam(":hex1", $deg1);
            $db->bindParam(":hex2", $deg2);
            $db->execute();

            $idCores = $this->conn->lastInsertId();

            $img1 = $this->salvarImagem("img1", $files);
            $img2 = $this->salvarImagem("img2", $files);
            $img3 = $this->salvarImagem("img3", $files);

            $sql = "INSERT INTO produto(
                        nome, marca, descricaoBreve, descricaoTotal, 
                        preco, precoPromo, fgPromocao, qtdEstoque, 
                        img1, img2, img3, 
                        id_subCategoria, id_cores, id_associado
                    ) VALUES(
                        :nome, :marca, :descricaoBreve, :descricaoTotal,
                        :preco, :precoPromo, :fgPromocao, :qtdEstoque,
                        :img1, :img2, :img3,
                        :idSubCategoria, :idCores, null
                    )";

            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":marca", $marca);
            $db->bindParam(":descricaoBreve", $breveDescricao);
            $db->bindParam(":descricaoTotal", $caracteristicasCompleta);
            $db->bindParam(":preco", $preco);
            $db->bindParam(":precoPromo", $precoPromocional);
            $db->bindParam(":fgPromocao", $fgPromocao);
            $db->bindParam(":qtdEstoque", $qtdEstoque);
            $db->bindParam(":img1", $img1);
            $db->bindParam(":img2", $img2);
            $db->bindParam(":img3", $img3);

            $idSubCategoria = $_POST["subCategoria"] ?? null;
            $db->bindParam(":idSubCategoria", $idSubCategoria);

            $db->bindParam(":idCores", $idCores);

            $resposta = $db->execute();

            if ($resposta) {
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                return false;
            }

        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao cadastrar produto: " . $th->getMessage();
            return false;
        }
    }

    public function create($data){
        if(empty($data['imagem'])){
            $data['imagem'] = 'uploads/The_Great_Wave_off_Kanagawa_artificial_intelligence_4K_waves_sunset-2199509 (1).jpg';
        }

        $sql = "INSERT INTO Produto 
                (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, imagem, id_subCategoria, id_cores, id_associado)
                VALUES 
                (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :imagem, :id_subCategoria, :id_cores, :id_associado)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':marca', $data['marca']);
        $stmt->bindParam(':descricaoBreve', $data['descricaoBreve']);
        $stmt->bindParam(':descricaoTotal', $data['descricaoTotal']);
        $stmt->bindParam(':preco', $data['preco']);
        $stmt->bindParam(':precoPromo', $data['precoPromo']);
        $stmt->bindParam(':imagem', $data['imagem']);
        $stmt->bindParam(':id_subCategoria', $data['id_subCategoria']);
        $stmt->bindParam(':id_cores', $data['id_cores']);
        $stmt->bindParam(':id_associado', $data['id_associado']);

        return $stmt->execute();
    }

    public function produtoById($id){
        $stmt = $this->conn->prepare("SELECT * FROM Produto WHERE id_produto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduto($id, $data){
        $sql = "UPDATE Produto SET 
                    nome = :nome,
                    marca = :marca,
                    descricaoBreve = :descricaoBreve,
                    descricaoTotal = :descricaoTotal,
                    preco = :preco,
                    precoPromo = :precoPromo,
                    imagem = :imagem,
                    id_subCategoria = :id_subCategoria,
                    id_cores = :id_cores,
                    id_associado = :id_associado
                WHERE id_produto = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':marca', $data['marca']);
        $stmt->bindParam(':descricaoBreve', $data['descricaoBreve']);
        $stmt->bindParam(':descricaoTotal', $data['descricaoTotal']);
        $stmt->bindParam(':preco', $data['preco']);
        $stmt->bindParam(':precoPromo', $data['precoPromo']);
        $stmt->bindParam(':imagem', $data['imagem']);
        $stmt->bindParam(':id_subCategoria', $data['id_subCategoria']);
        $stmt->bindParam(':id_cores', $data['id_cores']);
        $stmt->bindParam(':id_associado', $data['id_associado']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteProduto($id){
        $sql = "DELETE FROM Produto WHERE id_produto = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getAllSubcategorias(){
        $stmt = $this->conn->query("SELECT * FROM SubCategoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCores(){
        $stmt = $this->conn->query("SELECT * FROM Cores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAssociados(){
        $stmt = $this->conn->query("SELECT * FROM Usuario WHERE tipo = 'associado'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function salvarImagem($inputName, $files) {
        if (isset($files[$inputName]) && $files[$inputName]['error'] === UPLOAD_ERR_OK) {
            $nomeArquivo = time() . '_' . basename($files[$inputName]['name']);
            $caminhoDestino = __DIR__ . '/../../public/uploads/' . $nomeArquivo;

            if (!is_dir(__DIR__ . '/../../public/uploads')) {
                mkdir(__DIR__ . '/../../public/uploads', 0777, true);
            }

            if (move_uploaded_file($files[$inputName]['tmp_name'], $caminhoDestino)) {
                return 'public/uploads/' . $nomeArquivo; // caminho salvo no banco
            }
        }
        return null;
    }

    public function getProdutosFiltrados(string $slugCategoria, array $nomesSubcategorias = []) {
        try {
            // 1. Obter o ID da Categoria principal
            $id_categoria = $this->categoriaModel->getIdBySlug($slugCategoria);
            
            if (!$id_categoria) {
                return []; // Categoria não encontrada
            }

            // 2. Query Base
            // Tabela 'produto' e JOIN para pegar as cores associadas
            $sql = "SELECT p.*, c.nome as corPrincipal, c.hex1, c.hex2 
                    FROM produto p
                    LEFT JOIN cores c ON p.id_cor_associado = c.id_cores
                    WHERE 1=1"; 

            $params = [];
            
            // 3. Aplicação dos Filtros de Subcategoria
            if (!empty($nomesSubcategorias)) {
                
                // Obter os IDs das subcategorias pelos nomes selecionados
                $ids_subcategorias = $this->categoriaModel->getIdsSubcategoriasByNomes($nomesSubcategorias);
                
                if (empty($ids_subcategorias)) {
                    return []; // Nenhum produto encontrado com esses filtros
                }

                // Cria a string de placeholders para o IN (segurança contra injeção de SQL)
                $placeholders_in = implode(',', array_fill(0, count($ids_subcategorias), '?'));

                $sql .= " AND p.id_subCategoria IN ({$placeholders_in})";
                $params = array_merge($params, $ids_subcategorias);
                
            } else {
                 // 4. Se não há filtros (mostrar todos os produtos da Categoria principal)
                 
                 // Buscamos todas as subcategorias ligadas à Categoria principal
                 $subcategorias_categoria = $this->categoriaModel->getSubcategoriasBySlug($slugCategoria);
                 
                 // Extrai apenas os IDs
                 $ids_sub_categoria_principal = array_column($subcategorias_categoria, 'id_subCategoria');

                 if (empty($ids_sub_categoria_principal)) {
                    return []; 
                 }
                 
                 // Cria a string de placeholders para o IN com todos os IDs
                 $placeholders_cat = implode(',', array_fill(0, count($ids_sub_categoria_principal), '?'));
                 $sql .= " AND p.id_subCategoria IN ({$placeholders_cat})";
                 $params = array_merge($params, $ids_sub_categoria_principal);
            }
            
            // 5. Preparar e Executar
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (\Throwable $th) {
            error_log("Erro ao buscar produtos filtrados: " . $th->getMessage());
            // Em ambiente de desenvolvimento, você pode adicionar: throw $th;
            return false;
        }
    }
    
}
?>
