<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";

session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? 'Associado';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/MeusDadosAssociado.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
    <title>Meus Dados</title>
</head>
<body>
    <?php
        echo createSidebarInterna($tipo_usuario);
    ?>
    <main>
        <section class="main_header">
            <h1 id="titulo-principal">Meus dados</h1> <!-- ID único para o título principal -->
            <div id="perfil-usuario" class="perfil"></div> <!-- ID único para o perfil -->
        </section>
        <section class="main_fundo">
            <!-- Tela Principal (principal-perfil) -->
                    <div id="user-info">
                        <div id="user-perfil">
                            <div id="nome-perfil">
                                <h1>Perfil</h1>
                            </div>  
                            <div id="img-user">
                                <img src="https://i.pinimg.com/736x/91/0b/ec/910becbf6e01b541e0dea7f3bcc515c3.jpg" alt="Foto do usuário">
                                <p>Wellinton R.</p>
                            </div>  
                            <div id="icone-editar">
                                <i class='bx bx-pencil'></i>
                            </div>
                        </div>
                        <div id="user-redes">
                            <div class="box-rede">
                                <i class='bx bxl-facebook'></i>
                                <p>Facebook</p>
                            </div>
                            <div class="box-rede">
                                <i class='bx bxl-instagram'></i>
                                <p>Instagram</p>
                            </div>
                            <div class="box-rede">
                                <i class='bx bxl-linkedin'></i>
                                <p>LinkedIn</p>
                            </div>
                            <div class="box-rede">
                                <i class='bx bxl-twitter'></i>
                                <p>Twitter</p>
                            </div>
                            <div class="box-rede">
                                <i class='bx bxl-whatsapp'></i>
                                <p>WhatsApp</p>
                            </div>
                        </div>
                    </div>
                    <div class="parte-dados">
                        <div class="dado-local">
                            <div class="titulo-dado">
                                <h1>Nome</h1>
                            </div>
                            <div class="texto-dado">
                                <p>Wellinton R.</p>
                            </div>
                        </div>
                        <div class="dado-local">
                            <div class="titulo-dado">
                                <h1>CPF</h1>
                            </div>
                            <div class="texto-dado">
                                <p>657.676.234-43</p>
                            </div>
                        </div>
                        <div class="dado-local">
                            <div class="titulo-dado">
                                <h1>Gmail</h1>
                            </div>
                            <div class="texto-dado">
                                <p>tiginhoJogoTÀPagandoMUITO@Gmail.com</p>
                            </div>
                        </div>
                        <div class="dado-local">
                            <div class="titulo-dado">
                                <h1>Data de nascimento</h1>
                            </div>
                            <div class="texto-dado">
                                <p>01/01/1111</p>
                            </div>
                        </div>
                    </div>
                    <div id="editar-botao">
                        <div id="botao-editar">
                            <h1>Editar</h1>
                        </div>
                    </div>

            <!-- Tela do Quadrado (quadrado-perfil) -->
            <div id="quadrado-perfil" class="quadrado hidde">
                <div class="user-img">
                    <h1>Perfil</h1>
                    <img src="https://i.pinimg.com/736x/91/0b/ec/910becbf6e01b541e0dea7f3bcc515c3.jpg" alt="Foto do usuário">
                </div>
                <div class="user-dados">
                    <div class="user-Letra">    
                        <h1>Nome</h1>
                    </div>
                    <div class="user_Box menor Texto">Wellinton R.</div>
                    <div class="user-Letra">
                        <h1>Gmail</h1>
                    </div>
                    <div class="user_Box Texto">tiginhoJogoTÀPagandoMUITO@Gmail.com</div>
                    <div class="user-Letra">
                        <h1>CPF</h1>
                    </div>
                    <div class="user_Box menor Texto">09x.xxx,xxx-67</div>
                    <div class="user-Letra">
                        <h1>Adicionar</h1>
                    </div>
                    <div class="icones">
                        <i class='bx bxl-instagram icone'></i>
                        <i class='bx bxl-linkedin icone'></i>
                        <i class='bx bxl-facebook icone'></i>
                        <i class='bx bxl-twitter icone'></i>
                        <i class='bx bxl-whatsapp icone'></i>
                        <i class='bx bx-plus icone'></i>
                    </div>
                </div>
                <i id="fechar-perfil" class='bx bx-x exit'></i>
            </div>
            
            <!-- Tela do Quadrado (edicao-perfil) -->
            <div id="quadrado-perfil" class="quadrado">
                <div class="usertitulo">
                  <h1>Perfil</h1>
                </div>
                
            </div>
        </section>
    </main>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
    <script>
         // JavaScript para alternar entre as telas
        const iconeEditar = document.getElementById('icone-editar');
        const fecharPerfil = document.getElementById('fechar-perfil');
        const userInfo = document.getElementById('user-info');
        const parteDados = document.querySelector('.parte-dados');
        const botaoEditarDiv = document.getElementById('editar-botao'); // Botão "Editar"
        const quadradoPerfil = document.getElementById('quadrado-perfil');

        if (iconeEditar && fecharPerfil && userInfo && parteDados && botaoEditarDiv && quadradoPerfil) {
            iconeEditar.addEventListener('click', () => {
                // Oculta a tela principal
                userInfo.classList.add('hidde');
                parteDados.classList.add('hidde');
                botaoEditarDiv.classList.add('hidde'); 
                botaoEditarDiv.classList.add('hidde'); 
                // Mostra a tela do quadrado
                // quadradoPerfil.classList.remove('hidde');
            });

            fecharPerfil.addEventListener('click', () => {
                // Oculta a tela do quadrado
                quadradoPerfil.classList.add('hidde');

                // Mostra a tela principal
                userInfo.classList.remove('hidde');
                parteDados.classList.remove('hidde');
                botaoEditarDiv.classList.remove('hidde'); // Mostra o botão "Editar"
            });
        }
    </script>
</body>
</html>