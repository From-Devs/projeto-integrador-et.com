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
            JOIN status S
                ON P.id_status = S.id_status";
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
                    case 'Status': $ordemSql = "S.id_status"; break;
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
    
            // Agora adiciona os produtos e pagamentos para cada pedido
            foreach ($pedidos as &$pedido) {
                $idPedido = $pedido['id_pedido'];
                $pedido['detalhesPedido'] = $this->BuscarProdutosDoPedido($idPedido);
    
                // Se você tiver um método BuscarInfoPagamentos:
                // $pedido['infoPagamentos'] = $this->BuscarInfoPagamentos($idPedido);
            }
    
            return $pedidos;
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }


    // public function BuscarTodosPedidos($ordem="", $pesquisa=""){
    //     $pedido['detalhesPedido'] = $this->model->BuscarProdutosDoPedido($idPedido);

    //     foreach ($pedidos as &$pedido) {
    //         $idPedido = $pedido['id_pedido'];
    
    //         // Produtos do pedido
    //         $pedido['detalhesPedido'] = $this->model->BuscarProdutosDoPedido($idPedido);
    
    //         // Informações de pagamento (você precisa criar esse método)
    //         $pedido['infoPagamentos'] = $this->model->BuscarInfoPagamentos($idPedido);
    //     }

    //     try {    
    //         $sqlPedidos = "SELECT P.id_pedido, 
    //         U.nome,
    //         P.precoTotal,
    //         P.dataPedido,
    //         S.tipoStatus
    //         FROM Pedido P
    //         JOIN usuario U
    //             ON P.id_usuario = U.id_usuario
    //         JOIN status S
    //             ON P.id_status = S.id_status";
    //         $params = [];
    
    //         //Para concatenar a pesquisa
    //         if (!empty($pesquisa)) {
    //             $sqlPedidos .= " WHERE nome LIKE :pesquisa";
    //             $params[':pesquisa'] = "$pesquisa%";
    //         }
    
    //         if (!empty($ordem)) {
    //             switch ($ordem) {
    //                 case 'ID':
    //                     $ordemSql = "P.id_pedido";
    //                     break;
    //                 case 'Preço':
    //                     $ordemSql = "precoTotal";
    //                     break;
    //                 case 'Data':
    //                     $ordemSql = "dataPedido";
    //                     break;
    //                 case 'Status':
    //                     $ordemSql = "S.id_status";
    //                     break;
    //                 default:
    //                     $ordemSql = "P.id_pedido";
    //             }
    //             $sqlPedidos .= " ORDER BY $ordemSql";
    //         }
    
    //         $stmt = $this->conn->prepare($sqlPedidos);
    
    //         foreach ($params as $key => $val) {
    //             $stmt->bindValue($key, $val, PDO::PARAM_STR);
    //         }
    
    //         $stmt->execute();
    //         // return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $pedidos;
    
    //     } catch (\Throwable $th) {
    //         echo "Erro ao buscar: " . $th->getMessage();
    //         return false;
    //     }
    // }

    public function BuscarProdutosDoPedido($idPedido){
        try {    
            $sqlPedidoProduto = "SELECT 
            PROD.id_produto, 
            PROD.nome as nomeProduto,
            U.nome as nomeUsuario,
            PROD.preco,
            PP.quantidade
            FROM PEDIDOPRODUTO PP
            JOIN PRODUTO PROD
                ON PP.id_produto = PROD.id_produto
            JOIN PEDIDO PED
                ON PP.id_pedido = PED.id_pedido
            JOIN USUARIO U
                ON U.id_usuario = PED.id_usuario
            WHERE PP.id_pedido = :idPedidoProduto";
    
            $stmt = $this->conn->prepare($sqlPedidoProduto);
            $stmt->bindValue(":idPedidoProduto", $idPedido, PDO::PARAM_INT);
    
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
}

?>