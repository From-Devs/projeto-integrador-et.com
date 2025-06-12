<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projeto-integrador-et.com/et_pontocom/public/css/CustomizacaoADM.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imagemProdutoWrapper{
            width: 258px;
            height: 258px;
            background-color: black;
            border-radius: 24px;
            cursor: pointer;
        }

        .hold {
            border: 5px solid #ccc;
        }

        #cor-0 { background-image: linear-gradient(to bottom, #7A3241 0%, #39121D 50%, #150106 100%); }
        #cor-1 { background-image: linear-gradient(to bottom, #C69065 0%, #B88D6B 50%, #EBC1B6 100%); }
        #cor-2 { background-image: linear-gradient(to bottom, #F2D5AF 0%, #CC9F9D 50%, #CE766C 100%); }
    </style>
</head>
<body>
    <div class="sessao" id="sessaoCarousel">
        <ul>
            <li class="tituloSessao">Carousel</li>
        </ul>
        <div class="editarCarousel">
            <div class="produtoInicial">
                <p>Inicial</p>
                <div class="bordaProdutoInicial"></div>
            </div>
            <div class="editarCarouselContainer">
                <div class="produtoContainer" id="produto1" onclick="abrirPopUp('popUpEditProduto')">
                    <div class="imagemProdutoWrapper" id="cor-0">
                        <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/hinode.png" alt="">
                    </div>
                </div>
                <div class="produtoContainer" id="produto2" onclick="abrirPopUp('popUpEditProduto')">
                    <div class="imagemProdutoWrapper" id="cor-1">
                        <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/bocarosa.png" alt="">
                    </div>
                </div>
                <div class="produtoContainer" id="produto3" onclick="abrirPopUp('popUpEditProduto')">
                    <div class="imagemProdutoWrapper" id="cor-2">
                        <img class="imagemProduto" src="/projeto-integrador-et.com/et_pontocom/public/imagens/produto/leite.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const imagens = document.querySelectorAll(".imagemProdutoWrapper")
        const containers = document.querySelectorAll(".produtoContainer")

        function dragStart(e) {
            selected = this;
            parentOfFill = selected.parentNode;
            this.className += " hold";
            setTimeout(() => {
            return (this.style.visibility = "hidden");
            }, 0);
        }
        
        function dragOver(e) {
            e.preventDefault();
            if (!this.className.includes("hovered")) {
                this.className += " hovered";
            }
        }
        
        function dragEnter(e) {
            e.preventDefault();
            
            if (this.querySelector(".imagemProdutoWrapper") !== null) {
                doesExist = true;
                const elements = this.querySelectorAll(".imagemProdutoWrapper");
                swapElement = elements[0];
            } else {
                doesExist = false;
            }
        }
        
        function dragLeave() {
            this.className = "produtoContainer";
        }
        
        function dragDrop() {
            this.className = "produtoContainer";
            selected.style.visibility = "visible";
            if (doesExist) {
                parentOfFill.append(swapElement);
            }
            parentOfFill.children[1].value = "";
            this.append(selected);
        }
        
        function dragEnd() {
            this.className = "imagemProdutoWrapper";
            if (selected.style.visibility === "hidden") {
                selected.style.visibility = "visible";
            }
        }

        imagens.forEach(element => {
            element.addEventListener("dragstart", dragStart);
            element.addEventListener("dragend", dragEnd);
        });

        containers.forEach(element => {
            element.addEventListener("dragover", dragOver);
            element.addEventListener("dragenter", dragEnter);
            element.addEventListener("dragleave", dragLeave);
            element.addEventListener("drop", dragDrop);
        })
    </script>
</body>
</html>