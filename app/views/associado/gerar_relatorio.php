<?php

require_once __DIR__ . "/../../../config/database.php";
require_once __DIR__ . "/../../../public/dompdf/autoload.inc.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$db = new Database();
$pdo = $db->Connect();

$tipo = $_GET['tipo'] ?? 'receita';

// cabeçalho do PDF 

$html = "
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12px;
        color: #333;
        margin: 20px;
    }
    h1 {
        text-align: center;
        color: #2c3e50;
        font-size: 20px;
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #3498db;
        color: white;
        font-weight: bold;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #eaf2f8;
    }
    td.valorLucro {
        font-weight: bold;
        color: #148a10ff;
    }
    td.valorPrejuizo {
        font-weight: bold;
        color: #e74c3c;
    }
</style>
";


$html .= "<h1>Relatório: " . ucfirst($tipo) . "</h1>";
$html .= "<table>";
// $html .= "<tr>
//             <th>ID</th>
//             <th>Nome / Descrição</th>
//             <th>Detalhes</th>
//           </tr>";

switch ($tipo) {

    case 'receita':
        $stmt = $pdo->query("SELECT relaRec_id, lucro, prejuizo FROM RelatorioDeReceitas");
        $html .= "<tr>
                    <th>ID</th>
                    <th>Lucro</th>
                    <th>Prejuízo</th>
                  </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['relaRec_id']}</td>
                        <td class='valor'>R$ {$row['lucro']}</td>
                        <td class='valor'>R$ {$row['prejuizo']}</td>
                      </tr>";
        }
        break;

    case 'produto':
        $stmt = $pdo->query("
            SELECT p.id_produto, p.nome, p.marca, p.preco, p.qtdEstoque, u.nome AS associado
            FROM Produto p
            JOIN Usuario u ON u.id_usuario = p.id_associado
        ");
        $html .= "<tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Marca</th>
                    <th>Associado</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                  </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['id_produto']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['marca']}</td>
                        <td>{$row['associado']}</td>
                        <td class='valor'>R$ {$row['preco']}</td>
                        <td>{$row['qtdEstoque']}</td>
                      </tr>";
        }
        break;

    case 'abandonadas':
        $stmt = $pdo->query("
            SELECT c.id_carrinho, u.nome AS cliente, p.nome AS produto, c.quantidade, c.data_adicionado
            FROM Carrinho c
            JOIN Usuario u ON u.id_usuario = c.id_usuario
            JOIN Produto p ON p.id_produto = c.id_produto
            WHERE c.data_adicionado < (NOW() - INTERVAL 7 DAY)
        ");
        $html .= "<tr>
                    <th>ID Carrinho</th>
                    <th>Cliente</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data Adicionado</th>
                  </tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['id_carrinho']}</td>
                        <td>{$row['cliente']}</td>
                        <td>{$row['produto']}</td>
                        <td>{$row['quantidade']}</td>
                        <td>{$row['data_adicionado']}</td>
                      </tr>";
        }
        break;

    case 'saldo':
        $stmt = $pdo->query("
            SELECT SUM(p.preco) AS saldo_total
            FROM proddestaque pd
            JOIN Produto p ON pd.id_produto = p.id_produto
        ");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $html .= "<tr>
                    <th>Descrição</th>
                    <th>Saldo Total</th>
                  </tr>";
        $html .= "<tr>
                    <td>Produtos em Destaque</td>
                    <td class='valor'>R$ " . number_format($row['saldo_total'], 2, ',', '.') . "</td>
                  </tr>";
        break;

    default:
        $html .= "<tr><td colspan='6'>Nenhum dado encontrado.</td></tr>";
}
    

$html .= "</table>";

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("relatorio_" . $tipo . ".pdf", ["Attachment" => true]);

?>