<?php
require_once __DIR__ . '/../../config/database.php';

class Produto {
    private $conn; // faltava ponto e vírgula aqui

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function createProduto($data){
        $sql = "INSERT INTO produto (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, imagem, id_subCategoria, id_cores, id_associado) 
                VALUES (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :imagem, :id_subCategoria, :id_cores, :id_associado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $data['nome']);
        $stmt->bindParam(':marca', $data['marca']);
        $stmt->bindParam(':descricaoBreve', $data['descricaoBreve']);
        $stmt->bindParam(':descricaoTotal', $data['descricaoTotal']);
        $stmt->bindParam(':preco', $data['preco']);
        // REMOVI esta linha porque não tem campo data_nascimento na tabela produto
        // $stmt->bindParam(':data_nascimento', $data['data_nascimento']);
        $stmt->bindParam(':precoPromo', $data['precoPromo']);
        $stmt->bindParam(':imagem', $data['imagem']);
        $stmt->bindParam(':id_subCategoria', $data['id_subCategoria']);
        $stmt->bindParam(':id_cores', $data['id_cores']);
        $stmt->bindParam(':id_associado', $data['id_associado']);
        return $stmt->execute();
    }
    
    public function produtoById($id){
        $stmt = $this->conn->prepare("SELECT * FROM produto WHERE id_produto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateProduto($id, $data){
        $sql = "UPDATE produto SET 
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
        $sql = "DELETE FROM produto WHERE id_produto = :id";  
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
