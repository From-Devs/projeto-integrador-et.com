<?php
function createSidebar(){ // Sidebar de teste, depois trocar para versão oficial.
    return '
    <div class="sidebar_adm">
        <div class="nav_adm">
            <a href="#" class="logo">               <!-- Adicionar o atalho para a página principal -->
                <img src="../imagens/LogoBranca2.png" alt="">
            </a>
            <div class="botoes_sidebar">
                <div class="botoes_categoria">
                    <ul>
                        <p class="categoria_nome">Categorias</p>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">Maquiagem</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Pele</a></li>
                                <li><a href="#" class="submenu_link">Olhos</a></li>
                                <li><a href="#" class="submenu_link">Boca</a></li>
                                <li><a href="#" class="submenu_link">Sobrancelhas</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">Perfume</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Feminino</a></li>
                                <li><a href="#" class="submenu_link">Masculino</a></li>
                                <li><a href="#" class="submenu_link">Unissex</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">SkinCare</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Limpeza</a></li>
                                <li><a href="#" class="submenu_link">Esfoliação</a></li>
                                <li><a href="#" class="submenu_link">Hidratação</a></li>
                                <li><a href="#" class="submenu_link">Máscara</a></li>
                                <li><a href="#" class="submenu_link">Protetor Solar</a></li>
                                <li><a href="#" class="submenu_link">Especiais</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">Cabelo</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Dia-a-dia</a></li>
                                <li><a href="#" class="submenu_link">Tratamentos</a></li>
                                <li><a href="#" class="submenu_link">Estilização</a></li>
                                <li><a href="#" class="submenu_link">Especiais</a></li>
                                <li><a href="#" class="submenu_link">Acessórios</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">Eletrônicos</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Cabelo</a></li>
                                <li><a href="#" class="submenu_link">Pincel</a></li>
                                <li><a href="#" class="submenu_link">Esponja</a></li>
                            </ul>
                        </li>
                        <li class="categoria">
                            <div>
                                <a href="#" class="categoria_link">Corporal</a>
                                <div class="button_sub">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <ul class="submenu">
                                <li><a href="#" class="submenu_link">Body Splash</a></li>
                                <li><a href="#" class="submenu_link">Óleos</a></li>
                                <li><a href="#" class="submenu_link">Cremes</a></li>
                                <li><a href="#" class="submenu_link">Protetores</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="botoes_config">
                    <p class="categoria_nome">Ajuda e Configurações</p>
                    <ul>
                        <li class="config"><a href="#" class="config_link">Minha Conta</a></li>
                        <li class="config"><a href="" class="config_link">Meus Pedidos</a></li>
                        <?php if ($tipo_usuario == "Associado") : ?>
                            <li class="config"><a href="#" class="config_link">Área de Administração</a></li>
                        <?php else : ?>
                            <li class="config"><a href="#" class="config_link">Associados</a></li>
                        <?php endif; ?>
                        <li class="config"><a href="" class="config_link">Termos de Uso e Privacidade</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    ';
}
?>