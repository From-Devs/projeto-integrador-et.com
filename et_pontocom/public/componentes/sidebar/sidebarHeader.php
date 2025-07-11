<?php
function typeSidebar($tipoUsuario){
    if($tipoUsuario == "Associado"){
        return '<a href="/projeto-integrador-et.com/et_pontocom/app/views/associado/DashboardAssociado.php"><li class="config"><p class="config_link">Área de Administração</p></li></a>';
    }else{
        return '<a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Tornar_Associado.php"><li class="config"><p class="config_link">Associados</p></li></a>';
    };
}

function createSidebar($tipoUsuario){ // Sidebar de teste, depois trocar para versão oficial.
    return '
    <div id="overlay" class="overlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="nav_adm">
            <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/paginaPrincipal.php" class="logo">
                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca2.png" alt="">
            </a>
            <div class="botoes_sidebar">
                <div class="botoes_categoria">
                    <ul>
                        <p class="categoria_nome">Categorias</p>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">Maquiagem</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Pele</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Olhos</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Boca</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Sobrancelhas</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">Perfume</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Feminino</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Masculino</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Unissex</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">SkinCare</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Limpeza</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Esfoliação</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Hidratação</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Máscara</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Protetor Solar</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Especiais</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">Cabelo</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Dia-a-dia</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Tratamentos</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Estilização</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Especiais</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Acessórios</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">Eletrônicos</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Cabelo</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Pincel</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Esponja</p></li></a>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php" class="categoria_link">Corporal</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Body Splash</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Óleos</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Cremes</p></li></a>
                                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/Categorias.php"><li><p class="submenu_link">Protetores</p></li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="botoes_config">
                    <p class="categoria_nome">Ajuda e Configurações</p>
                    <ul>
                        <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/minhaConta.php"><li class="config"><p class="config_link">Minha Conta</p></li></a>
                        <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/meusPedidos.php"><li class="config"><p class="config_link">Meus Pedidos</p></li></a>
                        ' . typeSidebar($tipoUsuario) . '
                        <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/TermoDeUso.php"><li class="config"><p class="config_link">Termos de Uso e Privacidade</p></li></a>
                    </ul> 
                </div>
            </div>
        </div>
        
    </div>
    ';
}
?>