<?php
require_once __DIR__ . '/../app/Models/products.php';
require_once __DIR__ . '/../app/Models/LancamentoModel.php';
require_once __DIR__ . '/../app/Models/CarouselModel.php';

$acao = $_GET['acao'] ?? null;
$id   = $_GET['id'] ?? null;

$produtoModel   = new Products();
$lancamentoModel = new Lancamentos();
$carouselModel   = new CarouselModel();

ob_clean();
header("Content-Type: application/json; charset=UTF-8");

switch ($acao) {

    // ======================================
    // PRODUTO
    // ======================================

    case 'BuscarProduto':
        if (!$id) {
            echo json_encode(["error" => "ID do produto não informado"]);
            break;
        }
        
        echo json_encode($produtoModel->buscarProdutoPeloId($id));
        break;

    // ======================================
    // LANÇAMENTO
    // ======================================

    case 'BuscarLancamento':
        if (!$id) {
            echo json_encode(["error" => "ID do lançamento não informado"]);
            break;
        }
        echo json_encode($lancamentoModel->getElementByid($id));
        break;

    case 'AtualizarLancamento':
        $dados = json_decode(file_get_contents("php://input"), true);
        echo json_encode($lancamentoModel->atualizar($dados));
        break;


    // ======================================
    // CAROUSEL
    // ======================================

    case 'BuscarCarousel':
        if (!$id) {
            echo json_encode(["error" => "ID do carousel não informado"]);
            break;
        }
        echo json_encode($carouselModel->getElementById($id));
        break;

    case 'ListarCarousel':
        echo json_encode($carouselModel->listarTodos());
        break;

    case 'AtualizarCarousel':
        $dados = json_decode(file_get_contents("php://input"), true);
        echo json_encode($carouselModel->atualizar($dados));
        break;


    // ======================================
    // AÇÃO INVÁLIDA
    // ======================================

    default:
        echo json_encode(["error" => "Ação inválida ou não definida"]);
        break;
}
