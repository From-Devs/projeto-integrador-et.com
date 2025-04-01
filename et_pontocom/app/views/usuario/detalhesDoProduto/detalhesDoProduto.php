<?php

require_once __DIR__ . "../../../../../public/componentes/header/header.php";
require_once __DIR__ . "../../../../../public/componentes/popup/popUp.php";
require_once __DIR__ . "../../../../../public/componentes/botao/botao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/botao/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/header/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/componentes/sidebar/styles.css">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/detalhesDoProduto.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pixelify+Sans:wght@400..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Detalhes do produto</title>
    
</head>
<body>
    <?php echo createHeader(false, "Usuário")?>
    
    <div class="container-detalhes">
        <div class="detalhes-principal">
            <div class="detalhes-imagens">
                <div class="imagens-lateral">
                    <div>
                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/exemplo-produto1.png" alt="img-lateral">
                    </div>
                    <div>
                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/exemplo-produto2.png" alt="img-lateral">
                    </div>
                    <div>
                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/simple.webp" alt="img-lateral">
                    </div>
                </div>
                <div class="img-principal">
                    <div>
                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/exemplo-produto4.png" alt="img-principal">
                    </div>
                </div>
            </div>
            <div class="detalhes-info">
                <div class="titulo-produto">
                    <div class="titulo">
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing</h3>
                        <?php echo PopUpComImagemETitulo("popUpFavorito", "/popUp_Botoes/img-favorito.png", "120px", "Adicionado aos favoritos!", "", "", "", "200px")?>
                        <abbr title="Adicionar aos favoritos">
                            <button class="coracaoImg" onclick="abrirPopUp('popUpFavorito')">
                                <img src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/coracao-detalhes-produto.png' alt='Coração'>
                            </button>
                        </abbr>
                    </div>
                    <div class="sub-titulo-produto">
                        <span class="preco-produto">R$39,90 |</span>
                        <abbr title="Avaliações" class="avaliacao-descricao">
                            <a href="#all-avaliacoes">
                                <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                                <span class="qtd-reviews">(10 reviews)</span>
                            </a>
                        </abbr>
                    </div>
                </div>
                <hr>
                <div class="mais-detalhes">
                    <div class="descricao">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolores illum iste hic, eius quae natus nobis eveniet voluptates qui facere modi? Explicabo, ad velit. Consequatur placeat possimus dolore accusantium iure.
                        Perspiciatis esse aut voluptas quia ex repudiandae consequuntur iste quasi, recusandae deserunt odit eos voluptatibus dicta nulla quos voluptates rerum sit! Dolorum voluptate odio quaerat explicabo praesentium obcaecati dolor natus!</p>
                    </div>
                    <div class="botoes-detalhes">
                        <div class="btn-juntos">
                            <div class="qtd-produtos">
                                <button onclick="diminuirQtdProduto()">-</button>
                                <span id="valor">1</span>
                                <button onclick="aumentarQtdProduto()">+</button>
                            </div>
                            <?php
                            echo PopUpComImagemETitulo("AddCarrinho", "/produto/img-carrinho.png", "80px", "Adicionado ao carrinho!");

                            echo botaoPersonalizadoOnClick("Adicionar ao carrinho", "btn-black", "abrirPopUp(\"AddCarrinho\")", "100%", "100%");
                            ?>
                        </div>
                        <div>
                            <?php echo botaoPersonalizadoRedirect("Comprar agora", "btn-white", "#", "100%", "40px")?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="description-box">
        <h2>DESCRIÇÃO</h2>
        <p>Marca: Mary Kay<br>
            Linha: At Play®<br>
            Volume: 29ml<br>
            Tipo de Produto: Base Líquida Matte<br>
        </p>

            <h3>Características: </h3>
            <ul>
                <li>Acabamento Matte: Proporciona um acabamento opaco, ideal para peles mistas a oleosas ou para quem prefere um visual sem brilho.</li>
                <li>Cobertura: Oferece uma cobertura leve a média, permitindo a construção de camadas para alcançar o nível desejado de cobertura, sem deixar a pele com aspecto pesado.</li>
                <li>Fórmula: A fórmula é leve e confortável, garantindo que a base se espalhe facilmente sobre a pele, proporcionando um acabamento uniforme e natural.</li>
                <li>Durabilidade: Desenvolvida para longa duração, a base mantém a pele com aparência impecável por várias horas, resistindo ao calor e à umidade.</li>
                <li>Controle de Oleosidade: Ajuda a controlar a oleosidade ao longo do dia, mantendo a pele com aparência fresca e sem brilho excessivo.</li>
                <li>Disponibilidade de Tons: Disponível em uma variedade de tons para atender diferentes tonalidades de pele, garantindo um match perfeito para a maioria das pessoas.</li>
                <li>Indicação: Indicada para todos os tipos de pele, especialmente para peles oleosas e mistas, devido ao seu efeito matte e controle de oleosidade.</li>
                <li>Modo de Uso: Aplicar uma pequena quantidade de produto no dorso da mão e, com o auxílio de um pincel, esponja ou os dedos, espalhar uniformemente pelo rosto, começando do centro para as extremidades.</li>
                <li>Benefícios Adicionais: mAlém de proporcionar uma cobertura natural e uniforme, a base contribui para um visual mais saudável da pele, minimizando a aparência de poros e imperfeições.</li>
                <li>Embalagem: Vem em uma embalagem prática e portátil, facilitando o transporte e a aplicação em qualquer lugar.</li>
                <li>Esta base é perfeita para quem busca uma pele com acabamento matte, natural e duradouro, sem abrir mão do conforto e da qualidade.</li>
            </ul>
    </div>

    <div id="all-avaliacoes">
        <div class="avaliacoes">
            <div class="titulo-avaliacoes">
                <div class="titulo-aval">
                    <h1>Avaliações</h1>
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                </div>
                <div class="qtd-respostas">
                    <h2>4 respostas obtidas</h2>
                </div>
                <div class="div-ordenar">
                    <button class="btn-ordenar" onclick="abrirFiltro()">Ordenar por: <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/setaBaixo.png" alt="seta-baixo"></button>
                    <div class="" hidden>
                        <div class="item-filtro mais-relevantes">
                            <span>Mais relevantes</span>
                        </div>
                        <hr>
                        <div class="item-filtro mais-recentes">
                            <span>Mais recentes</span>
                        </div>
                        <hr>
                        <div class="item-filtro mais-antigas">
                            <span>Mais antigas</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-avaliacoes">
                <hr style="border-color: black;">
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Nícolas Eloy</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>01/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem doloribus porro aut alias aspernatur reiciendis quis autem culpa et?</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                            <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Nícolas Eloy</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>01/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem doloribus porro aut alias aspernatur reiciendis quis autem culpa et?</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                        <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Nícolas Eloy</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>01/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem doloribus porro aut alias aspernatur reiciendis quis autem culpa et?</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                        <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="avaliacao">
                    <div class="container-nome-usuario">
                        <h3 class="nome-usuario">Nícolas Eloy</h3>
                        <img class="avaliacao-usuario" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/avaliacao-4.png" alt="img-avaliacao">
                    </div>
                    <div class="data-avaliacao">
                        <span>01/01/2024</span>
                    </div>
                    <div class="descricao-avaliacao">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto quidem doloribus porro aut alias aspernatur reiciendis quis autem culpa et?</p>
                    </div>
                    <div class="pergunta-avaliacao">
                        <span>Esta avaliação foi útil?</span>
                        <div class="btns-pergunta">
                        <?php echo botaoPersonalizadoOnClick("Sim", "btn-black", "foiUtil()", "", "20px", "0.9rem");
                            echo botaoPersonalizadoOnClick("Não", "btn-white", "naoFoiUtil()", "", "20px", "0.9rem");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/header/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/public/componentes/popup/script.js"></script>
    <script src="/projeto-integrador-et.com/et_pontocom/app/views/usuario/detalhesDoProduto/detalhesDoProduto.js"></script>
</body>
</html>