<?php 
// 🔥👩‍🚀🚀 BaseController - Classe pai para todos os controllers
class BaseController {

    /**
     * 🔹 Renderiza uma view passando dados
     *
     * @param string $view Nome da view (arquivo .php)
     * @param array $data Array associativo de dados a serem extraídos
     *
     * Uso:
     *   No controller, vo cê pode fazer:
     *     $this->render('tela2', ['usuario' => $usuario]);
     *   Isso vai extrair a variável $usuario e incluir o arquivo views/tela2.php
     */
    
    // ✅ FIX: ADICIONE ESTA FUNÇÃO (OU CORRIJA SE JÁ TEM)
    protected function renderCustom($conn, $path, $data = []) {
      $_SESSION[$conn] = $data;  // 🔥 ISSO FAZ $carousels E $cores CHEGAREM!
      header("Location: ../../app/public/$path");
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
     * 🔹 Redereciamento 
     *
     * @param string $path Nome da caminho (tela .php)
     *
     */
    protected function redirect(string $path): void {
      header("Location: $path");
    }
    /**
     * 🔹 Explicação
     * 
     * Esse método facilita a o redicionamento das telas via controller,
     * tipo voce que ao carregar algo ele ja leve para uma tela
     * 
     * Controller -> View
     * 
     * Exemplo:
     *   class UserController extends BaseController {
     *       public function index() {
     *           $this->redirect(/view/user/tela.php)
     *       }
     *   }
     */

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
                // Mantém a antiga se não houver nova imagems
                $imagensSalvas[$campo] = $old[$campo] ?? null;
            }
        }

        return $imagensSalvas;
    }
    /**
     * 🔹 Salvar imagens de um produto
     * 
     * Salva até 3 imagens de um produto em uma pasta exclusiva,
     * remove as imagens antigas e retorna os caminhos salvos.
     * 
     * @param array $files Arquivos enviados ($_FILES)
     *                     Exemplo de $files na controller:
     *                     [
     *                       'img1' => $_FILES['img1'],
     *                       'img2' => $_FILES['img2'],
     *                       'img3' => $_FILES['img3']
     *                     ]
     * @param array $old Caminhos antigos das imagens (opcional)
     *                   Exemplo de $old na controller:
     *                   [
     *                       'img1' => 'public/uploads/produto/Produto_2/img_antiga1.jpg',
     *                       'img2' => 'public/uploads/produto/Produto_2/img_antiga2.jpg',
     *                       'img3' => null
     *                   ]
     * @param int $produtoId ID do produto (para criar pasta)
     *                       Exemplo: 2
     * @return array Caminhos das imagens salvas
     *               [
     *                   'img1' => 'public/uploads/produto/Produto_2/img1.jpg',
     *                   'img2' => 'public/uploads/produto/Produto_2/img2.jpg',
     *                   'img3' => null
     *               ]
     */


}
