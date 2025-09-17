<?php
require_once __DIR__ . '/../Models/associado.php';

class AssociadoController {
    private $model;

    public function __construct() {
        $this->model = new Associado();
    }

    public function teste() {
        return $this->model->testConntx();
    }

    public function assocRequest($id, $data) {
        return $this->model->sendAssociadoRequest($id, $data);
    }

}
?>