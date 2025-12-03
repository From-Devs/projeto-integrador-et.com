<?php
// CustomizacaoRouter.php

// 1. Configurações para garantir JSON limpo e tratar erros
ob_start(); 
ini_set('display_errors', 1); 
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . '/../app/Controllers/CustomizacaoController.php'; 

try {
    // 2. Verifica se é POST (JSON) vindo do JavaScript
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);

    // --- FLUXO DE SALVAR (POST) ---
    if ($input && isset($input['acao'])) {
        
        $customController = new CustomizacaoController();
        $acaoPost = $input['acao'];
        $dados    = $input['dados'];

        // CustomizacaoRouter.php (Alterar a seção de fluxo de salvar POST)
        switch ($acaoPost) {
            case 'SalvarCarousel':
                ob_clean(); 
                echo json_encode($customController->processarCarousel($dados)); 
                break;

            case 'SalvarLancamento':
                ob_clean(); 
                echo json_encode($customController->processarLancamentos($dados)); 
                break;

            case 'SalvarDestaque':
                ob_clean(); 
                echo json_encode($customController->createDestaque($dados));
                break;

        }
        exit; // Para aqui se for POST
    }

    // --- FLUXO DE BUSCAR (GET) ---
    // Só carrega os models antigos se for GET
    require_once __DIR__ . '/../app/Models/products.php';
    require_once __DIR__ . '/../app/Models/LancamentoModel.php';
    require_once __DIR__ . '/../app/Models/CarouselModel.php';

    $acao = $_GET['acao'] ?? null;
    $id   = $_GET['id'] ?? null;

    switch ($acao) {
        case 'BuscarProduto':
            if (!$id) throw new Exception("ID não informado");
            $model = new Products();
            ob_clean(); echo json_encode($model->buscarProdutoPeloId($id));
            break;

        case 'BuscarLancamento':
            if (!$id) throw new Exception("ID não informado");
            $model = new Lancamentos();
            ob_clean(); echo json_encode($model->getElementByid($id));
            break;

        case 'BuscarCarousel':
            if (!$id) throw new Exception("ID não informado");
            $model = new CarouselModel();
            ob_clean(); echo json_encode($model->getElementById($id));
            break;

        case 'ListarCarousel':
            $model = new CarouselModel();
            ob_clean(); echo json_encode($model->listarTodos());
            break;

        default:
            throw new Exception("Ação GET inválida ou não informada");
    }

}    catch (Throwable $e) {
        ob_clean();
        // Adicione detalhes do erro, incluindo a linha e o arquivo.
        echo json_encode([
        "status" => "erro",
        "msg" => "ERRO FATAL CAPTURADO: " . $e->getMessage(),
        "detalhe" => "Arquivo: " . $e->getFile() . " Linha: " . $e->getLine()
    ]);
}
?>