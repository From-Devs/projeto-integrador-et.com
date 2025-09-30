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
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub%5B%5D=Boca"><li><p class="submenu_link">Olhos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub=boca"><li><p class="submenu_link">Boca</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=maquiagem&sub=sombrancelhas"><li><p class="submenu_link">Sombrancelhas</p></li></a>
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
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub=feminino"><li><p class="submenu_link">Feminino</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub=masculino"><li><p class="submenu_link">Masculino</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=perfume&sub=unissex"><li><p class="submenu_link">Unissex</p></li></a>
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
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=limpeza"><li><p class="submenu_link">Limpeza</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=esfoliação"><li><p class="submenu_link">Esfoliação</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=hidratação"><li><p class="submenu_link">Hidratação</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=mascara"><li><p class="submenu_link">Máscara</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=protetorsolar"><li><p class="submenu_link">Protetor Solar</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=skincare&sub=especiais"><li><p class="submenu_link">Especiais</p></li></a>
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
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub=dia-a-dia"><li><p class="submenu_link">Dia-a-dia</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub=tratamentos"><li><p class="submenu_link">Tratamentos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub=estilização"><li><p class="submenu_link">Estilização</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub=especiais"><li><p class="submenu_link">Especiais</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=cabelo&sub=acessorios"><li><p class="submenu_link">Acessórios</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=eletronicos" class="categoria_link" >Eletrônicos</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=eletronicos&sub=cabelo"><li><p class="submenu_link">Cabelo</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=eletronicos&sub=pincel"><li><p class="submenu_link">Pincel</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=eletronicos&sub=esponja"><li><p class="submenu_link">Esponja</p></li></a>
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
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub=bodysplash"><li><p class="submenu_link">Body Splash</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub=oleos"><li><p class="submenu_link">Óleos</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub=cremes"><li><p class="submenu_link">Cremes</p></li></a>
                                <a href="/projeto-integrador-et.com/app/views/usuario/Categorias.php?tela=corporal&sub=protetores"><li><p class="submenu_link">Protetores</p></li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="botoes_config">
                    <p class="categoria_nome">Ajuda e Configurações</p>
                    <ul>
                        ' . typeMyAccount($login) . '
                        <a href="/projeto-integrador-et.com/app/views/usuario/meusPedidos.php"><li class="config"><p class="config_link">Meus Pedidos</p></li></a>
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