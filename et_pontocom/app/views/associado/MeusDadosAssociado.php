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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?= createSidebarInterna(tipo_usuario: $tipo_usuario); ?>

    <div class="container-principal">
        <header>
            <div class="titulo">Meus dados</div>
        </header>

        <div class="area-conteudo">

            <div class="edisao none">
                <div class="moficasao">
                    <div class="pt1">
                        <div class="titulo"></div>
                        <div class="cards">
                            <div class="card-edit">
                                <h1>drgdgrdgdr</h1>
                                <input type="text">
                            </div>
                        <div class="cards">
                            <div class="card-edit">
                                <h1>rdgdgdg</h1>
                                <input type="text">
                            </div>
                            <div class="card-edit">
                                <h1>rdgdrgdgrf</h1>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="linha"></div>
                    <div class="pt2">
                        <div class="cards">
                            <div class="card-edit">
                                <h1>srdgedrg</h1>
                                <input type="text">
                            </div>
                            <div class="card-edit">
                                <h1>rdgdgdrg</h1>
                                <input type="text">
                            </div>
                            <div class="log">
                                <img src="" alt="log">
                            </div>
                            <div class="buttons">
                                <button type="button" id="can">cancelar</button>
                                <button type="button" id="con">comfirma</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <!-- perfi dados do usuario -->
            <div class="perfil-Meus-dados">
                <div class="moficasao none">
                    <div class="perfil-dados">
                        <p>Perfil</h1>
                        <div class="foto">
                            <img src="https://preview.redd.it/which-meme-image-of-joker-is-going-to-be-turned-into-a-v0-qgt2ljdpsbzc1.jpg?width=640&crop=smart&auto=webp&s=58b0fbeed2d91a608cf2507d5575f7dd8ea65e19" alt="Perfil">                    
                        </div>    
                    </div>    

                    <div class="card-perfil">
                        <div class="form-group">
                            <div class="titulo-form"><p>Nome</p></div>
                            <div class="Cardtext"><p>felipe</p></div>
                        </div>
                        <div class="form-group">
                            <div class="titulo-form"><p>Gmail</p></div>
                            <div class="Cardtext"><p>felipeNento@Gmail.com</p></div>
                        </div>
                        <div class="form-group">
                            <div class="titulo-form"><p>CPF</p></div>
                            <div class="Cardtext"><p>980-678-657-23</p></div>
                        </div>
                        <!-- // icones pls pode por chat aquele que voce ja tinha feito -->
                        <div class="form-group">
                            <div class="titulo-form"><p>icone</p></div>
                            <div class="Cardtexticones">
                                <i class='bx-fw bxl bx-facebook-square'></i>
                                <i class='bx-fw bxl bx-facebook-square'></i>
                                <i class='bx-fw bxl bx-facebook-square'></i>
                                <i class='bx-fw bxl bx-facebook-square'></i>
                                <i class='bx-fw bxl bx-facebook-square'></i>
                            </div>
                        </div>
                    </div>
                    <div class="x">X</div>
                </div>    
            </div>

            <!-- meus Dados pricipal -->
            <div class="Conteudos">
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
            <div class="CardDados">
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
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Seleciona os botões pelas classes e estruturas existentes
    const btnEditar = document.querySelector('.bnt-Editar'); // Botão Editar (div com h1)
    const btnPerfil = document.querySelector('.CardPrincipal h1'); // Botão Perfil (h1 dentro do CardPrincipal)
    const btnFecharPerfil = document.querySelector('.perfil-Meus-dados .x'); // Botão X para fechar perfil

    // Áreas de conteúdo
    const areaMeusDados = document.querySelector('.Conteudos');
    const areaPerfil = document.querySelector('.perfil-Meus-dados');
    const areaEdicao = document.querySelector('.edisao');

    // Função para esconder todas as áreas
    function esconderTodas() {
        areaMeusDados.classList.add('none');
        areaPerfil.classList.add('none');
        areaEdicao.classList.add('none');
    }

    // Clicar em "Perfil" (título no CardPrincipal)
    btnPerfil.addEventListener('click', () => {
        esconderTodas();
        areaPerfil.classList.remove('none');
    });

    // Clicar em "Editar"
    btnEditar.addEventListener('click', () => {
        esconderTodas();
        areaEdicao.classList.remove('none');
    });

    // Clicar em "X" no perfil
    btnFecharPerfil.addEventListener('click', () => {
        esconderTodas();
        areaMeusDados.classList.remove('none');
    });

    // Mostrar a tela "Meus Dados" por padrão
    esconderTodas();
    areaMeusDados.classList.remove('none');
});
</script>

</body>
</html>
