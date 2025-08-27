<?php
require_once __DIR__ . "/../../config/database.php";

class Products {

    private $conn;

    public function __construct() {
        $banco = new Database();
        $this->conn = $banco->Connect();
    }

    public function buscarProdutoPorId($id){
        $sql = "SELECT * FROM `produto` WHERE id_produto = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function buscarTodosProdutos(){
        try {    
            $sqlPodutos = "SELECT id_produto as id, nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo as precoPromocional, qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado FROM produto ORDER BY id_produto";
            $db = $this->conn->prepare($sqlPodutos);
            $db->execute();
            $res = $db->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function updateProduto(
        $id_produto,
        $nome,
        $marca,
        $descricaoBreve,
        $descricaoTotal,
        $preco,
        $precoPromo,
        $qtdEstoque,
        $img1,
        $img2,
        $img3,
        $id_subCategoria,
        $id_cores,
        $id_associado
    ) {
        try {
            $sql = "UPDATE produto SET 
                        nome = :nome,
                        marca = :marca,
                        descricaoBreve = :descricaoBreve,
                        descricaoTotal = :descricaoTotal,
                        preco = :preco,
                        precoPromo = :precoPromo,
                        qtdEstoque = :qtdEstoque,
                        img1 = :img1,
                        img2 = :img2,
                        img3 = :img3,
                        id_subCategoria = :id_subCategoria,
                        id_cores = :id_cores,
                        id_associado = :id_associado
                    WHERE id_produto = :id_produto";
    
            $db = $this->conn->prepare($sql);
    
            $db->bindParam(":id_produto", $id_produto, PDO::PARAM_INT);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":marca", $marca);
            $db->bindParam(":descricaoBreve", $descricaoBreve);
            $db->bindParam(":descricaoTotal", $descricaoTotal);
            $db->bindParam(":preco", $preco);
            $db->bindParam(":precoPromo", $precoPromo);
            $db->bindParam(":qtdEstoque", $qtdEstoque, PDO::PARAM_INT);
            $db->bindParam(":img1", $img1);
            $db->bindParam(":img2", $img2);
            $db->bindParam(":img3", $img3);
            $db->bindParam(":id_subCategoria", $id_subCategoria, PDO::PARAM_INT);
            $db->bindParam(":id_cores", $id_cores, PDO::PARAM_INT);
            $db->bindParam(":id_associado", $id_associado, PDO::PARAM_INT);
    
            return $db->execute();
    
        } catch (\Throwable $th) {
            echo "Erro ao atualizar produto: " . $th->getMessage();
            return false;
        }
    }
    
    public function deletarProduto($id_delete){
        try {
            $sql = "DELETE FROM produto WHERE id_produto = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id_delete, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (\Throwable $th) {
            echo "Erro ao deletar produto: " . $th->getMessage();
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
