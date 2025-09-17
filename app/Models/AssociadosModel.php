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
                JOIN endereco E
                    ON U.id_endereco = E.id_endereco
            WHERE U.tipo = 'associado'";
            
            // if($tipo_tabela == "solicitacao"){
            //     $sqlAssociados = "SELECT id_usuario, U.nome, U.email, E.cidade, E.estado
            //         FROM usuario U
            //         JOIN endereco E
            //             ON U.id_endereco = E.id_endereco
            //         JOIN SolicitacaoDeAssociado SU
            //             ON U.id_usuario = SU.id_usuario";
            // }

            $params = [];
    
            //Para concatenar a pesquisa
            if (!empty($pesquisa)) {
                $sqlAssociados .= " WHERE nome LIKE :pesquisa";
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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (\Throwable $th) {
            echo "Erro ao buscar: " . $th->getMessage();
            return false;
        }
    }
}

?>