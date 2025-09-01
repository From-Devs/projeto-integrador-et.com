<?php
require_once __DIR__ . "/../../config/database.php";

class Products {

    private $conn;

    public function __construct() {
        $banco = new Database();
        $this->conn = $banco->Connect();
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
            $this->conn->rollBack();
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function buscarTodosProdutos(){
        try {    
            $sqlProdutos = "SELECT id_produto as id, nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo as precoPromocional, qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado FROM produto ORDER BY id_produto";
            $db = $this->conn->prepare($sqlProdutos);
            $db->execute();
            $res = $db->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function capturarSubCategorias() {
        try {
            $sql = "SELECT * FROM subcategoria ORDER BY nome";
            $db = $this->conn->prepare($sql);
            $db->execute();
            return $db->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo "Erro ao buscar subcategorias: " . $th->getMessage();
            return false;
        }
    }

    public function cadastrarProduto(
        $nome, 
        $marca, 
        $breveDescricao, 
        $preco, 
        $precoPromocional, 
        $caracteristicasCompleta, 
        $qtdEstoque, 
        $corPrincipal, 
        $deg1, 
        $deg2, 
        $files
    ) {
        try {
            $this->conn->beginTransaction();

            // 1. Inserir na tabela cores
            $sqlCores = "INSERT INTO cores(corPrincipal, hexDegrade1, hexDegrade2)
                         VALUES(:corPrincipal, :hex1, :hex2)";
            $db = $this->conn->prepare($sqlCores);
            $db->bindParam(":corPrincipal", $corPrincipal);
            $db->bindParam(":hex1", $deg1);
            $db->bindParam(":hex2", $deg2);
            $db->execute();

            $idCores = $this->conn->lastInsertId();

            // 2. Salvar imagens
            $img1 = $this->salvarImagem("img1", $files);
            $img2 = $this->salvarImagem("img2", $files);
            $img3 = $this->salvarImagem("img3", $files);

            // 3. Inserir produto
            $sql = "INSERT INTO produto(
                        nome, marca, descricaoBreve, descricaoTotal, 
                        preco, precoPromo, qtdEstoque, 
                        img1, img2, img3, 
                        id_subCategoria, id_cores, id_associado
                    ) VALUES(
                        :nome, :marca, :descricaoBreve, :descricaoTotal,
                        :preco, :precoPromo, :qtdEstoque,
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
            $db->bindParam(":qtdEstoque", $qtdEstoque);
            $db->bindParam(":img1", $img1);
            $db->bindParam(":img2", $img2);
            $db->bindParam(":img3", $img3);

            // ⚠️ IMPORTANTE: Subcategoria vem do formulário
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
}
