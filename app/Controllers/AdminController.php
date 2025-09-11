<?php
require_once __DIR__ . '/../Models/AdminModel.php';

class AdminController {
    private $AdminModel;

    public function __construct() {
        $this->AdminModel = new AdminModel();
    }
    public function mostrar(){
        return $this->AdminModel->getAll();
    }

    // Criar um novo administrador
    public function CriarAdmin($senha, $email){
        return $this->AdminModel->createAdmin($senha, $email);
    }

    // Atualizar administrador
    public function AtualizarAdmin($id, $senha, $email) {
        return $this->AdminModel->update($id, $senha, $email);
    }

    // Deletar administrador
    public function DeletarAdmin($id) {
        return $this->AdminModel->deleteAdmin($id);
    }
}

// Uso exemplo:
$controller = new AdminController();

// // Criar um novo admin
// $novoAdminId = $controller->CriarAdmin("senha123", "email@exemplo.com"); 
// echo "Novo administrador ID: " . $novoAdminId;

// // mostrar todos Admin
// $todos = $controller->mostrar();
// print_r($todos);

// // Atulizar um novo admin
// $updete = $controller->AtualizarAdmin(2,"darklord","darklord");
// echo "Atulizado Administrador" . $updete

// // Deletar administrador 
// $delete = $controller->DeletarAdmin(3);
// echo "deletou admin " . $delete 

//Crud completo tem funçao de um só, Mais nao é necessário 
?>
