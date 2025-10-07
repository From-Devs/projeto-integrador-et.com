<?php

require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../public/dompdf/autoload.inc.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$db = new Database();
$pdo = $db->Connect();

$tipo = $_GET['tipo'] ?? 'receita';

$html = "<h1 style='text-align:center'>Relatório: ".ucfirst($tipo)."</h1>";
$html .= "<table border='1' width='100%' style='border-collapse: collapse;'>";
$html .= "<tr style='background-color:#eee'><th>ID</th><th>Nome/Descrição</th><th>Detalhes</th></tr>";

switch($tipo){
    case 'receita':
        $stmt = $pdo->query("SELECT rr.relaRec_id, rr.lucro, rr.prejuizo FROM RelatorioDeReceitas rr");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr>
                        <td>{$row['relaRec_id']}</td>
                        <td>Lucro: R$ {$row['lucro']}</td>
                        <td>Prejuízo: R$ {$row['prejuizo']}</td>
                      </tr>";
        }
        break;

    case 'produto':
        $stmt = $pdo->query("SELECT p.id_produto, p.nome, p.marca, p.preco, u.nome AS associado
                             FROM Produto p
                             JOIN Usuario u ON u.id_usuario = p.id_associado");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr>
                        <td>{$row['id_produto']}</td>
                        <td>{$row['nome']} ({$row['marca']})</td>
                        <td>Associado: {$row['associado']} - R$ {$row['preco']}</td>
                      </tr>";
        }
        break;

    case 'abandonadas':
        $stmt = $pdo->query("SELECT c.id_carrinho, u.nome AS cliente, p.nome AS produto, c.quantidade 
                             FROM Carrinho c
                             JOIN Usuario u ON u.id_usuario = c.id_usuario
                             JOIN Produto p ON p.id_produto = c.id_produto
                             WHERE c.data_adicionado < NOW() - INTERVAL 7 DAY"); 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr>
                        <td>{$row['id_carrinho']}</td>
                        <td>{$row['cliente']}</td>
                        <td>{$row['produto']} - Qtde: {$row['quantidade']}</td>
                      </tr>";
        }
        break;

    case 'saldo':
        $stmt = $pdo->query("SELECT u.id_usuario, u.nome, SUM(p.preco) AS saldo
                             FROM Pedido p
                             JOIN Usuario u ON u.id_usuario = p.id_usuario
                             WHERE p.id_status = 2 
                             GROUP BY u.id_usuario, u.nome");
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $html .= "<tr>
                        <td>{$row['id_usuario']}</td>
                        <td>{$row['nome']}</td>
                        <td>R$ {$row['saldo']}</td>
                      </tr>";
        }
        break;

    default:
        $html .= "<tr><td colspan='3'>Nenhum dado encontrado</td></tr>";
}

$html .= "</table>";

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("relatorio_".$tipo.".pdf", ["Attachment" => true]);

?>