<?php
require_once __DIR__ . '/../Models/User.php';
session_start();

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function teste() {
        return $this->model->testConntx();
    }

    public function createUser($data) {
        $success = $this->model->create($data);
        return [
            "success" => $success,
            "message" => $success ? "Usuário criado" : "Erro ao criar"
        ];
    }

    public function editUser($id_usuario, $data) {
        $success = $this->model->updateUser($id_usuario, $data);
        return [
            "success" => $success,
            "message" => $success ? "Usuário atualizado" : "Erro ao atualizar"
        ];
    }

    public function deleteUser($id_usuario) {
        $success = $this->model->deleteById($id_usuario);
        return [
            "success" => $success,
            "message" => $success ? "Usuário excluído" : "Erro ao excluir"
        ];
    }

    public function getUserById($id_usuario) {
        return $this->model->getUserById($id_usuario);
    }

    public function listAllUsers() {
        $users = $this->model->getAll();
        return [
            "success" => true,
            "data" => $users
        ];
    }
    

    public function login($email, $senha) {
        $user = $this->model->getUserByEmail($email);

        if ($user && password_verify($senha, $user['senha'])) {

            $_SESSION['id_usuario'] = $user['id_usuario'];
            return [
                "success" => true,
                "user" => $user
            ];
        }

        return [
            "success" => false,
            "message" => "E-mail ou senha inválidos"
        ];
    }


    public function getLoggedUser() {
        if (!isset($_SESSION['id_usuario'])) {
            return null;
        }
        return $this->model->getUserById($_SESSION['id_usuario']);
    }
}
?>
