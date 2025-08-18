<?php 
require_once __DIR__ . '/../../config/database.php';

class Products {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    // Listar todos os produtos
    public function getAllProdutos() {
        try {
            $sql = "SELECT * FROM Produto";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Buscar produto por ID
    public function getProdutoById($id) {
        try {
            $sql = "SELECT * FROM Produto WHERE id_produto = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            return ["success" => true, "data" => $data];
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Criar produto
    public function create($data) {
        try {
            // Se não tiver imagens, define padrão
            if(empty($data['img_1'])) {
                $data['img_1'] = '../../public/uploads/default.jpg';
            }
            if(empty($data['img_2'])) {
                $data['img_2'] = '../../public/uploads/default.jpg';
            }
            if(empty($data['img_3'])) {
                $data['img_3'] = '../../public/uploads/default.jpg';
            }

            $sql = "INSERT INTO Produto 
                    (nome, marca, descricaoBreve, descricaoTotal, preco, precoPromo, img_1, img_2, img_3, id_subCategoria, id_cores, id_associado)
                    VALUES 
                    (:nome, :marca, :descricaoBreve, :descricaoTotal, :preco, :precoPromo, :img_1, :img_2, :img_3, :id_subCategoria, :id_cores, :id_associado)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nome', $data['nome']);
            $stmt->bindParam(':marca', $data['marca']);
            $stmt->bindParam(':descricaoBreve', $data['descricaoBreve']);
            $stmt->bindParam(':descricaoTotal', $data['descricaoTotal']);
            $stmt->bindParam(':preco', $data['preco']);
            $stmt->bindParam(':precoPromo', $data['precoPromo']);
            $stmt->bindParam(':img_1', $data['img_1']);
            $stmt->bindParam(':img_2', $data['img_2']);
            $stmt->bindParam(':img_3', $data['img_3']);
            $stmt->bindParam(':id_subCategoria', $data['id_subCategoria']);
            $stmt->bindParam(':id_cores', $data['id_cores']);
            $stmt->bindParam(':id_associado', $data['id_associado']);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Produto criado com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no INSERT: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Atualizar produto
    public function update($id, $data) {
        try {
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
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $data['nome']);
            $stmt->bindParam(':marca', $data['marca']);
            $stmt->bindParam(':descricaoBreve', $data['descricaoBreve']);
            $stmt->bindParam(':descricaoTotal', $data['descricaoTotal']);
            $stmt->bindParam(':preco', $data['preco']);
            $stmt->bindParam(':precoPromo', $data['precoPromo']);
            $stmt->bindParam(':img_1', $data['img_1']);
            $stmt->bindParam(':img_2', $data['img_2']);
            $stmt->bindParam(':img_3', $data['img_3']);
            $stmt->bindParam(':id_subCategoria', $data['id_subCategoria']);
            $stmt->bindParam(':id_cores', $data['id_cores']);
            $stmt->bindParam(':id_associado', $data['id_associado']);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Produto atualizado com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no UPDATE: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    // Deletar produto
    public function delete($id) {
        try {
            $sql = "DELETE FROM Produto WHERE id_produto = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return ["success" => true, "message" => "Produto deletado com sucesso!"];
            } else {
                $error = $stmt->errorInfo();
                return ["success" => false, "message" => "Erro no DELETE: " . $error[2]];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
}
?>
