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

    public function editaCarosel(int $id, array $data) {
        return $this->carouselModel->update($id, $data);
    }

    public function deleteCarosel(int $id) {
        return $this->carouselModel->remove($id);
    }

    public function updateCoresPersonalizadas(int $id_carousel, array $data) {
        return $this->carouselModel->updateCoresPersonalizadas($id_carousel, $data);
    }

    public function getAllUniqueCores() {
        return $this->carouselModel->getAllUniqueCores();
    }
}
$conn = new CaroselController();
$te = $conn->getAll();
print_r($te);
// 🧩 Caso 1: mudou só o produto
$res = $conn->updateCoresPersonalizadas(1, [
    'corEspecial' => '#123456',
    'hexDegrade1' => '#654321',
    'hexDegrade2' => '#AABBCC',
    'hexDegrade3' => '#FFFFFF'
]);

var_dump($res);



// var_dump($atual, $novoProduto);
