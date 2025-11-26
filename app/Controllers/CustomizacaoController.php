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
    public function createCarousel(int $id_carousel = null, array $data) {
        // Buscar quantos carrosseis já existem
        $carrosseis = $this->carouselModel->getCarousel(); 
        $total = count($carrosseis);

        // ------------ CASO 1: UPDATE --------------------
        // Se enviou um id, então é UPDATE mesmo
        if ($id_carousel !== null) {
            return [
                'action' => 'update',
                'result' => $this->carouselModel->update($id_carousel, $data)
            ];
        }

        // ------------ CASO 2: CREATE --------------------
        // Só cria se ainda tiver vagas (máx 3)
        if ($total < 3) {
            $resultado = $this->carouselModel->createCarousel($data);
            return [
                'action' => 'create',
                'result' => $resultado
            ];
        }

        // ------------ CASO 3: ERRO (tente criar o 4º) ---
        return [
            'error' => 'Limite máximo de 3 carrosseis atingido.',
            'status' => false
        ];
    }


    // Deletar carousel
    public function deleteCarousel(int $id) {
        return $this->carouselModel->remove($id);
    }

    // Criar destaque
    public function createDestaque(array $data): array {
        // 1) Verificar se já existe destaque
        $existe = $this->destaqueModel->getDestaque();
        if (!$existe) {
            // -----------------------------------
            // NÃO existe → CRIAR novo destaque
            // -----------------------------------
            $resultado = $this->destaqueModel->create($data);
            return ['action' => 'create', 'result' => $resultado];
        }
        // -----------------------------------
        // Já existe → UPDATE
        // -----------------------------------
        $id_destaque = (int)$existe['id_prodDestaque'];
        $resultado = $this->destaqueModel->update($id_destaque, $data);

        return ['action' => 'update', 'result' => $resultado];
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
