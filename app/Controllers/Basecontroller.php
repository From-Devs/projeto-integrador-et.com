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
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
      $_SESSION[$conn] = $data;  // 🔥 ISSO FAZ $carousels E $cores CHEGAREM!
      header("Location: ../../../app/public/$path");
      exit;
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
}
