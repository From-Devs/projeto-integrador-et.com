<?php 
// Controllers/CustomizacaoModel.php
require_once __DIR__ . "/../Models/CustomizacaoModel.php";

class CustomizacaoController
{
    public function index(){
        $model = new CustomizacaoModel()
        // get alguma coisa
        $teste = $model->read()
        require_once __DIR__ "CustomizacaoController.php"
    }
}
?>