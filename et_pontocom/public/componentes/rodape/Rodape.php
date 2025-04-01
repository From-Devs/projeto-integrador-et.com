<?php
function createRodape(){
    return '
    <footer>
        
        <div class="primeiraSecao">
            <button type=button class="VoltarInicio" >
                <i class="bx bx-chevron-up seta" style="color:#ffffff" ></i>
                <p class="Voltar">Voltar para o início</p>  
                  
            </button>
        </div>

        <div class="segundaSecao">
            <div>
                <img class="logoPrincipal" src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca1.png">
            </div>
           
            <div class="segundaSubSecao">
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
                            Tornar-se Agora
                        </a>
                        <a class="CategoriaLink">
                            
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="terceiraSecao">
                    <p class="Termos">
                        © 2025 - Et.com
                    </p>
                    <a>
                        <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/FromDevsLogo.png" id="LogoFromDevs">
                    </a>
        </div>
    </footer>
    ';
}
?>