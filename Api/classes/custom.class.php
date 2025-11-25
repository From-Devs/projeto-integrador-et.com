<?php
require_once __DIR__ . "/../../app/Controllers/CustomizacaoController.php";

class Custom {

    private $conn;

    public function __construct() {
        $this->conn = new CustomizacaoController();
    }

    // Teste básico
    public function ping() {
        echo json_encode(["status" => "sucesso", "mensagem" => "Custom OK"]);
        exit;
    }

    // UPDATE / CREATE (depende do ID)
    public function storecarousels($param = null) {

        // Lê JSON do POST
        $data = json_decode(file_get_contents("php://input"), true);

        if (!$data || !isset($data["id_carousel"])) {
            echo json_encode([
                "error" => "Envie um JSON contendo 'id_carousel'."
            ]);
            exit;
        }

        $id_carousel = (int) $data["id_carousel"];
        unset($data["id_carousel"]);

        // Chama o controller / model
        $res = $this->conn->createCarousel($id_carousel, $data);

        echo json_encode($res);
        exit;
    }
    public function storedestaques($param = null) {

    }
    // GET ALL carousels
    public function listcarousels() {
        $res = $this->conn->index();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }

    public function listlancamentos() {
        $res = $this->conn->index();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }

    public function listdestaques() {
        $res = $this->conn->index();
        echo json_encode(["status" => "sucesso", "mensagem" => $res]);
        exit;
    }

}
