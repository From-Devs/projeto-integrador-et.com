<?php
require_once __DIR__ . '/../Models/associado.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new Associado();
    }

}