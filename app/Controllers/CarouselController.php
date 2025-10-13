<?php
// controller/CarouselController.php
require_once __DIR__ . "/../Models/CarouselModel.php";

class CarouselController {
    private $carouselModel;

    public function __construct() {
        $this->carouselModel = new CarouselModel();
    }
    public function getAll(): bool {
        $carousels = $this->carouselModel->getAll();
        header('Content-Type: application/json');
        return json_encode($carousels); 
    }
    public function delete(int $id): bool {
        header('Content-Type: application/json');
        return $this->carouselModel->deleteById($id);  
    }
    public function create(array $data): bool {
        if (!isset($data["id_carousel"],$data["id_produto"],$data["id_coresSubs"])){ 
            throw new InvalidArgumentExceptione("Dados insuficientes para criar o carrossel."); 
        }
        return $this->carouselModel->create($data);
    }
    
    public function update(int $id, int $date): array{
        if (!$id || empty($data)) {
            return false;
        };
        return $this->carouselModel->updateById($id, $data);
    }
    public function getId(int $id): array{
        return $this->carouselModel->getById($id);
    }
};

// 🔹 Teste rápido  
$controller = new CarouselController();
$all = $controller->getAll();
print_r($all);
echo $all
$new = $controller->create([
    "id_carousel" => 1,
    "id_produto" => 7,
    "id_coresSubs" => 1
]);
print_r($new); // true ou false
?>