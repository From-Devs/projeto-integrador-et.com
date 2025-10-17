<?php 
// Controllers/CustomizacaoModel.php
require_once __DIR__ . "/../Models/CustomizacaoModel.php";

class CustomizacaoController
{
    public function index(){
        $model = new CustomizacaoModel()
        // get alguma coisa
        $usuarios = $model->read()

        
        echo "<pre>";
        print_r($usuarios);
        echo "</pre>";
    }
}
?>