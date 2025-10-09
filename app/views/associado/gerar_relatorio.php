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
    body { font-family: Arial, sans-serif; font-size: 12px; }
    h1 { text-align: center; color: #000000ff; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
    th { background-color: #f2f2f2; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    tr:hover { background-color: #e0f7fa; }
    td.valor { font-weight: bold; color: #d32f2f; }
</style>
";

$html .= "<h1>Relatório: " . ucfirst($tipo) . "</h1>";
$html .= "<table>";
$html .= "<tr>
            <th>ID</th>
            <th>Nome / Descrição</th>
            <th>Detalhes</th>
          </tr>";

switch ($tipo) {

    case 'receita':
        $stmt = $pdo->query("SELECT relaRec_id, lucro, prejuizo FROM RelatorioDeReceitas");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['relaRec_id']}</td>
                        <td>Lucro: <span class='valor'>R$ {$row['lucro']}</span></td>
                        <td>Prejuízo: <span class='valor'>R$ {$row['prejuizo']}</span></td>
                      </tr>";
        }
        break;

    case 'produto':
        $stmt = $pdo->query("
            SELECT p.id_produto, p.nome, p.marca, p.preco, p.qtdEstoque, u.nome AS associado
            FROM Produto p
            JOIN Usuario u ON u.id_usuario = p.id_associado
        ");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['id_produto']}</td>
                        <td>{$row['nome']} ({$row['marca']})</td>
                        <td>
                            Associado: {$row['associado']}<br>
                            Preço: <span class='valor'>R$ {$row['preco']}</span><br>
                            Estoque: {$row['qtdEstoque']}
                        </td>
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
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $html .= "<tr>
                        <td>{$row['id_carrinho']}</td>
                        <td>{$row['cliente']}</td>
                        <td>
                            {$row['produto']}<br>
                            Quantidade: {$row['quantidade']}<br>
                            Adicionado em: {$row['data_adicionado']}
                        </td>
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
                    <td colspan='2'>Saldo Total de Produtos em Destaque</td>
                    <td class='valor'>R$ " . number_format($row['saldo_total'], 2, ',', '.') . "</td>
                  </tr>";
        break;

    default:
        $html .= "<tr><td colspan='3'>Nenhum dado encontrado.</td></tr>";
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