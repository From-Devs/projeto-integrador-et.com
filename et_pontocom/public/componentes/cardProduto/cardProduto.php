<?php 

function createCardProduto($marca = "Marca", $nomeProduto = "Nome do Produto", $preco = "R$00,00", $imagemProduto = "", $emDesconto = false, $precoOriginal = '', $corPrincipal = "#000000", $corDegrade1 = "#000000", $corDegrade2 = "#666666"){

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
            <span class='balaoDesejos'>Adicionar a Lista de desejos</span>
            <i class='coracaoFofo'>
                <img class='coracaoImg' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/coracao.png' alt='Coração'>
            </i>
            <img class ='ticketMaldito' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produtoCard/ticket.png' alt='ticket'>
            <i class='buraquinho'></i>
        </div>

        <img class='imagemMaldita' src='/projeto-integrador-et.com/et_pontocom/public/imagens/produto/$imagemProduto' alt=''>

        <div class= 'contentDeBaixo'>
            <hr class= 'linha'>
            <h1 class = 'marca'> $marca </h1>
            <h1 class = 'nomeProduto'> $nomeProduto </h1>
            <h2 class = 'precoOriginal'> $precoOriginal </2>
            <h1 class = 'preco'> $preco </h1>
            <button class='botaoComprarCardProduto'>Comprar</button>
            <button class='botaoEspectro' id='botaoEspectro'></button>
        </div>
        
    </div>
    ";
}

?>