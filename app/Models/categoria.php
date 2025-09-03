<?php 
require_once __DIR__ . "/../../config/database.php";

class CategoriaModel {
    
    // Puxa todas as categorias
    public static function getCategorias() {
        $db = Database::Connect();
        $sql = "SELECT id_categoria, nome FROM categorias";
        $stmt = $db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Puxa subcategorias de uma categoria específica
    public static function getSubcategorias($id_categoria) {
        $db = Database::Connect();
        $sql = "SELECT id_subCategoria, nome FROM subcategorias WHERE id_categoria = :id_categoria";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id_categoria", $id_categoria, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Puxa categoria + subcategorias juntas
    public static function getCategoriasComSub() {
        $categorias = self::getCategorias();
        foreach ($categorias as &$categoria) {
            $categoria["subcategorias"] = self::getSubcategorias($categoria["id_categoria"]);
        }
        return $categorias;
    }
}
