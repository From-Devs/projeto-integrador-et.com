<?php
// app/Controllers/CustomizacaoController.php

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

    // Retorna todos os registros (tela)
    public function index(): array {
        return [
            "carousel"  => $this->carouselModel->getAll(),
            "lancamento"=> $this->lancamentoModel->getAll(),
            "destaque"  => $this->destaqueModel->getAll(),
            "produtos"  => $this->produtoModel->getAllProdutos(),
            "coresSub"  => $this->coresSubsModel->getAll()
        ];
    }

    // === CRUD CAROUSEL / DESTAQUE já existentes (mantive como estão) ===
    public function createCarousel(int $id_carousel = null, array $data) {
        
        // AJUSTE A (Recomendado): Usa getAll() que SEMPRE retorna array ([]) ou os dados.
        // Isso é mais robusto para contar o total de carrosséis.
        $carrosseis = $this->carouselModel->getAll(); 
        
        // OU AJUSTE B (Se você for forçado a usar o getCarousel que só pega 1 item, mas ele tem o limite de 3 na regra do Controller. Confuso!):
        // $carrosseis = $this->carouselModel->getCarousel() ?? []; 

        $total = count($carrosseis); // Agora o count() está seguro, pois $carrosseis é um array.
        
        if ($id_carousel !== null) {
            return ['action'=>'update','result'=>$this->carouselModel->update($id_carousel, $data)];
        }
        
        // Mudei para usar 'create' que está no seu Model.
        if ($total < 3) {
            $resultado = $this->carouselModel->create($data); 
            return ['action'=>'create','result'=>$resultado];
        }
        
        return ['error'=>'Limite máximo de 3 carrosseis atingido.','status'=>false];
    }

    public function deleteCarousel(int $id) { return $this->carouselModel->remove($id); }

    public function createDestaque(array $data): array {
        $existe = $this->destaqueModel->getDestaque();
        if (!$existe) {
            $resultado = $this->destaqueModel->create($data);
            return ['action'=>'create','result'=>$resultado];
        }
        $id_destaque = (int)$existe['id_prodDestaque'];
        $resultado = $this->destaqueModel->update($id_destaque, $data);
        return ['action'=>'update','result'=>$resultado];
    }

    public function deleteDestaque(int $id) { return $this->destaqueModel->remove($id); }

    public function createCoresSubs(int $id, array $data): array {
        $coresSubs = $this->coresSubsModel->create($id, $data);
        return ['coresSubs' => $coresSubs];
    }

    public function deleteCoresSubs(int $id) { return $this->coresSubsModel->remove($id); }

    // ============================
    // LANÇAMENTOS: CREATE / UPDATE
    // ============================
    // Recebe array $data (json decodificado). Se tiver id_lancamento => UPDATE, senão CREATE.
    public function createLancamento(array $data): array {
        $id = $data['id_lancamento'] ?? null;

        if (!empty($id)) {
            // UPDATE
            $ok = $this->lancamentoModel->Update((int)$id, $data);
            return ['action' => 'update', 'success' => (bool)$ok, 'id' => (int)$id];
        }

        // CREATE
        $createdId = $this->lancamentoModel->Create($data);
        return ['action' => 'create', 'success' => $createdId ? true : false, 'id' => $createdId];
    }

    // DELETE lançamento
    public function deleteLancamento(int $id): array {
        $ok = $this->lancamentoModel->Remove($id);
        return ['action'=>'delete','success'=>$ok,'id'=>$id];
    }

    // LISTAGEM específicas (usadas pela API)
    public function listCarousels() { return $this->carouselModel->getAll(); }
    public function listLancamentos() { return $this->lancamentoModel->getAll(); }
    public function listDestaques() { return $this->destaqueModel->getAll(); }

    /**
     * Busca um único produto por ID. Usado pelo JavaScript ao trocar produto no modal.
     */
    public function buscarProdutoPorId(int $id): ?array {
        return $this->produtoModel->getProdutoById($id);
    }
    
    /**
     * 🔥 NOVO: Busca UM único lançamento com todos os dados associados.
     * Presume-se que o LancamentoModel tem o método getById(int $id).
     */
    public function getLancamentoById(int $id): ?array {
        return $this->lancamentoModel->getById($id);
    }
    // ============================\
    // CAROUSEL: REORDER
    // ============================\
    public function reorderCarousel(array $newOrder): array {
        // Chama o Model para fazer a mágica no DB
        $ok = $this->carouselModel->reorder($newOrder);
        return ['action' => 'reorder', 'success' => (bool)$ok, 'count' => count($newOrder)];
    }
}

$conn = new CustomizacaoController();

$res = $conn->index();