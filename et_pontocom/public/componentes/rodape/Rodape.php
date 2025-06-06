<?php
function createRodape($tipo = 0){
    if($tipo == 0){
        return '
        <footer>
            
            <div class="primeiraSecao">
                <button type=button class="VoltarInicio" >
                    <i class="fa-solid fa-chevron-up seta" style="color:#ffffff" ></i>
                    <p class="Voltar">Voltar para o início</p>  
                </button>
            </div>
    
            <div class="segundaSecao">
                <div>
                    <img class="logoPrincipal" src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca1.png">
                </div>
               
                <div class="segundaSubSecao">
                    <div class="ColunsCategoria">
                        <h1 class="tituloCategoria" id="Categoria">
                            Categorias
                        </h1>
                        <div class="ColunsLine">
                            <a href="" class="CategoriaLink">
                                Maquiagem
                            </a>
                            <a href="" class="CategoriaLink">
                                Perfumes
                            </a>
                            <a href="" class="CategoriaLink">
                                SkinCare
                            </a>
                            <a href="" class="CategoriaLink">
                                Cabelo
                            </a>
                            <a href="" class="CategoriaLink">
                                Eletrônicos
                            </a>
                            <a href="" class="CategoriaLink">
                                Corporal
                            </a>
                        </div>
                    </div>
    
                    <div class="ColunsCategoria">
                        <h1 class="tituloCategoria" id="Associado">
                            Torne-se um Associado
                        </h1>
                        <div class="ColunsLine">
                            <a href="" class="CategoriaLink">
                                Sobre
                            </a>
                            <a href="" class="CategoriaLink">
                                Tornar-se Agora
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="terceiraSecao">
                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/SobreNos.php">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/FromDevsLogo.png" id="LogoFromDevs">
                </a>
                <p class="Termos">
                    © 2025 - Et.com
                </p>
                </div>
        </footer>
        ';
    }else{
        return '
        <footer>
            
            <div class="primeiraSecao">
                <button type=button class="VoltarInicio" >
                    <i class="fa-solid fa-chevron-up seta" style="color:#ffffff" ></i>
                    <p class="Voltar">Voltar para o início</p>  
                </button>
            </div>
    
            <div class="segundaSecao" style="user-select: none; pointer-events: none;">
                <div>
                    <img class="logoPrincipal" src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/LogoBranca1.png">
                </div>
               
                <div class="segundaSubSecao">
                    <div class="ColunsCategoria">
                        <h1 class="tituloCategoria" id="Categoria">
                            Categorias
                        </h1>
                        <div class="ColunsLine">
                            <a href="" class="CategoriaLink">
                                Maquiagem
                            </a>
                            <a href="" class="CategoriaLink">
                                Perfumes
                            </a>
                            <a href="" class="CategoriaLink">
                                SkinCare
                            </a>
                            <a href="" class="CategoriaLink">
                                Cabelo
                            </a>
                            <a href="" class="CategoriaLink">
                                Eletrônicos
                            </a>
                            <a href="" class="CategoriaLink">
                                Corporal
                            </a>
                        </div>
                    </div>
    
                    <div class="ColunsCategoria">
                        <h1 class="tituloCategoria" id="Associado">
                            Torne-se um Associado
                        </h1>
                        <div class="ColunsLine">
                            <a href="" class="CategoriaLink">
                                Sobre
                            </a>
                            <a href="" class="CategoriaLink">
                                Tornar-se Agora
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="terceiraSecao" style="user-select: none; pointer-events: none;">
                <a href="/projeto-integrador-et.com/et_pontocom/app/views/usuario/SobreNos.php">
                    <img src="/projeto-integrador-et.com/et_pontocom/public/imagens/ET/FromDevsLogo.png" id="LogoFromDevs">
                </a>
                <p class="Termos">
                    © 2025 - Et.com
                </p>
                </div>
        </footer>
        ';
    }
}
?>