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
            <h1 id="dados">Meus dados</h1>
            <div class="perfil-box">
                <div id="quadrado-perfil">
                    <h1>Perfil</h1>
                    <img src="https://i.pinimg.com/736x/91/0b/ec/910becbf6e01b541e0dea7f3bcc515c3.jpg" alt="User Profile Image">
                </div>    
                <div id="quadrado-perfil"></div>

            </div>
        </section>
        <section class="main_fundo">
            <div class="pricipais-dados">
                <div class="editar">
                    <h1>Editar</h1>
                </div>
            </div>
            <div class="quadrado hidde">
                <div class="user-img">
                    <h1>Perfil</h1>
                    <img src="https://i.pinimg.com/736x/91/0b/ec/910becbf6e01b541e0dea7f3bcc515c3.jpg" alt="User Profile Image">
                </div>
                <div class="user-dados">
                    <div class="user-Letra">
                        <h1>Nome</h1>
                        <div class="user_Box menor Texto">Wellinton R.</div>
                    </div>
                    <div class="user-Letra">
                        <h1>Gmail</h1>
                        <div class="user_Box Texto">tiginhoJogoTÀPagandoMUITO@Gmail.com</div>
                    </div>
                    <div class="user-Letra">
                        <h1>CPF</h1>
                        <div class="user_Box menor Texto">09x.xxx,xxx-67</div>
                    </div>
                    <div class="user-Letra">
                        <h1>Adicionar</h1>
                        <div class="icones">
                            <i class='bx bxl-instagram icone'></i>
                            <i class='bx bxl-linkedin icone'></i>
                            <i class='bx bxl-facebook icone'></i>
                            <i class='bx bxl-twitter icone'></i>
                            <i class='bx bxl-whatsapp icone'></i>
                            <i class='bx bx-plus icone'></i>
                        </div>
                    </div>
                </div>
                <i class='bx bx-x exit'></i>
            </div>
        </section>
    </main>
    <script src="../../../public/componentes/sidebarADM_Associado/script.js"></script>
</body>
</html>