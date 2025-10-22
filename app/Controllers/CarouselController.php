<?php
require_once __DIR__ . "/BaseController.php";
require_once __DIR__ . '/../Models/categoria.php';

class CaroselController extends BaseController{
    // 🔹 Buscar slot por ID
    public function getAll() {
        $dados = [
            'carousels' => $this->carouselModel->getAll(),
            'cores' => $this->coresModel->getAll()
        ];
        $this->renderCustom('dados_carrossel', 'carousel/carousel.php', $dados);
    }

    // 🔹 Buscar slot por ID
    public function getById(int $id): ?array {
        try {
            $caroseulUnico = this->carouselModel->getElementById($id);
        
        } catch(Exception $e) {
            error_log("Carousel error: " . $e->getMessage());
        }
    }

    // 🔹 Atualizar produto no slot
    public function updateSlot(int $id, array $data): bool {
      
    }

    // 🔹 Atualizar cores do slot
    public function updateSlotColors(int $id, array $data): bool {
       
    }

    // 🔹 Deletar (opcional, mas provavelmente não vai usar)
    public function delete(int $id): bool {
      
    }
}

// // 🔹 Testes rápidos
// $controller = new CarouselController();
// print_r($controller->getAll());

// // Atualizar slot 1 com novo produto e cores
// $controller->updateSlot(1, ['id_produto' => 5, 'id_coresSubs' => 2]);
// $controller->updateSlotColors(2, [
//     'corEspecial' => '#FF0000',
//     'hexDegrade1' => '#111111',
//     'hexDegrade2' => '#222222',
//     'hexDegrade3' => '#333333',
// ]);
