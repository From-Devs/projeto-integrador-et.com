<?php
require_once __DIR__ . "/database.php";

class ProdutoController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->Connect();
    }

    /**
     * Lista todos os produtos do banco de dados.
     * @return array Um array contendo o status e os produtos encontrados.
     */
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

            return ["status" => "success", "produtos" => $produtos];

        } catch (PDOException $e) {
            return ["status" => "error", "mensagem" => "Erro ao listar produtos: " . $e->getMessage()];
        }
    }

    /**
     * Busca um produto por seu ID.
     * @param int $id O ID do produto a ser buscado.
     * @return array|null O produto encontrado ou null se não for encontrado.
     */
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
    
    /**
     * Adiciona um produto ao carrinho ou aumenta sua quantidade.
     * @param int $idProduto O ID do produto a ser adicionado.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function adicionarAoCarrinho($idProduto) {
        try {
            // Assumimos que o carrinho com ID 1 já existe para fins de demonstração
            // Em uma aplicação real, o carrinho estaria associado a um usuário logado.
            $idCarrinho = 1;

            $sql = "INSERT INTO carrinho2 (id_carrinho, id_produto, quantidade) VALUES (:idCarrinho, :idProduto, 1)
                    ON DUPLICATE KEY UPDATE quantidade = quantidade + 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':idCarrinho', $idCarrinho, PDO::PARAM_INT);
            $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Lista os produtos que estão no carrinho.
     * @return array Um array contendo os produtos do carrinho.
     */
    public function ListarCarrinho() {
        try {
            $sql = "SELECT c.id, p.id_produto, p.nome, p.preco, p.precoPromo, c.quantidade, p.imagem
                    FROM carrinho2 c
                    JOIN produto p ON c.id_produto = p.id_produto";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
            // Como está usando PDO, o fetch é assim:
            $carrinho = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $carrinho;
        } catch (Exception $e) {
            error_log("Erro ao listar carrinho: " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Remove um produto do carrinho.
     * @param int $idProduto O ID do produto a ser removido.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function removerDoCarrinho($idCarrinhoItem) {
        try {
            $sql = "DELETE FROM carrinho2 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $idCarrinhoItem, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }
    
    /**
     * Adiciona um produto aos favoritos ou ignora se já existir.
     * @param int $idProduto O ID do produto a ser adicionado.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function adicionarAosFavoritos($idProduto) {
        try {
            $sql = "INSERT IGNORE INTO favoritos (id_produto) VALUES (:idProduto)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Lista os produtos que estão nos favoritos.
     * @return array Um array contendo os produtos favoritos.
     */
    public function ListarFavoritos() {
        try {
            $sql = "
                SELECT p.*, co.corPrincipal, co.hexDegrade1, co.hexDegrade2
                FROM favoritos f
                JOIN produto p ON f.id_produto = p.id_produto
                LEFT JOIN cores co ON p.id_cores = co.id_cores
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $favoritos;
        } catch (PDOException $e) {
            // Em caso de erro, retorne um array vazio
            return [];
        }
    }

    /**
     * Remove um produto dos favoritos.
     * @param int $idProduto O ID do produto a ser removido.
     * @return bool Retorna true em caso de sucesso, false em caso de falha.
     */
    public function removerDosFavoritos($idProduto) {
        try {
            $sql = "DELETE FROM favoritos WHERE id_produto = :idProduto";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':idProduto', $idProduto, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            return false;
        }
    }
}
/**
 * O carrinho2 que está puxando e outro carrinho que eu fiz no banco de dados ele tem id, id_produto, quantidade e data_adicionado fiz isso porque o carrinho que eu tinha
 *so tinha cep, id_carrinho e id_usuario e não ficaria tão completo mas tem como implementar os dois então se for adicionar no projeto tente juntar os dois e troque o carrinho dois por so carrinho
 */