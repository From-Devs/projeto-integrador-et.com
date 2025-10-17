<?php 

function createCardProduto(
    $marca = "Marca",
    $nomeProduto = "Nome do Produto",
    $preco = 0,
    $imagemProduto = "",
    $emDesconto = false,
    $precoOriginal = '',
    $corPrincipal = "#000000",
    $corDegrade1 = "#000000",
    $corDegrade2 = "#666666",
    $idProduto = 0
    ){

    $preco = sprintf("%.2f", $preco);

    $classe = $emDesconto ? 'cardProduto desconto' : 'cardProduto';
    
    if($emDesconto){
        $precoOriginal = sprintf("%.2f", $precoOriginal);
    
        $porcentagem = (($precoOriginal - $preco)/$precoOriginal)*100;
    
        $porcentagem = (int) $porcentagem;

        return "
        <div class= '$classe' data-id='$idProduto'>
            <div class='cores'>
                <div class='corDestaque' style='color: $corPrincipal;'></div>
                <div class='corDegrade1' style='color: $corDegrade1;'></div>
                <div class='corDegrade2' style='color: $corDegrade2;'></div>
            </div>
    

            <span class='balaoDesejos'>Adicionar a Lista de desejos</span>
            <i class='coracaoFofo'>
                <img class='coracaoImg' src='/projeto-integrador-et.com/public/imagens/produtoCard/coracao.png' alt='Coração'>
            </i>
            <div class='ticketContainer'>
                <img class ='ticketDesconto' src='/projeto-integrador-et.com/public/imagens/produtoCard/ticket2.png' alt='ticket'>
                <div class='descontoTextContainer'>
                    <p class='descontoPorcento'>$porcentagem%</p>
                    <p class='descontoOffText'>FF</p>
                </div>
            </div>
            <i class='buraquinho'></i>

            <div class='imagemCardProdutoComumContainer'>
                <img class='imagemCardProdutoComum' src='/projeto-integrador-et.com/$imagemProduto' alt=''>
            </div>
    
            <div class= 'contentDeBaixo'>
                <hr class= 'linha'>
                <h1 class = 'marca'> $marca </h1>
                <h1 class = 'nomeProduto'> $nomeProduto </h1>
                <h2 class = 'precoOriginal'> R$$precoOriginal </2>
                <h1 class = 'preco'> R$$preco </h1>
                <button class='botaoComprarCardProduto'>Comprar</button>
                <button class='botaoEspectro' id='botaoEspectro'></button>
            </div>
            
        </div>
        ";
    }else{
        return "
        <div class= '$classe' data-id='$idProduto'>
            <div class='cores'>
                <div class='corDestaque' style='color: $corPrincipal;'></div>
                <div class='corDegrade1' style='color: $corDegrade1;'></div>
                <div class='corDegrade2' style='color: $corDegrade2;'></div>
            </div>

            <span class='balaoDesejos'>Adicionar a Lista de desejos</span>
            <i class='coracaoFofo'>
                <img class='coracaoImg' src='/projeto-integrador-et.com/public/imagens/produtoCard/coracao.png' alt='Coração'>
            </i>
            <div class='ticketContainer'>
                <img class ='ticketDesconto' src='/projeto-integrador-et.com/public/imagens/produtoCard/ticket2.png' alt='ticket'>
                <div class='descontoTextContainer'>
                    <p class='descontoPorcento'></p>
                    <p class='descontoOffText'>FF</p>
                </div>
            </div>
            <i class='buraquinho'></i>

            <img class='imagemMaldita' src='/projeto-integrador-et.com/$imagemProduto' alt=''>

            <div class= 'contentDeBaixo'>
                <hr class= 'linha'>
                <h1 class = 'marca'> $marca </h1>
                <h1 class = 'nomeProduto'> $nomeProduto </h1>
                <h2 class = 'precoOriginal'></2>
                <h1 class = 'preco'> R$$preco </h1>
                <button class='botaoComprarCardProduto'>Comprar</button>
                <button class='botaoEspectro' id='botaoEspectro'></button>
            </div>
            
        </div>
    ";
    };


   
}

?>