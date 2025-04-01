<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/MeusDadosAssociado.css">
    <link rel="stylesheet" href="../../../public/componentes/sidebarADM_Associado/style.css">
    <title>Meus Dados</title>
</head>
<body>
    <?php 
    include "../../../public/componentes/sidebarADM_Associado/sidebarAssociado.php";
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
                <div class="user-ediçao-usuario"><h1>Perfil</h1></div>
                <div class="user-dados-direita">
                    <div class="user-dados-edicao">
                        <div class="user-Letra-ediçao"><h1>Nome Nome</h1></div>
                        <div class="user_Box-ediçao"><p>vector</p></div>
                        <div class="user-Letra-ediçao"><h1>Sobrenome</h1></div>
                        <div class="user_Box-ediçao"><p>kkk ah éee nacimento</p></div>
                        <div class="user-Letra-ediçao"><h1>Gmail</h1></div>
                        <div class="user_Box-ediçao"><p>tiginhoJogoTÀPagandoMUITOovojogarCArtinho@Gmail.com.</p></div>
                        <div class="user-Letra-ediçao"><h1>data de nacimento</h1></div>
                        <div class="date">
                            <div class="user_Box-ediçao"></div>
                            <div class="user_Box-ediçao"></div>
                            <div class="user_Box-ediçao"></div>
                        </div>
                    </div>
                </div>
                <!-- linha -->
                <div class="linha"></div>

                <div class="user-dados-esquerda">
                    <div class="user-dados-edicao">
                        <div class="user-Letra-ediçao"><h1>Nome</h1></div>
                        <div class="user_Box-ediçao Texto">Wellinton R.</div>
                        <div class="user-Letra-ediçao"><h1>Nome</h1></div>
                        <div class="user_Box-ediçao Texto">Wellinton R.</div>
                        <div class="ediçao-img"><img src="https://i.pinimg.com/736x/91/0b/ec/910becbf6e01b541e0dea7f3bcc515c3.jpg" alt="logo"></div>
                    </div>
                    <i id="fechar-perfil" class='bx bx-x exit'></i>
                </div>
        </section>
    </main>
    <script src="../../../public/componentes/sidebarADM_Associado/script.js"></script>
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