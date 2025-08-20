<?php
require_once __DIR__ . "/../app/Controllers/ProdutoController.php";
$produtoController = new ProdutoController();

// Função para validar os campos obrigatórios
function ValidaCampos($post) {
    return isset($post["nome"], $post["marca"], $post["breveDescricao"], $post["qtdEstoque"], $post["preco"], $post["precoPromocional"], $post["caracteristicasCompleta"])
        && !empty(trim($post["nome"]))
        && !empty(trim($post["marca"]))
        && !empty(trim($post["breveDescricao"]))
        && is_numeric($post["qtdEstoque"])
        && is_numeric($post["preco"])
        && is_numeric($post["precoPromocional"])
        && !empty(trim($post["caracteristicasCompleta"]));
}

// Função para capturar imagens enviadas no formulário
function CapturaImagens() {
    $imagens = ['img1' => null, 'img2' => null, 'img3' => null];

    foreach ($imagens as $key => &$img) {
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            // Pega o binário do arquivo (se você salvar direto no banco)
            $img = file_get_contents($_FILES[$key]['tmp_name']);

            // OU se quiser salvar como arquivo físico na pasta uploads:
            /*
            $nomeArquivo = time() . "_" . basename($_FILES[$key]['name']);
            $caminho = __DIR__ . "/../public/uploads/" . $nomeArquivo;
            move_uploaded_file($_FILES[$key]['tmp_name'], $caminho);
            $img = "/projeto-integrador-et.com/public/uploads/" . $nomeArquivo;
            */
        }
    }
    return $imagens;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($_GET["acao"] ?? '') {
        case 'CadastrarProduto':
            if (ValidaCampos($_POST)) {
                $imagens = CapturaImagens();
        
                $data = [
                    "nome" => $_POST["nome"],
                    "marca" => $_POST["marca"],
                    "descricaoBreve" => $_POST["breveDescricao"],
                    "preco" => $_POST["preco"],
                    "precoPromo" => $_POST["precoPromocional"],
                    "descricaoTotal" => $_POST["caracteristicasCompleta"],
                    "qtdEstoque" => $_POST["qtdEstoque"],
                    "id_subCategoria" => $_POST["id_subCategoria"] ?? 1,
                    "id_cores" => $_POST["id_cores"] ?? 1,
                    "id_associado" => $_POST["id_associado"] ?? 1,
                    "img_1" => $imagens['img1'],
                    "img_2" => $imagens['img2'],
                    "img_3" => $imagens['img3']
                ];
        
                $resultado = $produtoController->CadastrarProduto($data);
        
                if ($resultado["success"]) {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=CadastrarProduto");
                } else {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto&msg=" . urlencode($resultado["message"]));
                }
            } else {
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto&msg=Campos inválidos");
            }
            break;        
        case 'CadastrarProduto':
            if (ValidaCampos($_POST)) {
                $imagens = CapturaImagens();

                // Montando o array esperado pelo controller
                $data = [
                    "nome" => $_POST["nome"],
                    "marca" => $_POST["marca"],
                    "descricaoBreve" => $_POST["breveDescricao"],
                    "preco" => $_POST["preco"],
                    "precoPromo" => $_POST["precoPromocional"],
                    "descricaoTotal" => $_POST["caracteristicasCompleta"],
                    "qtdEstoque" => $_POST["qtdEstoque"],
                    "id_subCategoria" => $_POST["id_subCategoria"] ?? 1,
                    "id_cores" => $_POST["id_cores"] ?? 1,
                    "id_associado" => $_POST["id_associado"] ?? 1,
                    "img_1" => $imagens['img1'],
                    "img_2" => $imagens['img2'],
                    "img_3" => $imagens['img3']
                ];

                $resultado = $produtoController->CadastrarProduto($data);

                if ($resultado["success"]) {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=CadastrarProduto");
                } else {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto&msg=" . urlencode($resultado["message"]));
                }
            } else {
                header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=CadastrarProduto&msg=Campos inválidos");
            }
            break;

        case 'EditarProduto':
            if (isset($_POST["id_produto"])) {
                $id = $_POST["id_produto"];
                $imagens = CapturaImagens();

                $data = [
                    "nome" => $_POST["nome"],
                    "marca" => $_POST["marca"],
                    "descricaoBreve" => $_POST["breveDescricao"],
                    "preco" => $_POST["preco"],
                    "precoPromo" => $_POST["precoPromocional"],
                    "descricaoTotal" => $_POST["caracteristicasCompleta"],
                    "qtdEstoque" => $_POST["qtdEstoque"],
                    "id_subCategoria" => $_POST["id_subCategoria"] ?? 1,
                    "id_cores" => $_POST["id_cores"] ?? 1,
                    "id_associado" => $_POST["id_associado"] ?? 1,
                    "img_1" => $imagens['img1'],
                    "img_2" => $imagens['img2'],
                    "img_3" => $imagens['img3']
                ];

                $resultado = $produtoController->EditarProduto($id, $data);

                if ($resultado["success"]) {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=sucesso&acao=EditarProduto");
                } else {
                    header("Location: /projeto-integrador-et.com/app/views/associado/ProdutosAssociado.php?status=erro&acao=EditarProduto&msg=" . urlencode($resultado["message"]));
                }
            }
            break;

        default:
            echo "Ação POST inválida";
            break;
    }

} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    switch ($_GET["acao"] ?? '') {
        case 'ListarProdutos':
            $produtos = $produtoController->ListarProdutos();
            echo json_encode($produtos);
            break;

        default:
            echo "Ação GET inválida";
            break;
    }
} else {
    echo "Método não suportado";
}
