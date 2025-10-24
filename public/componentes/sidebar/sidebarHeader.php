<?php
function typeSidebar($tipoUsuario){
    if($tipoUsuario == "Associado"){
        return '<a href="/projeto-integrador-et.com/app/views/associado/DashboardAssociado.php"><li class="config"><p class="config_link">Área de Administração</p></li></a>';
    }else{
        return '<a href="/projeto-integrador-et.com/app/views/usuario/Tornar_Associado.php"><li class="config"><p class="config_link">Associados</p></li></a>';
    };
}

function typeMyAccount($login){
    if($login){
       return '<a href="/projeto-integrador-et.com/app/views/usuario/minhaConta.php"><li class="config"><p class="config_link">Minha Conta</p></li></a>';
    }else{
       return '<a href="/projeto-integrador-et.com/app/views/usuario/Login.php"><li class="config"><p class="config_link">Minha Conta</p></li></a>';
    };
}



function createSidebar($tipoUsuario, $login){ // Sidebar de teste, depois trocar para versão oficial.
    return '
    <div id="overlay" class="overlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="nav_adm">
            <div id="menu-toggle-mobile">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <a href="/projeto-integrador-et.com/app/views/usuario/paginaPrincipal.php" class="logo">
                <img src="/projeto-integrador-et.com/public/imagens/ET/LogoBranca2.png" alt="">
            </a>
            <div class="botoes_sidebar">
                <div class="botoes_categoria">
                    <ul>
                        <p class="categoria_nome">Categorias</p>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem" class="categoria_link">Maquiagem</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub%5B%5D=Pele"><li><p class="submenu_link">Pele</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub%5B%5D=Olhos"><li><p class="submenu_link">Olhos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub%5B%5D=Boca"><li><p class="submenu_link">Boca</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub%5B%5D=Sombrancelhas"><li><p class="submenu_link">Sombrancelhas</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume" class="categoria_link" >Perfume</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub%5B%5D=Feminino"><li><p class="submenu_link">Feminino</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub%5B%5D=Masculino"><li><p class="submenu_link">Masculino</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub%5B%5D=Infantil"><li><p class="submenu_link">Infantil</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub%5B%5D=Body_Splash"><li><p class="submenu_link">Body Splash</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare" class="categoria_link" >SkinCare</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Limpeza_facial"><li><p class="submenu_link">Limpeza facial</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Esfolia%C3%A7%C3%A3o"><li><p class="submenu_link">Esfoliação</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Hidrata%C3%A7%C3%A3o"><li><p class="submenu_link">Hidratação</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Máscara"><li><p class="submenu_link">Máscara</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Protetor+Solar"><li><p class="submenu_link">Protetor Solar</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub%5B%5D=Tratamentos"><li><p class="submenu_link">Tratamentos</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo" class="categoria_link" >Cabelo</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub%5B%5D=Dia-A-Dia"><li><p class="submenu_link">Dia-a-dia</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub%5B%5D=Tratamentos"><li><p class="submenu_link">Tratamentos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub%5B%5D=Estilização"><li><p class="submenu_link">Estilização</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub%5B%5D=Acessórios"><li><p class="submenu_link">Acessórios</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=utensílios" class="categoria_link" >Utensílios</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=utensílios&sub%5B%5D=Cabelos"><li><p class="submenu_link">Cabelo</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=utensílios&sub%5B%5D=Maquiagem"><li><p class="submenu_link">Maquiagem</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=utensílios&sub%5B%5D=Esponja"><li><p class="submenu_link">Esponja</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal" class="categoria_link" >Corporal</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub%5B%5D=Body+Splash"><li><p class="submenu_link">Body Splash</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub%5B%5D=%C3%93leos"><li><p class="submenu_link">Óleos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub%5B%5D=Creme"><li><p class="submenu_link">Cremes</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub%5B%5D=Protetor"><li><p class="submenu_link">Protetores</p></li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="botoes_config">
                    <p class="categoria_nome">Ajuda e Configurações</p>
                    <ul>
                        ' . typeMyAccount($login) . '
                        <li id="botaoSidebarMeusPedidos" class="config"><p class="config_link">Meus Pedidos</p></li>
                        ' . typeSidebar($tipoUsuario) . '
                        <a href="/projeto-integrador-et.com/app/views/usuario/TermoDeUso.php"><li class="config"><p class="config_link">Termos de Uso e Privacidade</p></li></a>
                    </ul> 
                </div>
            </div>
        </div>
        
    </div>
    ';
}
?>