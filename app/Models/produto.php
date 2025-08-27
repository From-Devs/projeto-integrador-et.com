<?php

class Produto {
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function pesquisar($termo){
        $sql = "SELECT id_produto, nome, marca, img1 
                FROM Produto
                WHERE nome LIKE ? 
                   OR marca LIKE ? 
                   OR descricaoBreve LIKE ? 
                   OR descricaoTotal LIKE ?";

        $stmt = $this->conn->prepare($sql);
        $like = "%".$termo."%";
        $stmt->bind_param("ssss", $like, $like, $like, $like);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

?>