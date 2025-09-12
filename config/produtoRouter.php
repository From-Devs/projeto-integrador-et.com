<?php
require_once __DIR__ . "/produtoController.php";

$controller = new ProdutoController();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"], $_POST["id_produto"])) {
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
            break;

        case "atualizar_qtd":
            if (isset($_POST["quantidade"])) {
                $qtd = max(1, intval($_POST["quantidade"])); // nunca < 1
                try {
                    // se você ainda não implementou no controller, precisa criar atualizarQuantidadeCarrinho()
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
            break;

        // ======== FAVORITOS ========
        case "favorito":
            try {
                session_start();
                $idUsuario = $_SESSION['id_usuario'] ?? null;

                if ($idUsuario){
                    $controller->adicionarAosFavoritos($idProduto, $idUsuario);
                }
                
                header("Location: /projeto-integrador-et.com/app/views/usuario/listaDeDesejos.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao adicionar aos favoritos: " . $e->getMessage());
            }
            break;

        case "remover_favorito":
            try {
                session_start();  //garante q a sessão está ativa
                $idUsuario = $_SESSION['id_usuario'] ?? null;

                if ($idUsuario){
                    $controller->removerDosFavoritos($idProduto, $idUsuario);
                }
                
                header("Location: /projeto-integrador-et.com/app/views/usuario/listaDeDesejos.php");
                exit;
            } catch (Exception $e) {
                die("Erro ao remover dos favoritos: " . $e->getMessage());
            }
            break;
    }
}
?>
