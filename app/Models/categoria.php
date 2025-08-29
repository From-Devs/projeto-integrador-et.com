<?php
require_once __DIR__ . "/../../config/database.php";

class CategoriaController {

    // Busca produtos pela categoria e (opcional) subcategoria
    public static function getProdutosPorTela($categoria, $subcategoria = ""){
        $db = Database::connect();

        // normaliza para evitar diferença de maiúsculas/minúsculas
        $categoria   = strtolower($categoria);
        $subcategoria = strtolower($subcategoria);

        $sql = "SELECT nome, marca, preco, preco_antigo, slug, cor1, cor2, cor3 
                FROM produtos 
                WHERE categoria = :cat 
                AND (:sub = '' OR subcategoria = :sub)";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":cat", $categoria);
        $stmt->bindValue(":sub", $subcategoria);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // formata preços
        foreach ($resultados as &$p) {
            $p["preco_formatado"] = "R$" . number_format($p["preco"], 2, ",", ".");
            $p["preco_antigo_formatado"] = $p["preco_antigo"] 
                ? "R$" . number_format($p["preco_antigo"], 2, ",", ".") 
                : "";
        }

        return $resultados;
    }

}
