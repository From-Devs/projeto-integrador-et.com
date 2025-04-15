<!-- 
    Para listar todos os produtos:
GET http://seusite.com/api.php

Para buscar um produto pelo ID (exemplo: ID 1):
GET http://seusite.com/api.php?id=1 

-->





<?php

header("Content-Type: application/json");

//cerrega os produtos
$produtos = json_decode(file_get_contents("produtosMP.json"), true);

//verifica se há um ID na url
if (isset($_GET["id"])){
    $id = intval($_GET["id"]);
    $produto = array_filter($produtos, fn($p) => $p["id"] === $id);

    if(!empty($produto)){
        echo json_encode(array_values($produto)[0]);
    } else{
        echo json_encode(["error" => "Produto não encontrado"]);
    }
} else{
    echo json_encode($produtos);
}

?>