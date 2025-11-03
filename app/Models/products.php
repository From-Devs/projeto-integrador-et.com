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
        $tamanho,
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2,
        $idSubCategoria = null,
        $files = []
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
    
            $newImg1 = $this->salvarImagem('img1', $files);
            $newImg2 = $this->salvarImagem('img2', $files);
            $newImg3 = $this->salvarImagem('img3', $files);

            $sql = "UPDATE PRODUTO SET 
                nome = :nome, 
                marca = :marca, 
                descricaoBreve = :descricaoBreve, 
                descricaoTotal = :descricaoTotal,
                preco = :preco,
                precoPromo = :precoPromo,
                tamanho = :tamanho,
                fgPromocao = :fgPromocao,
                qtdEstoque = :qtdEstoque,
                id_cores = :idCores";

            // incluir atualização da subcategoria se informado
            if ($idSubCategoria !== null && $idSubCategoria !== '') {
                $sql .= ", id_subCategoria = :idSubCategoria";
            }

            if ($newImg1) $sql .= ", img1 = :img1";
            if ($newImg2) $sql .= ", img2 = :img2";
            if ($newImg3) $sql .= ", img3 = :img3";

            $sql .= " WHERE id_produto = :idProduto";

            $res = $this->conn->prepare($sql);
            $res->bindParam(":nome", $nome);
            $res->bindParam(":marca", $marca);
            $res->bindParam(":descricaoBreve", $breveDescricao);
            $res->bindParam(":descricaoTotal", $caracteristicasCompleta);
            $res->bindParam(":preco", $preco);
            $res->bindParam(":precoPromo", $precoPromocional);
            $res->bindParam(":tamanho", $tamanho);
            $res->bindParam(":fgPromocao", $fgPromocao);
            $res->bindParam(":qtdEstoque", $qtdEstoque, PDO::PARAM_INT);
            $res->bindParam(":idCores", $idCores, PDO::PARAM_INT);

            if ($idSubCategoria !== null && $idSubCategoria !== '') {
                $res->bindParam(":idSubCategoria", $idSubCategoria, PDO::PARAM_INT);
            }

            if ($newImg1) $res->bindParam(":img1", $newImg1);
            if ($newImg2) $res->bindParam(":img2", $newImg2);
            if ($newImg3) $res->bindParam(":img3", $newImg3);

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
            $sqlProduto = "
            SELECT
            P.*,
            SC.id_subCategoria,
            SC.id_categoria AS id_categoria,
            SC.nome AS subcategoria,
            CAT.nome AS categoria,
            C.corPrincipal, 
            C.hexDegrade1 AS hex1, 
            C.hexDegrade2 AS hex2
            FROM produto P
                JOIN subcategoria SC
            ON P.id_subCategoria = SC.id_subCategoria
                JOIN categoria CAT
            ON SC.id_categoria = CAT.id_categoria
                JOIN cores C
            ON P.id_cores = C.id_cores
                WHERE P.id_produto = :id";

            $db = $this->conn->prepare($sqlProduto);
            $db->bindParam(":id", $id, PDO::PARAM_INT);
            $db->execute();
            $res = $db->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function pesquisarProdutosHeader($termo)
    {
        $sql = "SELECT p.id_produto, p.nome, p.marca, p.preco, p.img1
                FROM Produto p
                WHERE p.nome LIKE :termo OR p.marca LIKE :termo
                ORDER BY p.nome ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':termo', "%$termo%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    case 'Marca':
                        $ordemSql = "marca";
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

    public function buscarTodosProdutosAssociados($ordem="", $pesquisa="", $idAssociado){
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
            FROM produto
            WHERE id_associado = :idAssociado";
    
            $params = [];

            $params = [":idAssociado" => $idAssociado];
    
            //Para concatenar a pesquisa
            if (!empty($pesquisa)) {
                $sqlProdutos .= " AND nome LIKE :pesquisa";
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
        $tamanho,
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2, 
        $idAssociado,
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
                        nome, marca, descricaoBreve, descricaoTotal, tamanho, 
                        preco, precoPromo, fgPromocao, qtdEstoque, 
                        img1, img2, img3, 
                        id_subCategoria, id_cores, id_associado
                    ) VALUES(
                        :nome, :marca, :descricaoBreve, :descricaoTotal, :tamanho,
                        :preco, :precoPromo, :fgPromocao, :qtdEstoque,
                        :img1, :img2, :img3,
                        :idSubCategoria, :idCores, :id_associado
                    )";

            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":marca", $marca);
            $db->bindParam(":descricaoBreve", $breveDescricao);
            $db->bindParam(":descricaoTotal", $caracteristicasCompleta);
            $db->bindParam(":preco", $preco);
            $db->bindParam(":precoPromo", $precoPromocional);
            $db->bindParam(":fgPromocao", $fgPromocao);
            $db->bindParam(":tamanho", $tamanho);
            $db->bindParam(":qtdEstoque", $qtdEstoque);
            $db->bindParam(":img1", $img1);
            $db->bindParam(":img2", $img2);
            $db->bindParam(":img3", $img3);
            $db->bindParam(":id_associado", $idAssociado);

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

    public function capturarAssociadosPorProduto($idProduto){
        $sql = "select U.id_usuario ,
        U.nome,
        U.telefone,
        U.email,
        U.foto,
        P.descricaoBreve,
        P.marca,
        E.cidade,
        E.estado 
            from usuario u 
            left join endereco e 
                on E.id_endereco = U.id_endereco 
            left join produto p 
                on P.id_associado = U.id_usuario 
            where P.id_produto = :idProduto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":idProduto", $idProduto, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getAllCategorias(){
        $stmt = $this->conn->query("SELECT * FROM categoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSubcategorias(){
        $stmt = $this->conn->query("SELECT * FROM subcategoria");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Buscar subcategorias pelo id da categoria
    public function getSubcategoriaByCategoriaId($idCategoria){
        $stmt = $this->conn->prepare("SELECT * FROM subcategoria WHERE id_categoria = :idCategoria");
        $stmt->bindValue(':idCategoria', $idCategoria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubcategoriaById($idSubCategoria){
        $stmt = $this->conn->prepare("SELECT id_subCategoria, id_categoria, nome FROM SubCategoria WHERE id_subCategoria = :idSubCategoria LIMIT 1");
        $stmt->bindValue(':idSubCategoria', $idSubCategoria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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

    // Puxar card de produtos do DB

    public function getOfertasImperdiveis($limit = 8) {
        $sql = "
        SELECT 
            p.*, 
            c.corPrincipal, 
            c.hexDegrade1 AS corDegrade1, 
            c.hexDegrade2 AS corDegrade2
        FROM produto p
        LEFT JOIN cores c ON p.id_cores = c.id_cores
        WHERE p.fgPromocao = 1
        ORDER BY RAND()
        LIMIT :limite
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":limite", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mais vendidos: baseado na qtdVendida
    public function getMaisVendidos($limit = 8) {
        $sql = "
            SELECT 
                p.*, 
                c.corPrincipal, 
                c.hexDegrade1 AS corDegrade1, 
                c.hexDegrade2 AS corDegrade2
            FROM produto p
            LEFT JOIN cores c ON p.id_cores = c.id_cores
            ORDER BY p.qtdVendida DESC
            LIMIT :limite
        ";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":limite", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Relacionados: mesma categoria ou marca
    public function getRelacionados($categoria, $subcategoria, $marca, $idAtual, $limit = 8) {
        $sql = "
            SELECT 
                p.*, 
                c.corPrincipal, 
                c.hexDegrade1 AS corDegrade1, 
                c.hexDegrade2 AS corDegrade2,
                s.nome AS subCategoria,
                cat.nome AS categoria
            FROM produto p
            LEFT JOIN cores c ON p.id_cores = c.id_cores
            LEFT JOIN subcategoria s ON p.id_subCategoria = s.id_subCategoria
            LEFT JOIN categoria cat ON s.id_categoria = cat.id_categoria
            WHERE p.id_produto != :id
            AND (
                s.nome = :subcategoria
                OR cat.nome = :categoria
                OR p.marca = :marca
            )
            ORDER BY
                (s.nome = :subcategoria) DESC,
                (cat.nome = :categoria) DESC,
                (p.marca = :marca) DESC,
                RAND()
            LIMIT :limite
        ";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id", (int)$idAtual, PDO::PARAM_INT);
        $stmt->bindValue(":categoria", $categoria, PDO::PARAM_STR);
        $stmt->bindValue(":subcategoria", $subcategoria, PDO::PARAM_STR);
        $stmt->bindValue(":marca", $marca, PDO::PARAM_STR);
        $stmt->bindValue(":limite", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Sugestões: baseado nos produtos da lista de desejos
    public function getSugestoes($idUsuario, $limit = 8) {
        $sql = "
            SELECT DISTINCT 
                p.*, 
                c.corPrincipal, 
                c.hexDegrade1 AS corDegrade1, 
                c.hexDegrade2 AS corDegrade2,
                s.nome AS subCategoria,
                cat.nome AS categoria
            FROM produto p
            LEFT JOIN cores c ON p.id_cores = c.id_cores
            LEFT JOIN subcategoria s ON p.id_subCategoria = s.id_subCategoria
            LEFT JOIN categoria cat ON s.id_categoria = cat.id_categoria
            WHERE 
                (
                    p.id_subCategoria IN (
                        SELECT DISTINCT pr.id_subCategoria
                        FROM listadesejos ld
                        JOIN produto pr ON ld.id_produto = pr.id_produto
                        WHERE ld.id_usuario = :idUsuario
                    )
                    OR p.marca IN (
                        SELECT DISTINCT pr.marca
                        FROM listadesejos ld
                        JOIN produto pr ON ld.id_produto = pr.id_produto
                        WHERE ld.id_usuario = :idUsuario
                    )
                )
                AND p.id_produto NOT IN (
                    SELECT id_produto FROM listadesejos WHERE id_usuario = :idUsuario
                )
            ORDER BY p.qtdVendida DESC, RAND()
            LIMIT :limite
        ";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $stmt->bindValue(":limite", (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Avaliações

    public function BuscarAvaliacoesPorProduto(int $id_produto): array {
        try {
            $sql = "SELECT a.*, u.nome AS nome_usuario 
                    FROM avaliacoes a
                    LEFT JOIN usuario u ON u.id_usuario = a.id_usuario
                    WHERE a.id_produto = :id_produto
                    ORDER BY a.data_avaliacao DESC"; // mais recentes primeiro
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_produto' => $id_produto]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    public function mediaAvaliacoes(int $id_produto): float {
        $sql = "SELECT AVG(nota) as media FROM avaliacoes WHERE id_produto = :id_produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_produto' => $id_produto]);
        $media = $stmt->fetchColumn();
        return $media ? (float)$media : 0.0;
    }
    
}
?>
