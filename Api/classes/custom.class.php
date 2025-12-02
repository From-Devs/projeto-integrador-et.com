<?php
require_once __DIR__ . "/../../app/Controllers/CustomizacaoController.php";

class Custom {

    private $conn;

    public function __construct() {
        $this->conn = new CustomizacaoController();
    }

    // 🔹 Teste básico
    public function ping() {
        echo json_encode(["status" => "sucesso", "mensagem" => "Custom OK"]);
        exit;
    }


    // ===========================================================
    // 🔹 STORE CAROUSELS (CREATE OU UPDATE)
    // ===========================================================
    public function storecarousels($param = null) {
        $data = json_decode(file_get_contents("php://input"), true);

        $id_carousel = $data["id_carousel"] ?? null;

        if ($id_carousel !== null) {
            $id_carousel = (int)$id_carousel;
            unset($data["id_carousel"]);
        }

        $res = $this->conn->createCarousel($id_carousel, $data);

        echo json_encode($res);
        exit;
    }


    // ===========================================================
    // 🔹 STORE DESTAQUES (CREATE OU UPDATE)
    // ===========================================================
    public function storedestaques($param = null) {

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["id_produto"])) {
            echo json_encode([
                "error" => "Envie 'id_produto' no JSON."
            ]);
            exit;
        }

        // Controller decide se é create ou update
        $res = $this->conn->createDestaque($data);

        echo json_encode($res);
        exit;
    }


    // ===========================================================
    // 🔹 STORE LANÇAMENTOS (CREATE OU UPDATE)
    // ===========================================================
    public function storelancamentos($param = null) {

        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["id_produto"])) {
            echo json_encode([
                "error" => "Envie 'id_produto' no JSON."
            ]);
            exit;
        }

        $res = $this->conn->createLancamento($data);

        echo json_encode($res);
        exit;
    }


    // ===========================================================
    // 🔹 LISTAGEM DE CADA MÓDULO
    // ===========================================================

    public function listcarousels() {
        $res = $this->conn->listCarousels();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }

    public function listlancamentos() {
        $res = $this->conn->listLancamentos();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }

    public function listdestaques() {
        $res = $this->conn->listDestaques();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }
    
    // ===========================================================
    // 🔥 NOVO: BUSCAR PRODUTO POR ID (Suporta a rota /BuscarProduto)
    // ===========================================================
    public function buscarProduto($param = null) {
        // Pega o ID da URL (ex: /Api/BuscarProduto?id=123)
        $id = $_GET['id'] ?? null;
        
        if (empty($id)) {
            echo json_encode(['error' => 'ID do produto não fornecido.']);
            exit;
        }

        // Chama o novo método do Controller (CustomizacaoController)
        $produto = $this->conn->buscarProdutoPorId((int)$id);

        if (!$produto) {
             // Retorna array vazio se não achar, como esperado pelo JS
             echo json_encode([]); 
             exit;
        }

        // Retorna o produto encontrado
        echo json_encode($produto);
        exit;
    }
    // ===========================================================
    // 🔥 NOVO: BUSCAR UM LANÇAMENTO ESPECÍFICO POR ID
    // ===========================================================
    public function getLancamento($param = null) {
        $id = $_GET['id'] ?? null; 
        if (empty($id)) {
            echo json_encode(['error' => 'ID do lançamento não fornecido.']);
            exit;
        }

        // Chama o novo método do Controller
        $data = $this->conn->getLancamentoById((int)$id);

        // Retorna os dados do lançamento
        echo json_encode($data ?: []);
        exit;
    }
    // ===========================================================
    // 🔹 REORDER CAROUSELS
    // ===========================================================
    public function reordercarousels($param = null) {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data["newOrder"]) || !is_array($data["newOrder"])) {
            echo json_encode(["success" => false, "message" => "O array 'newOrder' é obrigatório."]);
            exit;
        }

        // Chama o Controller
        $res = $this->conn->reorderCarousel($data["newOrder"]);

        echo json_encode($res);
        exit;
    }
}