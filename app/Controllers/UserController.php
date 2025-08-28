<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $model;
    
    public function __construct() {
        $this->model = new User();
    }

    public function teste() {
        return $this->model->testConntx();
    }

    public function createUser($data) {
        return $this->model->create($data);
    }

    public function editUser($id_usuario, $data) {
        return $this->model->updateUser($id_usuario, $data);
    }

    public function deleteUser($id_usuario) {
        return $this->model->deleteById($id_usuario);
    }

    public function getUserById($id_usuario) {
        return $this->model->getUserById($id_usuario);
    }

    public function listAllUsers() {
        $users = $this->model->getAll();
        return ["success" => true, "data" => $users];
    }

    public function login($email, $senha) {
        $user = $this->model->getUserByEmail($email);
        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['id_usuario'] = $user['id_usuario'];
            return ["success" => true, "user" => $user];
        }
        return ["success" => false, "message" => "E-mail ou senha inválidos"];
    }
    
    public function saveAvatar($file) {
        return $this->model->salvarImagemFile($file);
    }    
    
    public function getLoggedUser() {
        if (!isset($_SESSION['id_usuario'])) return null;
        return $this->model->getUserById($_SESSION['id_usuario']);
    }

    public function updatePassword($id_usuario, $novoHash) {
        if (is_array($novoHash)) {
            $novoHash = $novoHash['senha'] ?? '';
        }
    
        $success = $this->model->updateSenha($id_usuario, $novoHash);
    
        return [
            "success" => $success,
            "message" => $success ? "Senha alterada com sucesso" : "Erro ao alterar senha"
        ];
    }
}
?>
