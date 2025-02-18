<?php

function Rodape(){
    return '
    <footer>
        <button type=button id="VoltarInicio">
        <i class="bx bx-chevron-up seta" style="color:#ffffff" ></i>
        Voltar para o início
        </button>

        <div class="colunas">
            <img src="../../../public/imagens/LogoBranca2.png" >
            <div class="ColunsCategoria">
                <h1 id="Categoria">
                    Categorias
                </h1>
                <div class="ColunsLine">
                    <a class="CategoriaLink">
                        Maquiagem
                    </a>
                    <a class="CategoriaLink">
                        Perfumes
                    </a>
                    <a class="CategoriaLink">
                        SkinCare
                    </a>
                    <a class="CategoriaLink">
                        Cabelo
                    </a>
                    <a class="CategoriaLink">
                        Eletrônicos
                    </a>
                    <a class="CategoriaLink">
                        Corporal
                    </a>
                </div>
            </div>

            <div class="ColunsAssociado">
                <h1 id="Associado">
                    Torne-se um Associado
                </h1>
                <div class="ColunsLine">
                    <a class="CategoriaLink">
                        Sobre
                    </a>
                    <a class="CategoriaLink">
                        Sobre
                    </a>
                    <a class="CategoriaLink">
                        Sobre
                    </a>
                </div>
            </div>
        </div>

        <p id="Termos">
            © 2024 - Et.com
        </p>

    </footer>';
}
?>