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