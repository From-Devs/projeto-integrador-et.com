<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>

    <!-- Boxicons CSS -->
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    <!-- Estilos -->
    <link rel="stylesheet" href="../../../public/css/MeusDadosAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
</head>
<body>
    <?= createSidebarInterna($tipo_usuario); ?>

    <div class="container-principal">
        <header>
            <div class="titulo">Meus dados</div>
        </header>

        <div class="area-conteudo">
            <div class="moficasao">
                <div class="perfil-dados">
                    <p>Perfil</h1>
                    <div class="foto">
                        <img src="https://preview.redd.it/which-meme-image-of-joker-is-going-to-be-turned-into-a-v0-qgt2ljdpsbzc1.jpg?width=640&crop=smart&auto=webp&s=58b0fbeed2d91a608cf2507d5575f7dd8ea65e19" alt="Perfil">                    
                    </div>    
                </div>    

                <div class="card-perfil">
                    <div class="form-group">
                        <div class="titulo-form"><p>Nome</p></div>
                        <div class="Cardtext"></div>
                    </div>
                    <div class="form-group">
                        <div class="titulo-form"><p>Gmail</p></div>
                        <div class="Cardtext"><p>dsfhdsgjhfdsjkdgkjsgkf</p></div>
                    </div>
                    <div class="form-group">
                        <div class="titulo-form"><p>CPF</p></div>
                        <div class="Cardtext"><p>e9w890r8w90r809w</p></div>
                    </div>
                    <!-- // icones pls pode por chat aquele que voce ja tinha feito -->
                    <div class="form-group">
                        <div class="titulo-form"><p>icone</p></div>
                        <div class="Cardtexticones">
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-whatsapp"></i>
                            <i class="bi bi-linkedin"></i>
                        </div>
                    </div>
                </div>
                <div class="x">X</div>
            </div>    
            
            <div class="Conteudos none">
                <div class="CardPrincipal">
                    <h1>Perfil
                        <div class="icon">
                            <img src="../../../public/imagens/icones/Captura de tela 2025-05-29 164243.png" alt="">
                        </div>
                    </h1>
                    <div class="user-dados">
                        <div class="img">
                            <img src="https://preview.redd.it/which-meme-image-of-joker-is-going-to-be-turned-into-a-v0-qgt2ljdpsbzc1.jpg?width=640&crop=smart&auto=webp&s=58b0fbeed2d91a608cf2507d5575f7dd8ea65e19" alt="Perfil">
                        </div>
                        <p class="user">Wellinton R.</p>
                    </div>    
                </div><!--fim Card principal -->

                <!-- Exemplos de cards Sociais -->
                <?php for($i=0; $i < 5; $i++): ?>
                    <div class="CardFilho">
                        <i class='bx-fw bxl bx-facebook-square'></i>
                        <div class="h0">FaceBooK</div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="CardDados none">
                <div class="bnt-Editar">
                    <h1>Editar</h1>
                </div>
                <!-- for do dados do usuario -->
                <?php 
                $dados = [
                    ['titulo' => 'Nome', 'valor' => 'guilherme'],
                    ['titulo' => 'CPF', 'valor' => '657.676.234-43'],
                    ['titulo' => 'Gmail', 'valor' => 'tiginhoJogoTÀPagandoMUITO@Gmail.com'],
                    ['titulo' => 'Telefone', 'valor' => '(67) 94594-3445'],
                    ['titulo' => 'Data de nacimento', 'valor' => '01/01/1111']
                ];
                foreach ($dados as $dado): ?>
                    <div class="CardPrimos">
                        <p id="usertitulo"><?= $dado['titulo'] ?></p>
                        <p id="UserDados"><?= $dado['valor'] ?></p>
                        <?php if ($dado['titulo'] === 'Telefone') echo '<hr>'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!--fim Principal -->
</body>
</html>
