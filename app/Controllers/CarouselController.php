<?php
require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . '/../Models/CarouselModel.php';
require_once __DIR__ . '/../Models/CoresSubModel.php';

class CaroselController extends BaseController {
    private $carouselModel;
    private $coresModel;

    public function __construct() {
        $this->carouselModel = new CarouselModel();
        $this->coresModel = new CoresSubModel();
    }

    public function getAll() {
        $dados = [ 
            'carousels' => $this->carouselModel->getAll(),
        ];
        return $dados['carousels'];
    }


    public function getById(int $id) {
        $carousel = $this->carouselModel->getElementById($id);
        $cor = $carousel ? $this->coresModel->getElementById($carousel['id_coresSubs']) : null;

        $dados = [
            'carousel' => $carousel,
            'cor' => $cor
        ];
        $this->renderCustom('index', 'teste/index.php', $dados);
    }

    public function createCarosel(array $data) {
        return $this->carouselModel->create($data);
    }
    // CÓDIGO DO SEU CONTROLLER (apenas a função update alterada)
    public function deleteCarosel(int $id) {
        return $this->carouselModel->remove($id);
    }
    public function update(int $id_carousel, array $data) { 
         return $this->carouselModel->update($id_carousel, $data);
    }
}

// $conn = new CaroselController(); // ou CarouselController, como for o nome da sua classe
// Primeiro vê o que já tem
// echo "<pre>";
// echo "=== ANTES DOS TESTES ===\n";
// $te = $conn->getAll();
// print_r($te);
// echo "</pre><hr>";
// echo "<h3>TESTE 1: Trocar só o produto (id_produto = 57)</h3>";
// $res = $conn->update(1, [
//     'id_produto' =>127
// ]);
// print_r($res);
// echo "<h3>TESTE 3: Só mudar as cores (não mexe no produto)</h3>";
// $res = $conn->update(3, [
//     'corEspecial' => '#cf166cff',
//     'hexDegrade1' => '#b71d74ff',
//     'hexDegrade2' => '#940130ff',
//     'hexDegrade3' => '#6a2018ff'
// ]);
// print_r($res); 

// $conn = new CaroselController();
// $te = $conn->getAll();

// $res = $conn->update(1,[
    
// ])
// $res = $conn->updateCoresPersonalizadas(1, [
//     'corEspecial' => '#124b56ff',
//     'hexDegrade1' => '#212165ff',
//     'hexDegrade2' => '#9258ffff',
//     'hexDegrade3' => '#e11cffff'
// ]);


// NO FINAL DO SEU CaroselController.php

// ...
