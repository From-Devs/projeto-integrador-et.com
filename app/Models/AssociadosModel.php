<?php

require_once __DIR__ . '/../../config/database.php';

class AssociadosModel{
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->Connect();
    }

    public function BuscarTodosAssociados($tipo_tabela, $ordem="", $pesquisa=""){
        try {
            $sqlAssociados = "SELECT id_usuario, U.nome, U.email, E.cidade, E.estado, U.telefone
            FROM usuario U
            LEFT JOIN endereco E ON U.id_endereco = E.id_endereco
            WHERE (U.tipo = 'associado' OR U.tipo = 'Associado')";
            
            if($tipo_tabela == "solicitacao"){
                $sqlAssociados = "SELECT U.id_usuario, U.nome, U.email, U.TIPO, E.cidade, E.estado, SA.sobreProdutos, SA.motivoDoRecuso
                    FROM usuario U
                    LEFT JOIN endereco E
                        ON U.id_endereco = E.id_endereco
                    LEFT JOIN solicitacaodeassociado SA
                    	ON U.id_usuario = SA.id_usuario
                    WHERE U.TIPO = 'Cliente'";
            }

            $params = [];
    
            if (!empty($pesquisa)) {
                if (strpos($sqlAssociados, 'WHERE') !== false) {
                    $sqlAssociados .= " AND U.nome LIKE :pesquisa";
                } else {
                    $sqlAssociados .= " WHERE U.nome LIKE :pesquisa";
                }
                $params[':pesquisa'] = "$pesquisa%";
            }
            
    
            if (!empty($ordem)) {
                switch ($ordem) {
                    case 'ID':
                        $ordemSql = "id_usuario";
                        break;
                    case 'Nome':
                        $ordemSql = "U.NOME";
                        break;
                    case 'Cidade':
                        $ordemSql = "E.CIDADE";
                        break;
                    default:
                        $ordemSql = "id_usuario";
                }
                $sqlAssociados .= " ORDER BY $ordemSql";
            }
    
            $stmt = $this->conn->prepare($sqlAssociados);
    
            foreach ($params as $key => $val) {
                $stmt->bindValue($key, $val, PDO::PARAM_STR);
            }
    
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            return $res ?: [];
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }

    public function ValidarAssociado($idUsuario){
        try {
            $this->conn->beginTransaction();
    
            $sqlUpdate = "UPDATE usuario SET tipo = 'Associado' WHERE id_usuario = :id_usuario";
            $stmtUpdate = $this->conn->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtUpdate->execute();
    
            $sqlDelete = "DELETE FROM solicitacaodeassociado WHERE id_usuario = :id_usuario";
            $stmtDelete = $this->conn->prepare($sqlDelete);
            $stmtDelete->bindValue(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtDelete->execute();
    
            $this->conn->commit();
            return true;
    
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao validar associado: " . $th->getMessage();
            return false;
        }
    }

    public function recusarAssociado($idUsuario, $motivo){
        try {
            $this->conn->beginTransaction();
    
            $sqlMotivo = "UPDATE solicitacaodeassociado SET motivoDoRecuso = :motivo WHERE ID_USUARIO = :id_usuario";
            $stmtMotivo = $this->conn->prepare($sqlMotivo);
            $stmtMotivo->bindValue(":id_usuario", $idUsuario, PDO::PARAM_INT);
            $stmtMotivo->bindValue(":motivo", $motivo, PDO::PARAM_STR);
            $stmtMotivo->execute();
    
            $this->conn->commit();
            return true;
    
        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao recusar associado: " . $th->getMessage();
            return false;
        }
    }

    public function mudarStatus($novoStatus, $idPedido){
        try {
            $this->conn->beginTransaction();

            $sqlStatus = "UPDATE PEDIDO SET id_status_pagamento = :idStatus WHERE id_pedido = :idPedido";
            $stmtStatus = $this->conn->prepare($sqlStatus);
            $stmtStatus->bindValue(":idStatus", $novoStatus, PDO::PARAM_INT);
            $stmtStatus->bindValue(":idPedido", $idPedido, PDO::PARAM_INT);
            $stmtStatus->execute();
            $this->conn->commit();

            return true;

        } catch (\Throwable $th) {
            $this->conn->rollBack();
            echo "Erro ao recusar associado: " . $th->getMessage();
            return false;
        }
    }
    
}

?>