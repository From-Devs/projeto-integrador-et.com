<?php 

include __DIR__ . "/../../../public/componentes/telaADM/componenteADM.php";
include __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/AssociadosADM/associados.php";
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'ADM';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Associados</title>
    <link rel="stylesheet" href="./../../../public/css/AssociadosADM.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    
    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>
    
    <!-- aqui acaba o container esquerda -->
    <div id="container">
        <div class="container-filtroEIcon">
            <div id="controleIcon">
                <div id="iconUsuario">
                    <img id="fotoUser" src="../../../public/imagens/imagensADM/userIMG.png" alt="userIMG">
                    <p id="textUser">ADM ET</p>
                </div>
            </div>
            <div id="divPesquisarEEscolher">
                <div id="pesquisar">
                    <form action="">
                        <input id="inputPesquisar" type="text" placeholder="Pesquisar por Associado...">
                    </form>
                </div>
                <div id="Escolher">
                    <button id="botaoAssociados">
                        <p>Associados</p>
                    </button>
                </div>
                <div id="Solicitações">
                    <button id="botaoSolicitacao">
                        <p>Solicitações</p>
                    </button>
                </div>
            </div>
        </div>
        <div id="titulo">
            <h1 id="tituloH1">Associados</h1>
        </div>
        <?php 
            echo associadosTabela('solicitacao', [
                ['id' => 10, 'nome' => 'Maria Oliveira',   'email' => 'maria.oliveira@gmail.com',   'cidade' => 'São Paulo - SP'],
                ['id' => 11, 'nome' => 'João Mendes',      'email' => 'joao.mendes@yahoo.com',      'cidade' => 'Belo Horizonte - MG'],
                ['id' => 12, 'nome' => 'Ana Costa',        'email' => 'ana.costa@outlook.com',      'cidade' => 'Fortaleza - CE'],
                ['id' => 13, 'nome' => 'Carlos Pereira',   'email' => 'carlos.p@gmail.com',         'cidade' => 'Curitiba - PR'],
                ['id' => 14, 'nome' => 'Fernanda Lima',    'email' => 'fernanda.lima@uol.com.br',   'cidade' => 'Rio de Janeiro - RJ'],
                ['id' => 15, 'nome' => 'Roberto Souza',    'email' => 'roberto.souza@hotmail.com',  'cidade' => 'Salvador - BA'],
                ['id' => 16, 'nome' => 'Luciana Rocha',    'email' => 'luciana.r@gmail.com',        'cidade' => 'Manaus - AM'],
                ['id' => 17, 'nome' => 'Pedro Henrique',   'email' => 'pedro.h@gmail.com',          'cidade' => 'Porto Alegre - RS'],
            ]);
        ?>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/javascript/Associados.js"></script>
</body>
</html>