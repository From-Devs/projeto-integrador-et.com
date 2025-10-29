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
     * 🔹 Salvar imagem 
     *
     * @param string $file input.
     *
    */
    <?php
    // 🔥 BaseController - o pai de todos
    class BaseController {
      
      /**
       * Renderiza uma view
       */
      protected function render(string $view, array $data = []) {
        extract($data);
        require __DIR__ . "/../../views/$view.php";
      }
    
      /**
       * 🖼️ Salva uma imagem de produto e remove a anterior (se existir)
       */
      protected function SalvarImgProduto(array $file, ?string $oldPath = null): ?string {

        if ($file && isset($file['error']) && $file['error'] === UPLOAD_ERR_OK) {
    

          $nameFile = time() . '_' . basename($file['name']);
          $baseDir = __DIR__ . '/../../public/uploads/produto/';

          if (!is_dir($baseDir)) {
            mkdir($baseDir, 0777, true);
          }

          $dirs = glob($baseDir . '*', GLOB_ONLYDIR);
          $len = count($dirs) + 1;
          $name_dir = 'Produto' . $len;

          $subDir = $baseDir . $name_dir . '/';
          if (!is_dir($subDir)) {
            mkdir($subDir, 0777, true);
          }

          $pathDestination = $subDir . $nameFile;
    

          if (
            $oldPath && 
            str_starts_with($oldPath, 'public/uploads/') &&
            file_exists(__DIR__ . '/../../' . $oldPath)
          ) {
            unlink(__DIR__ . '/../../' . $oldPath);
          }
    
          // Move o novo arquivo
          if (move_uploaded_file($file['tmp_name'], $pathDestination)) {
            return 'public/uploads/produto/' . $name_dir . '/' . $nameFile;
          }
        }
    
        return null;
      }
    }
     /**
     * 🔹 Explicação
     * 
     * Esse método facilita a o salvamento de imagems,
     * tipo que salvar uma nova imagem ela vai ser passa na controller para peguar,
     * 
     * Controller <- View
     * 
     * Exemplo:
     *   class controller extends BaseController {
     *       public function create() {
     *           $this->salvarimagens(arquivo);
     *       }
     *   }
     */
}
