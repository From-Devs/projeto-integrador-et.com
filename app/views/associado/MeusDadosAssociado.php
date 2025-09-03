<?php
require_once __DIR__ . "/../../../public/componentes/sidebarADM_Associado/sidebarInterno.php";
require_once __DIR__ . "/../../../public/componentes/tabelasAssociado_ADM/HistoricoVendasAssociado/hv.php";
require __DIR__ . "/../../../public/componentes/contaADM_Associado/contaADM_Associado.php";
require_once __DIR__ . "/../../../public/componentes/popUp/popUp.php";
require_once __DIR__ . "/../../../public/componentes/botao/botao.php";
require __DIR__ . "/../../../public/componentes/componentesADM_Associado/componentesADM_Associado.php";

// session_start();
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
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/contaADM_Associado/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php
        echo createSidebarInterna($tipo_usuario);
        echo createContaAssociadoADM("Associado");
    ?>
    <div class="container-principal">
        <header>
            <div class="titulo">Meus dados</div>
        </header>

        <div class="area-conteudo">

            <div class="edisao none">
                <div class="moficasao">
                    <div class="dados">
                        <h1>Meus dados</h1>
                        <div id="card-editar-mg">

                            <div id="T-editar"><p>Nome</p></div>
                            <input class="cards-editar" type="text"></input>
                            <div id="T-editar"><p>Sobrenome</p></div>
                            <input class="cards-editar PAD" type="text"></input>
                            <div id="T-editar"><p>Gmail</p></div>
                            <input class="cards-editarG" type="text"></input>
                            <div id="T-editar"><p>Data de nacimanto</p></div>
                            
                            <div class="cards-data">
                                <div class="select-group">
                                    <select id="dia" name="dia">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>31</option>
                                    </select>
                                    
                                    <select id="mes" name="mes">
                                        <option>Janeiro</option>
                                        <option>Fevereiro</option>
                                        <option>Março</option>
                                        <option>Abril</option>
                                        <option>Maio</option>
                                        <option>Junho</option>
                                        <option>Julho</option>
                                        <option>Agosto</option>
                                        <option>Setembro</option>
                                        <option>Outubro</option>
                                        <option>Novembro</option>
                                        <option>Dezembro</option>
                                    </select>
                                    
                                    <select id="ano" name="ano">
                                        <option>2005</option>
                                        <option>2004</option>
                                        <option>2003</option>
                                        <option>2002</option>
                                        <!-- ... até 1900 -->
                                        <option>1900</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="dados">
                    <div class="exit">
                        <i class='bx  bx-x'  ></i> 
                    </div>
                        <div id="card-editar-mg">
                            <div id="T-editar"><p>CPF</p></div>
                            <input class="cards-editar PAM" type="text"></input>
                            <div id="T-editar"><p>Telefone</p></div>
                            <input class="cards-editar PAM" type="text"></input>
                            <div class="imagem-log">
                                <img src="/projeto-integrador-et.com/public/imagens/ET/LogoPreta1.png" alt="logo">
                            </div>
                            <div class="buttons">
                                <div class="btn-card certo">
                                    <input type="button" value="✔ Confirmar">
                                </div>
                                <div class="btn-card errado">
                                    <input type="button" value="🚫 Cancelar">
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <!-- perfi dados do usuario -->
            <div class="perfil-Meus-dados none">
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
                                <i class='bx bx-plus'></i>
                            </div>
                        </div>
                    </div>
                    <div class="x"><i class='bx  bx-x'  ></i></div>
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
    const EditarBtn = document.getElementsByClassName("bnt-Editar") 
    const EditarIcn = document.getElementsByClassName("icon")
    const IconeExit1 = document.getElementsByClassName("exit");
    const IconeExit2 = document.getElementsByClassName("x");
    
    // tela principal 
    const MeusDadosc1 = document.getElementsByClassName("CardDados")
    const MeusDadosc2 = document.getElementsByClassName("Conteudos")
    // vializar perfil
    const Perfildado1 = document.getElementsByClassName("perfil-Meus-dados")
    // editar perfil 
    const Editardado1 = document.getElementsByClassName("edisao")



    function mostrar(){
        MeusDadosc1[0].classList.remove("none");
        MeusDadosc2[0].classList.remove("none");
    }
    function esconder(){
        MeusDadosc1[0].classList.add("none");
        MeusDadosc2[0].classList.add("none");
    }
    EditarBtn[0].addEventListener('click',()=>{
        esconder()
        Editardado1[0].classList.remove("none");
        console.log(Perfildado1)
    });
    EditarIcn[0].addEventListener('click',()=>{
        esconder()
        Perfildado1[0].classList.remove("none");
        console.log(Perfildado1)
    });
    IconeExit1[0].addEventListener('click',() =>{
        mostrar()
        Editardado1[0].classList.add("none");
        console.log(Perfildado1)
    })
    IconeExit2[0].addEventListener('click',() =>{
        mostrar()
        Perfildado1[0].classList.add("none");
        console.log(Perfildado1)
    })

});
</script>

<script src="/projeto-integrador-et.com/public/componentes/sidebarADM_Associado/scripts.js"></script>
<script src="/projeto-integrador-et.com/public/componentes/popup/script.js"></script>

</body>
</html>
