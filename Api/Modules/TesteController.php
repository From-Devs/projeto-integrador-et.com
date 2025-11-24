<?php

class TesteController {
    public function ping() {
        echo json_encode(["msg" => "API funcionando"]);
    }
}
