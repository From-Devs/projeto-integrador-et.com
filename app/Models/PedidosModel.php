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
    
            //Para concatenar a pesquisa
            if (!empty($pesquisa)) {
                $sqlPedidos .= " WHERE nome LIKE :pesquisa";
                $params[':pesquisa'] = "$pesquisa%";
            }
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID':
                        $ordemSql = "id_pedido";
                        break;
                    case 'Preço':
                        $ordemSql = "precoTotal";
                        break;
                    case 'Data':
                        $ordemSql = "dataPedido";
                        break;
                    case 'Status':
                        $ordemSql = "S.id_status";
                        break;
                    default:
                        $ordemSql = "id_pedido";
                }
                $sqlPedidos .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlPedidos);
    
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