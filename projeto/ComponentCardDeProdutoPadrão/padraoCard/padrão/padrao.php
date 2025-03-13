<?php 

function Card($marca,$nomeProduto,$preco,$imagemProduto){
    return "
    <div class= 'content'>

        <div class='coisaDeCima' >
            <i id='coraçãoFofo'>
                <img id='oCoração' src='../public/image.png' alt='Coração em forma de ícone'>
            </i>
            <i id='buraquinho'></i>
        </div>

        <img class='imagemMaldita' src='$imagemProduto' alt='produtoheiroso'>

        <div class= 'contentDeBaixo'>
            <hr class= 'linha'>
            <h1 class = 'marca'> $marca </h1>
            <h1 class = 'nomeProduto'> $nomeProduto </h1>
            <h1 class = 'preco'> $preco </h1>
            <button class='botaoComprarCardLancamento' id='botaoComprarCardLancamento'>Comprar</button>
            <button class='botaoEspectro' id='botaoEspectro'></button>
        </div>

        
    </div>


    ";
}

?>









