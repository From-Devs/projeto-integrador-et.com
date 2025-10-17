<?php
require_once __DIR__ . '/../app/Controllers/CarouselController.php';

session_start();

$carouselController = new CarouselController();

$acao = $_GET['acao'] ?? '';
$response = null;

// 🔹 Verifica se a ação é válida
$acoesPermitidas = ['','listar','editar','atualizar','deletar','atualizar_cores'];

if (!in_array($acao, $acoesPermitidas)) {
    header("Location: ../app/views/carousel/TelaErro.php");
    exit;
}

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//   switch ($acao) {
//
//        // 🔸 Atualizar dados do slot
//        case 'atualizar':
//            $id = $_POST['id'] ?? null;
//            $id_produto = $_POST['id_produto'] ?? null;
//            $id_coresSubs = $_POST['id_coresSubs'] ?? null;
//
//            if ($id && $id_produto && $id_coresSubs) {
//                $ok = $carouselController->updateSlot($id, [
//                    'id_produto' => $id_produto,
//                   'id_coresSubs' => $id_coresSubs
//                ]);
//
//                if ($ok) {
//                    header("Location: ../app/views/carousel/ListaCarousel.php?sucesso=atualizado");
//                } else {
//                    header("Location: ../app/views/carousel/EditCarousel.php?id=$id&erro=nao_atualizado");
//                }
//                exit;
//            }
//            break;
//
//        // 🔸 Atualizar apenas as cores
//        case 'atualizar_cores':
//           $id = $_POST['id'] ?? null;
//            if ($id) {
//                $ok = $carouselController->updateSlotColors($id, [
//                   'corEspecial' => $_POST['corEspecial'] ?? '',
//                    'hexDegrade1' => $_POST['hexDegrade1'] ?? '',
//                    'hexDegrade2' => $_POST['hexDegrade2'] ?? '',
//                    'hexDegrade3' => $_POST['hexDegrade3'] ?? '',
//                ]);
//
//               if ($ok) {
//                    header("Location: ../app/views/carousel/EditCarousel.php?id=$id&sucesso=cores");
//                } else {
//                    header("Location: ../app/views/carousel/EditCarousel.php?id=$id&erro=cores");
//                }
//                exit;
//            }
//            break;
//
//        // 🔸 Deletar item
//        case 'deletar':
//            $id = $_POST['id'] ?? null;
//            if ($id) {
//                $carouselController->delete($id);
//                header("Location: ../app/views/carousel/ListaCarousel.php?sucesso=deletado");
//                exit;
//            }
//            break;
//    }
//}

// 🔹 GET (visualizações)
switch ($acao) {
    case '':
    case 'listar':
        $dados = $carouselController->getAll(); 
        break;
    case 'editar':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $dados = $carouselController->getById($id);
            include '../app/views/carousel/EditCarousel.php';
        } else {
            header("Location: ../app/views/carousel/TelaErro.php?erro=id_invalido");
        }
        break;

    default:
        header("Location: ../app/views/carousel/TelaErro.php");
        break;
}
