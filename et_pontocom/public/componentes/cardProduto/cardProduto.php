<?php 

function createCardProduto($marca, $nomeProduto, $preco, $imagemProduto, $emDesconto = false, $precoOriginal = '', $corPrincipal = "#000000", $corDegrade1 = "#FFFFFF", $corDegrade2 = "#6D6D6D"){

    if($emDesconto){
        $classe = 'cardProduto desconto';
    }else{
        $classe = 'cardProduto';
    };
    return "
    <div class= '$classe'>
        <div class='cores'>
            <div class='corDestaque' style='color: $corPrincipal;'></div>
            <div class='corDegrade1' style='color: $corDegrade1;'></div>
            <div class='corDegrade2' style='color: $corDegrade2;'></div>
        </div>

        <div class='coisaDeCima'>
            <i class='coraçãoFofo'>
                <img class='oCoração' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/coracao.png' alt='Coração em forma de ícone'>
            </i>
            <img class ='ticketMaldito' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/ticket.png' alt='ticket'>
            <i class='buraquinho'></i>
        </div>

        <img class='imagemMaldita' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/produtos/$imagemProduto' alt='produtoheiroso'>

        <div class= 'contentDeBaixo'>
            <hr class= 'linha'>
            <h1 class = 'marca'> $marca </h1>
            <h1 class = 'nomeProduto'> $nomeProduto </h1>
            <h2 class = 'precoOriginal'> $precoOriginal </2>
            <h1 class = 'preco'> $preco </h1>
            <button class='botaoComprarCardLancamento' id='botaoComprarCardLancamento'>Comprar</button>
            <button class='botaoEspectro' id='botaoEspectro'></button>
        </div>
        
    </div>
    ";
}

?>