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

    
    public function mudarProdutoECores(int $id_carousel, int $novo_id_produto): array {
        // Chamamos o método que criamos no Model para fazer toda a mágica do DB
        return $this->carouselModel->mudarProdutoECores($id_carousel, $novo_id_produto);
    }
    // CÓDIGO DO SEU CONTROLLER (apenas a função update alterada)
    public function deleteCarosel(int $id) {
        return $this->carouselModel->remove($id);
    }
    // ⚠️ ATENÇÃO: Removi a declaração de tipo de retorno ":array" 
    // para ser flexível e aceitar o retorno do Model que agora é array!
    public function update(int $id_carousel, array $data) { 
         return $this->carouselModel->update($id_carousel, $data);
    }
    public function getAllUniqueCores() {
        return $this->carouselModel->getAllUniqueCores(); 
    }
}
// ...
  

// $conn = new CaroselController();
// $te = $conn->getAll();

// $res = $conn->updateCoresPersonalizadas(1, [
//     'corEspecial' => '#124b56ff',
//     'hexDegrade1' => '#212165ff',
//     'hexDegrade2' => '#9258ffff',
//     'hexDegrade3' => '#e11cffff'
// ]);


// NO FINAL DO SEU CaroselController.php

// ...
$conn = new CaroselController();
$te = $conn->getAll();

// Exemplo de chamada: Mudar o Carrossel de ID 1 para o Produto de ID 30
$id_carousel_para_mudar = 2; 
$dados_para_update = [ 
    'id_produto' => 30 // 👈 AGORA O ID DO PRODUTO ESTÁ NO LUGAR CERTO!
]; 

echo "### 🔄 TESTE 1: MUDANÇA DE PRODUTO (ID {$id_carousel_para_mudar} para ID {$dados_para_update['id_produto']}) 🔥\n";

// A chamada deve usar os dois parâmetros INT e ARRAY que a função update espera!
$resultado_mudanca = $conn->update($id_carousel_para_mudar, $dados_para_update);

if ($resultado_mudanca['success'] ?? false) {
    echo "🎉 SUCESSO! Carrossel {$id_carousel_para_mudar} agora é Produto {$dados_para_update['id_produto']}.\n";
    echo "   Novo ID Cores Subs Usado: {$resultado_mudanca['id_coressubs_usado']}\n\n";
} else {
    echo "❌ DEU RUIM NO TESTE 1! Erro: " . ($resultado_mudanca['error'] ?? 'Erro desconhecido') . "\n\n";
}

// --------------------------------------------------------------------------

// --- CENÁRIO DE TESTE 2: Produto IGUAL (NÃO Deve Copiar Cores) ---
echo "### 🔍 TESTE 2: PRODUTO IGUAL (ID {$id_carousel_para_mudar} para ID {$dados_para_update['id_produto']} de novo) kkkk\n";

$resultado_mudanca_2 = $conn->update($id_carousel_para_mudar, $dados_para_update);

if ($resultado_mudanca_2['success'] ?? false) {
    echo "✅ SUCESSO (IGNORADO)! O IF funcionou! O produto é o mesmo.\n";
    echo "   ID Cores Subs Reutilizado: {$resultado_mudanca_2['id_coressubs_usado']}\n";
} else {
    echo "❌ DEU RUIM NO TESTE 2! Erro: " . ($resultado_mudanca_2['error'] ?? 'Erro desconhecido') . "\n";
}

