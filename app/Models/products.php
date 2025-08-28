<?php
require_once __DIR__ . '/../../config/database.php';

class Products {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function getAllProdutos(){
        $sql = "SELECT * FROM Produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        // Se não houver imagem, define padrão
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

    // Auxiliares
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
}
?>
