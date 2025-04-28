<!-- Para utilizar a sidebar é necessário colocar os seguintes links na head do html:
        
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popUp/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">


    E estes links no script ao final do body:

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/scripts.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>



    No typeSidebarInterna eu coloquei os botões que ficam na sidebar de cada usuário para poder colocar os endereços. Quando criar a página, verifique se o enderço está correto.
    ////////////////////////////////MUDAR OS ENDEREÇOS DA DASHBOARD E PRODUTOS DO ADM!
-->


<?php

require_once __DIR__ . "/../popUp/popUp.php";
require_once __DIR__ . "/../botao/botao.php";

    function typeSidebarInterna($tipo_usuario) {
        $paginaAtual = basename($_SERVER['PHP_SELF']);


        if ($tipo_usuario == "Associado") {
            return "
                <li class='nav-item " . ($paginaAtual == 'Dashboard.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/associado/Dashboard.php' class='nav-link'>
                        <span class='fa fa-house-chimney'></span>
                        <span class='button_name'>Dashboard</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Produtos.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/associado/Produtos.php' class='nav-link'>
                        <span class='bx bxs-package'></span>
                        <span class='button_name'>Produtos</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Pedidos.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/associado/Pedidos.php' class='nav-link'>
                        <span class='bx bx-money-withdraw'></span>
                        <span class='button_name'>Pedidos</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'HistoricoVendas.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/associado/HistoricoVendas.php' class='nav-link'>
                        <span class='fa fa-clock'></span>
                        <span class='button_name'>Histórico de Vendas</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Relatorios.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/associado/Relatorios.php' class='nav-link'>
                        <span class='bx bxs-receipt'></span>
                        <span class='button_name'>Relatórios</span>
                    </a>
                </li>
            ";
        } else {
            return "
                <li class='nav-item " . ($paginaAtual == 'testedashboard.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/testedashboard.php' class='nav-link'>
                        <span class='fa fa-house-chimney'></span>
                        <span class='button_name'>Dashboard</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'testeprodutos.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/public/componentes/sidebarADM_Associado/testeprodutos.php' class='nav-link'>
                        <span class='bx bxs-package'></span>
                        <span class='button_name'>Produtos</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Pedidos.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/adm/Pedidos.php' class='nav-link'>
                        <span class='bx bx-money-withdraw'></span>
                        <span class='button_name'>Pedidos</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Associados.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/adm/Associados.php' class='nav-link'>
                        <span class='fa fa-users'></span>
                        <span class='button_name'>Associados</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Relatorios.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/adm/Relatorios.php' class='nav-link'>
                        <span class='bx bxs-receipt'></span>
                        <span class='button_name'>Relatórios</span>
                    </a>
                </li>
                <li class='nav-item " . ($paginaAtual == 'Customizacao.php' ? 'active' : '') . "'>
                    <a href='/projeto-integrador-et.com/et_pontocom/app/views/adm/Customizacao.php' class='nav-link'>
                        <span class='bx bxs-palette'></span>
                        <span class='button_name'>Customização</span>
                    </a>
                </li>
            ";
        }
    }
    function createSidebarInterna($tipo_usuario){
        $btnSim = botaoPersonalizadoRedirect('Sim','btn-white','et_pontocom/app/views/usuario/paginaPrincipal.php','60px', '30px');
        $btnNao = botaoPersonalizadoOnClick('Não', 'btn-white', 'fecharPopUp("popupSair")','60px', '30px');
        return "
            <body>
                <div class='menu_mobile'>
                    <span class='botão_menu' onclick='abrirSidebar()'>
                        &#9776;
                    </span>
                </div>
                <div class='sidebar_adm'>
                    <nav class='nav_adm'>
                        <div class='logo'>
                            <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca1.png' alt=''>
                        </div>
                        <div class='linhaGradiente'></div>
                        <div class='botoesMenu'>
                            <ul>
                                ". typeSidebarInterna($tipo_usuario) ."
                            </ul>
                        </div>
                        <div class='area_Sair'>
                            <div class='button_sair' id='button_sair' style='margin-top: 280px;'>
                                <span class='fa fa-arrow-right-from-bracket' onclick=\"abrirPopUp('popupSair')\"></span>
                                <span class='button_name' onclick=\"abrirPopUp('popupSair')\">Voltar a tela inicial</span>
                            </div> 
                            "
                                . PopUpConfirmar('popupSair','Confirmar?',$btnSim,$btnNao,'500px','white','black','30px') . 
                            "
                        </div>
                    </nav>
                </div>
                
                <script src='./scripts.js'></script>
                <script src='../popUp/script.js'></script>
            </body>
        ";
    }



?>