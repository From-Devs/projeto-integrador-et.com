<?php
require_once __DIR__ . '/../Models/User.php';


class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function listAllUsers() {
        $users = $this->userModel->getAll();
        if ($users) {
            return ['success' => true, "data" => $users];
        } else {
            return ['success' => false, 'message' => 'Erro ao visualizar todos os usuários.'];
        }
    }

    public function createUser($postData) {
        if(empty($postData['nome']) || empty($postData['email']) || empty($postData['senha'])) {
            return ['success' => false, 'message' => 'Nome, email e senha são obrigatórios!'];
        }
    
        $postData['senha'] = password_hash($postData['senha'], PASSWORD_DEFAULT);
    
        $created = $this->userModel->create($postData);
    
        if($created) {
            return ['success' => true, 'message' => 'Usuário criado com sucesso!'];
        } else {
            return ['success' => false, 'message' => 'CPF já cadastrado ou erro ao criar usuário.'];
        }
    }
    public function getUserById($id) {
        $this->model->getUserById($id);
    }

    
    public function deleteUser($id) {
        if (empty($id) || !is_numeric($id)) {
            return ['success' => false, 'message' => 'ID inválido.'];
        }
    
        $deleted = $this->userModel->deleteById($id);
    
        if ($deleted) {
            return ['success' => true, 'message' => 'Usuário deletado com sucesso!'];
        } else {
            return ['success' => false, 'message' => 'Erro ao deletar usuário.'];
        }
    }
    public function editUser($id, $data) {
        if (empty($id) || !is_numeric($id)) {
            return ['success' => false, 'message' => 'ID inválido.'];
        }
    
        $updated = $this->userModel->updateUser($id, $data);
    
        if ($updated) {
            return ['success' => true, 'message' => 'Usuário atualizado com sucesso!'];
        } else {
            return ['success' => false, 'message' => 'Erro ao atualizar usuário.'];
        }
    }    
    
}
?>
