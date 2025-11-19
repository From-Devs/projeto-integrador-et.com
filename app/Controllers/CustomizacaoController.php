<?php
// Controllers/CustomizacaoController.php

require_once __DIR__ . "/../Models/products.php";
require_once __DIR__ . "/../Models/DestaqueModel.php";
require_once __DIR__ . "/../Models/CarouselModel.php";
require_once __DIR__ . "/../Models/CoresSubModel.php";

class CustomizacaoController {
    private Products $produtoModel;
    private ProdutoDestaque $destaqueModel;
    private CarouselModel $carouselModel;
    private CoresSubModel $coresSubsModel;

    public function __construct() {
        $this->produtoModel = new Products();
        $this->destaqueModel = new ProdutoDestaque();
        $this->carouselModel = new CarouselModel();
        $this->coresSubsModel = new CoresSubModel();
    }

    // Retorna todos os registros
    public function index(): array {
        return [
            "produtos" => $this->produtoModel->getAllProdutos(),
            "carousel" => $this->carouselModel->getAll(),
            "coresSub" => $this->coresSubsModel->getAll(),
            "destaque" => $this->destaqueModel->getAll()
        ];
    }

    // Deletar carousel
    public function deleteCarousel(int $id) {
        return $this->carouselModel->remove($id);
    }

    // Criar carousel
    public function createCarousel(int $id, array $data): array {
        $carousels = $this->carouselModel->create($id, $data);
        return ['carousels' => $carousels];
    }

    // // Deletar carousel
    // public function deleteCarousel(int $id) {
    //     return $this->carouselModel->remove($id);
    // }

    // Criar destaque
    public function createDestaque(int $id, array $data): array {
        $destaque = $this->destaqueModel->create($id, $data);
        return ['destaque' => $destaque];
    }

    // // Deletar carousel
    // public function deleteCarousel(int $id) {
    //     return $this->carouselModel->remove($id);
    // }

    // Criar cores/subs
    public function createCoresSubs(int $id, array $data): array {
        $coresSubs = $this->coresSubsModel->create($id, $data);
        return ['coresSubs' => $coresSubs];
    }

    // // Deletar carousel
    // public function deleteCarousel(int $id) {
    //     return $this->carouselModel->remove($id);
    // }
    // public function createLanca(int $id, array $data): array {
    //     $lanca
    // }

}

$conn = new CustomizacaoController();

$res = $conn->index();
// echo "<pre>";
// print_r($res);
// echo "</pre>";