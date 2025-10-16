<?php
require_once __DIR__ . '/../../config/database.php';

class RelatorioAssociado {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this -> conn = $db -> Connect();
    }

    public function getRelatorioReceitas($idAssociado) {
        $sql = "SELECT SUM(valor) as total_receita, MONTH(data_venda)
                FROM vendas
                WHERE id_associado = :id
                GROUP BY MONTH(data_venda), produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idAssociado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReceitaPorProduto($idAssociado) {
        $sql = "SELECT produto, SUM(valor) as total
                FROM vendas
                WHERE id_associado = :id
                GROUP BY MONTH(data_venda), produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idAssociado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVendasAbandonadas($idAssociado) {
        $sql = "SELECT * FROM vendas
                WHERE id_associado = :id AND status = 'abandonada'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idAssociado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSaldoReceber($idAssociado) {
        $sql = "SELECT SUM(valor) as saldo
                FROM vendas
                WHERE id_associado = :id AND status = 'pendente'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idAssociado, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>