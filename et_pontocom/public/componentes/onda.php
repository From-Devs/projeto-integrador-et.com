<style>

    body {
        /* ondas */
        background-image: linear-gradient(to top, #EBC1B6, #C69065);
    }
    section
    {   
        position: relative;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        
    }
    /* aqui é onde criar a onda do header */
    section .wave
    {
        position: absolute;
        /* top: 45%;
        left: 2%; */
        width: 100%;
        height: 100px;
        background: url(../imagens/wave.png);
        background-size: 1000px 100px;
    }
    /* onde inicia a animaçao pls nao mexer */
    section .wave.wave1 
    {
        top: 10;
        animation: animacao 10s linear infinite;
        z-index: 1000;
        opacity: 1;
        animation-delay: 0s;


    }
    
    section .wave.wave2
    {

        top: 0;
        animation: animacao 8s linear infinite;
        z-index: 999;
        opacity: 0.2;
        animation-delay: 0s;


    }
    /* fim da animação */
    @keyframes animacao
    {
        0%
        {
            background-position-x: 0;
        }
        100%
        {
            background-position-x: -1000px;
        }
    }
        
</style>
<div class="wave-container">
    <section>
        <div class="wave wave1"></div>
        <div class="wave wave2"></div>
    </section>
</div>
