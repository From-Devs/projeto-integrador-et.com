<?php
require_once __DIR__ . '/../../config/database.php';

class RelatorioADM {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this -> conn = $db -> Connect();
    }

    public function getRelatorioReceitas($idADM) {
        $sql = "SELECT SUM(valor) as total_receita, MONTH(data_venda)
                FROM vendas
                WHERE id_ADM = :id
                GROUP BY MONTH(data_venda), produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idADM, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getReceitaPorProduto($idADM) {
        $sql = "SELECT produto, SUM(valor) as total
                FROM vendas
                WHERE id_ADM = :id
                GROUP BY MONTH(data_venda), produto";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idADM, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVendasAbandonadas($idADM) {
        $sql = "SELECT * FROM vendas
                WHERE id_ADM = :id AND status = 'abandonada'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idADM, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSaldoReceber($idADM) {
        $sql = "SELECT SUM(valor) as saldo
                FROM vendas
                WHERE id_ADM = :id AND status = 'pendente'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $idADM, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>