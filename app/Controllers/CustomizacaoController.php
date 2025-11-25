<?php
// Controllers/CustomizacaoController.php

require_once __DIR__ . "/../Models/products.php";
require_once __DIR__ . "/../Models/DestaqueModel.php";
require_once __DIR__ . "/../Models/CarouselModel.php";
require_once __DIR__ . "/../Models/CoresSubModel.php";
require_once __DIR__ . "/../Models/LancamentoModel.php";

class CustomizacaoController {
    private Products $produtoModel;
    private Lancamentos $lancamentoModel;
    private ProdutoDestaque $destaqueModel;
    private CarouselModel $carouselModel;
    private CoresSubModel $coresSubsModel;

    public function __construct() {
        $this->lancamentoModel = new Lancamentos();
        $this->produtoModel = new Products();
        $this->destaqueModel = new ProdutoDestaque();
        $this->carouselModel = new CarouselModel();
        $this->coresSubsModel = new CoresSubModel();
    }

    // Retorna todos os registros
    public function index(): array {
        return [
            "carousel" => $this->carouselModel->getAll(),
            "lancamento" => $this->lancamentoModel->getAll(),
            "destaque" => $this->destaqueModel->getAll(),
            "produtos" => $this->produtoModel->getAllProdutos(),
            "coresSub" => $this->coresSubsModel->getAll()
        ];
    }
    // Criar carousel
    public function createCarousel(int $id_carousel, array $data) { 
        return $this->carouselModel->update($id_carousel, $data);
    }

    // Deletar carousel
    public function deleteCarousel(int $id) {
        return $this->carouselModel->remove($id);
    }

    // Criar destaque
    public function createDestaque(int $id, array $data): array {
        $resultado = $this->destaqueModel->update($id, $data);
        return ['destaque' => $resultado];
    }


    // Deletar destaque
    public function deleteDestaque(int $id) {
        return $this->destaqueModel->remove($id);
    }

    // Criar coresSubs
    public function createCoresSubs(int $id, array $data): array {
        $coresSubs = $this->coresSubsModel->create($id, $data);
        return ['coresSubs' => $coresSubs];
    }

    // Deletar coresSubs
    public function deleteCoresSubs(int $id) {
        return $this->coresSubsModel->remove($id);
    }
    // Criar lancamentos
    public function createLancamento(int $id, array $data): array {
        $lancamento = $this->lancamentoModel->create($id, $data);
        return ['lancamento' => $lancamentoModel];
    }
    // Deletar lancamentos
    public function deleteLancamento(int $id) {
        return $this->lancamentoModel->remove($id);
    }

}

$conn = new CustomizacaoController();

$res = $conn->index();
