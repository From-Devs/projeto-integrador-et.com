<?php
require_once __DIR__ . "/../../app/Models/CarouselModel.php";

class CarouselAPIController {

    public function list() {

        $model = new CarouselModel();
        $dados = $model->getAll();

        header("Content-Type: application/json");
        echo json_encode($dados);
    }
}