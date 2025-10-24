<?php

require_once __DIR__ . '/../../config/database.php';

class PedidosModel{
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function BuscarTodosPedidos($ordem="", $pesquisa=""){
        try {    
            $sqlPedidos = "SELECT P.id_pedido, 
            U.nome,
            P.precoTotal,
            P.dataPedido,
            S.tipoStatus
            FROM Pedido P
            JOIN usuario U
                ON P.id_usuario = U.id_usuario
            JOIN statusPagamento S
                ON P.id_status = S.id_status_pagamento";
            $params = [];
    
            if (!empty($pesquisa)) {
                $sqlPedidos .= " WHERE U.nome LIKE :pesquisa";
                $params[':pesquisa'] = "$pesquisa%";
            }
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID': $ordemSql = "P.id_pedido"; break;
                    case 'Preço': $ordemSql = "precoTotal"; break;
                    case 'Data': $ordemSql = "dataPedido"; break;
                    case 'Status': $ordemSql = "S.id_status_pagamento"; break;
                    default: $ordemSql = "P.id_pedido";
                }
                $sqlPedidos .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlPedidos);
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val, PDO::PARAM_STR);
            }
            $stmt->execute();
    
            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($pedidos as &$pedido) {
                $idPedido = $pedido['id_pedido'];
                $pedido['detalhesPedido'] = $this->BuscarProdutosDoPedido($idPedido);
    
                // $pedido['infoPagamentos'] = $this->BuscarInfoPagamentos($idPedido);
            }
    
            return $pedidos;
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }


    public function BuscarTodosPedidosAssociado($ordem="", $pesquisa="", $idAssociado){
        try {    
            $sqlPedidos = "SELECT DISTINCT P.id_pedido, 
            U.nome,
            P.precoTotal,
            P.dataPedido,
            S.tipoStatus
            FROM Pedido P
            JOIN usuario U
                ON P.id_usuario = U.id_usuario
            JOIN statusPagamento S
                ON P.id_status = S.id_status_pagamento
            WHERE U.id_usuario = :idAssociado";
            $params = [];
    
            if (!empty($pesquisa)) {
                $sqlPedidos .= " AND U.nome LIKE :pesquisa";
                $params[':pesquisa'] = "$pesquisa%";
            }
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID': $ordemSql = "P.id_pedido"; break;
                    case 'Preço': $ordemSql = "precoTotal"; break;
                    case 'Data': $ordemSql = "dataPedido"; break;
                    case 'Status': $ordemSql = "S.id_status_pagamento"; break;
                    default: $ordemSql = "P.id_pedido";
                }
                $sqlPedidos .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlPedidos);
            $stmt->bindValue(":idAssociado", $idAssociado, PDO::PARAM_INT);
            $stmt->execute();
    
            $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $pedidos;
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function BuscarProdutosDoPedido($idPedido){
        try {    
            $sqlprodutopedido = "SELECT 
            PROD.id_produto, 
            PROD.nome as nomeProduto,
            U.nome as nomeUsuario,
            PROD.preco,
            PP.quantidade
            FROM produtopedido PP
            JOIN PRODUTO PROD
                ON PP.id_produto = PROD.id_produto
            JOIN PEDIDO PED
                ON PP.id_pedido = PED.id_pedido
            JOIN USUARIO U
                ON U.id_usuario = PED.id_usuario
            WHERE PP.id_pedido = :idprodutopedido";
    
            $stmt = $this->conn->prepare($sqlprodutopedido);
            $stmt->bindValue(":idprodutopedido", $idPedido, PDO::PARAM_INT);
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
}

?>