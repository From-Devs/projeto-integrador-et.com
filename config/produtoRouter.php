<?php
require_once __DIR__ . "/produtoController.php";

$controller = new ProdutoController();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"]) && isset($_POST["id_produto"])) {
    $acao = $_POST["acao"];
    $idProduto = intval($_POST["id_produto"]);

    switch ($acao) {
        // ======== CARRINHO ========
        case "carrinho":
            try {
                $controller->adicionarAoCarrinho($idProduto);
                header("Location: /projeto-integrador-et.com/app/views/usuario/Meu_Carrinho.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao adicionar ao carrinho: " . $e->getMessage());
            }

        case "atualizar_qtd":
            if (isset($_POST["quantidade"])) {
                $qtd = max(1, intval($_POST["quantidade"])); // nunca deixa ser < 1
                try {
                    $controller->atualizarQuantidadeCarrinho($idProduto, $qtd);
                    header("Location: /projeto-integrador-et.com/app/views/usuario/Meu_Carrinho.php");
                    exit;
                } catch (Exception $e) {
                    die("Erro ao atualizar quantidade: " . $e->getMessage());
                }
            }
            break;

        case "remover_carrinho":
            try {
                $controller->removerDoCarrinho($idProduto);
                header("Location: /projeto-integrador-et.com/app/views/usuario/Meu_Carrinho.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao remover do carrinho: " . $e->getMessage());
            }

        // ======== FAVORITOS ========
        case "favorito":
            try {
                $controller->adicionarAosFavoritos($idProduto);
                header("Location: /projeto-integrador-et.com/app/views/usuario/listaDeDesejos.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao adicionar aos favoritos: " . $e->getMessage());
            }

        case "remover_favorito":
            try {
                $controller->removerDosFavoritos($idProduto);
                header("Location: /projeto-integrador-et.com/app/views/usuario/listaDeDesejos.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao remover dos favoritos: " . $e->getMessage());
            }
    }
}
?>
