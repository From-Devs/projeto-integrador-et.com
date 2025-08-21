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

    CREATE TABLE Produto(
        id_produto INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        marca VARCHAR(255) NOT NULL,
        descricaoBreve VARCHAR(255) NOT NULL,
        descricaoTotal VARCHAR(255) NOT NULL,
        preco DECIMAL(10,2) NOT NULL,
        precoPromo DECIMAL(10,2),
        qtdEstoque int NOT NULL,
        img1 VARCHAR(255),
        img2 VARCHAR(255),
        img3 VARCHAR(255),
        id_subCategoria INT,
        id_cores INT,
        id_associado INT,
        FOREIGN KEY (id_subCategoria) REFERENCES SubCategoria(id_subCategoria),
        FOREIGN KEY (id_cores) REFERENCES Cores(id_cores),
        FOREIGN KEY (id_associado) REFERENCES Usuario(id_usuario)
    );
    // Substituindo create por CadastrarProduto
    public function CadastrarProduto($nome, $marca, $descricaoBreve, $preco, $precoPromo, $descricaoTotal, $qtdEstoque, $img_1 = null, $img_2 = null, $img_3 = null, $id_subCategoria = 1, $id_cores = 1, $id_associado = 1){
        try {
            // Define imagens padrão caso não enviadas
            $img_1 = $img_1 ?? 'uploads/default1.jpg';
            $img_2 = $img_2 ?? 'uploads/default2.jpg';
            $img_3 = $img_3 ?? 'uploads/default3.jpg';

            $sql = "INSERT INTO Produto
                    (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, img_1, img_2, img_3, id_subCategoria, id_cores, id_associado)
                    VALUES
                    (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :img_1, :img_2, :img_3, :id_subCategoria, :id_cores, :id_associado)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':descricaoBreve', $descricaoBreve);
            $stmt->bindParam(':descricaoTotal', $descricaoTotal);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':precoPromo', $precoPromo);
            $stmt->bindParam(':img_1', $img_1);
            $stmt->bindParam(':img_2', $img_2);
            $stmt->bindParam(':img_3', $img_3);
            $stmt->bindParam(':id_subCategoria', $id_subCategoria);
            $stmt->bindParam(':id_cores', $id_cores);
            $stmt->bindParam(':id_associado', $id_associado);

            return $stmt->execute();
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
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
                    img_1 = :img_1,
                    img_2 = :img_2,
                    img_3 = :img_3,
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
        $stmt->bindParam(':img_1', $data['mg_1']);
        $stmt->bindParam(':img_2', $data['img_2']);
        $stmt->bindParam(':img_3', $data['img_3']);
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
