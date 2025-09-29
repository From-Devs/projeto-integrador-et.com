<?php

require_once __DIR__ . '/../../config/database.php';

class HistoricoDeVendasModel{
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function BuscarHistoricoDeVendasProdutos($ordem="", $pesquisa=""){
        try {    
            $sqlHvP = "SELECT PP.id_pedido_produto, 
            PROD.nome as nomeProduto,
            PED.dataPedido as dataVenda,
            PROD.preco,
            PP.quantidade
            FROM PEDIDOPRODUTO PP
            JOIN PRODUTO PROD
                ON PP.id_produto = PROD.id_produto
            JOIN PEDIDO PED
                ON PP.id_pedido = PED.id_pedido";
            $params = [];
    
            //Para concatenar a pesquisa
            if (!empty($pesquisa)) {
                $sqlHvP .= " WHERE nome LIKE :pesquisa";
                $params[':pesquisa'] = "$pesquisa%";
            }
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID':
                        $ordemSql = "id_pedido_produto";
                        break;
                    case 'Preço':
                        $ordemSql = "preco";
                        break;
                    case 'Data':
                        $ordemSql = "dataVenda";
                        break;
                    case 'Quantidade':
                        $ordemSql = "quantidade";
                        break;
                    default:
                        $ordemSql = "id_pedido";
                }
                $sqlHvP .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlHvP);
    
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val, PDO::PARAM_STR);
            }
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
}

?>