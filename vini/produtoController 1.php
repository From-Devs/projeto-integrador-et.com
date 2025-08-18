<?php
require_once __DIR__ . "/database.php";

class ProdutoController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->Connect();
    }

    public function ListarProdutos() {
        try {
            $sql = "
                SELECT p.id_produto, p.nome, p.marca, p.descricaoBreve, p.descricaoTotal,
                       p.preco, p.precoPromo, p.imagem,
                       c.corPrincipal, c.hexDegrade1, c.hexDegrade2, c.hexDegrade3
                FROM produto p
                LEFT JOIN cores c ON p.id_cores = c.id_cores
                ORDER BY p.id_produto DESC
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return ["status"=>"success", "produtos"=>$produtos];

        } catch (PDOException $e) {
            return ["status"=>"error","mensagem"=>"Erro ao listar produtos: ".$e->getMessage()];
        }
    }

    public function BuscarProdutoPorId($id) {
        try {
            $sql = "
                SELECT p.id_produto, p.nome, p.marca, p.descricaoBreve, p.descricaoTotal,
                       p.preco, p.precoPromo, p.imagem,
                       c.corPrincipal, c.hexDegrade1, c.hexDegrade2, c.hexDegrade3,
                       s.nome AS subcategoria
                FROM produto p
                LEFT JOIN cores c ON p.id_cores = c.id_cores
                LEFT JOIN subcategoria s ON p.id_subCategoria = s.id_subCategoria
                WHERE p.id_produto = :id
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $produto;
        } catch (PDOException $e) {
            return null;
        }
    }
}    