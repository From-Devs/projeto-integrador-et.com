<?php
// 🔥👩‍🚀🚀 BaseController - Classe pai para todos os controllers
session_start(); // ✅ CORRIGIDO — faltavam os parênteses

class BaseController {

    /**
     * 🔹 Renderiza uma view passando dados
     *
     * @param string $view Nome da view (arquivo .php)
     * @param array $data Array associativo de dados a serem extraídos
     *
     * Uso:
     *   No controller, você pode fazer:
     *     $this->render('tela2', ['usuario' => $usuario]);
     *   Isso vai extrair a variável $usuario e incluir o arquivo views/tela2.php
     */
    protected function renderCustom(string $sessionKey, string $viewPath, array $data = []) {
        session_start();

        // 🔹 Salva dados em sessão (caso queira reutilizar depois)
        $_SESSION[$sessionKey] = $data;

        // 🔹 Gera variáveis locais a partir do array (ex: $carousels, $usuario etc)
        extract($data, EXTR_SKIP);

        // 🔹 Caminho completo da view
        $viewFile = __DIR__ . "/../../views/" . $viewPath;

        if (!file_exists($viewFile)) {
            die("Erro: view '$viewFile' não encontrada.");
        }

        require $viewFile;
    }

    /**
     * 🔹 Explicação
     * 
     * Esse método facilita a passagem de dados do controller para a view.
     * Em vez de fazer require manual de cada view e passar variáveis,
     * você pode usar render() para organizar melhor o fluxo:
     * 
     * Controller -> Dados -> View
     * 
     * Exemplo:
     *   class UserController extends BaseController {
     *       public function index() {
     *           $users = ['Alice', 'Bob'];
     *           $this->render('users', ['users' => $users]);
     *       }
     *   }
     */

    /**
     * 🔹 Redirecionamento 
     *
     * @param string $path Caminho do arquivo (tela .php)
     */
    protected function redirect(string $path): void {
        header("Location: $path");
        exit;
    }

    /**
     * 🔹 Salvar as imagens de um produto (até 3)
     *
     * @param array $files Ex: $_FILES
     * @param array $old Caminhos antigos das imagens (para remover)
     * @param int $produtoId ID do produto
     * @return array Caminhos finais das imagens
     */
    protected function SalvarImagensProduto(array $files, array $old = [], int $produtoId): array {
        // Pasta específica do produto
        $baseDir = __DIR__ . "/../../public/uploads/produto/Produto_$produtoId/";

        // Cria a pasta se não existir
        if (!is_dir($baseDir)) {
            mkdir($baseDir, 0777, true);
        }

        $imagensSalvas = [];

        // Campos esperados (você pode mudar se quiser)
        foreach (['img1', 'img2', 'img3'] as $campo) {

            if (isset($files[$campo]) && $files[$campo]['error'] === UPLOAD_ERR_OK) {
                $nomeArquivo = time() . '_' . basename($files[$campo]['name']);
                $caminhoDestino = $baseDir . $nomeArquivo;

                // Remove a imagem antiga (se existir)
                if (!empty($old[$campo]) && file_exists(__DIR__ . '/../../' . $old[$campo])) {
                    unlink(__DIR__ . '/../../' . $old[$campo]);
                }

                // Move o novo arquivo
                if (move_uploaded_file($files[$campo]['tmp_name'], $caminhoDestino)) {
                    $imagensSalvas[$campo] = "public/uploads/produto/Produto_$produtoId/$nomeArquivo";
                }
            } else {
                // Mantém a antiga se não houver nova imagem
                $imagensSalvas[$campo] = $old[$campo] ?? null;
            }
        }

        return $imagensSalvas;
    }
}
