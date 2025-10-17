<?php
require_once __DIR__ . "/../Models/CarouselModel.php";
require_once __DIR__ . "/../Models/CoresSubModel.php";

class CarouselController {
    private CarouselModel $carouselModel;
    private CoresSubModel $coresModel;

    public function __construct() {
        $this->carouselModel = new CarouselModel();
        $this->coresModel = new CoresSubModel();
    }

    // 🔹 Listar todos os carrosseis e cores
    public function getAll(): void {
        try {
            $carousels = $this->carouselModel->getAll();
            $cores = $this->coresModel->getAll();
    
            require __DIR__ . "/../index.php";
    
        } catch (Throwable $e) {
            echo "Erro ao listar carrosséis: " . $e->getMessage();
        }
    }
    

    // 🔹 Buscar slot por ID
    public function getById(int $id): ?array {
        try {
            $carousel = $this->carouselModel->getElementById($id);
            if (!$carousel) return null;

            $cores = $this->coresModel->getElementById($carousel['id_coresSubs'] ?? 0);
            return [
                'carousel' => $carousel,
                'cores' => $cores
            ];
        } catch (Throwable $e) {
            echo "Erro ao buscar: " . $e->getMessage();
            return null;
        }
    }

    // 🔹 Atualizar produto no slot
    public function updateSlot(int $id, array $data): bool {
        return $this->carouselModel->update($id, [
            'id_produto' => $data['id_produto'],
            'id_coresSubs' => $data['id_coresSubs']
        ]);
    }

    // 🔹 Atualizar cores do slot
    public function updateSlotColors(int $id, array $data): bool {
        return $this->coresModel->update($id, [
            'corEspecial' => $data['corEspecial'],
            'hexDegrade1' => $data['hexDegrade1'],
            'hexDegrade2' => $data['hexDegrade2'],
            'hexDegrade3' => $data['hexDegrade3'],
        ]);
    }

    // 🔹 Deletar (opcional, mas provavelmente não vai usar)
    public function delete(int $id): bool {
        return $this->carouselModel->remove($id);
    }
}

// 🔹 Testes rápidos
$controller = new CarouselController();
print_r($controller->getAll());

// Atualizar slot 1 com novo produto e cores
$controller->updateSlot(1, ['id_produto' => 5, 'id_coresSubs' => 2]);
$controller->updateSlotColors(2, [
    'corEspecial' => '#FF0000',
    'hexDegrade1' => '#111111',
    'hexDegrade2' => '#222222',
    'hexDegrade3' => '#333333',
]);
