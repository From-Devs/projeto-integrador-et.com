<?php
require_once __DIR__ . '/../../config/database.php';

class ProdutoModel {
    protected $conn;
    protected $table = "produto";
    protected $primaryKey = "id_produto"; 

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // Remover produto
    public function RemoverProduto($id){
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :idProduto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":idProduto", $id, PDO::PARAM_INT);
        return $stmt->execute(); // true/false
    }

    // Editar produto e cores
    public function EditarProduto($id, $nome, $marca, $breveDescricao, $preco, $precoPromocional, $fgPromocao, $caracteristicasCompleta, $qtdEstoque, $corPrincipal, $deg1, $deg2){
        // Primeiro buscar id_cores do produto
        $stmt = $this->conn->prepare("SELECT id_cores FROM {$this->table} WHERE {$this->primaryKey} = :idProduto");
        $stmt->bindParam(":idProduto", $id, PDO::PARAM_INT);
        $stmt->execute();
        $corbyid = $stmt->fetch(PDO::FETCH_ASSOC);
        $idCores = $corbyid ? $corbyid['id_cores'] : null;

        // Atualizar tabela CORES se existir
        if ($idCores) {
            $sql = "UPDATE CORES SET corPrincipal = :corPrincipal, hexDegrade1 = :hexDegrade1, hexDegrade2 = :hexDegrade2 WHERE id_cores = :idCores";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":corPrincipal", $corPrincipal, PDO::PARAM_STR);
            $stmt->bindParam(":hexDegrade1", $deg1, PDO::PARAM_STR);
            $stmt->bindParam(":hexDegrade2", $deg2, PDO::PARAM_STR);
            $stmt->bindParam(":idCores", $idCores, PDO::PARAM_INT);
            $stmt->execute();
        }

        $sql = "UPDATE {$this->table} SET 
                nome = :nome, 
                marca = :marca, 
                descricaoBreve = :descricaoBreve, 
                descricaoTotal = :descricaoTotal,
                preco = :preco,
                precoPromo = :precoPromo,
                fgPromocao = :fgPromocao,
                qtdEstoque = :qtdEstoque,
                id_cores = :idCores
                WHERE {$this->primaryKey} = :idProduto";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":marca", $marca);
        $stmt->bindParam(":descricaoBreve", $breveDescricao);
        $stmt->bindParam(":descricaoTotal", $caracteristicasCompleta);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":precoPromo", $precoPromocional);
        $stmt->bindParam(":fgPromocao", $fgPromocao);
        $stmt->bindParam(":qtdEstoque", $qtdEstoque, PDO::PARAM_INT);
        $stmt->bindParam(":idCores", $idCores, PDO::PARAM_INT);
        $stmt->bindParam(":idProduto", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Exemplo: Buscar uma subcategoria pelo ID
    public function buscarSubcategoriaPeloId($id) {
        $sql = "SELECT SC.id_subCategoria, SC.nome, C.nome AS categoria
                FROM subcategoria SC
                JOIN categoria C ON SC.id_categoria = C.id_categoria
                WHERE SC.id_subCategoria = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // só um registro
    }

    public function buscarTodosProdutos(){   
            $sql = "SELECT id_produto as id, nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo as precoPromocional, fgPromocao, qtdEstoque, img1, img2, img3, id_subCategoria, id_cores, id_associado FROM produto ORDER BY id_produto";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt = $db->fetchAll(PDO::FETCH_ASSOC);

            return $stmt;
 

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
    
}
?>
