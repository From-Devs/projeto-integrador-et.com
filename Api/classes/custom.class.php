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
        $data = json_decode(file_get_contents("php://input"), true);

        $id_carousel = $data["id_carousel"] ?? null;

        if ($id_carousel !== null) {
            $id_carousel = (int) $id_carousel;
            unset($data["id_carousel"]);
        } 

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
