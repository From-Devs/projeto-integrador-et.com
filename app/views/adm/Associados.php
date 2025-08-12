<?php 

include __DIR__ . "/../../../public/componentes/componentesADM_Associado/componentesADM_Associado.php";
include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/AssociadosADM/associados.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require __DIR__ . "/../../../public/componentes/FiltrosADMeAssociados/filtros.php";
require __DIR__ . "/../../../public/componentes/paginacao/paginacao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
$tipo_tabela = $_GET['tipo'] ?? 'solicitacao';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Associados</title>
    <link rel="stylesheet" href="./../../../public/css/AssociadosADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/FiltrosADMeAssociados/filtros.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/paginacao/paginacao.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    
    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM();
    ?> 
    
    <!-- aqui acaba o container esquerda -->
    <div class="main">
        <div id="container">
            
            <?php echo filtro("associado")?>

            <div class="listaContainer">
                <div id="titulo">
                    <h1 id="tituloH1">Associados</h1>
                </div>
                <?php 

                if($tipo_tabela == 'solicitacao'){
                    $dados = [
                        ['id' => 10, 'nome' => 'Maria Oliveira',   'email' => 'maria.oliveira@gmail.com',   'cidade' => 'São Paulo - SP'],
                        ['id' => 11, 'nome' => 'João Mendes',      'email' => 'joao.mendes@yahoo.com',      'cidade' => 'Belo Horizonte - MG'],
                        ['id' => 12, 'nome' => 'Ana Costa',        'email' => 'ana.costa@outlook.com',      'cidade' => 'Fortaleza - CE'],
                        ['id' => 13, 'nome' => 'Carlos Pereira',   'email' => 'carlos.p@gmail.com',         'cidade' => 'Curitiba - PR'],
                        ['id' => 14, 'nome' => 'Fernanda Lima',    'email' => 'fernanda.lima@uol.com.br',   'cidade' => 'Rio de Janeiro - RJ'],
                        ['id' => 15, 'nome' => 'Roberto Souza',    'email' => 'roberto.souza@hotmail.com',  'cidade' => 'Salvador - BA'],
                        ['id' => 16, 'nome' => 'Luciana Rocha',    'email' => 'luciana.r@gmail.com',        'cidade' => 'Manaus - AM'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS'],
                    ];
                    $resultado = paginarMaisDeUmaQueryString($dados, 7);

                    echo associadosTabela($tipo_tabela, $resultado['dados']); 

                    renderPaginacaoMaisDeUmaQueryString($resultado['paginaAtual'], $resultado['totalPaginas'], 'tipo=solicitacao');

                }else if($tipo_tabela == 'associado'){
                    $dados = [
                        ['id' => 10, 'nome' => 'Maria Oliveira',   'email' => 'maria.oliveira@gmail.com',   'cidade' => 'São Paulo - SP',     'telefone' => '+55 (11) 91234-5678'],
                        ['id' => 11, 'nome' => 'João Mendes',      'email' => 'joao.mendes@yahoo.com',      'cidade' => 'Belo Horizonte - MG','telefone' => '+55 (31) 98765-4321'],
                        ['id' => 12, 'nome' => 'Ana Costa',        'email' => 'ana.costa@outlook.com',      'cidade' => 'Fortaleza - CE',     'telefone' => '+55 (85) 99876-1234'],
                        ['id' => 13, 'nome' => 'Carlos Pereira',   'email' => 'carlos.p@gmail.com',         'cidade' => 'Curitiba - PR',      'telefone' => '+55 (41) 99999-8888'],
                        ['id' => 14, 'nome' => 'Fernanda Lima',    'email' => 'fernanda.lima@uol.com.br',   'cidade' => 'Rio de Janeiro - RJ','telefone' => '+55 (21) 98765-4321'],
                        ['id' => 15, 'nome' => 'Roberto Souza',    'email' => 'roberto.souza@hotmail.com',  'cidade' => 'Salvador - BA',      'telefone' => '+55 (71) 98888-7766'],
                        ['id' => 16, 'nome' => 'Luciana Rocha',    'email' => 'luciana.r@gmail.com',        'cidade' => 'Manaus - AM',        'telefone' => '+55 (92) 93333-2211'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                        ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS',  'telefone' => '+55 (51) 94444-5566'],
                    ];

                    $resultado = paginarMaisDeUmaQueryString($dados, 7);

                    echo associadosTabela($tipo_tabela, $resultado['dados']);

                    renderPaginacaoMaisDeUmaQueryString($resultado['paginaAtual'], $resultado['totalPaginas'], 'tipo=associado');
                }
                ?>
            </div>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/public/javascript/Associados.js"></script>
</body>
</html>