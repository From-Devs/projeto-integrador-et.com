<?php
require_once __DIR__ . "/../../config/database.php";

class ProdutoController{

    private $conn;

    public function __construct(){
        $banco = new Database();

        $this->conn = $banco->Connect();
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

    public function CapturarSubCategorias(){
        try {    
            $sqlCores = "SELECT * FROM subcategoria ORDER BY NOME";
            $db = $this->conn->prepare($sqlCores);
            $db->execute();
            $res = $db->fetchAll(PDO::FETCH_ASSOC);

            return $res;
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao capturar: " . $th->getMessage();
            return false;
        }
    }

    // public function EditarProduto(){
        
    // }

    // public function CadastrarProduto($nome, $marca, $breveDescricao, $preco, $precoPromocional, $caracteristicasCompleta, $qtdEstoque, $img1, $img2, $img3) Com imagem cadastrando (Blob) - Verificar qual tipo salvar no banco
    // $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, qtdEstoque, img1, img2, img3)
            //(:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :qtdEstoque, :img1, :img2, :img3)";
    public function CadastrarProduto($nome, $marca, $breveDescricao, $preco, $precoPromocional, $caracteristicasCompleta, $qtdEstoque, $corPrincipal, $deg1, $deg2){
        try {
            $this->conn->beginTransaction();
    
            $sqlCores = "INSERT INTO CORES(corPrincipal, hexDegrade1, hexDegrade2)
                        VALUES(:corPrincipal, :hex1, :hex2)";
            $db = $this->conn->prepare($sqlCores);
            $db->bindParam(":corPrincipal", $corPrincipal);
            $db->bindParam(":hex1", $deg1);
            $db->bindParam(":hex2", $deg2);
            $db->execute();
    
            $idInserido = $this->conn->lastInsertId();
    
            // 2. Inserir PRODUTO
            $sql = "INSERT INTO PRODUTO(nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado)
                    VALUES(:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :qtdEstoque, null, null, null, null, :idCores, null)";
            $db = $this->conn->prepare($sql);
            $db->bindParam(":nome", $nome);
            $db->bindParam(":marca", $marca);
            $db->bindParam(":descricaoBreve", $breveDescricao);
            $db->bindParam(":descricaoTotal", $caracteristicasCompleta);
            $db->bindParam(":preco", $preco);
            $db->bindParam(":precoPromo", $precoPromocional);
            $db->bindParam(":qtdEstoque", $qtdEstoque);
            $db->bindParam(":idCores", $idInserido);
    
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
            echo "Erro ao inserir: " . $th->getMessage();
            return false;
        }
    }
            
}