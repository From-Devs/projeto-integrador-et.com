<?php
require_once __DIR__ . "/../Models/CarouselModel.php";

class CarouselController {
    private CarouselModel $carouselModel;

    public function __construct() {
        $this->carouselModel = new CarouselModel();
    }

    public function getAll(): string {
        $carousels = $this->carouselModel->getAll();
        // passar a array via include ?
        // pode ser por que ia ficar como ja pasando,
        // mais um principal a adequaçao.
        header('Content-Type: application/json');
        return json_encode($carousels);
    }
    public function getById(int $id): string {
        $carousel = $this->carouselModel->getElementById($id);
        header('Content-Type: application/json');
        return json_encode($carousel ?: []);
    }

    public function create(array $data): bool {
        try {
            return $this->carouselModel->create($data);
        } catch (Throwable $e) {
            echo "Erro ao criar: " . $e->getMessage();
            return false;
        }
    }

    public function update(int $id, array $data): bool {
        try {
            return $this->carouselModel->update($id, $data);
        } catch (Throwable $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
            return false;
        }
    }

    public function delete(int $id): bool {
        try {
            return $this->carouselModel->remove($id);
        } catch (Throwable $e) {
            echo "Erro ao deletar: " . $e->getMessage();
            return false;
        }
    }
}

// 🔹 Testes rápidos
$controller = new CarouselController();

// Listar todos
echo $controller->getAll(); // string precisa da json_decode
// para voltar ser uma array

// Criar
$new = $controller->create([
    "id_carousel" => 1,
    "id_produto" => 7,
    "id_coresSubs" => 1
]);
var_dump($new); // true or false

// Atualizar
$update = $controller->update(1, [
    "id_produto" => 8,
    "id_coresSubs" => 2
]);
var_dump($update);// true or false

// Buscar por ID
echo $controller->getById(1); // string

// Deletar
$deleted = $controller->delete(1);
var_dump($deleted);
?>
