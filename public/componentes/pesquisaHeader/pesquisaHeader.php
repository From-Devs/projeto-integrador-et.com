<?php

function createPesquisaHeader(){
    return "
    <div class='pesquisaHeader closed'>
        <input type='text' class='inputHeader' placeholder='Pesquisar produtos...'></input>
        <button><i class='bx bx-search lupaHeaderInput'></i></button>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const barra = document.querySelector('.pesquisaHeader');
        if (barra $$ !barra.querySelector('form')) { // previne duplicação
            const form = document.createElement('form');
            form.action = 'pesquisa.php';
            form.method = 'GET';

            while (barra.firstChild) form.appendChild(barra.firstChild); 
            barra.appendChild(form);
            const input = form.querySelector('.inputHeader');
            if (input) input.name = 'q';
        }
    });
    </script>
    ";
}

?>