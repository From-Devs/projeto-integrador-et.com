<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }
    public function teste(){
        $success = $this->model->testConntx();
        return $success;
    }

    public function createUser($data) {
        $success = $this->model->create($data);
        return ["success" => $success, "message" => $success ? "Usuário criado" : "Erro ao criar"];
    }

    public function editUser($id, $data) {
        $success = $this->model->updateUser($id, $data);
        return ["success" => $success, "message" => $success ? "Usuário atualizado" : "Erro ao atualizar"];
    }

    public function deleteUser($id) {
        $success = $this->model->deleteById($id);
        return ["success" => $success, "message" => $success ? "Usuário excluído" : "Erro ao excluir"];
    }

    public function getUserById($id) {
        return $this->model->getUserById($id);
    }

    public function listAllUsers() {
        $users = $this->model->getAll();
        return ["success" => true, "data" => $users];
    }
}
?>
